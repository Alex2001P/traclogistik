<?php

namespace App\Livewire\Usuarios;

use App\Models\TransportistasModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Livewire\Component;

class RegistrarUsuarios extends Component
{

    public $name;
    public $email;
    public $password;

    public $selectedTransportista = null;
    public $confirmCreateUser = false;

    public function render()
    {
        $transportistas = TransportistasModel::all();
        return view('livewire.usuarios.registrar-usuarios', [ 'transportistas' => $transportistas ]);
    }

    public function created()
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'transportista_id' => $this->selectedTransportista,
            'password' => Hash::make($this->password),
        ]);

        if ($this->selectedTransportista !== null) {
            $user->assignRole('transportista');
        } else {
            $user->assignRole('admin');
        }

        return redirect()->to('/registrarUsuarios')
            ->with('status', 'Usuario Registrado!');
    }

    public function onOpenModal() {
        $this->confirmCreateUser = true;
    }
}
