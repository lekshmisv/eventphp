<?php
include 'db.php';
include_once('db.php');
if(isset($_POST['submit'])){
  $event_name=$_POST['event_name'];
  $start_date=$_POST['start_date'];
  $end_date=$_POST['end_date'];
  $seats=$_POST['seats'];
  $sqll="insert into details(event_name,start_date,end_date,seats)values('$event_name','$start_date','$end_date','$seats')";
  $result=mysqli_query($connect,$sqll);
  if($result){
    //echo "Data inserted";
    header('location:display.php');
  }else{
    die(mysqli_error($connect));
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
 

    <title>Event</title>
    <!-- <link rel="stylesheet" href="style.css" type="tet/css"> -->
  </head>
  <body>
    <div class="container my-5">
    <form method="post">
    <h1 align="center">Event Registration</h1>
  <div class="form-group">
    <label>Event Name</label>
    <input type="text" class="form-control" placeholder="Enter Event Name" name="event_name" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Start_date</label>
    <input type="date" class="form-control" placeholder="start_date" name="start_date" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>End_date</label>
    <input type="date" class="form-control" placeholder="end_date" name="end_date" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Seats</label>
    <input type="text" class="form-control" placeholder="Total seats" name="seats" required autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
</div>
</div>
  </body>
</html>
