<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transportistas') }}
        </h2>
    </x-slot>
    <livewire:transportista.form-create-transportista />
    <livewire:transportista.table-create-transportista />
</x-app-layout>
