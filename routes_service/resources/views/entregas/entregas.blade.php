@extends('layouts.blank')

@section('pageStyleSheets')
<style>
        .azul, html, body {
            background-color: #2c3e50;
            color: #fff;
        }
    
    </style>
@endsection


@section('content')

<div class="container-fluid azul">
    <br>
<button class="btn btn-outline-default disabled">Olá, {{ Auth::user()->name }}!</button>
<a href="{{url('home')}}">
        <button class="btn btn-outline-default disabled float-right pointer">Voltar</button>
</a>
        <br><br>
        <div class="row animated fadeIn">
            <div class="col-sm-12 col-12 text-dark">
                <div class="card">
                 <div class="card-body">
                    <h5 class="card-title">Entregas</h5>
            
                    <div class="row">
                            <div class="col-md-3">
                                    <p class="card-text">	    	
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <h5 class="card-title">Entregas</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Entregas cadastradas: </h6>                                               
                                                 <hr>
                                                    @foreach($enderecos as $key => $endereco)
                                                    <h5 class="card-title"> ({{$key+1}}) - {{strtoupper($endereco->nome)}}</h5>
                                                        <small onclick="onMapClick({{$endereco->latitude}} , {{$endereco->longitude}})">{{$endereco->logradouro}} , {{$endereco->numero}} , {{$endereco->bairro}}, {{$endereco->municipio}}- {{$endereco->cidade}}</small>                                               
                                                    <hr>
                                                    @endforeach
                                            </div>
                                        </div>
                                    </p>
                                </div>

                        <div class="col-md-9">
                            <div id="mapa"></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
 

        </div>

        <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.47.0/mapbox-gl.js'></script>
        <script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
        integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
        crossorigin=""></script>    
        <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
        <script type="text/javascript">

      
            var mymap = L.map('mapa').setView([-23.529032,-46.7419535], 14);
        
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox.streets'
            }).addTo(mymap);

            var latlng1 = L.latLng(-23.529032,-46.7419535);

            L.marker(latlng1).addTo(mymap).bindPopup("Origem");


        L.Routing.control({
            waypoints: [
                L.latLng(-23.529032,-46.7419535),
                @foreach($enderecos as $endereco)

                L.latLng({{$endereco->latitude}},{{$endereco->longitude}}),

                @endforeach
            ],
            routeWhileDragging: false
            }).addTo(mymap);
            
            @foreach($enderecos as $key => $endereco)

            var latlng = L.latLng({{$endereco->latitude}},{{$endereco->longitude}});

            L.marker(latlng).addTo(mymap).bindPopup("({{$key+1}}) - {{$endereco->nome}}");
            
            @endforeach
        
          </script>


@endsection