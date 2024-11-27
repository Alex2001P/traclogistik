<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status Camiones') }}
        </h2>
    </x-slot>

    <div class="flex flex-col mb-5">
        <livewire:camiones.form-status-camiones />
        <livewire:camiones.table-status-camiones />
    </div>
</x-app-layout>
