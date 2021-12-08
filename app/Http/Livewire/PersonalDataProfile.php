<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\User;
use Livewire\Component;

class PersonalDataProfile extends Component
{
    public Account $account;
    public $user;

    protected $listeners = ['ProfileUpdated' => 'render'];

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('livewire.personal-data-profile');
    }
}
