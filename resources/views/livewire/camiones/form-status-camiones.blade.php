<section class="flex-1 my-5  w-3/5 ml-auto mr-auto bg-white p-5 rounded-xl">
    <x-label class="my-5 text-xl">Formulario Status</x-label>
    <form class="flex flex-col gap-3" method="POST" wire:submit.prevent="save">
        <div>
            <x-label for="name" value="{{ __('Nombre') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" required autofocus autocomplete="name" />
        </div>

        <div>
            <x-label for="description" value="{{ __('Descripcion') }}" />
            <x-input id="description" class="block mt-1 w-full" type="text" name="description" wire:model="description" required autofocus autocomplete="description" />
        </div>

        <div>
            <x-button title="submit" class="bg-red-400">
                {{ __('Registrar') }}
            </x-button>
        </div>
    </form>
</section>
