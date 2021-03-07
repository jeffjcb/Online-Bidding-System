<?php
include('db_connect.php');
$delete = $_GET['delete'];
if (isset($delete)){
    $sql = "DELETE FROM bids WHERE id = $delete";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location:bids.php?success=2');
      } else {
        echo "Error deleting record: " . $conn->error;
      }
}


?>