<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tablero') }}
        </h2>
    </x-slot>

    <div>
        @livewire('show-trackin-dashbord')
    </div>
</x-app-layout>
