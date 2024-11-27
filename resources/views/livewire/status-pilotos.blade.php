<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Status Pilotos') }}
        </h2>
    </x-slot>

    <div class="flex flex-col mb-5">
        <livewire:pilotos.form-status-pilotos/>
        <livewire:pilotos.table-status-pilotos/>
    </div>
</x-app-layout>

