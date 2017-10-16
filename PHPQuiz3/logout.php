<?php
session_start();   // session start
session_unset();  // session unset =>  empty of session
session_destroy();  //  session destroy =>  broken the session
header('location: index.php');
exit();