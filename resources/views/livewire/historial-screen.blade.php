<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial') }}
        </h2>
    </x-slot>
    <div class="flex flex-col mb-5">
        <livewire:historial.table-historial />
    </div>
</x-app-layout>
