<?php

    session_Start();

    // echo "hello";
    $con = mysqli_connect('localhost','root','','boredb');
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }
    // echo"hello1";

    if (isset($_SESSION["email"]))
    {
        // echo"hello2";
        $sql="SELECT * FROM utilizatori where email='".$_SESSION["email"]."'" ;

        $result = mysqli_query($con,$sql);

        if($row = mysqli_fetch_array($result)){

            // echo"hello3";
            $details = $row;

            echo json_encode($details);
        
        }
    }
    else    
    {

        // echo"incognito";
        echo "no";

            //  this belongs up there in #logInButton 
    }

    $con->close();
        

?>