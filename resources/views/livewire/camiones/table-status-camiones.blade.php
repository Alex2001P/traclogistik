<div>
    <section class="flex-1 mb-5 mt-1 w-4/5 ml-auto mr-auto bg-white p-5 rounded-xl">
        <x-label class="my-5 text-xl">Tabla Status Pilotos</x-label>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descripcion</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($statusCamiones as $status)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $status->status_id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $status->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $status->description }}</td>
                        <td class="whitespace-nowrap ml-auto mr-auto text-sm text-gray-900">
                            <button wire:click="edit({{$status->status_id}})" class="text-blue-600 bg-blue-50 border-blue-300 rounded-lg p-2 hover:text-blue-500">editar</button>
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
                    <x-label for="name" value="{{ __('Nombre') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" required autofocus autocomplete="name" />
                </div>

                <div>
                    <x-label for="description" value="{{ __('Descripcion') }}" />
                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" wire:model="description" required autofocus autocomplete="description" />
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

