<?php 
$sql_category = "SELECT * FROM category";
$category_data = mysqli_query($mysqli,$sql_category);
while($row = mysqli_fetch_assoc($category_data) ){
    $cat_name[$row['id']] = $row['category_name'];
    $category_id = $row['id'];
    $category_name = $row['category_name'];
    
}
?>