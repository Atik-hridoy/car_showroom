<?php 
include '../includes/config.php';
$id = $_REQUEST['id'];
$qry = "DELETE FROM cars WHERE car_id = '$id'";
$rsl = $conn->query($qry);

if($rsl === TRUE){
    echo "<script type = \"text/javascript\"> 
                alert(\"Car Successfully Deleted \");                          
                window.location = (\"vehicles.php\")
                </script>";
    
    // header("Location: client_requests.php");
}else{
    echo "<script type = \"text/javascript\"> 
                alert(\"Try Again \");                          
                window.location = (\"vehicles.php\")
                </script>";
}
?>            