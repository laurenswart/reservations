@extends('layouts.app')

@section('title', 'Liste des lieux de spectacle')

@section('content')
    <div id="map" class="map" style=" height: 600px;width: 100%;"></div>

    <div id="popup" class="ol-popup">
        <a href="#" id="popup-closer" class="ol-popup-closer"></a>
        <div id="popup-content"></div>
    </div>


    <ul>
    @foreach($locations as $location)
        <div class="media-object">
            <div class="media-object-section">
            <a href="{{ $location->website }}"><i class="fa-solid fa-link"></i></a>
            </div>
            <div class="media-object-section">
                <h5><a href="{{ $location->website }}">{{ $location->designation }}</a></h5>
                <p>{{ $location->address }}<br>{{ $location->locality->postal_code }} {{ $location->locality->locality }}</p>
            </div>
        </div>
    @endforeach
    </ul>


    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.14.1/build/ol.js"></script>

   <script type="text/javascript">
      var attribution = new ol.control.Attribution({
     collapsible: false
 });

 var map = new ol.Map({
     controls: ol.control.defaults({attribution: false}).extend([attribution]),
     layers: [
         new ol.layer.Tile({
             source: new ol.source.OSM({
                 url: 'https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png',
                 attributions: [ ol.source.OSM.ATTRIBUTION, 'Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>' ],
                 maxZoom: 18
             })
         })
     ],
     target: 'map',
     view: new ol.View({
         center: ol.proj.fromLonLat([4.379429, 50.824997]),
         maxZoom: 18,
         zoom: 13
     })
 });

 var layer = new ol.layer.Vector({
     source: new ol.source.Vector({
         features: [
             <?php foreach($locations as $location){ ?>
                <?= "new ol.Feature({geometry: new ol.geom.Point(ol.proj.fromLonLat([".$location->longitude." , ".$location->latitude."])), name: '".addslashes($location->designation)."', address:'".addslashes($location->address).'<br>'.$location->locality->postal_code.' '.$location->locality->locality."', website:'".$location->website."'}),"?>
             <?php } ?>
         ]
     })
 });
 map.addLayer(layer);
 
    var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
    var closer = document.getElementById('popup-closer');

    var overlay = new ol.Overlay({
        element: container,
        autoPan: true,
        autoPanAnimation: {
            duration: 250
        }
    });
    map.addOverlay(overlay);

    closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
    };
     map.on('singleclick', function (event) {
     if (map.hasFeatureAtPixel(event.pixel) === true) {
         var coordinate = event.coordinate;
         var feature = map.forEachFeatureAtPixel(event.pixel,
          function(feature) {
            return feature;
          });
          
         content.innerHTML = "<div><a href=\""+feature.get('website')+"\">"+feature.get('name')+"</a><p>"+feature.get('address')+"</p></div>";
         
         overlay.setPosition(coordinate);
     } else {
         overlay.setPosition(undefined);
         closer.blur();
     }
 });

</script>

@endsection
