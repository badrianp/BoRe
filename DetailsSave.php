<?php
    session_Start();

        $con = mysqli_connect('localhost','root','','boredb');
        
        if (!$con)
        {
            die('Could not connect: ' . mysqli_error($con));
        }


        $sql1="SELECT userID FROM utilizatori WHERE username = '".$_POST["username"]."'";
        $sql2="SELECT userID FROM utilizatori WHERE email = '".$_SESSION["email"]."'";
        
        $result1 = mysqli_query($con,$sql1);
        $result2 = mysqli_query($con,$sql2);
        
        // $row = mysqli_fetch_array($result1);
        $row2 = mysqli_fetch_array($result2);


        if($row = mysqli_fetch_array($result1))
        {
            if($row[0] != $row2[0])
            {
                echo "Username allready in use!";
            }
            else
            {
                $sql="UPDATE utilizatori
            SET username='".$_POST["username"]."',
            telephone='".$_POST["telephone"]."',
            password='".$_POST["password"]."'
            WHERE email='".$_SESSION['email']."'  ";

            if ($con->query($sql) === TRUE) 
            {
                echo "You just updated your account informations!"; 
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            }
        }
        else
        {
            $sql="UPDATE utilizatori
            SET username='".$_POST["username"]."',
            telephone='".$_POST["telephone"]."',
            password='".$_POST["password"]."'
            WHERE email='".$_SESSION['email']."'  ";

            if ($con->query($sql) === TRUE) 
            {
                echo "You just updated your account informations!"; 
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }

        
    
    $con->close();

?>