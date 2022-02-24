<?php
include 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-lg-6">
        <a href="event.php" class="btn btn-primary my-5">Add Event</a>
</div>
<div class="col-lg-6">
  <?php
  $event_name="";
  $start_date="";

  // if ($_POST) {
  //   $event_name=$_POST['event_name'];
  //   $start_date=$_POST['start_date'];
  // }
  if(isset($_POST['filter'])){
    $event_name=$_POST['event_name'];
    $start_date=$_POST['start_date'];
    $end_date=$_POST['end_date'];
    if ($event_name) {
      $sql="select * from details where event_name like '%$event_name%' ";
    }
    elseif ($start_date) {
      $sql="select * from details where start_date>= '$start_date' ";
    }
    elseif ($end_date){
      $sql="select * from details where end_date<= '$end_date' ";
    }
    else{
      $sql="select * from details order by start_date asc";
    }

    $result=mysqli_query($connect,$sql);
  }
  else{
    $sqll="select * from details order by start_date asc";
    $result=mysqli_query($connect,$sqll);
  }
  if($result){
    $result_data="";
     while($row=mysqli_fetch_assoc($result)){
         $id=$row['id'];
         $event_name=$row['event_name'];
         $start_date=$row['start_date'];
         $end_date=$row['end_date'];
         $seats=$row['seats'];
         $result_data .= '<tr>
            <th scope="row">'.$id.'</th>
            <td>'.$event_name.'</td>
           <td>'.$start_date.'</td>
            <td>'.$end_date.'</td>
            <td>'.$seats.'</td>
            <td>
            <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light">Update</a></button>
            <button class="btn btn-primary"><a href="delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
            </td>
          </tr>';

     }
  }
 ?>
<form method="post">
  <div class="form-group">
  <label style="color : black;">Event Name</label>
      <input type="text" style="width : 170px;" value="<?php echo $event_name;?>" class="form-control" name="event_name" >
    <label style="color : black;">Start_date</label>
    <input type="date"  style="width : 170px;" class="form-control"  value="<?php echo $start_date;?>" name="start_date">
  
    <label style="color : black;">End_date</label>
    <input type="date" style="width : 170px;" class="form-control" name="end_date">
  </div>
  <button type="submit" class="btn btn-primary" name="filter">Filter</button>
</form>
</div>

</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">SI No</th>
      <th scope="col">Event Name</th>
      <th scope="col">Start Date</th>
      <th scope="col">End date</th>
      <th scope="col">Seat</th>
    </tr>
  </thead>
  <tbody>
    <?php 
  echo $result_data;
  ?>
  </tbody>
</table>
    </div>

  </div>

</div>
</body>
</html>