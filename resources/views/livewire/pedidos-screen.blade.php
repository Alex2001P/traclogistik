<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pedidos') }}
        </h2>
    </x-slot>

    <div class="flex flex-col mb-5">
        <livewire:excel.importar />
        <livewire:pedidos.table-pedidos />
        {{--       <livewire:pilotos.form-pilotos />
               <livewire:pilotos.table-pilotos />--}}
    </div>
</x-app-layout>
