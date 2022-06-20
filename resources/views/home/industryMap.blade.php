@extends('layouts.home.app')
@section('title-page', 'Hospital Map')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding" style="padding-bottom:0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    
                    <h2>Industri Map</h2>                  
                                 
                </div>
            </div>
        </div>    
        <div class="row mb-4 ">
            <!-- single-well start-->
            <div style="display: block; margin: 0 auto;  " >
                <div id='map' style='width: 900px; height: 80vh;'></div>
            </div>            
        </div>
    </div>
</div>
<script>
    



const aceh = [95.88239408261029,4.8337842057871825];
const sumatra_utara =[99.27929917185207,2.643666697229847];
const sumatra_barat = [100.63806120754793,-0.8567880706090989];
const riau = [102.36264379131688,0.44967733667957077];
const jambi = [103.19880504405825,-1.2041792091071386];
const bengkulu = [102.15360347813788,-3.5015296756199206];
const sumatra_selatan = [104.76660739293794,-3.292856818437045];
const lampung = [105.12193217349432,-4.9078645779414956];
const kepulauan_riau =[104.42541646993766,0.36803081477246735];
const bangka_belitung = [106.34083465470513,-2.591274570207929];
const kalimantan_utara = [116.84661318327579,3.0945475767247075];
const kalimantan_barat =[110.28775697483223,-0.2704383784892883];
const kalimantan_tengah =[113.77033549258886,-1.8372847635160099];
const kalimantan_timur = [116.84661318327579,0.01977549341999918];
const kalimantan_selatan = [115.74379665265337,-3.3448155999637663];
const banten =[106.10498492538034,-6.237300031297522];
const dki_jakarta = [106.8377463842067,-6.207335167437563];
const jawa_barat = [107.63243479221285,-6.848597956188527];
const jawa_tengah = [110.27172040502478,-7.08819936104679];
const jogjakarta = [110.46786342402049, -7.934302576580137];
const jawa_timur = [112.56835745381312,-7.481425944643476];
const bali = [115.20561488006007,-8.379672699588014];
const nusatengara_barat = [117.50874014370254,-8.639314755660124];
const nusatengara_timur = [122.08451220776374,-8.785900952288515];
const sulawesi_selatan =[120.08102076881602,-4.777173941154473];
const sulawesi_barat = [119.28406769588116,-2.5902148770792053 ];
const sulawesi_tengah = [121.41591716597043,-1.2480852990693023];
const sulawesi_tenggara = [122.43203233395849, -4.15381746746543];
const gorontalo = [122.5917851296798,0.6184658535821796];
const sulawesi_utara = [124.62401546564928,0.9372172955164757];
const maluku_utara = [127.97901038441972,-0.5901558860356317];
const maluku = [128.77909910241198,-3.438416665179318];
const papua_barat = [133.3296036859839,-1.7900081428296062];
const papua = [138.63019144267435,-4.336436229125567];  


const mapIndonesia= [
{provinsi : "aceh" , location : ["95.88239408261029","4.8337842057871825"]},
{provinsi : "sumatera utara" , location :["99.27929917185207","2.643666697229847"]},
{provinsi : "sumatera barat" , location : ["100.63806120754793","-0.8567880706090989"]},
{provinsi : "riau" , location : ["102.36264379131688","0.44967733667957077"]},
{provinsi : "jambi" , location : ["103.19880504405825","-1.2041792091071386"]},
{provinsi : "bengkulu" , location : ["102.15360347813788","-3.5015296756199206"]},
{provinsi : "sumatera selatan" , location : ["104.76660739293794","-3.292856818437045"]},
{provinsi : "lampung" , location : ["105.12193217349432","-4.907864577941495"]},
{provinsi : "kepulauan riau" , location :["104.42541646993766","0.3680308147724673"]},
{provinsi : "bangka belitung" , location : ["106.34083465470513","-2.591274570207929"]},
{provinsi : "kalimantan utara" , location : ["116.84661318327579","3.0945475767247075"]},
{provinsi : "kalimantan barat" , location :["110.28775697483223","-0.270438378489288"]},
{provinsi : "kalimantan tengah" , location :["113.77033549258886","-1.837284763516009"]},
{provinsi : "kalimantan timur" , location : ["116.84661318327579","0.0197754934199991"]},
{provinsi : "kalimantan selatan" , location : ["115.74379665265337","-3.344815599963766"]},
{provinsi : "banten" , location :["106.10498492538034","-6.237300031297522"]},
{provinsi : "jakarta" , location : ["106.8377463842067","-6.207335167437563"]},
{provinsi : "jawa barat" , location : ["107.63243479221285","-6.848597956188527"]},
{provinsi : "jawa tengah" , location : ["110.27172040502478","-7.08819936104679"]},
{provinsi : "Jogyakarta" , location : ["110.46786342402049","-7.93430257658013"]},
{provinsi : "jawa timur" , location : ["112.5683574538131","-7.48142594464347"]},
{provinsi : "bali" , location : ["115.20561488006007","-8.379672699588014"]},
{provinsi : "nusa tenggara barat" , location : ["117.50874014370254","-8.639314755660124"]},
{provinsi : "nusa tenggara timur" , location : ["122.08451220776374","-8.785900952288515"]},
{provinsi : "sulawesi selatan" , location :["120.08102076881602","-4.777173941154473"]},
{provinsi : "sulawesi barat" , location : ["119.28406769588116","-2.590214877079205" ]},
{provinsi : "sulawesi tengah" , location : ["121.41591716597043","-1.248085299069302"]},
{provinsi : "sulawesi tenggara" , location : ["122.43203233395849","-4.15381746746543"]},
{provinsi : "gorontalo" , location : ["122.5917851296798","0.6184658535821796"]},
{provinsi : "sulawesi utara" , location : ["124.62401546564928","0.9372172955164757"]},
{provinsi : "maluku utara" , location : ["127.97901038441972","-0.590155886035631"]},
{provinsi : "maluku" , location : ["128.77909910241198","-3.438416665179318"]},
{provinsi : "papua barat" , location : ["133.3296036859839","-1.7900081428296062"]},
{provinsi : "papua" , location : ["138.63019144267435","-4.336436229125567"]} 
]



