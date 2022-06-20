@extends('layouts.home.app')
@section('title-page', 'Hospital Map')
@section('content')
<!-- Start About area -->
<div id="about" class="service-area area-padding" style="padding-bottom:0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-headline text-center">
                    
                    <h2>Hospital Map</h2>                  
                                 
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

const mapJawaTimur = [
    {kota : "surabaya",location : ["112.73197737926824","-7.2610899200711145"]},
    {kota : "kediri",location : ["112.03404760693292","-7.842086268635867"]},
    {kota : "probolingo",location : ["113.22410734693426","-7.780032697035821"]},
    {kota : "situbondo",location : ["114.03835874798693","-7.7490024629069865"]},
    {kota : "mojokerto",location : ["112.44564721625653","-7.474064435003612"]},
    {kota : "malang",location : ["112.65144702091663","-8.001609926278917"]},
    {kota : "lumajang",location : ["113.23752907332266","-8.152213874370332"]},
    {kota : "jember",location : ["113.72071122339872","-8.192070178415364"]},
    {kota : "tuban",location : ["112.05568350974778","-6.911206223735633"]},
    {kota : "nganjuk",location : ["111.91158325959418","-7.6160625888177265"]}
]

const mapSurabaya = [
    {nama : "Rumah Sakit Umum Surabaya",location : ["112.78081910700148","-7.2790332146955565"],alamat:"Jl. Raya Gubeng No.70, Gubeng, Kec. Gubeng, Kota SBY, Jawa Timur 60281",gambar:"https://lh5.googleusercontent.com/p/AF1QipOcyLj9h_KMsS_Xl6YpjrmAoDvuhkFP9oOp4XkS=w408-h272-k-no",link:""},
    {nama : "Rumah Sakit Adi Husada Kapasari",location : ["112.75241550470858","-7.23929791328241"],alamat:"Jl. Kapasari No.97-101, Kapasan, Kec. Simokerto, Kota SBY, Jawa Timur 60141",gambar:"https://lh5.googleusercontent.com/p/AF1QipNthYDD5ErYkBkk9P4GVGbp0kBeBGiUnIsPaL9i=w426-h240-k-no",link:""},
    {nama : "Rumah Sakit Okologi Surabaya",location : ["112.79018068483414","-7.2879348027173245"],alamat:"Araya Galaxy Bumi Permai, Jl. Arief Rahman Hakim No.7, Keputih, Kec. Sukolilo, Kota SBY, Jawa Timur 60111",gambar:"https://lh5.googleusercontent.com/p/AF1QipMWK5I4B9bccQKyY7WoJAw57lI0L33Z8r9dxYrh=w408-h613-k-no",link:""},
    {nama : "Rumah Sakit RSIA Pura Raharja",location : ["112.7527585071031","-7.280783214478436"],alamat:"Jl. Pucang Adi No.12-14, Kertajaya, Kec. Gubeng, Kota SBY, Jawa Timur 60282",gambar:"https://lh5.googleusercontent.com/p/AF1QipNiWx9fiuvMFsWJGJjMShClZs_9c8j8qmWMEL8U=w408-h270-k-no",link:""},
    {nama : "Rumah Sakit Darmo",location : ["112.73923164600028","-7.285883245945803"],alamat:"Jl. Raya Darmo No.90, DR. Soetomo, Kec. Tegalsari, Kota SBY, Jawa Timur 60264",gambar:"https://lh5.googleusercontent.com/p/AF1QipNtvbyZ7vBtBWqfI3r4-pwFCSCyctuLB5mqr30a=w408-h408-k-no",link:""},
    {nama : "Rumah Sakit Umum Surabaya",location : ["112.74652234729484","-7.273376989022393"],alamat:"",gambar:"",link:""},
    {nama : "RSUD DR Sutomo",location : ["112.75852643376328","-7.267388032564791"],alamat:"Jl. Mayjen Prof. Dr. Moestopo No.6-8, Airlangga, Kec. Gubeng, Kota SBY, Jawa Timur 60286",gambar:"https://lh5.googleusercontent.com/p/AF1QipMIQmzP1UvfcRoPABF0Rx8IZZgVFl_2jJ9hjgYF=w408-h306-k-no",link:""},
    {nama : "Smart Hospital Surabaya",location : ["112.77121646669572","-7.2638686523395215"],alamat:"Jl. Kaliwaron Kec. Gubeng, Kota SBY, Jawa Timur 60285",gambar:"{{ asset('assets/home/img/SMART_HOS.png') }}",link:""}
]

const data_json= {!! $locations !!};

console.log(data_json); 

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

