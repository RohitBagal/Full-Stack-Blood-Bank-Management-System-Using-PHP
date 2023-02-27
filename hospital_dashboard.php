<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    echo "Please Log in first";
    header("location: login_dashboard.php");
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

    <title>Hosital Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
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

<!-- <h3 style='color: green; margin-top:20px;'><?php print_r($_SESSION); ?>! You can now use this website</h3> -->
<hr>

<!-- main content starts here -->
<div style='color: green; margin-top:80px;' class="content">



<?php if ($_SESSION['role'] == 'hospital') {?>
 

      <!-- card 1 -->
            <div class="cards">
                    <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="./img/blood Doner.jpeg" alt="Card image cap">
                                    <div class="card-body">
                                    <h5 class="card-title">View Blood Requests</h5>
                                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                      <a href="view_blood_requests.php" class="btn btn-primary">View</a>
                              </div>
                    </div>

                      <div class="card" style="width: 18rem;">
                              <img class="card-img-top" src="./img/hospitel.jpeg" alt="Card image cap">
                                      <div class="card-body">
                                      <h5 class="card-title">Add Blood Info</h5>
                                      <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="add_bood_info.php" class="btn btn-primary">Add Info</a>
                                </div>
                      </div>



            

            </div>
            <?php }else { ?>
              <div class="card" style="width: 18rem;">
                              <img class="card-img-top" src="./img/hospitel.jpeg" alt="Card image cap">
                                      <div class="card-body">
                                      <h5 class="card-title">Request For The Blood</h5>
                                      <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="add_bood_info.php" class="btn btn-primary">Request For Blood</a>
                                </div>
                      </div>
              <?php } ?>
</div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