const loadLocations = (geoJson) =>{
    geoJson.features.forEach((location)=>{
        
        const {geometry, properties}= location;
        const {iconSize,locationId,title,image,description,alamat,nomor_telepon}= properties;

        console.log(location);

        let markerElement = document.createElement('div');
        markerElement.className = 'marker'+ locationId;
        markerElement.id = locationId;
        markerElement.style.backgroundImage = 'url(https://www.freeiconspng.com/uploads/hospital-building-icon-6.png)';
        markerElement.style.backgroundSize = 'cover';
        markerElement.style.width = '30px';
        markerElement.style.height ='30px';

        const content =`
        <div>
            <table>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td>${title}</td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td><img src="${image}" alt="" loading="lazy" width="250px"></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>${alamat}</td>
                    </tr>

                </tbody>
            </table>
        </div>
        `

        const popUp = new mapboxgl.Popup({
            offset:25
        }).setHTML(content).setMaxWidth("400px")

        
        new mapboxgl.Marker(markerElement)
        .setLngLat(geometry.coordinates)
        .setPopup(popUp)
        .addTo(map)

        // console.log(geometry.coordinates);
    })
}

const loadIndonesia = ()=>{
    mapIndonesia.forEach((item)=>{
    // console.log(item);
    // console.log(item.location);
    const lokasi = item.location;
    const provinsi = item.provinsi;

    let markerElement = document.createElement('div');
        // markerElement.className = 'marker'+ locationId;
        // markerElement.id = locationId;
        markerElement.style.backgroundImage = 'url(https://www.freeiconspng.com/uploads/hospital-building-icon-6.png)';
        markerElement.style.backgroundSize = 'cover';
        markerElement.style.width = '20px';
        markerElement.style.height ='20px';

        const content =`
        <div>
            
            <table>
                <tbody>
                    <tr>
                        <td>Provinsi</td>
                        <td>:</td>
                        <td>${item.provinsi}</td>
                    </tr>
                    <tr>
                        <td>link</td>
                        <td>:</td>
                        <td><a class="" href="{{url('home/hospital-map')}}?prov=${item.provinsi}">LINK</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        `

    const popUp = new mapboxgl.Popup({
        offset:25
    }).setHTML(content).setMaxWidth("400px")

    new mapboxgl.Marker(markerElement)
    .setLngLat(item.location)
    .setPopup(popUp)
    .addTo(map)

    })
}


// let defaultLocation = [106.8380899176459, -6.2058130196237045];
// let defaultLocation = [117.49193645801663, -2.9952600172798043];
// let zoom = 3.75;
// console.log(mapIndonesia.location);

let center = [117.49193645801663, -2.9952600172798043];
let zoom = 3.75;


mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';

const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: center, // starting position [lng, lat]
    zoom: zoom // starting zoom
});

loadIndonesia();

console.log();
map.on('click',(e)=>{
    const longitude = e.lngLat.lng;
    const latitude = e.lngLat.lat;

    console.log({longitude,latitude});
})

map.addControl( new mapboxgl.NavigationControl())
</script>

@endsection
