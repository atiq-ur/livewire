<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        'email' => '',
        'password' => '',
    ];

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'form.email' => 'required|email',
            'form.password' => 'required',
        ]);
    }

    public function submit()
    {
        $this->validate( [
            'form.email' => 'required|email',
            'form.password' => 'required',
        ]);
        if (Auth::attempt($this->form)) {
            return redirect()->route('home');
        }
        session()->flash('message', 'Credentials does not matched');

    }
    public function render()
    {
        return view('livewire.login');
    }
}
