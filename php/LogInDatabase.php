<?php
    session_Start();

    $con = mysqli_connect('localhost','root','','boredb');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    $sql="SELECT * FROM utilizatori where email='".$_POST["email"]."' and password='".$_POST["password"]."'";
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