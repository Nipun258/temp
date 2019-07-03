<?php

  include_once 'inc/dbh.inc.php';

        $NewacadamicYear = $_GET['acadamicYear'];
	    $Newsemester = $_POST['semester'];
	    $Newdepartment = $_POST['department'];
	    $Newdate = $_POST['date'];
        $NewcourseCode = $_POST['courseCode'];
        $NewtimeStart = $_POST['timeStart'];
        $NewtimeEnd = $_POST['timeEnd'];
        $Newlocation = $_POST['location'];
        $NewfirstStudent = $_POST['firstStudent'];
        $NewrepeatStudent = $_POST['repeatStudent'];

        //echo $NewacadamicYear;

     
    $sqlupdate = "UPDATE event SET firstStudent ='{$NewfirstStudent}', repeatStudent = '{$NewrepeatStudent}' , timeStart = '{$NewtimeStart}', timeEnd = '{$NewtimeEnd}' , courseCode = '{$NewcourseCode}' , date = '{$Newdate}',semester = '{$Newsemester}' WHERE id='{$_POST['ids']}' ";
    

    //Execute the query
    if (mysqli_query($conn,$sqlupdate)) {
    	header("refresh:1;url=select.php");
    }else {
    	echo "Not update";
    }



 mysqli_close($conn);












?>