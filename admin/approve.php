<?php 
include '../includes/config.php';
$id = $_REQUEST['id'];
$qry = "UPDATE client SET status = 'Approved' WHERE client_id = '$id'";
$rsl = $conn->query($qry);

if($rsl === TRUE){
    echo "<script type = \"text/javascript\"> 
                alert(\"Successfully Approved \");                          
                window.location = (\"client_requests.php\")
                </script>";
    
    // header("Location: client_requests.php");
}else{
    echo "<script type = \"text/javascript\"> 
                alert(\"Try Again \");                          
                window.location = (\"client_requests.php\")
                </script>";
}
?>            