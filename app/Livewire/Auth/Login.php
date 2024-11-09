<?php
namespace App\Livewire\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public $pageTitle = 'Login';
    public $email;
    public $password;
    public $remember_me;

    protected $rules = [
        'email' => ['required','email','string'],
        'password' => ['required','min:8'],
    ];

    public function login()
    {
        $this->validate();
        if(auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["email" => $this->email])->first();
            auth()->login($user, $this->remember_me);
            if (auth()->user()->hasRole(\USER)){
                if (Session::has('url.intended')){
                    $route = Session::get('url.intended');
                    Session::forget('url.intended');
                    return $this->redirect($route, navigate: true);
                }
                return $this->redirect(route('index'), navigate: true);
            }else{
                return $this->redirect(route('admin.dashboard'), navigate: false);
            }
        }
        else{
            return $this->addError('email', trans('auth.failed'));
        }
    }
    public function render()
    {
        return view('livewire.auth.login')->layout(FRONTEND_LAYOUT,['seoTitle' => $this->pageTitle]);
    }
}
