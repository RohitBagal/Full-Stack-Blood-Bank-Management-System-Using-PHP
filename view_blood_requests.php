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
if (isset( $_POST[''])){
 



  // Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];
    $BLOOD = $_POST["BLOODupdate"];
    $STATUS = $_POST["STATUSupdate"];

  // Sql query to be executed
  $sql = "INSERT INTO `blood_requests` (`title`, `description`,`BLOOD`,`STATUS`) VALUES ('$title', '$description','$BLOOD','$STATUS')";
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


<?php 
if(isset($_POST['snoEdit'])){

   
    $to = $_POST['EMAILupdate']; // this is your Email address
    $from ="rohitbagal.algoexpert@gmail.com" ; // this is the sender's Email address
    $first_name = $_POST['descriptionEdit'];
    
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" ;
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" ;

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    // You can also use header('Location: thank_you.php'); to redirect to another page.
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
  <script src="https://smtpjs.com/v3/smtp.js">
  </script>


  <title>View Blood Requests</title>

</head>

<body>
 

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
        <form action="avilable_blood_samples.php" method="POST">
        
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
              <label for="desc">Full Name</label>
              <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3" ></textarea>
            </div> 
          </div>


          <div class="form-group">
              <label for="desc">Email Adress</label>
              <textarea class="form-control" id="EMAILupdate" name="EMAILupdate" rows="3" ></textarea>
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

  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Blood Request has been sent successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  

  <div class="table-container container-fluid  my-4 ">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">User Name</th>
          <th scope="col">Full Name</th>
          <th scope="col">Gender</th>
          <th scope="col">DOB</th>
          
          <th scope="col">Blood Group</th>
          
          <th scope="col">Email Address</th>
          <th scope="col">Phone</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `blood_requests`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['USERNAME'] . "</td>
            <td>". $row['FULLNAME'] . "</td>
            <td>". $row['GENDER'] . "</td>
            <td>". $row['DOB'] . "</td>
          
            <td>". $row['BLOOD'] . "</td>
            
            <td>". $row['EMAIL'] . "</td>
            <td>". $row['PHONE'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Send Appointment to user</button>  </td>
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
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName("td")[0].innerText;
        description = tr.getElementsByTagName("td")[1].innerText;
        blood = tr.getElementsByTagName("td")[4].innerText;
        email = tr.getElementsByTagName("td")[5].innerText;
        console.log(title, description);

        Email.send({
        Host: "smtp.elasticemail.com",
        Username: "rohitbagal.algoexpert@gmail.com",
        Password: "A556645F23FFB1A7D9FF401949C809CAE2E0",
        To: email,
        From: "rohitbagal.algoexpert@gmail.com",
        Subject: "Regarding To Your Blood Request.",
        Body: "Your Requested Blood is Avilable in our blood bank Please come tomorrow 10 AM To collect the blood",
      })
        .then(function (message) {
          alert("mail sent successfully")
        });

        titleEdit.value = title;
        descriptionEdit.value = description;
        BLOODupdate.value= blood;
        EMAILupdate.value = email;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this note!")) {
          console.log("yes");
          window.location = `add_bood_info.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>
