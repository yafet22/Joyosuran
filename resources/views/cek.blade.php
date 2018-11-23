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

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/css/themify-icons.css')}}" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI5Lyu0SJ1q2W5KuZwSrgtmDj7iiHRvcE&callback=initMap"></script>
    <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA" type="text/javascript"></script>

</head>
<body onload="load()" onunload="GUnload()">

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">


    	<div class="sidebar-wrapper">
            <div class="logo">
                    ADMIN DASBOARD
            </div>

            <ul class="nav">
                    <li class="active">
                        <a href="{{ url('/') }}">
                            <i class="ti-panel"></i>
                            <p>Region Data</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="ti-user"></i>
                            <p>Buildings Data</p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="ti-view-list-alt"></i>
                            <p>Table List</p>
                        </a>
                    </li>

                </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
									<p>Admin</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                    <!-- <li><a href="#">Donor Darah Terverifikasi</a></li>
                                    <li><a href="#">Imuniasasi Terverifikasi</a></li>
                                    <li><a href="#">Asuransi Terverifikasi</a></li> -->
                              </ul>
                        </li>
						
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
                
            <table width="300">
            <tr >
            <td >Latitude</td>
            <td >Longitude</td>
            </tr>
            <tr>
            <td id="lat"></td>
            <td id="lng"></td>
            </tr >

            </table>

            <div id="map" style="width: 600px; height: 400px">
        </div>

    </div>
</div>


</body>
<div class="wrapper">
    <div class="modal fade" id="inputregion"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Region</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <form action="{{ url('/Regionals') }}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="number" class="form-control" id="rt" name="rt">
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="number" class="form-control" id="rw" name="rw">
                        </div> 
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="name" class="form-control" id="kelurahan" name="kelurahan">
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="name" class="form-control" id="kecamatan" name="kecamatan">
                        </div>  
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="inputregion"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Region</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
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
                    <form action="{{ url('/Regionals') }}" method="post">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="number" class="form-control" id="rt" name="rt">
                        </div>
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="number" class="form-control" id="rw" name="rw">
                        </div> 
                        <div class="form-group">
                            <label for="kelurahan">Kelurahan</label>
                            <input type="name" class="form-control" id="kelurahan" name="kelurahan">
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="name" class="form-control" id="kecamatan" name="kecamatan">
                        </div>  
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="editregion" class="modal fade "  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
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
                    <div id="modal-loader"
                            style="display: none; text-align: center;">
                        <img src="ajax-loader.gif">
                    </div>

                    <!-- content will be load here -->
                    <div id="dynamic-content"></div>

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

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-user',
            	message: "Selamat Datang"

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>

    <script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click', '#getRegionals', function(e){

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
       var center = new GLatLng(-7.79722, 110.36880);
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
