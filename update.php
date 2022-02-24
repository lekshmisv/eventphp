
<?php
include 'db.php';

$id=$_GET['updateid'];

if(isset($_POST['submit'])){
  $event_name=$_POST['event_name'];
  $start_date=$_POST['start_date'];
  $end_date=$_POST['end_date'];
  $seats=$_POST['seats'];
  $sqll="update details set event_name='$event_name',start_date='$start_date',
  end_date='$end_date',seats='$seats' where id=$id";
  $result=mysqli_query($connect,$sqll);
  if($result){
    //echo "inserted sucessfully";
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
    <?php
    $sq="select * from details where id=$id";
    $resultt=mysqli_query($connect,$sq);
  if($resultt){
    while($row=mysqli_fetch_assoc($resultt)){
      $id=$row['id'];
      $event_name=$row['event_name'];
      $start_date=$row['start_date'];
      $end_date=$row['end_date'];
      $seats=$row['seats'];
    
    ?>
    <form method="post">
  <div class="form-group">
    <label>Event Name</label>
    <input type="text" class="form-control" value="<?php echo $event_name;?>" placeholder="" name="event_name" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Start_date</label>
    <input type="date" class="form-control" value="<?php echo $start_date;?>" placeholder="" name="start_date" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>End_date</label>
    <input type="date" class="form-control" value="<?php echo $end_date;?>" placeholder="" name="end_date" required autocomplete="off">
  </div>
  <div class="form-group">
    <label>Seats</label>
    <input type="text" class="form-control" value="<?php echo $seats;?>" placeholder="" name="seats" required autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary"  name="submit">Update</button>
</form>
    <?php
    }
  }
    ?>
    </div>
</div>
</div>
  </body>
</html>
