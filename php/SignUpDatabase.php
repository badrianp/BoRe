<?php
    session_Start();
    $v = json_decode(stripslashes(file_get_contents("php://input")));
    $email = $v->email;
    $password = $v->password1;
    $username = $v->username;
    $telephone = $v->telephone;

    $con = mysqli_connect('localhost','root','','boredb');
    if (!$con)
    {
        die('Could not connect: ' . mysqli_error($con));
    }

    $sql="SELECT max(userID) FROM utilizatori";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result))
    {
        $max=$row[0]+1;
    }

    $sql="SELECT userID FROM utilizatori WHERE email = '".$email."'";
    $sql1="SELECT userID FROM utilizatori WHERE username = '".$username."'";
    $result = mysqli_query($con,$sql);
    $result1 = mysqli_query($con,$sql1);

    if($row = mysqli_fetch_array($result1))
    {
        if($row[0]!=0)
        {
            echo "Username allready in use!";
        }
    } 
    else if($row = mysqli_fetch_array($result))
    {
        if($row[0]!=0)
        {
            echo "Email allready in use!";
        }

    }
    else
    {

        $sql="INSERT INTO utilizatori (`userID`,`username`, `email`, `password`, `telephone`) 
                VALUES (".$max.",'".$username."',
                        '".$email."',
                        '".$password."',
                        '".$telephone."')";

        if ($con->query($sql) === TRUE) 
        {
            echo "You signed up succesfully!";
            $_SESSION["email"]=$email;
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    $con->close();
    

?>