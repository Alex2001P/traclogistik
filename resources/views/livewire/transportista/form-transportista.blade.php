<div>
    <div class="flex my-5 mr-5 justify-end" >
        <x-button  wire:click="onOpenModal" title="submit" class="bg-blue-400">
            {{ __('Nueva Asignacion') }}
        </x-button>
    </div>
    <x-dialog-modal wire:model.live="confirmCreatePiloto">
        <x-slot name="title">
            {{ __('Formulario Crear Piloto') }}
        </x-slot>

        <x-slot name="content">
            <section class="flex-1 my-5  w-4/5 ml-auto mr-auto bg-white p-5 rounded-xl">
                <form class="flex flex-col gap-3" method="POST" wire:submit.prevent="save">
                    <div>
                        <x-label for="pilotos" value="{{ __('Pilotos') }}" />
                        @if(isset($pilotos) && $pilotos->count())
                            <div>
                                <select wire:model="pilotoSelected" class="form-select rounded-md border-gray-300 mt-1">
                                    <option value="">Selecciona una opción</option>
                                    @foreach($pilotos as $piloto)
                                        <option value="{{ $piloto->piloto_id }}">{{ $piloto->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div class="text-red-400">No hay contenedores disponibles</div>
                        @endif
                    </div>

                    <div>
                        <x-label for="camiones" value="{{ __('Camiones') }}" />
                        @if(isset($camiones) && $camiones->count())
                            <div>
                                <select wire:model="camionSelected" class="form-select rounded-md border-gray-300 mt-1">
                                    <option value="">Selecciona una opción</option>
                                    @foreach($camiones as $camion)
                                        <option value="{{ $camion->camion_id }}">{{ $camion->placa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @else
                            <div class="text-red-400">No hay contenedores disponibles</div>
                        @endif
                    </div>

                    <div>
                        <x-label for="contenedores" value="{{ __('Contenedores') }}" />
                        @if(isset($contenedores) && $contenedores->count())
                            <div>
                                <select wire:model="contenedorSelected" class="form-select rounded-md border-gray-300 mt-1">
                                    <option value="">Selecciona una opción</option>
                                    @foreach($contenedores as $contenedor)
                                        <option value="{{ $contenedor->id }}">{{ $contenedor->identificador }}{{$contenedor->contenedorName}}</option>
                                    @endforeach
                                </select>
                                @if ($selectedOption)
                                    <p>Opción seleccionada: {{ $selectedOption }}</p>
                                @endif
                            </div>
                        @else
                            <div class="text-red-400">No hay contenedores disponibles</div>
                        @endif
                    </div>

                    <div>
                        <x-label for="ubicacion" value="{{ __('Ubicacion') }}" />
                        <x-input id="ubicacion" class="block mt-1 w-full" type="text" name="ubicacion" wire:model="ubicacion" required autofocus autocomplete="ubicacion" />
                    </div>

                    <div>
                        <x-label for="km" value="{{ __('Kilometro') }}" />
                        <x-input id="km" class="block mt-1 w-full" type="number" name="km" wire:model="km" required autofocus autocomplete="km" />
                    </div>

                    <div>
                        <x-button title="submit" class="bg-red-400">
                            {{ __('Confirmar') }}
                        </x-button>
                    </div>
                </form>
            </section>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>
