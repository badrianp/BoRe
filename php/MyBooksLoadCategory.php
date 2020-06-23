<?php

    session_start();
    if($gen = $_REQUEST["gen"]){
        // echo ($gen);
    } else {
        echo ($gen);
    }
    // echo ($gen);

    $con = mysqli_connect('localhost','root','','boredb');

    if (!$con) {

        die('Could not connect: ' . mysqli_error($con));
    } else {
        // echo "connected";
    }

    if(isset($_SESSION["email"])) {

        if($email = $_SESSION["email"]){
            // echo "nothing yet";
            // echo $email;
        }
        // echo $email;
        $sql2 = "SELECT * FROM utilizatori WHERE email ='$email'";
        if($result2 = mysqli_query($con, $sql2)){
            $idrow = mysqli_fetch_array($result2);
            $id = $idrow["userID"];
            // echo $id;
        }

        $sql = "SELECT * FROM citesc where userID ='$id'";
        $result = mysqli_query($con,$sql);

        $resp = array();
        // $result2= mysqli_query($con,$sql2);
        $max=0;
        // echo "hei";
        while($row = mysqli_fetch_array($result)){
            // echo "first id is: ".$row["userID"];
            $sql2 = "SELECT * from carti where bookID =".$row["bookID"];
            $book = mysqli_query($con, $sql2);
            while ($bookRow = mysqli_fetch_array($book, MYSQLI_ASSOC)) {
                
                // echo $bookRow["gen"]. "-> ";
                
                // echo $gen. " ";
                if($gen == "viewAll") {
                    $resp[] = $bookRow; 

                } else if($bookRow["gen"] == $gen) {
                    $resp[] = $bookRow; 

                }
            }
            
        }
        echo json_encode($resp);
    } else {
        echo "not connected";
    }
          
$con->close();
?>
