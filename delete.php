<?php

include_once 'inc/dbh.inc.php';

 $temp = $_GET['ids'];

 $sql = "DELETE FROM event WHERE id ='{$temp}'";

    //Execute the query
    if (mysqli_query($conn,$sql)) {
    	header("refresh:1;url=select.php");
    }else {
    	echo "delete faild";
    }
mysqli_close($conn);

?>