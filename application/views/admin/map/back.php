<?php $this->load->view('admin/include/header'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

<?php $this->load->view('admin/include/sidebar'); ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">

                <div class ="row">
                    <div class = "col-lg-12">
                        <div class = "card">
                            <div class = "card-body">
                            <h5>Manage Markers</h5> 
                            <hr>
                            <?php flashread();?>
                            <form method="POST" action="<?php echo base_url('map/add_marker');?>" enctype = "multipart/form-data">
                                <div class = "d-flex mt-2">
                                    <div class="form-group col-lg-3">
                                        <label for = "header"> Marker's Header </label>
                                        <input id="header" placeholder = "Marker's Header" type="text" class="form-control" name="header" >
                                    </div>
                                    <div class="form-group col-lg-9">
                                        <label for = "content"> Marker's Content </label>
                                        <textarea id="content" rows = "4" placeholder = "Marker's Content" class="form-control" name="content" ></textarea>
                                    </div>
                                </div>

                                <div class = "d-flex">
                                    <div class="form-group col-lg-6">
                                        <label for = "marker_latitude"> Latitude </label>
                                        <input id="marker_latitude" readonly placeholder = "Latitude" type="text" class="form-control" name="marker_latitude" required>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for = "marker_longitude"> Longitude </label>
                                        <input id="marker_longitude" readonly placeholder = "Longitude" type="text" class="form-control" name="marker_longitude" required>
                                        <button type = "submit" class = "btn btn-primary float-right mt-2">Add Marker</button>
                                    </div>
                                </div>
                            </form>
                                <div class = "map" id= "map" style = "height: 350px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.path.drag@0.0.6/src/Path.Drag.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>





<script>

        // Change Maps Coordinates
        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 

            map = new L.Map('map', {
                center: new L.LatLng(38.6412, 34.82867),
                zoom: 18
            }),
            osm = L.tileLayer(osmUrl, {
                maxZoom: 22
            }),
            drawnItems = L.featureGroup().addTo(map);

        var layerControl = L.control.layers({
            'Terrain': L.tileLayer(
                'http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', { //Yeni kroki ekle
                    maxZoom: 21,
                    attribution: '&copy; <a target = "_blank" href="https://argetekno.net/">Argetekno</a> tarafından hazırlanmıştır'
                }),

            "Sketch": osm.addTo(map),
            'Esri': L.tileLayer(
                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                    attribution: '&copy; <a target = "_blank" href="https://github.com/mehmeterenyasar">M.E.Y</a>',
                    maxZoom: 18,
                })
        }, {
            'drawlayer': drawnItems
        }, {
            position: 'topright',
            collapsed: true
        }).addTo(map);


        map.addControl(new L.Control.Draw({
            edit: {
                featureGroup: drawnItems,
                poly: {
                    allowIntersection: false
                }
            },
            draw: {
                polygon: false,
                marker: {
                    allowIntersection: false,
                    showArea: true
                },
                circlemarker: false,
                polyline: false,
                circle: false,
                rectangle: false
            },
        }));

        map.on('draw:edited', function (e) {
            var layer = e.layers;

            var layers = e.layers._layers;


            Object.entries(layers).forEach(coordinat => {


                 coordinatArray = coordinat[1]._latlng;

                 var lat = coordinatArray.lat;
                 var lng = coordinatArray.lng;

                var coordinates = '[' + lat + ',' + lng + ']';


                $('#coordinates').val(coordinates);

            });

        });

        function clearPreviousPin() {
            drawnItems.clearLayers(); 
        }

        map.on(L.Draw.Event.CREATED, function (event) {
            var layer = event.layer;
             
            clearPreviousPin();

            var lat = event.layer._latlng.lat;
            var lng = event.layer._latlng.lng;
            var coordinates = '[' + lat + ',' + lng + ']';


            $('#coordinates').val(coordinates);

            $('#marker_latitude').val(lat);
            $('#marker_longitude').val(lng);

            


            drawnItems.addLayer(layer);
        });


        


    var pins = <?php echo json_encode(map_markers::select()); ?>;

    pins.forEach(function(pin) {
        var pinLat = parseFloat(pin.latitude);
        var pinLng = parseFloat(pin.longitude);
        var pinId = pin.id;

        var customIcon = L.divIcon({
            className: 'custom-div-icon',
            html: "<i class='fa fa-map-marker' aria-hidden='true' style = 'color:red; font-size:2.3rem;'></i>",
            iconSize: [30, 30],
            iconAnchor: [15, 30]
        });

        var pinMarker = L.marker([pinLat, pinLng], { icon: customIcon }).bindPopup("<b class='text-center text-capitalize p-3'>" + pin.header + "</b>   <a class='btn btn-danger' href='<?php echo base_url('map/delete_marker/') ?>" + pinId + "' onclick='return confirmDelete()'><i class='fa fa-trash text-white'></i></a>");

        pinMarker.addTo(map);
    });


    function confirmDelete() {
        return confirm('Are you sure to delete the marker?');
    }


</script>

        
      
<?php $this->load->view('admin/include/footer'); ?>
