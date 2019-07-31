<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proyecto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<table class="table">
  <tr>
    <td>Decibeles</td>
    <td>Nombre</td>
    <td>Representacion</td>
  </tr>
  <tr>
    <td>0 db</td>
   <td>Umbral vacio</td>
   <td bgcolor="#F2FACC";></td>
    
  </tr>
  <tr>
    <td>10 db</td>
    <td>Ruido campo</td>
    <td bgcolor="#EBFAA4";></td>
  </tr>
  
  <tr>
    <td>20 db</td>
    <td>Biblioteca</td>
    <td bgcolor="#E2FF5A";></td>
  </tr>
  
  <tr>
    <td>40 db</td>
    <td>Conversacion</td>
    <td bgcolor="#BCFF5A";></td>
  </tr>
  
  <tr>
    <td>50 db</td>
    <td>Conversacion entre personas</td>
    <td bgcolor="#00FE04";></td>
  </tr>
  
  <tr>
    <td>60 db</td>
    <td>Aspiradora</td>
    <td bgcolor="#02E828";></td>
  </tr>
</table>
<button type="button" class="btn btn-default" aria-label="Left Align" width="30px" onclick="up()">
  <span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
</button>  
<button type="button" class="btn btn-default" aria-label="Left Align" onclick="Llamar()">
  <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
  Catalogar
</button>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

<canvas id="myChart" width="300" height="100"></canvas>
<script>
function Llamar()
{
  window.location= window.location.origin+"/M"
}
</script>
<script>
var ctx = document.getElementById("myChart").getContext('2d');


function up()
{
      rescate = null;
    Time = null;
    $.ajax
    ({
        url: "/api/datos",
    }).done(function(mgs) {
      rescate = mgs;
      rescate.data.reverse();
      data = rescate.data.map((el) => el.Total_Db)
      time =rescate.data.map((al)=>al.created_at)
      myChart.data.datasets[0].data=data;
      myChart.data.labels=time;
      myChart.update();
    });

}
var myChart= null;
function dibujar() {
  console.log(rescate)
  rescate.data.reverse();
  var data = rescate.data.map((el) => el.Total_Db)
  var time =rescate.data.map((al)=>al.created_at)
  myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels:time,
        datasets: [{
            label: '# Decibeles',
            data: data,
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
            borderWidth: 1
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
}

</script>
<script>
rescate = null;
Time = null;
$.ajax({
  url: "/api/datos",
}).done(function(mgs) {
  rescate = mgs;
  dibujar()
});
</script>
<style>
.table{
    border:1px solid;
    width:400px;
}
.table td
{
  text.align:center;
  border:1px solid;
}
</style>
</html>