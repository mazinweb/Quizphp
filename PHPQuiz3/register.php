<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>
<body>
    <?php

   
    ?>
    <h1 class="text-center">Add Members </h1>
        <div class="container">
            <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
                <!-- username -->
                <div class="form-group">
                    <label class="col-md-2 control-label">User Name</label>
                    <div class="col-md-10">
                        <input type="text" name="name" class="form-control" autocomplete="off" required="required">
                    </div>
                </div>
                <!-- Password -->
                <div class="form-group">
                    <label class="col-md-2 control-label"> Password</label>
                    <div class="col-md-10">
                        <input type="password" name="password" class=" password form-control" autocomplete="off"
                               required="required"> <i class="show-pass  fa fa-eye"></i>

                    </div>
                </div>
            
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <input type="submit" class="btn btn-primary" value="Add">
                    </div>
                </div>

            </form>

        </div>
        <?php
        require_once('includes/connpdo.php');
       
           
            // Get Variable from The From
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $user = $_POST['name'];
            $pass = $_POST['password'];
           
           
                    $stmt = $con->prepare('INSERT INTO user
                                                            (name, password)
                                                            VALUES (:zuser, :zpass )');
                    $row = $stmt->execute(array(
                        'zuser' => $user,
                        'zpass' => $pass,
                    ));
                }
                     ?>
</body>
 <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
</html>