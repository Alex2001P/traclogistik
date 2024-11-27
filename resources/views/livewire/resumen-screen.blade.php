<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resumen Screen') }}
        </h2>
    </x-slot>

    <div>
        <section class="flex justify-center sm:mt-8 pb-3">
            <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col md:flex-row gap-8 max-w-4xl w-full border border-gray-200">
                <!-- Información del Camión -->
                <div class="flex-1">
                    <h4 class="mb-4 text-lg font-semibold text-gray-700 border-b pb-2">Información de Asignacion</h4>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Finca:</span> {{$asignaciones->finca}}
                    </div>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Turno:</span> {{$asignaciones->turno}}
                    </div>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Ubicacion:</span> {{$asignaciones->ubicacion}}
                    </div>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Placa:</span> {{$asignaciones->placa}}
                    </div>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Chasis:</span> {{$asignaciones->chasis}}
                    </div>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Km.:</span> {{$asignaciones->km}}
                    </div>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Identificador:</span> {{$asignaciones->identificador}}
                    </div>

                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Size:</span> {{$asignaciones->name}}
                    </div>
                </div>

                <div class="flex-1">
                    <h4 class="mb-4 text-lg font-semibold text-gray-700 border-b pb-2">Informacion de Corte</h4>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Programado:</span> {{$corte->programado}}
                    </div>
                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">AC:</span> {{$corte->ac = 1 ? 'Si' : 'No'}}
                    </div>

                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Contenedor 1:</span> {{$corte->contenedor}}
                    </div>

                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Contenedor 2:</span> {{$corte->contenedor2}}
                    </div>

                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Ubicacion:</span> {{$corte->ubicacion}}
                    </div>

                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Orden de Corta:</span> {{$corte->orden_corta}}
                    </div>

                    <div class="mb-2 text-gray-600">
                        <span class="font-medium">Observaciones:</span> {{$corte->observaciones ?? '-'}}
                    </div>
                </div>


                    <!-- Información del Piloo -->
                    <div class="flex-1">
                        <h4 class="mb-4 text-lg font-semibold text-gray-700 border-b pb-2">Información del Piloto</h4>
                        <div class="mb-2 text-gray-600">
                            <span class="font-medium">Nombre Piloto:</span> {{$asignaciones->namePiloto}}
                        </div>
                        <div class="mb-2 text-gray-600">
                            <span class="font-medium">Apellido Piloto:</span> {{$asignaciones->lastnamePiloto}}
                        </div>
                        <div class="mb-2 text-gray-600">
                            <span class="font-medium">Numero de Telefono.:</span> #{{$asignaciones->telefono}}
                        </div>
                    </div>
            </div>

        </section>


    </div>
</x-app-layout>

