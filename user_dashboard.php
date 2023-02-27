<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    
}




?>




<?php  
// INSERT INTO `blood_info` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "login";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);


$current_user = $_SESSION['username'];
// echo $current_user;


   
 
          $sql = "SELECT * FROM `users` WHERE `username`='$current_user'";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
           
           $blood_group = $row['BLOOD'];
           $full_name = $row['FULL_NAME'];
           $gender =$row['GENDER'];
           $DOB = $row['DOB'];
           $weight = $row['BODY_WEIGHT'];
           $email = $row['EMAIL'];
           $phone = $row['PHONE'];
        } 



  // echo $blood_group;
  // echo $full_name;
  // echo $gender;
  // echo $DOB;
  // echo $weight;
  // echo $email;
  // echo $phone;


// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `blood_info` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
 



  // Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];
    $BLOOD = $_POST["BLOODupdate"];
    $STATUS = $_POST["STATUSupdate"];
    $FULL_NAME = $full_name;
    $GENDER = $gender;
    $DOB = $DOB;
    $WEIGHT = $weight;
    $EMAIL = $email;
    $PHONE = $phone;

  // Sql query to be executed
  $sql = "INSERT INTO `blood_requests` (`title`,`BLOOD`,`USERNAME`,`FULLNAME`, `DOB`, `GENDER`, `EMAIL`, `PHONE`) VALUES ('$title','$BLOOD','$current_user','$full_name','$DOB','$gender','$email','$phone')";
  // $sql = "UPDATE `blood_info` SET `title` = '$title' , `description` = '$description',`BLOOD` = '$BLOODupdate',`STATUS` = '$STATUSupdate' WHERE `blood_info`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
    $title = $_POST["title"];
    $description = $_POST["description"];
    $BLOOD = $_POST["BLOOD"];
    $STATUS = $_POST["STATUS"];

  // Sql query to be executed
  $sql = "INSERT INTO `blood_info` (`title`, `description`,`BLOOD`,`STATUS`) VALUES ('$title', '$description','$BLOOD','$STATUS')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">


  <title>User Dashboard</title>

</head>

<body>

<!-- <h3 style='color: green; margin-top:20px;'><?php print_r($_SESSION); ?>! You can now use this website</h3> --> 

  <!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Confirm Your Blood Request!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="user_dashboard.php" method="POST">
        
          <div class="modal-body">
            
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">Blood Bank Name </label>
              <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp" d>
            </div>

            <div class="form-group">
							<label class="control-label text-primary" for="BLOODupdate" >Blood Group</label>
						<select id="BLOODupdate" name="BLOODupdate" required class="form-control input-sm" >	
							<option value="">Select Blood</option>
							<option value="A+">A+</option>
							<option value="B+">B+</option>
							<option value="O+">O+</option>
							<option value="AB+">AB+</option>
							<option value="A1+">A1+</option>
							<option value="A2+">A2+</option>
							<option value="A1B+">A1B+</option>
							<option value="A2B+">A2B+</option>
							<option value="A-">A-</option>
							<option value="B-">B-</option>
							<option value="O-">O-</option>
							<option value="AB-">AB-</option>
							<option value="A1-">A1-</option>
							<option value="A2-">A2-</option>
							<option value="A1B">A1B-</option>
							<option value="A2B">A2B-</option>
							<option value="A2B">Bombay o+</option>
							<option value="A2B">Bombay o-</option>
							</select>
						</div>

                        <div class="form-group">
							<label class="control-label text-primary" for="STATUSupdate" >Selecct Status</label>
						<select id="STATUSupdate" name="STATUSupdate" required class="form-control input-sm" >	
							<option value="">Select STATUS</option>
							<option value="AVILABVLE">AVILABVLE</option>
							<option value="UNAVILABLE">UNAVILABLE</option>
							</select>
						</div>

            <div class="form-group">
              <label for="desc">Note Description</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3" ></textarea>
            </div> 
          </div>

          
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Send Blood Request</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  
 


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">


<a class="navbar-brand" href="index.php">Blood Bank System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
              </button>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav">
                                    <li class="nav-item active">
                                      <a class="nav-link" href="index.php">Home <span class="sr-only"></span></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" href="register.php">Register</a>
                                    </li>
                                    
                                   

                          
                        
                        </ul>
</div>
<!-- <a class="btn btn-outline-success" id='login-btn' href="login_dashboard.php" role="button">Login</a>  -->

<a class="btn btn-outline-danger " id='logout-btn' href="logout.php" role="button">Logout</a>






</nav>
<!-- <h3><?php echo "Welcome ". $_SESSION['username']?>! You can now use this website</h3> -->
   
<?php 
          $sql = "SELECT * FROM `users` WHERE `username`='$current_user'";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
           
           $blood_group = $row['BLOOD'];
           $full_name = $row['FULL_NAME'];
           $gender =$row['GENDER'];
           $DOB = $row['DOB'];
           $weight = $row['BODY_WEIGHT'];
           $email = $row['EMAIL'];
           $phone = $row['PHONE'];
        } 
?>

<?php
  // echo $blood_group;
  // echo $full_name;
  // echo $gender;
  // echo $DOB;
  // echo $weight;
  // echo $email;
  // echo $phone;
?>
<?php
  echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Welcome!</strong>You Can send a blood requst.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Important!</strong>You Can send a blood requst for your blood Group, Hence you are visible your blood Group's blood only.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>" ;
  
  ?>
  
  

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Blood Group</th>
          <th scope="col">Status</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        
          $sql = "SELECT * FROM `blood_info` WHERE `BLOOD`='$blood_group' ";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['title'] . "</td>
            <td>". $row['description'] . "</td>
            <td>". $row['BLOOD'] . "</td>
            <td>". $row['STATUS'] . "</td>

            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Request This Blood </button>  </td>

          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

  <?php if ($_SESSION == Array()) {?>
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Important!</strong>You Must Have a Reciver login before submitting the blood Request.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>

  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        window.location = 'login.php';
      })
    })

    
  </script> 
  
  <?php } elseif($_SESSION['role'] == 'reciver') { ?>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        blood = tr.getElementsByTagName("td")[2].innerText;
        status = tr.getElementsByTagName("td")[3].innerText;
        console.log(title, description);

        titleEdit.value = title;
        descriptionEdit.value = description;
        BLOODupdate.value= blood;
        STATUSupdate.value= status;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    
  </script> 

  <?php } else { ?>
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Important!</strong>We Dedected that we are logged in with Hospital account, So logout first and login with Blood Reciver/User account to request blood.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>
    <?php } ?>
  
</body>

</html>
