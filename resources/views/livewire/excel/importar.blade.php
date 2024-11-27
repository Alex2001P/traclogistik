<div class=" bg-white p-5 rounded-xl w-2/5 mt-5 ml-5 shadow-md">
    <form wire:submit.prevent="importarCortes" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file"  wire:model="archivo">
        @error('archivo') <span class="error">{{ $message }}</span> @enderror

        @if(isset($archivo) && $archivo)
        <x-button title="submit" class="bg-green-400">
            {{ __('Subir archivo') }}
        </x-button>
        @endif

        @if(isset($hasData) && $hasData)
            <x-button title="button"  wire:click="deleteDataToday" class="bg-red-400">
                {{ __('Eliminar Informacion') }}
            </x-button>
        @endif

    </form>
</div>

<script>
    document.addEventListener('livewire:load', function () {
    @this.on('alert', data => {
        // Mostrar alerta de SweetAlert
        Swal.fire({
            icon: data.type,
            title: data.message,
            showConfirmButton: false,
            timer: 1500
        });
    });
    });
</script>

