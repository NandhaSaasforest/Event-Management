<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $title = 'Login';

    public $username;
    public $email;
    public $password;

    public $events;

    protected $rules = [
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:1',
    ];

    public function login()
    {
        // Validate input data
        $this->validate();
        $user = User::where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard');
        } else {
            session()->flash('error', 'Invalid credentials. Please try again.');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
