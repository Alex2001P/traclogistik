<?php

namespace App\Livewire\Transportista;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableCreateUser extends Component
{
    public function render()
    {
        $usuario = Auth::user();
        $usuarios = DB::table('users')
            ->join('transportistas as tr', 'users.transportista_id', '=', 'tr.id')
            ->where('users.transportista_id', '=', $usuario->transportista_id)
            ->select('users.*', 'tr.name as transportista')
            ->get();
        return view('livewire.transportista.table-create-user', ['usuarios' => $usuarios]);
    }
}
