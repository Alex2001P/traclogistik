<?php

namespace App\Livewire\Transportista;

use App\Models\PilotosModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;

    public $selectedTransportista = null;
    public $confirmCreateUser = false;

    public function render()
    {
        $usuario = Auth::user();
        $pilotos = DB::table('pilotos')
            ->where('transportista_id', '=', $usuario->transportista_id)
            ->get();
        return view('livewire.transportista.create-user', [ 'pilotos' => $pilotos ]);
    }

    public function created()
    {
        $usuario = Auth::user();
        $userSelected = PilotosModel::find($this->selectedTransportista);
        $user = User::create([
            'name' => $userSelected->name,
            'email' => $this->email,
            'piloto_id' => $this->selectedTransportista,
            'transportista_id' => $usuario->transportista_id,
            'password' => Hash::make($this->password),
        ]);

            $user->assignRole('transportista');


        return redirect()->to('/createUserTransportista')
            ->with('status', 'Usuario Registrado!');
    }

    public function onOpenModal() {
        $this->confirmCreateUser = true;
    }

}
