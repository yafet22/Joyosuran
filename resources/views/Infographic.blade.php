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
                    <li>
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
                    <li class="active">
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

                        <div id="logo">
					        <a href=""><img alt="" src="images/logo.png" title=""></a>
				        </div>
                        <a style="color:white"class="navbar-brand" href="#">Data master</a>
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
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <h3 class="text-center">Fungsi Bangunan</h3>
                                    <canvas id="myChart"></canvas> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <h3 class="text-center">Status Tanah</h3>
                                    <canvas id="statustanah"></canvas> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <h3 class="text-center">Luas Tanah</h3>
                                    <canvas id="luastanah"></canvas> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <h3 class="text-center">Koefisien Dasar</h3>
                                    <canvas id="koefisiendasarbangunan"></canvas> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <h3 class="text-center">IMB</h3>
                                    <canvas id="imb"></canvas> 
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <div class="card">
                                <div class="content">
                                    <h3 class="text-center">Status Bangunan</h3>
                                    <canvas id="statusbangunan"></canvas> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    </body>
    <div class="wrapper">
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
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        <script src="{{asset('assets/js/jquery.min.js')}}"></script>

        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('assets/js/bootstrap-checkbox-radio.js')}}"></script>

        <script src="{{asset('assets/js/chartist.min.js')}}"></script>

        <script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>

        <script src="{{asset('assets/js/paper-dashboard.js')}}"></script>

        <script src="{{asset('assets/js/demo.js')}}"></script>

        <script>
        var ctx = document.getElementById("myChart");

        var dataTable = [{{ $Hunian }}, {{ $keagamaan }}, {{ $usaha }},{{ $sosial_budaya }}, {{ $khusus }}]
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Hunian","Keagamaan", "Usaha", "Sosial Budaya", "Khusus"],
                datasets: [{
                    label: 'Fungsional',
                    data: dataTable,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    pointHitRadius : 10,
                    pointRadius : 10,
                    pointHoverBorderColor : 'rgba(255, 159, 64, 3)',
                }]
                
            },
            
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>

        <script>
        var ctx = document.getElementById("statustanah");

        var dataTable = [{{ $shm }}, {{ $shp }}, {{ $hgb }},{{ $lain }}]
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["SHM","SHP", "HGB", "Lain-lain"],
                datasets: [{
                    label: 'Fungsional',
                    data: dataTable,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    pointHitRadius : 10,
                    pointRadius : 10,
                    pointHoverBorderColor : 'rgba(255, 159, 64, 3)',
                }]
                
            },
            
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>

        <script>
        var ctx = document.getElementById("luastanah");

        var dataTable = [{{ $luas1 }}, {{ $luas2 }}, {{ $luas3 }}]
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["<500m2","500m2 - 5000m2", ">5000m2"],
                datasets: [{
                    label: 'Fungsional',
                    data: dataTable,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    pointHitRadius : 10,
                    pointRadius : 10,
                    pointHoverBorderColor : 'rgba(255, 159, 64, 3)',
                }]
                
            },
            
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>

        <script>
        var ctx = document.getElementById("koefisiendasarbangunan");

        var dataTable = [{{ $koef1 }}, {{ $koef2 }}, {{ $koef3 }}]
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["< 40","40 - 80", "> 80"],
                datasets: [{
                    label: 'Fungsional',
                    data: dataTable,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    pointHitRadius : 10,
                    pointRadius : 10,
                    pointHoverBorderColor : 'rgba(255, 159, 64, 3)',
                }]
                
            },
            
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>

        <script>
        var ctx = document.getElementById("imb");

        var dataTable = [{{ $imb1 }}, {{ $imb2 }}, {{ $imb3 }}]
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Ada Sesuai","Ada Tidak Sesuai", "Tidak Ada"],
                datasets: [{
                    label: 'Fungsional',
                    data: dataTable,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    pointHitRadius : 10,
                    pointRadius : 10,
                    pointHoverBorderColor : 'rgba(255, 159, 64, 3)',
                }]
                
            },
            
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>
        
        <script>
        var ctx = document.getElementById("statusbangunan");

        var dataTable = [{{ $status1 }}, {{ $status2 }}]
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Bangunan Negara","Cagar Budaya"],
                datasets: [{
                    label: 'Fungsional',
                    data: dataTable,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    pointHitRadius : 10,
                    pointRadius : 10,
                    pointHoverBorderColor : 'rgba(255, 159, 64, 3)',
                }]
                
            },
            
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>

    </html>
