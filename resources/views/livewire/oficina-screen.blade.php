<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Oficina') }}
        </h2>
    </x-slot>
    <div class="flex flex-col mb-5">
        <livewire:oficina.table-asignaciones />
    </div>
</x-app-layout>
