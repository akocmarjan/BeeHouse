<?php 
$sql_lessor = "SELECT * FROM lessor";
$lessor_data = mysqli_query($mysqli,$sql_lessor);
while($row = mysqli_fetch_assoc($lessor_data) ){
    $lessor_name[$row['id']] = $row['username'];
    $lessor_id = $row['id'];
    $username = $row['username'];
    
}
?>