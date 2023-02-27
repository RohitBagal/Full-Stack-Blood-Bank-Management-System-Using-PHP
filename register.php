<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}

// $sql="
// INSERT INTO users 
// (NAME, FATHER_NAME, GENDER, DOB, BLOOD, BODY_WEIGHT)
//  VALUES 
//  ('{$_POST["NAME"]}', '{$_POST["FATHER_NAME"]}', '{$_POST["GENDER"]}', '{$_POST["DOB"]}', '{$_POST["BLOOD"]}', '{$_POST["BODY_WEIGHT"]}');";

 
// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{

 
    $sql = "INSERT INTO users (username, password,FULL_NAME,  GENDER, DOB, BLOOD, BODY_WEIGHT,EMAIL,PHONE) VALUES (?, ?,'{$_POST["FULL_NAME"]}', '{$_POST["GENDER"]}', '{$_POST["DOB"]}', '{$_POST["BLOOD"]}', '{$_POST["BODY_WEIGHT"]}','{$_POST["EMAIL"]}','{$_POST["PHONE"]}')";

    // $sql = "INSERT INTO users (username, password,FULL_NAME,  GENDER, DOB, BLOOD, BODY_WEIGHT) VALUES (?, ?,'{$_POST["FULL_NAME"]}', '{$_POST["GENDER"]}', '{$_POST["DOB"]}', '{$_POST["BLOOD"]}', '{$_POST["BODY_WEIGHT"]}')";

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Inserting records by firing query
        

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Blood Bank</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Blood Bank System</a>
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
</nav>

<div class="container mt-4">
<h3>Please Register Here:</h3>
<hr>
<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">

    <!-- Enamil -->
      <label for="inputEmail4">Username</label>
      <input type="text" class="form-control" name="username" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
  </div>

  <!-- Password -->
  <div class="form-group">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
  </div>



  <!-- Extra data -->
  <div class="form-group">
							<label class="control-label text-primary" for="FULL_NAME" >FULL_NAME</label>
							<input type="text" placeholder="Full Name" id="FULL_NAME" name="FULL_NAME"  required class="form-control input-sm">
						</div>
						
						
						<div class="form-group">
							<label class="control-label text-primary"  for="GENDER">Gender</label>
								<select id="gen" name="GENDER" required class="form-control input-sm">
									<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Thirunangai">Thirunangai</option>
									<option value="Thirunambi">Thirunambi</option>
								</select>
						</div>
						
						<div class="form-group">
							<label class="control-label text-primary" for="DOB">D.O.B</label>
							<input type="text"  placeholder="YYYY/MM/DD" required id="DOB" name="DOB"  class="form-control input-sm DATES">
						</div>
						
						
						<div class="form-group">
							<label class="control-label text-primary" for="BLOOD" >Blood Group</label>
						<select id="blood" name="BLOOD" required class="form-control input-sm">	
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
							<label class="control-label text-primary" for="BODY_WEIGHT" >Body Weight</label>
							<input type="text" required placeholder="Weight In Kgs"  name="BODY_WEIGHT" id="BODY_WEIGHT" class="form-control input-sm">
						</div>


            <!-- <div class="form-group">
							<label class="control-label text-primary" for="EMAIL" >Enter Email Id</label>
							<input type="text" placeholder="Enter Email Id" id="EMAIL" name="EMAIL"  required class="form-control input-sm">
						</div>

            <div class="form-group">
							<label class="control-label text-primary" for="PHONE" >Enter Phone</label>
							<input type="text" placeholder="Enter phone" id="EMAIL" name="PHONE"  required class="form-control input-sm">
						</div> -->



                        <div class="form-group">
                <label for="exampleInputEmail1">Enter Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="EMAIL" for="EMAIL" id="EMAIL">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>

                          <div class="form-group">
                <label for="exampleInputEmail1">Enter Mobile Number</label>
                <input type="tel" class="form-control"  placeholder="Enter Mobile Number" maxlength="12" name="PHONE" for="PHONE" id="PHONE">
                <small id="emailHelp" class="form-text text-muted">We'll never share your Mobile Number with anyone else.</small>
              </div>
  
  
  <button type="submit" class="btn btn-primary register-btn">Register</button>
</div>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
