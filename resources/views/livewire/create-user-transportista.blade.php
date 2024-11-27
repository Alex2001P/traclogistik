<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Crear Usuario') }}
        </h2>
    </x-slot>
    <div class="flex flex-col mb-5">
        <livewire:transportista.create-user />
        <livewire:transportista.table-create-user />
    </div>
</x-app-layout>
