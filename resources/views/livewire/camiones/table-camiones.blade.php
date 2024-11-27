<div>
    <section class="flex-1 mb-5 mt-1 w-4/5 ml-auto mr-auto bg-white p-5 rounded-xl">
        <x-label class="my-5 text-xl">Tabla Camiones</x-label>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Placa</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chasis</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($camiones as $camion)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $camion->camion_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $camion->placa }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $camion->chasis }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $camion->status_name }}</td>
                        <td class="whitespace-nowrap text-sm text-gray-900">
                            <button wire:click="edit({{$camion->camion_id}})" class="text-blue-600 bg-blue-50 border-blue-300 rounded-lg p-2 hover:text-blue-500">editar</button>
                            <button wire:click="delete({{$camion->camion_id}})" class="text-red-600 bg-red-50 border-blue-300 rounded-lg p-2 hover:text-red-900">eliminar</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <x-dialog-modal wire:model.live="formModal">
        <x-slot name="title">
            {{ __('Log Out Other Browser Sessions') }}
        </x-slot>

        <x-slot name="content">
            <form class="flex flex-col gap-3" method="POST" wire:submit.prevent="update">
                <div>
                    <x-label for="placa" value="{{ __('Placa') }}" />
                    <x-input id="placa" class="block mt-1 w-full" type="text" name="placa" wire:model="placa" required autofocus autocomplete="placa" />
                </div>

                <div>
                    <x-label for="chasis" value="{{ __('Chasis') }}" />
                    <x-input id="chasis" class="block mt-1 w-full" type="text" name="chasis" wire:model="chasis" required autofocus autocomplete="chasis" />
                </div>


                <div>
                    <x-label for="status_id" value="{{ __('Status Camion') }}" />
                    <select wire:model="selectedOption" class="form-select rounded-md border-gray-300 mt-1">
                        <option value="">Selecciona una opción</option>
                        @foreach($options as $status_id => $name)
                            <option value="{{ $status_id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-button title="submit" class="bg-orange-400">
                        {{ __('Editar') }}
                    </x-button>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>
