<div>
    {{-- The whole world belongs to you. --}}
    <section class="flex-1 my-5 w-4/5 ml-auto mr-auto bg-white p-5 rounded-xl">
        <x-label class="my-5 text-xl">Tabla Asignaciones</x-label>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TRANSPORTISTA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-widert">PLACA</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CONTENEDOR</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">TAMANI</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">UBICACIÓN</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">KILÓMETRO</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ACCIONES</th>
            </tr>
            </thead>
            <tbody>
            @foreach($asignaciones as $as)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$as->transportista}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$as->placa}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$as->identificador}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$as->name}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$as->ubicacion}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$as->km}}</td>
                    <td class="flex gap-3 ml-auto mr-auto">
                          @if($pedidos->count() >= 1)
                            @if($as->corte_id == null)
                                <div>
                                    <select wire:model="asignacionSelected" class="form-select rounded-md border-gray-300 mt-1">
                                        <option value="">Selecciona una opción</option>
                                        @foreach($pedidos as $contenedor)
                                            <option value="{{ $contenedor->id }}">{{ $contenedor->programado }}{{$contenedor->orden_corta}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <x-button wire:click="asignarPedido({{$as->id}})" class="bg-orange-400">
                                    {{ __('Asignar Viaje') }}
                                </x-button>
                            @endif

                            @if($as->corte_id !== null)
                                <x-button wire:click="navegarDetallePedido({{$as->id}})" class=" mt-2 bg-green-400">
                                    {{ __('Ver Orden') }}
                                </x-button>
                            @endif
                        @endif
                              <x-button wire:click="finalizarPedido({{$as->id}})" class=" mt-2 bg-red-400">
                                  {{ __('Finalizar') }}
                              </x-button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
</div>
