<?php


    session_start();

    $con = mysqli_connect('localhost','root','','boredb');

    if (!$con) {

        die('Could not connect: ' . mysqli_error($con));
    } else {
        // echo "connected";
    }
    // $resp = array();
    $max=0;
    $sql2 = "SELECT * from carti";
    $book = mysqli_query($con, $sql2);
    while($bookRow = mysqli_fetch_array($book, MYSQLI_ASSOC)){
        $resp[]= $bookRow; 
        $max++;
    }
    // echo $resp;
    echo json_encode($resp) ;
        
    $con->close();

?>