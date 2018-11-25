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

    </head>
    <body>

    <div class="wrapper">
        <div class="sidebar" data-background-color="white" data-active-color="danger">


            <div class="sidebar-wrapper">
                <div class="logo">
                        ADMIN DASBOARD
                </div>

                <ul class="nav">
                        <li class="active">
                            <a href="{{ url('/regiondata') }}">
                                <i class="ti-location-pin"></i>
                                <p>Region Data</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="ti-home"></i>
                                <p>Buildings Data</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/datamaster') }}">
                                <i class="ti-view-list-alt"></i>
                                <p>Data Master</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/map') }}">
                                <i class="ti-map-alt"></i>
                                <p>Map</p>
                            </a>
                        </li>

                        
                    <li>
                        <a href="{{ url('/pieChart') }}">
                            <i class="ti-pie-chart"></i>
                            <p>INFOGRAPHIC</p>
                        </a>
                    </li>
                    </ul>
            </div>
        </div>

        <div class="main-panel" >
            <nav class="navbar navbar-default">
                <div class="container-fluid" style="background-color:#9F0D20">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar bar1"></span>
                            <span class="icon-bar bar2"></span>
                            <span class="icon-bar bar3"></span>
                        </button>

                        <div id="logo">
					        <a href=""><img alt="" src="images/logo.png" title=""></a>
				        </div>
                        <a style="color:white"class="navbar-brand" href="#">Dashboard</a>
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
                    <h2>Data Bangunan</h2>
                    <div class="row">
                        <div class="col-lg-12 margin-tb">  
                            <div class="pull-right">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#inputregion">Input Data</button>
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
                                        <th class="font-weight-bold" style="text-align: center;">Kecamatan</th> 
                                        <th class="font-weight-bold" style="text-align: center;">Kelurahan</th>
                                        <th class="font-weight-bold" style="text-align: center;">RW</th>
                                        <th class="font-weight-bold" style="text-align: center;">RT</th>
                                        <th class="font-weight-bold" style="text-align: center;">Action</th>
                                    </tr>
                                    <form action="{{ url()->current() }}">
                                        <tr style="text-align:center;">
                                            <td style="text-align: center;"></td>
                                            <td style="text-align: center;"><input type="text" name="kecamatan" style="width:100%" class="form-control-plaintext"></td>
                                            <td style="text-align: center;"><input type="text" name="kelurahan" style="width:100%" class="form-control-plaintext"></td>
                                            <td style="text-align: center;"><input type="text" name="rw" style="width:100%" class="form-control-plaintext"></td>
                                            <td style="text-align: center;"><input type="text" name="rt" style="width:100%" class="form-control-plaintext"></td>
                                            <td style="text-align: center;"><button type="submit" step="any" class="btn btn-primary btn-sm">Search</button></td>
                                        </tr>
                                    </form>
                                    @if(count($regionals))
                                    @foreach($regionals as $key => $regional)
                                    <tr style="text-align:center;">
                                        <td style="text-align: center;">{{++$key}}</td>
                                        <td style="text-align: center;">{{$regional->kecamatans->nama}}</td>
                                        <td style="text-align: center;">{{$regional->kelurahans->nama}}</td>
                                        <td style="text-align: center;">{{$regional->rw}}</td>
                                        <td style="text-align: center;">{{$regional->rt}}</td>
                                        
                                        
                                        <td style="text-align: center;">
                                            <button class="btn btn-success btn-sm" id="getRegionals" data-toggle="modal" data-target="#editregion" data-url="{{ route('dynamicModal',['id'=>$regional->regionid])}}">Edit</button>
                                            <a href="{{ route('showBuildings',['id'=>$regional->regionid])}}"><button class="btn btn-warning btn-sm">Bangunan</button></a>
                                            {!!Form::open(['method'=>'delete','route'=>['Regionals.destroy',$regional->regionid],'style'=>'display:inline'])!!}
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
                                {!! $regionals->appends(\Request::except('page'))->render() !!}
                            </div> 
                        </div>
                    </div>
                </div>
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
                                <label for="kecamatan">Kecamatan</label>
                                <select id="kecamatan" name="kecamatan" class="form-control">
                                <option value=""></option>
                                    @foreach($kecamatans as $key => $value)
                                        <option value="{{ $key }}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>  
                            <div class="form-group">
                                <label for="kelurahan">Kelurahan</label>
                                <select id="kelurahan" name="kelurahan" class="form-control">
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rw">RW</label>
                                <input type="number" class="form-control" id="rw" name="rw">
                            </div> 
                            <div class="form-group">
                                <label for="rt">RT</label>
                                <input type="number" class="form-control" id="rt" name="rt">
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

        <div class="modal fade" id="editaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Accont</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <div class="modal-body">
                        <form action="{{ url('/editPost') }}" method="post">
                        {{ csrf_field() }}
                        {!!Form::hidden('id',Session::get('id'))!!}
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="name" class="form-control" id="username" name="username" value="{{Session::get('username')}}">
                            </div>
                            <div class="form-group">
                                <label for="oldpassword">Password Lama:</label>
                                <input type="password" class="form-control" id="oldpassword" name="oldpassword"  >
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
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
        <script type="text/javascript">

        $(document).ready(function() {

            $('select[name="kecamatan"]').on('change', function() {

                var kecamatanID = $(this).val();

                if(kecamatanID) {

                    $.ajax({

                        url: '/myform/ajax/'+kecamatanID,

                        type: "GET",

                        dataType: "json",

                        success:function(data) {

                            $('select[name="kelurahan"]').empty();

                            $.each(data, function(key, value) {

                                $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value +'</option>');

                            });


                        }

                    });

                }else{

                    $('select[name="kelurahan"]').empty();

                }

            });

        });

        </script>

    </html>
