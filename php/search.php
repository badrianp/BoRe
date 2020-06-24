
<?php

session_start();

    if($text = $_REQUEST["text"]){
        // echo ($text)." collected!";
    } else {
        // echo ($text);
    }
    // echo ($text);

    $con = mysqli_connect('localhost','root','','boredb');

        if (!$con) {

            die('Could not connect: ' . mysqli_error($con));
        } else {
            // echo "connected";
        }
        // $resp = "";
        $res = 0;
        $sql2 = "SELECT * from carti where  autor like '%".$text."%' ;";
        $book2 = mysqli_query($con, $sql2);
        $sql1 = "SELECT * from carti where titlu like '%".$text."%' ;";
        $book1 = mysqli_query($con , $sql1);
        $sql3 = "SELECT * from carti where descriere like '".$text."%' ;";
        $book3 = mysqli_query($con , $sql3);
        $sql5 = "SELECT * from carti where  autor like '%".$text."%' ;";
        $book5 = mysqli_query($con, $sql5);
        $sql4 = "SELECT * from carti where titlu like '%".$text."%' ;";
        $book4 = mysqli_query($con , $sql4);
        $sql6 = "SELECT * from carti where descriere like '%".$text."%' ;";
        $book6 = mysqli_query($con , $sql6);

        while($res < 5 and $bookRow1 = mysqli_fetch_array($book1, MYSQLI_ASSOC)){


            $resp[] = $bookRow1; 
            $bookid[$res] = $bookRow1["bookID"];
            $res++;
            // $seen = "false";

            // for($i=0;$i<$res;$i++){
            //     if($bookid[$i] == $bookRow1["bookID"]) {
            //         $seen = "true";
            //     }

            // }
            // if(!$seen) {
            //     $resp[] = $bookRow1; 
            //     $bookid[$res] = $bookRow1["bookID"];
            //     $res++;
            // }
            

        }

        while($res < 5 and $bookRow2 = mysqli_fetch_array($book2, MYSQLI_ASSOC)){
            
            $resp[] = $bookRow2; 
            $bookid[$res] = $bookRow2["bookID"];
            $res++;
            // $seen = "false";

            // for($i=0;$i<$res;$i++){
            //     if($bookid[$i]==$bookRow2["bookID"]) {
            //         $seen = "true";
            //     }

            // }
            // if(!$seen) {
            //     $resp[] = $bookRow2; 
            //     $bookid[$res] = $bookRow2["bookID"];
            //     $res++;
            // }
            

        }

        // while($res < 5 and $bookRow3 = mysqli_fetch_array($book3, MYSQLI_ASSOC)){

        //     $seen = "false";

        //     for($i=0;$i<$res;$i++){
        //         if($bookid[$i]==$bookRow3["bookID"]) {
        //             $seen = "true";
        //         }

        //     }
        //     if(!$seen) {
        //         $resp[] = $bookRow3; 
        //         $bookid[$res++] = $bookRow3["bookID"];
        //     }
            
        // }

        // if(!$res) {
                


        //     while( $res < 5 and $bookRow4 = mysqli_fetch_array($book4, MYSQLI_ASSOC)){

        //         $seen = "false";

        //         for($i=0;$i<$res;$i++){
        //             if($bookid[$i]==$bookRow4["bookID"]) {
        //                 $seen = "true";
        //             }
    
        //         }
        //         if(!$seen) {
        //             $resp[] = $bookRow4; 
        //             $bookid[$res++] = $bookRow4["bookID"];
        //         }
                
    
        //     }
    
        //     while($res < 5 and $bookRow5 = mysqli_fetch_array($book5, MYSQLI_ASSOC)){
    
        //         $seen = "false";

        //         for($i=0;$i<$res;$i++){
        //             if($bookid[$i]==$bookRow5["bookID"]) {
        //                 $seen = "true";
        //             }
    
        //         }
        //         if(!$seen) {
        //             $resp[] = $bookRow5; 
        //             $bookid[$res++] = $bookRow5["bookID"];
        //         }
                
        //     }
            
        //     while($res < 5 and $bookRow6 = mysqli_fetch_array($book6, MYSQLI_ASSOC)){
    
        //         $seen = "false";

        //         for($i=0;$i<$res;$i++){
        //             if($bookid[$i]==$bookRow6["bookID"]) {
        //                 $seen = "true";
        //             }
    
        //         }
        //         if(!$seen) {
        //             $resp[] = $bookRow6; 
        //             $bookid[$res++] = $bookRow6["bookID"];
        //         }
                
        //     }

        // }

        // echo json_encode($resp);

        if($res > 0){
            echo json_encode($resp);
        } else{
            echo "No matches found!";
        }
        
        
    $con->close();

?>