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
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">


    	<div class="sidebar-wrapper">
            <div class="logo">
                    ADMIN DASBOARD
            </div>

            <ul class="nav">
                <li>
                    <a href="{{ url('/regiondata') }}">
                        <i class="ti-home"></i>
                        <p>Data Bangunan</p>
                    </a>
                </li>
                <li class="active">
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
                    <a class="navbar-brand" style="color:white" href="#">Kelurahan </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i style="color:white"class="ti-bell"></i>
									<p style="color:white">Admin</p>
									<b style="color:white"class="caret"></b>
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
                <h2>Kelurahan</h2>
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <!-- <form action="{{ url()->current() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" name="keyword" class="form-control" placeholder="Search by RW">
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                            </form> -->
                        </div>  
                        <div class="pull-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#inputkelurahan">Input Data</button>
                        </div>
                    </div>
                </div>
                <br>
                      
                <div class="row">
                    <div class="col-md-12 order-first mt-2">
                        <div class="table-responsive">
                            <table id=tableadmin class="table table-md table-bordered">
                                <tr style="background-color:#9F0D20;color:white;">
                                    <th class="font-weight-bold" style="text-align: center;">Nomor Kelurahan</th>
                                    <th class="font-weight-bold" style="text-align: center;">Kelurahan</th>
                                    <th class="font-weight-bold" style="text-align: center;">Kecamatan</th>
                                    <th class="font-weight-bold" style="text-align: center;">Keterangan</th>
                                    <th class="font-weight-bold" style="text-align: center;">Action</th>
                                </tr>
                                @if(count($kelurahans))
                                @foreach($kelurahans as $data)
                                <tr style="text-align:center;">
                                    <td style="text-align: center;">{{$data->nokelurahan}}</td>
                                    <td style="text-align: center;">{{$data->nama}}</td>
                                    <td style="text-align: center;">{{$data->kecamatans->nama}}</td>
                                    <td style="text-align: center;">{{$data->keterangan}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" id="getKelurahan" data-toggle="modal" data-target="#editkelurahan" data-url="{{ route('dynamicModal5',['id'=>$data->kelurahanid])}}">Edit</button>
                                        {!!Form::open(['method'=>'delete','route'=>['Kelurahans.destroy',$data->kelurahanid],'style'=>'display:inline'])!!}
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
                        </div> 
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


</body>
<div class="wrapper">
        <div class="modal fade bd-example-modal-sm" id="inputkelurahan"  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
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
                        <form action="{{ url('/Kelurahans') }}" method="post">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <label for="kelurahan">Kecamatan</label>
                                <select id="kecamatanid" name="kecamatanid" class="form-control">
                                    @foreach($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->kecamatanid }}"> {{ $kecamatan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nokelurahan">Nomor Kelurahan</label>
                                <input type="name" class="form-control" id="nokelurahan" name="nokelurahan">
                            </div> 
                            <div class="form-group">
                                <label for="nama">Kelurahan</label>
                                <input type="name" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
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

        <div id="editkelurahan" class="modal fade bd-example-modal-sm"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-sm">
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

            $(document).on('click', '#getKelurahan', function(e){

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
   
</html>
