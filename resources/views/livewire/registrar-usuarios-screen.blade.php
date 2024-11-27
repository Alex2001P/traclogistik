<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Usuarios') }}
        </h2>
    </x-slot>

    <div class="flex flex-col mb-5">
        <livewire:usuarios.registrar-usuarios />
        <livewire:usuarios.table-crear-usuarios />
    </div>
</x-app-layout>
