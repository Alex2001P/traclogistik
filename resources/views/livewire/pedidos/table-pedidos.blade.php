<div class="m-8" >
    {{-- The whole world belongs to you. --}}
    <section class="flex-1 my-5 ml-auto mr-auto bg-white p-5 rounded-xl">
        <x-label class="my-5 text-xl">Tabla Asignaciones</x-label>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-widert">TURNO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-widert">FINCA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-widert">PROGRAMADO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AC</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CONTENEDOR</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CONTENEDOR2</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">OBSERVACIONES</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">PLACA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">OBSERVACIONES</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">HORA APROXIMADA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TRANSPORTE</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ORDEN CORTA</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pedidos as $pedido)
                <tr class="hover:bg-gray-100">
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->turno}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->finca}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->programado}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->ac == 1 ? 'Sí' : 'No'}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->contenedor}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->contenedor2}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->observaciones ?? '-'}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->placa}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->ubicacion}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->hora_aproximada_llegada ?? '-'}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->transporte}}</td>
                    <td class="px-6 py-4 text-sm text-gray-900 break-words">{{$pedido->orden_corta}}</td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </section>
</div>

