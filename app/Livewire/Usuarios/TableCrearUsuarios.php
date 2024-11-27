<?php

namespace App\Livewire\Usuarios;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableCrearUsuarios extends Component
{
    public function render()
    {
        $usuarios = DB::table('users')
            ->join('transportistas as tr', 'users.transportista_id', '=', 'tr.id')
            ->select('users.*', 'tr.name as transportista')
            ->get();
        return view('livewire.usuarios.table-crear-usuarios', ['usuarios' => $usuarios]);
    }
}
