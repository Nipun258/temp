<?php

	include_once 'inc/dbh.inc.php';
    
    if (isset($_POST['acadamicYear']) && isset($_POST['semester']) && isset($_POST['department']) && isset($_POST['date']) && isset($_POST['courseCode']) && isset($_POST['timeStart']) && isset($_POST['timeEnd']) && isset($_POST['location']) && isset($_POST['firstStudent']) && isset($_POST['repeatStudent'])){


	           $acadamicYear = $_POST['acadamicYear'];
	           $semester = $_POST['semester'];
	           $department = $_POST['department'];
	           $date = $_POST['date'];
               $courseCode = $_POST['courseCode'];
               $timeStart = $_POST['timeStart'];
               $timeEnd = $_POST['timeEnd'];
               $location = $_POST['location'];
               $firstStudent = $_POST['firstStudent'];
               $repeatStudent = $_POST['repeatStudent'];



    $sql = "INSERT INTO event (acdamicYear, semester, department, date, courseCode, timeStart ,timeEnd , location , firstStudent , repeatStudent)
   VALUES ('{$acadamicYear}', '{$semester}', '{$department}', '{$date}', '{$courseCode}', '{$timeStart}','{$timeEnd}' ,'{$location}', {$firstStudent} , {$repeatStudent});";

    $result = mysqli_query($conn, $sql);

    if ($result) {
       header('Location:index.php?succes=done');
    }else{
       header('Location:index.php?error=emptyfields');
    }

 }else {
     header('Location: '.$_SERVER['HTTP_REFERER']);
 }

?>