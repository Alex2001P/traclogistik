<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Livewire\Component;

class RegistrarUsuariosScreen extends Component
{
    public function render()
    {
        return view('livewire.registrar-usuarios-screen');
    }
}
