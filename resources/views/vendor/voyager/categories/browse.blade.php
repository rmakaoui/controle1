@extends('voyager::master')
@section('content')
@if(Auth::user()->role_id == 1){
  <?php
  $conn=mysqli_connect("localhost","root","","laravel");
                                  if (!$conn){
                                        exit("erreur");
                                        
                                  }
                                 $sql="SELECT `id`,`name`, `DS`, `DP`, `DA`FROM `users` where id>1 and id!=8 ;";
                                 $mysqli_result = mysqli_query($conn, $sql) ;
                                  if(mysqli_num_rows($mysqli_result) > 0){
                                    $id = auth()->user()->id;
                                    $cont=1;
                                    
                                    
                                         echo "<form><table>";
                                         while($rows= mysqli_fetch_assoc($mysqli_result)){
                                            echo "<input type='hidden' name='select".$cont."'value='".$rows['id']."'>";
                                            $cont++;
                                             echo "<tr><td><a href='http://localhost:8000/admin/users/".$rows['id']."'>Nom professeur :  ".$rows['name']."</a></tr></td>";
                                           echo "<tr><td>";
                                        $c= str_replace('[{"download_link":"','',$rows["DS"]);
                                            $a=explode('"',$c);
                                           // echo $a[0];
                                            
                                          echo"<a href='http://localhost:8000/storage/".$a[0]."'>Dossier_scientifique</a>" ;
                                          echo "</td><td><select name='select".$cont."'id='select1'> <option value='En_attente'>En attente</option><option value='en_cours'>en cours</option><option value='valide'>validé</option><option value='refuse'>refusé</option></td>";
                                          echo "<tr><td>";
                                          $cont++;
                                  $c= str_replace('[{"download_link":"','',$rows["DP"]);
                                    $a=explode('"',$c);
                                   // echo $a[0];
                                    
                                  echo"<a  href='http://localhost:8000/storage/".$a[0]."'>Dossier_Pedagogique<a/>" ;
                                  echo "</td><td><select name='select".$cont."'id='select1'> <option value='En_attente'>En attente</option><option value='en_cours'>en cours</option><option value='valide'>validé</option><option value='refuse'>refusé</option></td>";                                  $cont++;
                                  echo "<tr><td>";
                          $c= str_replace('[{"download_link":"','',$rows["DA"]);
                            
                            $a=explode('"',$c);
                           // echo $a[0];
                            
                          echo"<a href='http://localhost:8000/storage/".$a[0]."'>Dossier_administratif</a>" ;
                          echo "</td><td><select name='select".$cont."'id='select1'> <option value='En_attente'>En attente</option><option value='en_cours'>en cours</option><option value='valide'>validé</option><option value='refuse'>refusé</option></td>";                          $cont++;
                  
                          }}
                              echo " <tr><td><button formaction='http://localhost:8000/admin/posts'>submit</button></td></tr>";  
                                $send=$cont-1;
                                echo "<input type='hidden' name='count'value='".$send."'>";
                                
                                       
                           ?>
                           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                          
                           
                           <script>
                               $("#select1").change(function() {
            var l = document.getElementById("select1").value;
            console.log(l);})
           
                           </script>
}@else{
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laravel";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id=auth()->user()->id; 
$sql = "SELECT * FROM etat where idprof=".$id."";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<button value='changer les dossiers'><a href='http://localhost:8000/admin/profile'>changer les dossiers</a></button>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<table border=0><tbody>";
    echo "<tr><td>id: </td><td>" . $row["idprof"]. "</td></tr><tr><td> - DS: </td><td>" . $row["etat1"]. "</td></tr><tr><td> - DD: </td><td>" . $row["etat2"]. "</td></tr><tr><td> - DA: </td><td>" . $row["etat3"]. "</td></tr>";
    echo "</tbody></table>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

<style>
 table {
  font-size: 200%;
  padding:40px;
  margin:auto;
  font-weight:bold;
}
</style>}
@endif
@endsection