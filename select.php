<?php 
require_once ('inc/dbh.inc.php');
?>
<?php
  // getting the total number of records
  $query = "SELECT COUNT(id) AS total_rows FROM event";
  $result_set = mysqli_query($conn, $query);
  $result = mysqli_fetch_assoc($result_set);

  $total_rows = $result['total_rows'];

  $rows_per_page = 5;

  if (isset($_GET['p'])) {
    $page_no = $_GET['p'];
  } else {
    $page_no = 1;
  }


$start = ($page_no - 1) * $rows_per_page; 
$query ="SELECT * FROM event ORDER BY id LIMIT {$start}, {$rows_per_page}";                    
$result_set = mysqli_query($conn,$query);  
       //cheacking how many record returned from the query
      //echo mysqli_num_rows($result) ."Record found<hr>";

      $table ='<table class="table table-dark" id="table">';
      $table .='<tr><th>ID</th><th>Acdamic Year</th><th>Semester</th><th>Department</th><th>Date</th><th>Course Code</th><th>Time Start</th><th>Time End</th><th>Location</th><th>First Student</th><th>Repeat Student</th>';

      while($row = mysqli_fetch_array($result_set))  
         {  
           $table .='<tr class="info">';
           $table .='<td>' . $row['id'] . '</td>';
           $table .='<td>' . $row['acdamicYear'] . '</td>';
           $table .='<td>' . $row['semester'] . '</td>';
           $table .='<td>' . $row['department'] . '</td>';
           $table .='<td>' . $row['date'] . '</td>';
           $table .='<td>' . $row['courseCode'] . '</td>';
           $table .='<td>' . $row['timeStart'] . '</td>';
           $table .='<td>' . $row['timeEnd'] . '</td>';
           $table .='<td>' . $row['location'] . '</td>';
           $table .='<td>' . $row['firstStudent'] . '</td>';
           $table .='<td>' . $row['repeatStudent'] . '</td>';
           //$table .='<td><button type="button" class="btn btn-warning btn-sm">Update</button></td>';
           //$table .='<td><button type="button" class="btn btn-danger btn-sm">Delete</button></td>';
           $table .='</tr>';         
 
         } 
           $table .='</table>';

  // first page
  $first = "<a href=\"select.php?p=1\">First</a>";

  // last page
  $last_page_no = ceil($total_rows / $rows_per_page);
  $last = "<a href=\"select.php?p={$last_page_no}\">Last</a>";

  // next page
  if ($page_no >= $last_page_no) {
    $next = "<a>Next</a>";
  } else {
    $next_page_no = $page_no + 1;
    $next = "<a href=\"select.php?p={$next_page_no}\">Next</a>";  
  }
  
  // previous page
  if ($page_no <= 1) {
    $prev = "<a>Previous</a>";
  } else {
    $prev_page_no = $page_no - 1;
    $prev = "<a href=\"select.php?p={$prev_page_no}\">Previous</a>";  
  }


  $page_nav = $first . ' | ' . $prev  . ' | ' . 'Page ' . $page_no . ' of ' . $last_page_no  . ' | ' .  $next . ' | ' . $last;  
?>

