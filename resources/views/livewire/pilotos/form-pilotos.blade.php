<div>
    <div class="flex my-5 mr-5 justify-end" >
    <x-button  wire:click="onOpenModal" title="submit" class="bg-blue-400">
        {{ __('Nuevo Piloto') }}
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
                        <x-label for="name" value="{{ __('Nombre') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" required autofocus autocomplete="name" />
                    </div>

                    <div>
                        <x-label for="lastname" value="{{ __('Apellido') }}" />
                        <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" wire:model="lastname" required autofocus autocomplete="lastname" />
                    </div>

                    <div>
                        <x-label for="telefono" value="{{ __('Telefono') }}" />
                        <x-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" wire:model="telefono" required autofocus autocomplete="telefono" />
                    </div>

                    <div>
                        <x-label for="telefono" value="{{ __('Status Piloto') }}" />
                        <select wire:model="selectedOption" class="form-select rounded-md border-gray-300 mt-1">
                            <option value="">Selecciona una opción</option>
                            @foreach($options as $status_id => $name)
                                <option value="{{ $status_id }}">{{ $name }}</option>
                            @endforeach
                        </select>

                        @if ($selectedOption)
                            <p>Opción seleccionada: {{ $selectedOption }}</p>
                        @endif
                    </div>

                    <div>
                        <x-button title="submit" class="bg-red-400">
                            {{ __('Registrar') }}
                        </x-button>
                    </div>
                </form>
            </section>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>
