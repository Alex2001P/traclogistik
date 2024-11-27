<div>
    <section class="flex-1 my-5 w-4/5 ml-auto mr-auto bg-white p-5 rounded-xl">
        <x-label class="my-5 text-xl">Tabla Status Pilotos</x-label>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Apellido</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefono</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($pilotos as $piloto)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $piloto->piloto_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $piloto->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $piloto->lastname }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $piloto->telefono }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $piloto->status_name }}</td>
                        <td class="whitespace-nowrap text-sm text-gray-900">
                            <button wire:click="edit({{$piloto->piloto_id}})" class="text-blue-600 bg-blue-50 border-blue-300 rounded-lg p-2 hover:text-blue-500">editar</button>
                            <button wire:click="delete({{$piloto->piloto_id}})" class="text-red-600 bg-red-50 border-blue-300 rounded-lg p-2 hover:text-red-900">eliminar</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <x-dialog-modal wire:model.live="confirmPilotoModal">
        <x-slot name="title">
            {{ __('Editar Piloto') }}
        </x-slot>

        <x-slot name="content">
            <form class="flex flex-col gap-3" method="POST" wire:submit.prevent="update">
                <div>
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-label for="lastname" value="{{ __('Apellido') }}" />
                    <x-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" wire:model="lastname" required autofocus autocomplete="lastname" />
                </div>

                <div>
                    <x-label for="telefono" value="{{ __('Telefono') }}" />
                    <x-input id="telefono" class="block mt-1 w-full" type="number" name="telefono" wire:model="telefono" required autofocus autocomplete="telefono" />
                </div>

                <div>
                    <x-label for="telefono" value="{{ __('Status Piloto') }}" />
                    <select wire:model="selectedOption" class="form-select rounded-md border-gray-300 mt-1">
                        <option value="">Selecciona una opción</option>
                        @foreach($optionsStatus as $status_id => $name)
                            <option value="{{ $status_id }}">{{ $name }}</option>
                        @endforeach
                    </select>

                    <p>Opcion anterior: {{ $lastStatus }}</p>
                </div>

                <div>
                    <x-button title="submit" class="bg-red-400">
                        {{ __('Registrar') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>
