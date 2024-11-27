<div>
    <div class="flex my-5 mr-5 justify-end" >
        <x-button  wire:click="onOpenModal" title="submit" class="bg-blue-400">
            {{ __('Nuevo Usuario') }}
        </x-button>
    </div>
    <x-dialog-modal wire:model.live="confirmCreateUser">
        <x-slot name="title">
            {{ __('Formulario Crear Piloto') }}
        </x-slot>

        <x-slot name="content">
            <section class="flex-1 my-5  w-4/5 ml-auto mr-auto bg-white p-5 rounded-xl">
                <form method="POST" wire:submit.prevent="created">
                    @csrf

                    <div class="mt-4">
                        <x-label for="email" value="{{ __('Correo Electronico') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="email" wire:model="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <div>
                        <x-label for="transportista_id" value="{{ __('Piloto') }}" />
                        <select wire:model="selectedTransportista" class="form-select rounded-md border-gray-300 mt-1">
                            <option value="">Selecciona una opción</option>
                            @foreach($pilotos as $tr)
                                <option value="{{ $tr->piloto_id }}">{{ $tr->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="password" wire:model="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ms-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ms-4">
                            {{ __('Registrar') }}
                        </x-button>
                    </div>
                </form>
            </section>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-dialog-modal>
</div>
