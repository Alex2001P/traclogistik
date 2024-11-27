<div>
    <div class="flex my-5 mr-5 justify-end" >
        <x-button  wire:click="onOpenModal" title="submit" class="bg-blue-400">
            {{ __('Nuevo Transportista') }}
        </x-button>
    </div>
    <x-dialog-modal wire:model.live="confirmCreateTransportista">
        <x-slot name="title">
            {{ __('Formulario Crear Transportista') }}
        </x-slot>

        <x-slot name="content">
            <section class="flex-1 my-5  w-4/5 ml-auto mr-auto bg-white p-5 rounded-xl">
                <form class="flex flex-col gap-3" method="POST" wire:submit.prevent="save">
                    <div>
                        <x-label for="name" value="{{ __('Nombre') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" required autofocus autocomplete="name" />
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
