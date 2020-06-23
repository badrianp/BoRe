<?php
    session_Start();
    $v = json_decode(stripslashes(file_get_contents("php://input")));
    $email = $v->email;
    $password = $v->password;
    // echo ($email);
    
    $con = mysqli_connect('localhost','root','','boredb');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    $sql="SELECT * FROM utilizatori where email='".$email."' and password='".$password."'";
    $result = mysqli_query($con,$sql);

    if($row = mysqli_fetch_array($result)){
        $_SESSION["email"]=$row["email"];
        echo "You loggen in!";
    }
    else{
        echo "no";
    }
    
    $con->close();

?>