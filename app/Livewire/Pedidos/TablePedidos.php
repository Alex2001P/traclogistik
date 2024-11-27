<?php

namespace App\Livewire\Pedidos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TablePedidos extends Component
{
    public function render()
    {
        $pedidos = DB::table('cortes')
            ->where('is_asigned', '=', false)
            ->whereDate('created_at', now())
            ->select('*')
            ->get();

        return view('livewire.pedidos.table-pedidos', ['pedidos' => $pedidos]);
    }
}
