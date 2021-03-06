<?php

namespace App\Http\Livewire;

use App\Events\EmailUpdated;
use App\Http\Services\VerificationServices;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class UpdateProfile extends Component
{
    use LivewireAlert;

    public $name;
    public $email;
    public $address;
    public $phone;
    public $user;
    public $account;
    public $verification = [];


    public function mount()
    {
        $this->user = auth()->user();
        $this->account = auth()->user()->account;
        $this->name = $this->account->full_name;
        $this->email = $this->user->email;
        $this->address = $this->account->address;
        $this->phone = $this->account->phone;

    }

    public function rules()
    {

        return [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->email . ',email',
            'phone' => 'required|numeric|digits:11|unique:accounts,phone,' . $this->account->phone . ',phone',
        ];
    }

    public function render()
    {
        return view('livewire.update-profile');
    }

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function edit()
    {

        $data = $this->validate();
        $oldPhoneNumber = $this->account->phone;
        $oldEmail = $this->user->email;

        try {
            DB::beginTransaction();

            $this->user->account->update(
                [
                    'full_name' => $data['name'],
                    'address' => $data['address'],
                ]
            );

            $this->checkVerification($data , $oldPhoneNumber , $oldEmail);

            $this->alert('success', 'Data Updated successfully', [
                'position' => 'center'
            ]);

            DB::commit();


        } catch (\Exception $ex) {
            DB::rollback();
        }

    }


    public function verifyNewPhoneNumber()
    {
        $this->user->update([
            'phone_verified_at' => null
        ]);
        $verificationService = new VerificationServices();
        $this->verification['user_id'] = $this->user->id;
        $verification_data = $verificationService->setVerificationCode($this->verification);
        $verificationService->getSMSVerifyMessageByAppName($verification_data->code);

    }

    public function updateEmail()
    {
        $this->user->update(
            [
                'email' => $this->validate()['email'],
                'email_verified_at' => null
            ]
        );
        $this->user->sendEmailVerificationNotification();
        $this->alert('success', 'Email Updated successfully', [
            'position' => 'center'
        ]);
        return redirect()->route('home')->with('emailOrPhoneUpdated' , 'Email must be verify again');
    }
    public function updatePhone()
    {
        $this->user->account->update([
                'phone' => $this->validate()['phone'],
            ]);
        $this->verifyNewPhoneNumber();

        $this->alert('success', 'phone Updated successfully', [
            'position' => 'center'
        ]);
        return redirect()->route('home')->with('emailOrPhoneUpdated' , 'Phone must be verify again');
    }

    public function checkVerification ($data , $oldPhoneNumber, $oldEmail) {

        if ($oldEmail !== $data['email'] && $oldPhoneNumber !== $data['phone']) {
            $this->user->update(
                [
                    'email' => $this->validate()['email'],
                    'email_verified_at' => null
                ]
            );
            $this->user->sendEmailVerificationNotification();

            $this->user->account->update([
                'phone' => $this->validate()['phone'],
            ]);
            $this->verifyNewPhoneNumber();

            $this->alert('success', 'Data Updated successfully', [
                'position' => 'center'
            ]);

            return redirect()->route('home')->with('emailOrPhoneUpdated' , 'Email and Phone must be verify again');
        } else if ($oldEmail !== $data['email'] ) {
            $this->updateEmail();
        } else if ($oldPhoneNumber !== $data['phone']) {
            $this->updatePhone();
        }

    }


}
