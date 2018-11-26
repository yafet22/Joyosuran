<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="row">
    <div class="col-md-12 text-center center-block mb-3">
        </div>
    </div>

</body>
</html>

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






