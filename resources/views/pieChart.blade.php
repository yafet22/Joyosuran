<div class="row">
        <div class="col-md-12 text-center center-block mb-3">
        </div>
    </div>

<canvas id="myChart"></canvas>

<script src="{!! mix('js/app.js') !!}"></script>
<script>
var ctx = document.getElementById("myChart");
var dataTable = [10,12,13,14,15,16]
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Hunian","Keagamaan", "Usaaha", "Sosial Budaya", "Khusus"],
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
        }],
        
    },
    
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    min:0,
                    max:15,
                    ticks:1,
                    interval:1
                }
            }]
        }
    }
});


</script>
</html>
