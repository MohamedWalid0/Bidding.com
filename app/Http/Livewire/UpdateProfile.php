<?php

namespace App\Http\Livewire;

use App\Http\Services\VerificationServices;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UpdateProfile extends Component
{
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

            $this->user->update(
                [
                    'email' => $data['email']
                ]
            );
            $this->user->account->update(
                [
                    'full_name' => $data['name'],
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                ]
            );


            if ($data['email'] != $oldEmail) {
                $this->verifyNewEmail();
            }

            if ($data['phone'] != $oldPhoneNumber) {
                $this->verifyNewPhoneNumber();
            }


            DB::commit();
            return redirect()->route('home');

        } catch (\Exception $ex) {
            DB::rollback();
        }

        // session()->flash('message', 'Profile successfully updated.');
        $this->emit('ProfileUpdated');
    }

    public function verifyNewEmail()
    {

        $this->user->update(['email_verified_at' => null]);
        $this->user->sendEmailVerificationNotification();
    }

    public function verifyNewPhoneNumber()
    {

        $this->user->update(['phone_verified_at' => null]);

        $verificationService = new VerificationServices();
        $this->verification['user_id'] = $this->user->id;
        $verification_data = $verificationService->setVerificationCode($this->verification);
        $verificationService->getSMSVerifyMessageByAppName($verification_data->code);

    }


}
