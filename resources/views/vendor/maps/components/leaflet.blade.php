<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>

<div id="{{$mapId}}" class="w-full h-[420px]"></div>

<!-- Make sure you put this AFTER Leaflet's CSS -->
@push('scripts')

<script src="{{'https://unpkg.com/leaflet@' . $leafletVersion . '/dist/leaflet.js'}}"
        crossorigin=""></script>
@endpush

@push('scripts')
<script>

    var mymap = L.map('{{$mapId}}').setView([{{$centerPoint['lat'] ?? $centerPoint[0]}}, {{$centerPoint['long'] ?? $centerPoint[1]}}], {{$zoomLevel}});
    @foreach($markers as $marker)
     @if(isset($marker['icon']))
       var icon = L.icon({
        iconUrl: '{{ $marker['icon'] }}',
        iconSize: [{{$marker['iconSizeX'] ?? 32}} , {{ $marker['iconSizeY'] ?? 32 }}],
       });
     @endif
    var marker = L.marker([{{$marker['lat'] ?? $marker[0]}}, {{$marker['long'] ?? $marker[1]}}]
    @if(isset($marker['icon']))
     , {icon: icon}
    @endif
    );

    marker.on('click', () => {
        console.log(`click de seto {{{$marker["info"]}}} ` )
        Livewire.emit('markerClicked', {
            lat: {{ $marker['lat'] }},
            long: {{ $marker['long'] }},
            info: "{{ $marker['info'] }}"
        });
    })
    marker.addTo(mymap);
    @if(isset($marker['info']))
    marker.bindPopup(@json($marker['info']));
    @endif
    @endforeach

    @if($tileHost === 'mapbox')
        let url{{$mapId}} = 'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={{config('maps.mapbox.access_token', null)}}';
    @elseif($tileHost === 'openstreetmap')
        let url{{$mapId}} = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    @else
        let url{{$mapId}} = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    @endif
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: {{$maxZoomLevel}},
        attribution: '{!! $attribution !!}',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(mymap);
</script>
@endpush
