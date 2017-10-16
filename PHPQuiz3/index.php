

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Signin Template for Bootstrap</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

  <!-- Custom styles for this template -->

</head>

<body>
  <?php
  session_start();
  require_once('includes/connpdo.php');
  if (isset($_SESSION['username'])) // if is session already  Register
  {
    header('location: home.php');
  }

  ?>
  <?php
  // Check if User Coming From HTTP Post Request
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Check If User Exist In Database
    $stmt = $con->prepare(" SELECT
      id, name, password,role
      FROM
      user
      WHERE
      name = ?
      AND
      password = ?


      LIMIT 1 " );
      $stmt->execute(array($username,$password));
      $row = $stmt->fetch();
      $count = $stmt->rowCount();
      // If Count > 0 This Mean The Database Contain Record Abut this username
      if ( $count > 0 )
      {
        $_SESSION['username'] = $username;            // Register session name
        $_SESSION['id'] = $row['id'];           // Register session id
        $_SESSION['role'] = $row['role'];
        header('location: home.php');
        exit();
      }
    }

    ?>

    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
          <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="name" class="sr-only">User Name</label>
            <input type="text" id="name" class="form-control" placeholder="User Name" name="name" required  autocomplete="off">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>

        </div>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
  </html>
