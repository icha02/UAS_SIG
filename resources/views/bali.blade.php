<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <style>
        #map { height: 550px; width: 100%; }
    </style>
    <script src="/js/fetchData.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>
<body>
    <div style="text-align: center; padding: 20px; background-color: #4CAF50; color: white; font-family: Arial, sans-serif;">
        <h1 style="font-size: 2.5em; margin: 0; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">
            Peta Gempa Bumi
        </h1>
        <h3 style="font-size: 1.5em; margin: 5px 0;">
            Sumber Data : <span style="font-weight: bold;">BMKG</span>
        </h3>
    </div>
    <div id="map" style="height: 500px; margin-top: 10px;"></div>

    <script>
        var map = L.map('map').setView([-8.42918, 115.188919], 9);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let files = {!! file_get_contents(public_path('json/bali.json')) !!};


        files.forEach(bali => {

        let kordinat = bali.coor.split(",");
        let lat = parseFloat(kordinat[0]);
        let lng = parseFloat(kordinat[1]);


        let marker = L.marker([lat, lng]).addTo(map);
        
        marker.bindPopup(
            "Kabupaten/Kota: " + bali.name + "<br>" +
            "Luas: " + bali.luas + " km²<br>" +
            "Populasi: " + bali.populasi + "<br>" +
            "UMKM:" + bali.umkm + "<br>" +
            "Objek Wisata:" + bali.obj + "<br>" +
            "Wisatawan:" + bali.wist + "<br>" +
            "Kepadatan Penduduk:" + bali.kpen + "<br>" +
            "Kepadatan UMKM:" + bali.kumkm + "<br>" +
            "Kepadatan Wisatawan:" + bali.kwis + "<br>" +
            "Rasio UMKM:" + bali.rumkm 
            
        );
        });

    </script>
</body>
</html>
