@extends('voyager::master')
@section('content')
<center>
<table style="margin: 30px;">
  <thead >
    <th><h2 style="margin:center">Par Mois</h2></th>
    <th><h2 style="margin:center">Par annee</h2></th>
  </thead>
  <tbody>
    <tr>
      <td>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div style="width: 500px;">
<canvas id="myChart" width="200" height="200"></canvas></div>
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ 'mars'<?php
          $conn = mysqli_connect("localhost", "root", "", "laravel");
         $sql = "SELECT distinct date_format(dateRecrutement,'%M') from `users`; ";
         $fire = mysqli_query($conn,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo ",'".$result["date_format(dateRecrutement,'%M')"]."'";
          }
?>],
        datasets: [{
            label: '# of Votes',
            data: [0<?php
          $conn = mysqli_connect("localhost", "root", "", "laravel");
         $sql = "SELECT count(DS)+count(DP)+count(DA) from users group BY MONTH(dateRecrutement); ";
         $fire = mysqli_query($conn,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo ",".$result['count(DS)+count(DP)+count(DA)'];
          }
?>
        ],
            backgroundColor: [
                'rgba(25, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
                
            ],
            borderColor: [
                'rgba(25, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
      </td>
      <td>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div style="width: 500px;">
<canvas id="myChart2" width="200" height="200"></canvas></div>
<script>
const ctx1 = document.getElementById('myChart2').getContext('2d');
const myChart2 = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: [ 'mars'<?php
          $conn = mysqli_connect("localhost", "root", "", "laravel");
         $sql = "SELECT distinct date_format(dateRecrutement,'%yyyy') from `professeurs`; ";
         $fire = mysqli_query($conn,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo ",'".$result["date_format(dateRecrutement,'%yyyy')"]."'";
          }
?>],
        datasets: [{
            label: '# of Votes',
            data: [0<?php
          $conn = mysqli_connect("localhost", "root", "", "laravel");
         $sql = "SELECT count(DA)+count(DP)+count(DS) from users ; ";
         $fire = mysqli_query($conn,$sql);
          while ($result = mysqli_fetch_assoc($fire)) {
            echo ",".$result['count(DA)+count(DP)+count(DS)'];
          }
?>
        ],
            backgroundColor: [
                'rgba(25, 99, 132, 0.2)',
                'rgba(54, 16, 235, 0.2)'
                
            ],
            borderColor: [
                'rgba(25, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
                
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
      </td>
    </tr>
  </tbody>
</table>
</center>

@endsection