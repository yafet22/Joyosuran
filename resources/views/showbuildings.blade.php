<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet">
    
    <link href="{{asset('assets/css/paper-dashboard.css')}}" rel="stylesheet">

    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI5Lyu0SJ1q2W5KuZwSrgtmDj7iiHRvcE&callback=initMap"></script>
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA" type="text/javascript"></script>

</head>
<body onload="load();load2()" onunload="GUnload();GUnload2()">

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">


    	<div class="sidebar-wrapper">
            <div class="logo">
                    ADMIN DASBOARD
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="{{ url('/regiondata') }}">
                        <i class="ti-home"></i>
                        <p>Data Bangunan</p>
                    </a>
                </li>
                <li >
                    <a href="{{ url('/datamaster') }}">
                        <i class="ti-view-list-alt"></i>
                        <p>Data Referensi</p>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/map') }}">
                        <i class="ti-map-alt"></i>
                        <p>Map</p>
                    </a>
                </li> 
                <li >
                    <a href="{{ url('/pieChart') }}">
                        <i class="ti-pie-chart"></i>
                        <p>INFOGRAPHIC</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
    <nav class="navbar navbar-default">
            <div class="container-fluid" style="background-color:#9F0D20">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>
                        <a style="color:white"class="navbar-brand" href="#">Data Bangunan</a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i style="color:white" class="ti-bell"></i>
                                        <p style="color:white">Admin</p>
                                        <b style="color:white" class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#editaccount" data-toggle="modal" data-target="#editaccount">Edit Account</a></li>
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                </ul>
                            </li>
                            
                        </ul>

                    </div>
                </div>
            </nav>


        <div class="content">
            <div class="container-fluid">
                @if($message=Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <h2> RT: {{$regionals->rt}} / RW: {{$regionals->rw}} </h2>
                <h3>Kelurahan : {{$regionals->kelurahans->nama}}, Kecamatan : {{$regionals->kecamatans->nama}}</h3>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#inputbuilding">Input Data</button>
                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-md-12 order-first mt-2">
                        <div class="table-responsive">
                            <table id=tableadmin class="table table-md table-bordered">
                                <tr style="background-color:#9F0D20;color:white;">
                                    <th class="font-weight-bold" style="text-align: center;">No</th>
                                    <th class="font-weight-bold" style="text-align: center;">Nama Pemilik</th>
                                    <th class="font-weight-bold" style="text-align: center;">Fungsi Bangunan</th>
                                    <th class="font-weight-bold" style="text-align: center;">Status Bangunan</th>
                                    <th class="font-weight-bold" style="text-align: center;">Status Tanah</th>
                                    <th class="font-weight-bold" style="text-align: center;">Luas Tanah</th>
                                    <th class="font-weight-bold" style="text-align: center;">@sortablelink('jumlahlantai','Jml Lantai')</th>
                                    <th class="font-weight-bold" style="text-align: center;">@sortablelink('tinggibangunan','Tinggi Bangunan(m)')</th>
                                    <th class="font-weight-bold" style="text-align: center;">Koef Dasar</th>
                                    <th class="font-weight-bold" style="text-align: center;">IMB</th>
                                    <th class="font-weight-bold" style="text-align: center;">@sortablelink('gsj','GSJ(m)')</th>
                                    <th class="font-weight-bold" style="text-align: center;">@sortablelink('gsb','GSB(m)')</th>
                                    <th class="font-weight-bold" style="text-align: center;">@sortablelink('gss','GSS(m)')</th>
                                    <th class="font-weight-bold" style="text-align: center;">@sortablelink('kdb','KDB(m)')</th>
                                    <th class="font-weight-bold" style="text-align: center;">Action</th>
                                </tr>
                                <form action="{{ url()->current() }}">
                                <tr>
                                    <td></td>
                                    <td style="text-align: center;"><input type="text" name="nama" style="width:100%" class="form-control-plaintext"></td>
                                    <td style="text-align: center;">
                                        <select id="fungsi" name="fungsi" style="width:100%" class="form-control-plaintext">
                                            <option value=""></option>
                                            <option value="Hunian">Hunian</option>
                                            <option value="Keagamaan">Keagamaan</option>
                                            <option value="Usaha">Usaha</option>
                                            <option value="Sosial-Budaya">Sosial-Budaya</option>
                                            <option value="Khusus">Khusus</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;">
                                        <select id="statusbangunan" name="statusbangunan" style="width:100%" class="form-control-plaintext">
                                        <option value=""></option>
                                            @foreach($status as $key => $value)
                                                <option value="{{ $key }}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="text-align: center;">
                                        <select id="statustanah" name="statustanah" style="width:100%" class="form-control-plaintext">
                                            <option value=""></option>
                                            <option value="SHM">SHM</option>
                                            <option value="SHP">SHP</option>
                                            <option value="HGB">HGB</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;">
                                        <select id="luastanah" name="luastanah" style="width:100%" class="form-control-plaintext">
                                            <option value=""></option>
                                            <option value="< 500m2">< 500m2</option>
                                            <option value="500 - 5000">500 - 5000</option>
                                            <option value="> 5000m2">> 5000m2</option>
                                            <option value="Lain-lain">Lain-lain</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;"><input type="number" min="0" name="jumlahlantai" style="width:100%" class="form-control-plaintext"></td>
                                    <td style="text-align: center;"><input type="number" step="any" min="0" name="tinggibangunan" style="width:100%" class="form-control-plaintext"></td>
                                    <td style="text-align: center;">
                                        <select id="koefisiendasarbangunan" name="koefisiendasarbangunan" style="width:100%" class="form-control-plaintext">
                                            <option value=""></option>
                                            <option value="< 40">< 40</option>
                                            <option value="40 - 80">40 - 80</option>
                                            <option value="> 80">> 80</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;">
                                        <select id="imb" name="imb" style="width:100%" class="form-control-plaintext">
                                            <option value=""></option>
                                            <option value="Ada sesuai">Ada sesuai</option>
                                            <option value="Ada Tidak sesuai">Ada Tidak sesuai</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </td>
                                    <td style="text-align: center;"><input type="number" step="any" min="0" name="gsj" style="width:100%" class="form-control-plaintext"></td>
                                    <td style="text-align: center;"><input type="number" step="any" min="0" name="gsb" style="width:100%" class="form-control-plaintext"></td>
                                    <td style="text-align: center;"><input type="number" step="any" min="0" name="gss" style="width:100%" class="form-control-plaintext"></td>
                                    <td style="text-align: center;"><input type="number" step="any" min="0" name="kdb" style="width:100%" class="form-control-plaintext"></td>
                                    <td style="text-align: center;"><button type="submit" step="any" class="btn btn-primary btn-sm">Search</button></td>
                                </tr>
                                </form>
                                @if(count($buildings))
                                @foreach($buildings as $key => $building)
                                <tr style="text-align:center;">
                                    <td style="text-align: center;">{{ ++$key }}</td>
                                    <td style="text-align: center;">{{$building->namapemilik}}</td>
                                    <td style="text-align: center;">{{$building->fungsibangunan}}</td>
                                    <td style="text-align: center;">{{$building->statusbangunans->nama}}</td>
                                    <td style="text-align: center;">{{$building->statustanah}}</td>
                                    <td style="text-align: center;">{{$building->luastanah}}</td>
                                    <td style="text-align: center;">{{$building->jumlahlantai}}</td>
                                    <td style="text-align: center;">{{$building->tinggibangunan}}</td>
                                    <td style="text-align: center;">{{$building->koefisiendasarbangunan}}</td>
                                    <td style="text-align: center;">{{$building->imb}}</td>
                                    <td style="text-align: center;">{{$building->gsj}}</td>
                                    <td style="text-align: center;">{{$building->gsb}}</td>
                                    <td style="text-align: center;">{{$building->gss}}</td>
                                    <td style="text-align: center;">{{$building->kdb}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" id="getBuilding" data-toggle="modal" data-target="#editbuilding" data-url="{{ route('dynamicModal2',['id'=>$building->buildingid])}}">Detail</button>
                                        {!!Form::open(['method'=>'delete','route'=>['Buildings.destroy',$building->buildingid],'style'=>'display:inline'])!!}
                                        {!!Form::submit('Delete',['class'=>'btn btn-danger btn-sm'])!!}
                                        {!!Form::close()!!}    
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td allign="center" colspan="6">
                                    Empty Data!! Have a nice day :)
                                    </td>
                                </tr>
                                @endif
                            </table>
                            {!! $buildings->appends(\Request::except('page'))->render() !!}
                        </div> 
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
<div class="wrapper">
    <div class="modal fade" id="inputbuilding"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Bangunan</h5>

                </div>

                <div class="modal-body">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong>There were some problems with your input. <br><br>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                                <label for="id">Latitude</label><p id="lat"></p>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                                <label for="id">Longitude</label><p id="lng"></p>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                            <div id="map" style="width: 100%; height: 400px"></div>
                            </div>
                        </div>
                        <br>
                        
                    
                    {!! Form::open(array('route' => 'Buildings.store','method'=>'POST','enctype'=>'multipart/form-data'))!!}
                    {!!Form::hidden('regionid',$regionals->regionid)!!}
                        <!-- <form method="POST" action="http://localhost:8000/ApplicantDatas" accept-charset="UTF-8" enctype="multipart/form-data"><input name="_token" value="mBQ77oQCBXcZL9boJmHgvNiO9GL5b7DDSC3vVkSs" type="hidden"> -->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputNama">Nama Pemilik</label>
                                    {!!Form::text('namapemilik',null,array('placeholder'=>'Nama Pemilik','class'=>'form-control','id'=>'inputNama'))!!}  
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputNoBangunan">No Bangunan</label>
                                    {!!Form::text('nobangunan',null,array('placeholder'=>'No Bangunan','class'=>'form-control','id'=>'inputNoBangunan'))!!}  
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputFungsi">Fungsi Bangunan</label>
                                    {!!Form::select('fungsibangunan', array('Hunian' => 'Hunian', 'Keagamaan' => 'Keagamaan', 'Usaha' => 'Usaha', 'Sosial-Budaya' => 'Sosial-Budaya','Khusus' => 'Khusus'),'Hunian',array('class'=>'form-control','id'=>'inputFungsi'))!!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputSB">Status Bangunan</label>
                                    {!!Form::select('statusbangunan', $status , null, array('class'=>'form-control','id'=>'inputSB') )!!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputSTanah">Status Tanah</label><br>
                                    {!!Form::select('statustanah', array('SHM' => 'SHM', 'SHP' => 'SHP', 'HGB' => 'HGB', 'Lain-lain' => 'Lain-lain'),'SHM',array('class'=>'form-control','id'=>'inputSTanah'))!!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputLuas">Luas Tanah</label>
                                    {!!Form::select('luastanah', array('< 500m2' => '< 500m2', '500 - 5000' => '500 - 5000','> 5000m2' => '> 5000m2'),'< 500m2',array('class'=>'form-control','id'=>'inputLuas'))!!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputLantai">Jumlah Lantai</label>
                                    {!!Form::number('jumlahlantai', 'null',array('placeholder'
                                                =>'Jumlah Lantai','class'=>'form-control','id'=>'inputLantai','min'=>'1'))!!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputTinggi">Tinggi Bangunan</label>
                                    {!!Form::number('tinggibangunan', 'null',array('placeholder'
                                                =>'Tinggi Bangunan','class'=>'form-control','id'=>'inputTinggi','min'=>'0','step'=>'any'))!!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputKoef">KDB</label>
                                    {!!Form::select('koefisiendasarbangunan', array('< 40' => '< 40', '40 - 80' => '40 - 80','> 80' => '> 80'),'< 40',array('class'=>'form-control','id'=>'inputKoef'))!!}
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputImb">IMB</label>
                                    {!!Form::select('imb', array('Ada sesuai' => 'Ada sesuai', 'Ada Tidak sesuai' => 'Ada Tidak sesuai','Tidak Ada' => 'Tidak Ada'),'Ada Sesuai',array('class'=>'form-control','id'=>'inputImb'))!!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Pelanggaran (M)</label>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputGsj">GSJ</label>
                                    {!!Form::number('gsj', 'null',array('placeholder'
                                                =>'gsj','class'=>'form-control','id'=>'inputGsj','min'=>'0','step'=>'any'))!!}
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputGsb">GSB</label>
                                    {!!Form::number('gsb', 'null',array('placeholder'
                                                =>'gsb','class'=>'form-control','id'=>'inputGsb','min'=>'0','step'=>'any'))!!}
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputGss">GSS</label>
                                    {!!Form::number('gss', 'null',array('placeholder'
                                                =>'gss','class'=>'form-control','id'=>'inputGss','min'=>'0','step'=>'any'))!!}
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputKdb">KDB</label>
                                    {!!Form::number('kdb', 'null',array('placeholder'
                                                =>'kdb','class'=>'form-control','id'=>'inputKdb','min'=>'0','step'=>'any'))!!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="lat">Latitude</label>
                                    {!!Form::number('latitude',null,array('placeholder'
                                                =>'Latitude','class'=>'form-control','id'=>'lat','step'=>'any'))!!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lng">Longitude</label>
                                    {!!Form::number('longitude',null,array('placeholder'
                                                =>'Longitude','class'=>'form-control','id'=>'lng','step'=>'any'))!!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <img src="{{asset('images/default-pp.jpg')}}" class="avatar img-thumbnail" alt="profile Pic" height="100" width="100">
                                </div>
                                <div class="form-group col-md-6 mt-3">
                                    <h6>Upload photo...</h6>
                                    {!!Form::file('foto',array('class'=>'text-center center-block file-upload'))!!}
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div> 
                            </div>
                    <!-- </form> -->
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <div id="editbuilding" class="modal fade "  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <div class="modal-body">
                            
                    <div id="modal-loader"
                            style="display: none; text-align: center;">
                        <img src="ajax-loader.gif">
                    </div>

                    <!-- content will be load here -->
                    <div id="dynamic-content" onload="load2()" onunload="GUnload2()"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button"
                            class="btn btn-danger"
                            data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap-checkbox-radio.js')}}"></script>

    <script src="{{asset('assets/js/chartist.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>

    <script src="{{asset('assets/js/paper-dashboard.js')}}"></script>

    <script src="{{asset('assets/js/demo.js')}}"></script>

    <script>
        $(document).ready(function() {    
            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function(){
                readURL(this);
            });
        });
  </script>
  
  <script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click', '#getBuilding', function(e){

            e.preventDefault();

            var url = $(this).data('url');
            
            $('#dynamic-content').html(''); // leave it blank before ajax call
            $('#modal-loader').show();      // load ajax loader

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'html'
            })
            .done(function(data){
                $('#dynamic-content').html('');
                $('#dynamic-content').html(data); // load response
                $('#modal-loader').hide();        // hide ajax loader
            })
            .fail(function(){
                $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#modal-loader').hide();
            });

        });

    

    });
    </script>

    <script type="text/javascript" >
    function load() {
        if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        if(!!navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {      
             
                    var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                            
                    map.setCenter(geolocate,15);
                          
            },function(err){
                if (err.code == 1) {
                    var center = new GLatLng( -7.5819838, 110.826532);
                    map.setCenter(center, 15);
                    geocoder = new GClientGeocoder();
                    var marker = new GMarker(center, {draggable: true});
                    map.addOverlay(marker);
                    document.getElementById("lat").innerHTML = center.lat().toFixed(5);
                    document.getElementById("lng").innerHTML = center.lng().toFixed(5);

                GEvent.addListener(marker, "dragend", function() {
                    var point = marker.getPoint();
                    map.panTo(point);
                    document.getElementById("lat").innerHTML = point.lat().toFixed(5);
                    document.getElementById("lng").innerHTML = point.lng().toFixed(5);
                    });


                GEvent.addListener(map, "moveend", function() {
                map.clearOverlays();
                var center = map.getCenter();
                var marker = new GMarker(center, {draggable: true});
                map.addOverlay(marker);
                document.getElementById("lat").innerHTML = center.lat().toFixed(5);
                document.getElementById("lng").innerHTML = center.lng().toFixed(5);

                GEvent.addListener(marker, "dragend", function() {
                    var point =marker.getPoint();
                    map.panTo(point);
                    document.getElementById("lat").innerHTML = point.lat().toFixed(5);
                    document.getElementById("lng").innerHTML = point.lng().toFixed(5);
                    });

                    });
                }
            });
        }
        else{
            var center = new GLatLng(-7.79722, 110.36880);
            map.setCenter(center, 15);
        }
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});
        map.addOverlay(marker);
        document.getElementById("lat").innerHTML = center.lat().toFixed(5);
        document.getElementById("lng").innerHTML = center.lng().toFixed(5);

    GEvent.addListener(marker, "dragend", function() {
        var point = marker.getPoint();
        map.panTo(point);
        document.getElementById("lat").innerHTML = point.lat().toFixed(5);
        document.getElementById("lng").innerHTML = point.lng().toFixed(5);
        });


    GEvent.addListener(map, "moveend", function() {
    map.clearOverlays();
    var center = map.getCenter();
    var marker = new GMarker(center, {draggable: true});
    map.addOverlay(marker);
    document.getElementById("lat").innerHTML = center.lat().toFixed(5);
    document.getElementById("lng").innerHTML = center.lng().toFixed(5);

    GEvent.addListener(marker, "dragend", function() {
        var point =marker.getPoint();
        map.panTo(point);
        document.getElementById("lat").innerHTML = point.lat().toFixed(5);
        document.getElementById("lng").innerHTML = point.lng().toFixed(5);
        });

        });

        }
    }

    function showAddress(address) {
    var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        if (geocoder) {
        geocoder.getLatLng(
            address,
            function(point) {
            if (!point) {
                alert(address + " not found");
            } else {
    document.getElementById("lat").innerHTML = point.lat().toFixed(5);
    document.getElementById("lng").innerHTML = point.lng().toFixed(5);
    map.clearOverlays()
    map.setCenter(point, 14);
    var marker = new GMarker(point, {draggable: true});
    map.addOverlay(marker);

    GEvent.addListener(marker, "dragend", function() {
        var pt = marker.getPoint();
        map.panTo(pt);
        document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
        document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
        });


    GEvent.addListener(map, "moveend", function() {
    map.clearOverlays();
    var center = map.getCenter();
    var marker = new GMarker(center, {draggable: true});
    map.addOverlay(marker);
    document.getElementById("lat").innerHTML = center.lat().toFixed(5);
    document.getElementById("lng").innerHTML = center.lng().toFixed(5);

    GEvent.addListener(marker, "dragend", function() {
        var pt = marker.getPoint();
        map.panTo(pt);
    document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
    document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
        });

        });
            }
            }
        );
        }
    }
   </script>
   
</html>
