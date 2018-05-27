  <?php
  //message vars
  $msg = '';
  $msgClass = ''; 
  //check for submit
  if (filter_has_var(INPUT_POST, 'submit')){
    //get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    //check required fields
    if(!empty($email) && !empty($name) && !empty($message)){
      //passed
      //check email
      if(filter_var($email, FILTER_VALIDATE_EMAIL) ===false){
        //failed
        $msg = 'Please use a valid email address';
        $msgClass = 'alert-danger';
      } else {
        //passed
        //recipient email
        $toEmail = 'Eddie.ark.munoz@gmail.com';
        $subject = 'Contact Request From' .$name; 
        $body = '<h2> Contact Request</h2>
        <h4>Name</h4><p>'.$name.'</p>
        <h4>Email</h4><p>'.$email.'</p>
        <h4>Message</h4><p>'.$message.'</p>
        ';

        //headers
        $headers = "MIME-Version: 1.0" ."\r\n";
        $headers .="Content-Type: text/html;charset=UTF-8" . "\r\n";

        //additional headers
        $headers .= "From: " .$name. "<" .$email.">". "\r\n"; 

        if (mail($toEmail, $subject, $body, $headers)) {
          //email sent message
          $msg = 'Your email has been sent';
          //form clears once email goes through
          $_POST = array();
          //message that email was sent
          $msgClass = 'alert-success';
        } else {
          //Failed
          $msg = 'Your email was not sent';
          $msgClass = 'alert-danger';
        }
      }
    } else {
      //failed
      $msg = 'Please fill in all fields';
      $msgClass = 'alert-danger';
    }
  }
  ?>

  <!DOCTYPE html>
  <html>
  <head>
    <title>Contact</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="contact/contact.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <link rel="shortcut icon" type="images/ico" href="favicon-paint-brush.ico">

  </head>
  <body>

    <!--Homepage link-->   
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="index.html"><img class="avatar" src="images/Originals/avatar.jpg" alt>Mu&ntilde;oz Designs</a>

      <!--Toggle Button-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span></button>

        <!--Navbar links-->
        <div class="collapse navbar-collapse text-center" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <li class="nav-item">
                <a class="nav-link"
                href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link"
                href="portfolio.html">Portfolio</a>
              </li>

              <!--Social Media Icons-->
                    <li class="nav-item">
                <a class="nav-link" href="https://www.instagram.com/eddiearkmunoz/" title="Follow on Instagram" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>

                <li class="nav-item">
                  <a class="nav-link" href="https://www.linkedin.com/in/eddie-munoz-351a9428/" title="Follow on Linkedin" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>

                  <li class="nav-item">
                    <a class="nav-link" href="https://twitter.com/arkadiusart" title="Follow on Twitter" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>

                    <li class="nav-item">
                      <a class="nav-link" href="https://eddiemunoz.deviantart.com/gallery/" title="Follow on Deviant Art" target="_blank"><i class="fa fa-deviantart" aria-hidden="true"></i></a>

                      <li class="nav-item">
                        <a class="nav-link" href="https://www.artstation.com/ed209" title="Follow on ArtStation" target="_blank"><i class="fa fa-paint-brush" aria-hidden="true"></i></a>

                        <li class="nav-item">
                          <a class="nav-link" href="contact.php" title="Email">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                          </ul>
                        </div>
                      </div>
                    </nav>
                    <!--Intro of Contact-->
                    
                    <div class="intro">
                      <h1>Contact</h1>
                      <h4>If you would like to work with me, send me a message!</h4>
                    </div>

                    <!--Contact Form-->

                    <div class="container">

                      <?php if ($msg !=''): ?>

                        <div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>

                      <?php endif; ?>

                      <div class="form-group text-center">
                        <div class="col-sm-12 mx-offset-auto">
                          <div class="well well-sm">
                            <form class="form-horizontal" method="post">

                              <fieldset>

                                <div class="form-group">
                                  <div class="col-md-8 mx-auto">
                                    <div class="input-wrapper">
                                      <input id="fname" name="name" placeholder="Name" type="text" class="form-control" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
                                      <label for="fname" class="fa fa-user input-icon bigicon"></label>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class=" col-md-8 mx-auto">
                                    <div class="input-wrapper">
                                      <input id="email" name="email" type="text" placeholder="Email" class="form-control" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
                                      <label for="email" class="fa fa-envelope-o input-icon bigicon"></label>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class=" col-md-8 mx-auto">
                                    <div class="input-wrapper">
                                      <textarea class="form-control" id="message" name="message" placeholder="Message" rows="3"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                                      <label for="message" class="fa fa-pencil input-icon bigicon"></label>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group text-center">
                                  <div class="col-md-8 mx-auto">
                                    <button type="submit" name="submit" class="btn btn-outline-secondary btn-md">Submit</button>
                                  </div>
                                </div>
                              </fieldset>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

  <div class="copyright">&#169; Mu&ntilde;oz Designs</div>

                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
                  </body>
                  </html>