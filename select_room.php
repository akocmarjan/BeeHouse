<?php 

$room_count = 0;
$sql_units = "SELECT * FROM units order by id asc";
$units_data = mysqli_query($mysqli,$sql_units);
while($row = mysqli_fetch_assoc($units_data) ):
    $unit_name[$row['id']] = $row['name'];
    $unitName = $row['name'];
    $unitID = $row['id'];
    $sql_rooms = "SELECT * FROM rooms WHERE unit_id = $unitID order by id asc";
    $rooms_data = mysqli_query($mysqli,$sql_rooms);
    while($row = mysqli_fetch_assoc($rooms_data) ):
        $roomNumber = $row['room_number'];
        $slots = $row['slots'];
        $tenants = $row['tenants'];
        $price = $row['price'];
        $status = $row['status'];
        $room_count++;
    endwhile;

endwhile;
?>