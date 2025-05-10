<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $name, $username, $email, $password, $confirm_password, $allRoles;
    public $roles = [];
    public function mount(){
        $this->allRoles = Role::all();
    }
    public function render()
    {
        return view('livewire.users.user-create');
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'roles' => 'required',
            'password' => 'required|same:confirm_password',
        ]);
        $user = User::create([
            'name'=> $this->name,
            'username'=> $this->name,
            'email'=> $this->email,
            'password'=> Hash::make($this->password),
        ]);
        $user->syncRoles([$this->roles]);
        return to_route('user.index')->with('success','User Created');
    }
}
