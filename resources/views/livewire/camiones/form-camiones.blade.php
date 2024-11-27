<div>
    <div class="flex my-5 mr-5 justify-end" >
        <x-button  wire:click="openModal" title="submit" class="bg-blue-400">
            {{ __('Nuevo Camion ') }}
        </x-button>
    </div>
    <x-dialog-modal wire:model.live="isOpenModal">
        <x-slot name="title">
            {{ __('Formulario Crear Camion') }}
        </x-slot>

        <x-slot name="content">
            <section class="flex-1 my-5  w-4/5 ml-auto mr-auto bg-white p-5 rounded-xl">
                <form class="flex flex-col gap-3" method="POST" wire:submit.prevent="save">
                    <div>
                        <x-label for="placa" value="{{ __('Placa') }}" />
                        <x-input id="placa" class="block mt-1 w-full" type="text" name="placa" wire:model="placa" required autofocus autocomplete="placa" />
                    </div>

                    <div>
                        <x-label for="chasis" value="{{ __('Chasis') }}" />
                        <x-input id="chasis" class="block mt-1 w-full" type="text" name="chasis" wire:model="chasis" required autofocus autocomplete="chasis" />
                    </div>


                    <div>
                        <x-label for="status_id" value="{{ __('Status Camion') }}" />
                        <select wire:model="selectedOption" class="form-select rounded-md border-gray-300 mt-1">
                            <option value="">Selecciona una opción</option>
                            @foreach($options as $status_id => $name)
                                <option value="{{ $status_id }}">{{ $name }}</option>
                            @endforeach
                        </select>
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
