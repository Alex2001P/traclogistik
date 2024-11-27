
<div>
    <div class="relative w-full h-[420px]">
        <div id="{{$mapId}}" wire:ignore class="absolute inset-0 w-full h-full z-0"></div>
        <section class="absolute right-0 top-0 m-5 p-5 shadow-xl rounded-xl z-10 bg-white">
            @if($userSelected)
                <h4 class="mb-5 font-bold">INFORMACION DEL VIAJE</h4>
                <div>Latitud: {{ $userSelected->lat }}</div>
                <div>Longitud: {{ $userSelected->long }}</div>
                <x-button wire:click="navegarDetallePedido({{$userSelected->asignacion_id}})" class="bg-green-400 mt-3">
                    {{ __('Mas Informacion') }}
                </x-button>
            @endif
        </section>
    </div>
</div>


@push('script')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" crossorigin=""></script>
@endpush

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var mapElement = document.getElementById('{{$mapId}}');
        if (!mapElement) {
            console.error('Map element not found');
            return;
        }

        var mymap = L.map('{{$mapId}}').setView([15.9097, -90.0093], 7);

        mymap.setMaxBounds([
            [-90, -180],
            [90, 180]
        ]);

        @foreach($markers2 as $marker)
        @if(isset($marker['icon']))
        var icon = L.icon({
            iconUrl: '{{ $marker['icon'] }}',
            iconSize: [{{$marker['iconSizeX'] ?? 32}}, {{ $marker['iconSizeY'] ?? 32 }}],
        });
        @endif

        console.log('entra por aqui', {{$marker['piloto_id']}})
        // Crear el marcador
        var marker = L.marker([{{$marker['lat'] ?? $marker[0]}}, {{$marker['long'] ?? $marker[1]}}]);

        // Añadir el marcador al mapa
        marker.addTo(mymap);
        marker.on('click', function() {
            console.log('Marker clicked:', marker);
            if (marker) {
                Livewire.dispatch('markerSelected', { user: "{{$marker['piloto_id']}}" });
            } else {
                console.error('Marker is not defined');
            }
        });
        @endforeach

        // Añadir las capas de tiles al mapa
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 20,
            minZoom: 1,
            attribution: '{!! $attribution !!}',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
        }).addTo(mymap);

        document.addEventListener('livewire:update', function () {
           mymap.invalidateSize([15.9097, -90.0093]); // Recalcula el tamaño del mapa después de que Livewire actualiza el DOM
        });

        function redrawMap() {
            mymap.invalidateSize();
        }
    });
</script>

<script>

</script>
@endpush


