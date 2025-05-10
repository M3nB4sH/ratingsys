<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::where('is_deleted', 0)->get();
        return view('livewire.users.user-index', compact("users"));
    }
    public function delete($id){
        $user=User::find($id);
        $user->is_deleted = 1;
        $user->save();
        session()->flash("success","User deleted");
    }
}
