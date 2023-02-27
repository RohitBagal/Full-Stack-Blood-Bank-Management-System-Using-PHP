<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blood Bank System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Blood Bank System</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

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
                                              <a class="nav-link" href="register_dashboard.php">Register</a>
                                            </li>
                                            
                                           
        
                                  
                                
                                </ul>
        </div>
        <a class="btn btn-outline-success" id='login-btn' href="login_dashboard.php" role="button">Login</a> 
        
        <a class="btn btn-outline-danger " id='logout-btn' href="logout.php" role="button">Logout</a>
        
        
        
        
        
        
        </nav>

        <main role="main">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="first-slide" src="./img/background.jpg" alt="First slide">
                  <div class="container">
                    <div class="carousel-caption text-left">
                      <h1>Blood Bank System</h1>
                      <p>Welcome to the blood bank</p>
                      <p><a class="btn btn-lg btn-primary" href="register_dashboard.php" role="button">Sign up today</a></p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
                  <div class="container">
                    <div class="carousel-caption">
                      <h1>Blood Donation Camps</h1>
                      <p>Three Times a year we organize blood donation camp</p>
                      <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
                  <div class="container">
                    <div class="carousel-caption text-right">
                      <h1>Become A blood Doner or Blood Reciver</h1>
                      <p>By simply registering you can become a blood doner or blood reciver.</p>
                      <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                    </div>
                  </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#index.php" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#index.php" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
      
      
            <!-- Marketing messaging and featurettes
            ================================================== -->
            <!-- Wrap the rest of the page in another container to center all the content. -->
      
            <div class="container marketing">
      
              <!-- Three columns of text below the carousel -->
              <div class="row">
                <div class="col-lg-4">
                  <img class="rounded-circle" src="./img/blood samples.jpg" alt="Generic placeholder image" width="140" height="140">
                  <h2>See Avilable Blood Samples</h2>
                  <p>By navigating this page we are able to view all avilable blood samples. And also we are able to request a blood samples from list of avilable samples</p>
                  <p><a class="btn btn-secondary" href="avilable_blood_samples.php" role="button">View Blood Samples</a></p>
                </div><!-- /.col-lg-4 -->
               
               
                <div class="col-lg-4">
                  <img class="rounded-circle" src="./img/blood Doner.jpeg" alt="Generic placeholder image" width="140" height="140">
                  <h2>Resister as a blood Doner or Blood Reciver</h2>
                  <p>By navigating this page you are able to register as a blood doner or a blood reciver </p>
                  <p><a class="btn btn-secondary" href="register.php" role="button">Register</a></p>
                </div><!-- /.col-lg-4 -->
               
               
                <div class="col-lg-4">
                  <img class="rounded-circle" src="./img/hospitel.jpeg" alt="Generic placeholder image" width="140" height="140">
                  <h2>Register as a new Hospital</h2>
                  <p>By navigating this page you are able to register as a new hospital. Hospitals can store the blood and also they can suppy blood to needy peoples.</p>
                  <p><a class="btn btn-secondary" href="new_hospital.php" role="button">Register</a></p>
                </div><!-- /.col-lg-4 -->
              </div><!-- /.row -->
      
      
              <!-- START THE FEATURETTES -->
      
              <hr class="featurette-divider">
      
              <div class="row featurette">
                <div class="col-md-7">
                  <h2 class="featurette-heading">Why should people donate blood?</span></h2>
                  <p class="lead">WHO Says, Safe blood saves lives. Blood is needed by women with complications during pregnancy and childbirth, children with severe anaemia, often resulting from malaria or malnutrition, accident victims and surgical and cancer patients.</p>
                </div>
                <div class="col-md-5">
                  <img class="featurette-image img-fluid mx-auto main-content-img" src="./img/patient.jpeg" alt="Generic placeholder image">
                </div>
              </div>
      
              <hr class="featurette-divider">
      
              <div class="row featurette">
                <div class="col-md-7 order-md-2">
                  <h2 class="featurette-heading">Advantages of blood Donation</span></h2>
                  <p class="lead">A healthier heart and vascular system
                  Regular blood donation is linked to lower blood pressure and a lower risk for heart attacks. “It definitely helps to reduce cardiovascular risk factors,” says DeSimone.</p>
                </div>
                <div class="col-md-5 order-md-1">
                  <img class="featurette-image img-fluid mx-auto main-content-img" src="./img/During Blood Donation.jpg" alt="Generic placeholder image">
                </div>
              </div>
      
              <hr class="featurette-divider">
      
              <div class="row featurette">
                <div class="col-md-7">
                  <h2 class="featurette-heading">Gift After Blood Donation </span></h2>
                  <p class="lead">After Donating the blood you will recive an amazing gift from us.</p>
                </div>
                <div class="col-md-5">
                  <img class="featurette-image img-fluid mx-auto main-content-img" src="./img/gift.jpg" alt="Generic placeholder image">
                </div>
              </div>
      
              <hr class="featurette-divider">
      
              <!-- /END THE FEATURETTES -->
      
            </div><!-- /.container -->
      
      
            <!-- FOOTER -->
            <footer class="container">
              <p class="float-right"><a href="#">Back to top</a></p>
              <p>&copy; 2023 Made By ROHIT RAVINDRAKUMAR BAGAL</p>
            </footer>
          </main>

           <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>