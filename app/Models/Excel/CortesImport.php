<?php

namespace App\Models\Excel;
use App\Models\CortesModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
class CortesImport implements ToModel, WithStartRow
{

    private $repetidos = 0;

    public function model(array $row)
    {
        $existe = CortesModel::where('orden_corta', $row[11])
            ->where('programado', $row[2])
            ->exists();

        if ($existe) {
            $this->repetidos++;
            return null;
        }

        return new CortesModel([
            'turno' => $row[0],
            'finca' => $row[1],
            'programado' => $row[2],
            'ac'     => $row[3],
            'contenedor'    => $row[4],
            'contenedor2'    => $row[5],
            'observaciones'    => $row[6],
            'placa'    => $row[7],
            'ubicacion'    => $row[8],
            'hora_aproximada_llegada'    => $row[9],
            'transporte'    => $row[10],
            'orden_corta'    => $row[11]
        ]);

    }
    public function startRow(): int
    {
        return 2; // Empieza desde la fila 2
    }

}
