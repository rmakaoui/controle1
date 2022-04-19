@extends('voyager::master')
@section('content')
<?php
 $conn=mysqli_connect("localhost","root","","laravel");
 $sql="DELETE FROM `etat` WHERE 1;";
 $mysqli_result = mysqli_query($conn, $sql) ;
$l=$_GET['count'];
for($i=1;$i<=$l;$i+=4){
    
    $l1=$_GET['select'.$i.''];
    $c=$i+1;
    $l11=$_GET['select'.$c.''];
    $c=$c+1;
    $l2=$_GET['select'.$c.''];
    $c=$c+1;
    $l3=$_GET['select'.$c.''];
    
   
    if (!$conn){
        exit("erreur");
        
    }
    $sql="INSERT INTO `etat`(`id`,`idprof`, `ETAT1`, `ETAT2`, `ETAT3`) VALUES (null,'.$l1.','.$l11.','.$l2.','.$l3 .')";
    $mysqli_result = mysqli_query($conn, $sql) ;
}


echo "<form><p>etat envoyer </p>";
echo"<button formaction='http://localhost:8000/admin/categories'>sortir</button>";
?>
<style>
 p {
  font-size: 200%;
  padding:40px;
  margin:auto;
  font-weight:bold;
}
button{
    margin:auto;
    width:130px;
    height:50px;
}
</style>
@endsection