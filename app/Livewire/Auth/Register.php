<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Register extends Component
{
    public $name,$email,$password,$password_confirmation;
    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];
    public function mount() {
        if(auth()->user()){
            return $this->redirect('/', navigate: true);
        }
    }
    public function register()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        $role = Role::where('name',USER)->first();
        if (empty($role)){
            $role = Role::create(['name' => USER]);
        }
        $user->assignRole($role);
        auth()->login($user);
        return $this->redirect('/', navigate: true);
    }
    public function render()
    {
        return view('livewire.auth.register',)->layout(FRONTEND_LAYOUT, ['seoTitle' =>'Register']);
    }
}
