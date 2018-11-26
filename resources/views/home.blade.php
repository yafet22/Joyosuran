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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBI5Lyu0SJ1q2W5KuZwSrgtmDj7iiHRvcE&callback=initMap">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

    <style type="text/css">

        #mymap {

            border:1px solid red;

            width: 100%;

            height: 500px;

        }

    </style>
</head>
<body>

    <nav class="navbar navbar-default">
    <div class="container-fluid" style="background-color:#9F0D20">
            <div class="navbar-header">
            
                <button type="button" class="navbar-toggle" >
                    <span class="sr-only">Toggle navigation</span>
                    <span style="background-color:white" class="icon-bar bar1"></span>
                    <span style="background-color:white" class="icon-bar bar2"></span>
                    <span style="background-color:white" class="icon-bar bar3"></span>
                </button>
                
                    <div id="logo">
					        <a href=""><img alt="" src="images/logo.png" title="Database Bangunan Kota Surakarta">
                            </a>
                            <h4 style="text-align:center; color:white">Database kota Surakarta</h4>
				            
                            </div>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-right">
                            
                            <a href="#"><i class="ti-pie-chart" style="color:#9F0D20">&nbsp INFOGRAPHIC &nbsp&nbsp&nbsp</i></a>
                            <a href="#"><i class="ti-location-pin" style="color:#9F0D20">&nbsp MAPS &nbsp&nbsp&nbsp</i></a>   
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-location-pin" style="color:#9F0D20">&nbspENTER DASHBOARD &nbsp&nbsp&nbsp</i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" data-toggle="modal" data-target="#login" >Login</a></li>
                            </ul>
                            
                    </div>
                    
                </div>
            </div>   
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <form action="{{ url()->current() }}">
                        <div class="row">
                            <div class="form-row">
                                <div class="col-md-12 text-center">
                                    <h3>FILTER DATA</h3>
                                    <p>Jumlah data : {{ $jumlah }}</p>
                                </div>  
                            </div>  
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="fungsi">Fungsi</label>
                                    <select id="fungsi" name="fungsi" class="form-control">
                                        <option value=""></option>
                                        <option value="Hunian">Hunian</option>
                                        <option value="Keagamaan">Keagamaan</option>
                                        <option value="Usaha">Usaha</option>
                                        <option value="Sosial-Budaya">Sosial-Budaya</option>
                                        <option value="Khusus">Khusus</option>
                                    </select>
                                    
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="statusbangunan">Status Bangunan</label>
                                    <select id="statusbangunan" name="statusbangunan" class="form-control">
                                    <option value=""></option>
                                        @foreach($status as $key => $value)
                                            <option value="{{ $key }}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="statustanah">Status Tanah</label>
                                    <select id="statustanah" name="statustanah" class="form-control">
                                        <option value=""></option>
                                        <option value="SHM">SHM</option>
                                        <option value="SHP">SHP</option>
                                        <option value="HGB">HGB</option>
                                        <option value="Lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="luastanah">Luas Tanah</label>
                                    <select id="luastanah" name="luastanah" class="form-control">
                                        <option value=""></option>
                                        <option value="< 500m2">< 500m2</option>
                                        <option value="500 - 5000">500 - 5000</option>
                                        <option value="> 5000m2">> 5000m2</option>
                                        <option value="Lain-lain">Lain-lain</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="jumlah lantai">Jumlah Lantai</label>
                                    <input type="number" min="0" name="jumlahlantai" id="jumlahlantai" class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="tinggibangunan">Tinggi Bangunan</label>
                                    <input type="number" step="any" min="0" name="tinggibangunan" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="koefisiendasarbangunan">Koef Dasar Bangunan</label>
                                    <select id="koefisiendasarbangunan" id="koefisiendasarbangunan" name="koefisiendasarbangunan" class="form-control">
                                        <option value=""></option>
                                        <option value="< 40">< 40</option>
                                        <option value="40 - 80">40 - 80</option>
                                        <option value="> 80">> 80</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="imb">IMB</label>
                                    <select id="imb" name="imb" class="form-control">
                                        <option value=""></option>
                                        <option value="Ada Sesuai">Ada Sesuai</option>
                                        <option value="Ada Tidak sesuai">Ada Tidak sesuai</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="gsj">GSJ</label>
                                    <input type="number" step="any" min="0" name="gsj" class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="gsb">GSB</label>
                                    <input type="number" step="any" min="0" name="gsb" class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="gss">GSS</label>
                                    <input type="number" step="any" min="0" name="gss" class="form-control">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="kdb">KDB</label>
                                    <input type="number" step="any" min="0" name="kdb" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Search
                                    </button>
                                </div>  
                            </div>              
                        </div>
                        </form>
                    
                </div>
            </div>
            <br>
            <div id="mymap"></div>
            <br><br>
        </div>
    </div>


</body>
<div class="wrapper">
    <div class="modal fade bd-example-modal-sm" id="login"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    @if(\Session::has('alert'))
                        <div class="alert alert-danger">
                            <div>{{Session::get('alert')}}</div>
                        </div>
                    @endif
                    @if(\Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{Session::get('alert-success')}}</div>
                        </div>
                    @endif
                    <form action="{{ url('/loginPost') }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">Username:</label>
                            <input type="name" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="alamat">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
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
</div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap-checkbox-radio.js')}}"></script>

    <script src="{{asset('assets/js/chartist.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>

    <script src="{{asset('assets/js/paper-dashboard.js')}}"></script>

    <script src="{{asset('assets/js/demo.js')}}"></script>

    <script type="text/javascript">

        var locations = <?php print_r(json_encode($buildings)) ?>;


        var mymap = new GMaps({

        el: '#mymap',

        lat:  -7.79722,

        lng: 110.36880,

        zoom:15

        });


        $.each( locations, function( index, value ){

            mymap.addMarker({

            lat: value.latitude,

            lng: value.longitude,

            title: value.namapemilik,

            click: function(e) {

                alert('Bangunan milik:'+value.namapemilik+'\nFungsi bangunan:'+value.fungsibangunan+'\nStatus Tanah:'+value.statustanah+'\nLuas Tanah:'+value.luastanah+'\nTinggi Bangunan:'+value.tinggibangunan+'\nKoef Dasar:'+value.koefisiendasarbangunan+'\nIMB:'+value.imb+'\nGSJ:'+value.gsj+'\nGSB:'+value.gsb+'\nGSS:'+value.gss+'\nKDB:'+value.kdb+'');

            }

            });

        });
    </script>

   
</html>
