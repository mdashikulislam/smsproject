<?php

namespace App\Livewire\Auth;

use App\Constants\AppConstants;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Register extends Component
{
    public $name,$email,$password,$password_confirmation;
    public $seo = [];
    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ];
    public function mount() {
        $this->seo = getSeo(AppConstants::REGISTER_SLUG);
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
        return view('livewire.auth.register',)->layout(FRONTEND_LAYOUT, $this->seo);
    }
}
