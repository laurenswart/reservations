@extends('layouts.app')

@section('title', 'Liste des lieux de spectacle')

@section('content')
    <h1>Liste des {{ $resource }}</h1>


    <div id="map" class="map" style=" height: 600px;width: 100%;"></div>
    <div id="popup-0" class="ol-popup">
     <a href="#" id="popup-0-closer" class="ol-popup-closer"></a>
     <div id="popup-0-content"></div>
 </div>
 <div id="popup-1" class="ol-popup">
     <a href="#" id="popup-1-closer" class="ol-popup-closer"></a>
     <div id="popup-1-content"></div>
 </div>

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
         center: ol.proj.fromLonLat([4.35247, 50.84673]),
         maxZoom: 18,
         zoom: 12
     })
 });

 var layer = new ol.layer.Vector({
     source: new ol.source.Vector({
         features: [
             <?php foreach($locations as $location){ ?>
                <?= "new ol.Feature({geometry: new ol.geom.Point(ol.proj.fromLonLat([".$location['lon']." , ".$location['lat']."]))}),"?>
             <?php } ?>
         ]
     })
 });
 map.addLayer(layer);
 <?php foreach($locations as $index => $location){ ?>
    var container = document.getElementById('popup-<?= $index ?>');
    var content = document.getElementById('popup-<?= $index ?>-content');
    var closer = document.getElementById('popup-<?= $index ?>-closer');

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

         content.innerHTML = '<b>Hello world!</b><br />I am a popup.';
         overlay.setPosition(coordinate);
     } else {
         overlay.setPosition(undefined);
         closer.blur();
     }
 });
 <?php } ?>
</script>

@endsection
