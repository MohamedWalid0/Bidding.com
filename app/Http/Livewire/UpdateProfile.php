<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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


    public function mount()
    {
        $this->user = Auth::user();
        $this->account = Account::findOrFail($this->user->id);
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
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->email . ',email',
            'phone' => 'required|numeric|min:10|unique:accounts,phone,' . $this->account->phone . ',phone',
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
        $id = Auth::user()->id;

        try {
            DB::beginTransaction();
            User::findOrFail($id)->update(
                [
                    'email' => $data['email']
                ]
            );
            Account::findOrFail($id)->update(
                [
                    'full_name' => $data['name'],
                    'address' => $data['address'],
                    'phone' => $data['phone'],
                ]
            );

            DB::commit();

        } catch (\Exception $ex) {
            DB::rollback();
        }

        // session()->flash('message', 'Profile successfully updated.');
        $this->emit('ProfileUpdated');
    }

}
