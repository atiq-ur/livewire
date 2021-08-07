<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'form.email' => 'required|email',
            'form.name' => 'required',
            'form.password' => 'required|confirmed',
        ]);
    }

    public function submit()
    {
        $this->validate( [
            'form.email' => 'required|email',
            'form.name' => 'required',
            'form.password' => 'required|confirmed',
        ]);
        User::create($this->form);
        return redirect(route('login'));
        //dd($this->form);
    }
    public function render()
    {
        return view('livewire.register');
    }
}