const loadLocations_database = () =>{
    data_json.forEach((items)=>{
        
        const locations = [items.long,items.lat];
        console.log(locations);

        if (items.long=="-" || items.lat=="-"){
            console.log("setrip");
        }else{

        
        const lokasi = [items.long,items.lat];

        const nama = items.nama;
        const alamat = items.alamat;
        const gambar = items.image;

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
                        <td>Nama</td>
                        <td>:</td>
                        <td>${nama}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>${alamat}</td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td>:</td>
                        <td><img src="${gambar}" alt="" width="180px"></td>
                    </tr>
                    <tr>
                        <td>link</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            link
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        `

    const popUp = new mapboxgl.Popup({
        offset:25
    }).setHTML(content).setMaxWidth("400px")

    new mapboxgl.Marker(markerElement)
    .setLngLat(lokasi)
    .setPopup(popUp)
    .addTo(map)

        }

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

const loadJawaTimur = ()=>{
    mapJawaTimur.forEach((item)=>{
    // console.log(item);
    // console.log(item.location);
    const lokasi = item.location;
    const kota = item.kota;

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
                        <td>${item.kota}</td>
                    </tr>
                    <tr>
                        <td>link</td>
                        <td>:</td>
                        <td><a class="" href="{{url('home/hospital-map')}}?prov=jawa_timur&&kota=${item.kota}">LINK</a></td>
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

const loadSurabaya = ()=>{
    mapSurabaya.forEach((item)=>{
    // console.log(item);
    // console.log(item.location);
    const lokasi = item.location;
    const nama = item.nama;
    const alamat = item.alamat;
    const gambar = item.gambar;
    const link = item.link;

    console.log(lokasi);
    

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
                        <td>Nama</td>
                        <td>:</td>
                        <td>${item.nama}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>${alamat}</td>
                    </tr>
                    <tr>
                        <td>Gambar</td>
                        <td>:</td>
                        <td><img src="${gambar}" alt="" width="180px"></td>
                    </tr>
                    <tr>
                        <td>link</td>
                        <td>:</td>
                        <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            link
                        </button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        `

    const popUp = new mapboxgl.Popup({
        offset:25
    }).setHTML(content).setMaxWidth("400px")

    new mapboxgl.Marker(markerElement)
    .setLngLat(lokasi)
    .setPopup(popUp)
    .addTo(map)

    })
}

// let defaultLocation = [106.8380899176459, -6.2058130196237045];
// let defaultLocation = [117.49193645801663, -2.9952600172798043];
// let zoom = 3.75;
// console.log(mapIndonesia.location);
const data_center= {!! $locationCenter !!};

let center = [];
let zoom = 2;
nilai_prov = `{!! $prov !!}`;
console.log(center,zoom);

if (nilai_prov==""){
    console.log("kordinat tidak ada");
    center = [117.49193645801663, -2.9952600172798043];
    zoom = 3.75;
 
}else{
    center = [data_center[0].long , data_center[0].lat];
    zoom = data_center[0].zoom;
}
// else if(nilai_prov=="jawa_timur"){
//     center = [112.92882936633413, -7.459196993494729];
//     zoom = 7;
// }
// else if(nilai_prov=="aceh"){
//     center = [99.25669817407919, 2.3793481537364016];
//     zoom = 6.5;
// }

// else{
//     console.log("ada koordinat");
//     center = [106.8380899176459, -6.2058130196237045];
//     zoom =10.3;
//     console.log(nilai_prov);

// }

mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';

const map = new mapboxgl.Map({
    container: 'map', // container ID
    style: 'mapbox://styles/mapbox/streets-v11', // style URL
    center: center, // starting position [lng, lat]
    zoom: zoom // starting zoom
});



console.log(`log ada`);
// console.log(`{!! $locationCenter !!}`);


if (nilai_prov==""){
    console.log("tidak ada nilai");
    loadIndonesia();
}
else if(nilai_prov=="jawa_timur" && kota=="surabaya"){
    loadSurabaya();
}
else if(nilai_prov=="jawa_timur"){
    console.log("tidak ada nilai");
    // loadJawaTimur();
}
else{
    console.log("ada nilai provinsi");
    // loadLocations({!! $geoJson !!});
    loadLocations_database();
    console.log(nilai_prov);
}

// loadLocations({!! $geoJson !!});

// loadLocations_database();
// loadSurabaya();

console.log();
map.on('click',(e)=>{
    const longitude = e.lngLat.lng;
    const latitude = e.lngLat.lat;

    console.log({longitude,latitude});
})

map.addControl( new mapboxgl.NavigationControl())
</script>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="width: 420vh;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Smart Hospital Surabaya</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img class="img-smart-hospital" src="{{ asset('assets/home/img/SMART_HOS.png') }}" alt="" >
          <h5 class="smart-lt smart-lt1">lantai 1</h5>
          <h5 class="smart-lt smart-lt2">lantai 2</h5>
          <h5 class="smart-lt smart-lt3">lantai 3</h5>
          <h5 class="smart-lt smart-lt4">lantai 4</h5>
          <h5 class="smart-lt smart-lt5">lantai 5</h5>
          <h5 class="smart-lt smart-lt6">lantai 6</h5>
          <h5 class="smart-lt smart-lt7">lantai 7</h5>
          <h5 class="smart-lt smart-lt8">lantai 8</h5>
          <h5 class="smart-lt smart-lt9">lantai 9</h5>
          <h5 class="smart-lt smart-lt10">lantai 10</h5>
          <h5 class="smart-lt smart-lt11">lantai 11</h5>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
@endsection