<!DOCTYPE html>
<html>
  <head>
    <title>View Record</title>
    <meta charset="utf-8">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!--Responsive design-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <style type="text/css">  
      table{
        border-collapse: collapse;
        width:70%;
      }
      td,th{
        border: 1px solid black;
        padding: 10px;
        text-align: center;
      }
      button{
        color: white;
        text-align: center;
        border: solid white 1px;
        font-weight: 100;
        padding: 10px;
        font-family: 'Open Sans', sans-serif;
        margin-top: 20px;
      }
      a:hover{
         text-decoration: none;
       }

      tr{cursor: pointer; transition: all .25s ease-in-out}

      .selected{background-color: green; font-weight: bold; color: #fff;}
        
      .page_nav { width: 100%; padding: 10px; -webkit-box-sizing: border-box;
-moz-box-sizing: border-box ;
box-sizing: border-box; text-align: right; }
    </style>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="jumbotron text-center">
    <h1>Exam Management System</h1>
    <p>University of Kelaniya</p>
    </div><!--jumbotron text-center-->
    <div class="container">
      <div class="">
        <button class="btn btn-primary text-danger" ><a href="index.php" class="text-white">Home</a></button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modalupdate">Update</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modaldelete">Delete</button>
        <br><br>
      </div>
      <div align="center" class="table-responsive">
        <?php echo $table; ?>
      </div>
      <div class="page_nav text-white bg-dark">
      <?php echo $page_nav; ?>
      </div>
      </div><!--container-->

<div class="modal" tabindex="-1" role="dialog" id="Modaldelete">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete the exam record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="delete.php" post="POST">
        <div class="modal-body">
          <p>Are you realy want to the delete this record</p>
          <input type="hidden" name="ids" id="ids">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger">Delete</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

      <!-- Modal scroll content-->
      <div class="modal fade " tabindex="-1" id="Modalupdate" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
            <form class="form-horizontal" method="POST" action="update.php">
              <div class="modal-header">
                <h5 class="modal-title">Edit exam Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="hidden" name="ids" class="form-control" id="ids" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="acadamicYear" class="col-sm-4 control-label">Acadamic Yaer</label>
                  <div class="col-sm-10">
                    <select name="acadamicYear" class="form-control" id="acadamicYear">
                      <option value="">Choose Academic year</option>
                      <option value="2016/2017" <?php if ($row['acdamicYear'] =='2016/2017') {
                           echo "selected";
                      }?>>2016/2017</option>
                      <option value="2017/2018" <?php if ($row['acdamicYear'] =='2017/2018') {
                           echo "selected";
                      }?>>2017/2018</option>
                      <option value="2018/2019" <?php if ($row['acdamicYear'] =='2018/2019') {
                           echo "selected";
                      }?>>2018/2019</option>
                      <option value="2019/2020" <?php if ($row['acdamicYear'] =='2019/2020') {
                           echo "selected";
                      }?>>2019/2020</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="semester" class="col-sm-4 control-label">Semester</label>
                  <div class="col-sm-10">
                    <select name="semester" class="form-control" id="semester">
                      <option value="">Choose semester</option>
                      <option>1</option>
                      <option>2</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="department" class="col-sm-4 control-label">Department</label>
                  <div class="col-sm-10">
                    <select name="department" class="form-control" id="department">
                      <option value="">Choose Department</option>
                      <option>Archaeology</option>
                      <option>Geography</option>
                      <option>Econ</option>
                      <option>History</option>
                      <option>International Studies</option>
                      <option>Mass Communication</option>
                      <option>Library And Information Science</option>
                      <option>Philosophy</option>
                      <option>Political Science</option>
                      <option>Sociology</option>
                      <option>Social Statistics</option>
                      <option>Sport Science And Physical Education</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="date" class="col-sm-4 control-label">Exam Date</label>
                  <div class="col-sm-10">
                    <input type="date" name="date" class="form-control" id="date" placeholder="Exam Date">
                  </div>
                </div>
                <div class="form-group">
                  <label for="courseCode" class="col-sm-4 control-label">Course Code</label>
                  <div class="col-sm-10">
                    <input type="text" name="courseCode" class="form-control" id="courseCode" placeholder="Course Code">
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="timeStart" class="col-sm-4 control-label">Start Time</label>
                      <div class="col-sm-8">
                        <input type="time" name="timeStart" class="form-control" id="timeStart">
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="timeEnd" class="col-sm-4 control-label">End Time</label>
                      <div class="col-sm-8">
                        <input type="time" name="timeEnd" class="form-control" id="timeEnd">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="location" class="col-sm-4 control-label">Exam Location</label>
                  <div class="col-sm-10">
                    <select name="location" class="form-control" id="location">
                      <option value="">Choose Exam hall</option>
                      <option>K1 Hall</option>
                      <option>K3 Hall</option>
                      <option>Kanunwala Hall</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-5">
                    <div class="form-group">
                      <label for="firstStudent" class="col-sm-8 control-label">First Candidate</label>
                      <div class="col-sm-12">
                        <input type="text" name="firstStudent" class="form-control" id="firstStudent" placeholder="First Candidate">
                      </div>
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="form-group">
                      <label for="repeatStudent" class="col-sm-8 control-label">Repeat Candidate</label>
                      <div class="col-sm-12">
                        <input type="text" name="repeatStudent" class="form-control" id="repeatStudent" placeholder="Repeat Candidate">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- // Modal scroll contet -->
    </body>
  </html>
  <script type="text/javascript" language="javascript">
    
          function selectedRow(){
                
                var index,
                    table = document.getElementById("table");
            
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                         // remove the background from the previous selected row
                        if(typeof index !== "undefined"){
                           table.rows[index].classList.toggle("selected");
                        }
                        console.log(typeof index);
                        // get the selected row index
                        index = this.rowIndex;
                        // add class selected to the row
                        this.classList.toggle("selected");
                        console.log(typeof index);

                        //rIndex = this.rowIndex;
                         document.getElementById("ids").value = this.cells[0].innerHTML;
                         document.getElementById("acadamicYear").value = this.cells[1].innerHTML;
                         document.getElementById("semester").value = this.cells[2].innerHTML;
                         document.getElementById("department").value = this.cells[3].innerHTML;
                         document.getElementById("date").value = this.cells[4].innerHTML;
                         document.getElementById("courseCode").value = this.cells[5].innerHTML;
                         document.getElementById("timeStart").value = this.cells[6].innerHTML;
                         document.getElementById("timeEnd").value = this.cells[7].innerHTML;
                         document.getElementById("location").value = this.cells[8].innerHTML;
                         document.getElementById("firstStudent").value = this.cells[9].innerHTML;
                         document.getElementById("repeatStudent").value = this.cells[10].innerHTML;
                     };
                }
                
            }
            selectedRow();
  </script>
  
  <?php
  mysqli_close($conn);
  ?>