<?php   
    session_Start();
        // echo('connected!');

        if($bookid = $_REQUEST['bookID']){
            // echo (" bookid = " . $bookid);
        } else {
            // echo ("request is = " . $_REQUEST["bookID"]);
        }

        // if($bookid = $_REQUEST['bookID']) {
        //     echo('parameters collected');
        //     echo($bookid);
        // } else {
        //     echo ('shit'). $_REQUEST['bookID'];
        // }
        $con = mysqli_connect('localhost','root','','boredb');
        if (!$con)
        {
            die('Could not connect: ' . mysqli_error($con));
        }

        if(isset($_SESSION["email"]))
        {
            // $max=0;
            // echo('isset!');
            $sql="SELECT * FROM utilizatori WHERE email = '".$_SESSION["email"]."'";

            $result = mysqli_query($con,$sql);
            $userid = 0;
            if($row = mysqli_fetch_array($result))
            {
                $userid=$row["userID"];
                // echo(" heeei userid= " . $userid . " bookid = " . $bookid);
            } else {
                // echo ($row["userID"]);
            }


            // WHERE userID = ".$userid." and bookID = ".$bookid."
            $sql="SELECT * from citesc;";
            $result = mysqli_query($con,$sql);
            $max=0;$ver=1;
            $citescid = 10;
            while($row = mysqli_fetch_array($result))
            {
                if($row['userID'] == $userid and $row['bookID'] == $bookid){
                    $citescid = $row["citescID"];
                    // echo " citescid = " . $citescid;
                } else {
                    // echo  " userid= " . $row['userID'] .  " bookid= " . $row['bookID'] . "citescid= " . $row['citescID'];
                    // echo $userid . " = userid " . $bookid . " = bookid " . $citescid . " = citescid ";
                    // echo  " userid= " . $userid .  " bookid= " . $bookid . "citescid= " . $citescid;
                    // echo " row[citescID] = " . $row["citescID"];
                }
                // $max++;
            }

            if($ver==1)
            {
                // echo " citescid = " . $citescid;

                $sql1 = "DELETE FROM citesc WHERE citescID = ".$citescid.";";
                
                // $sql="INSERT INTO citesc (citescID, userID, bookID) values(".$max.",".$userid.",".$bookid.")";
                if($con->query($sql1))
                {
                    echo "Book removed from your library!";
                }
                else
                {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }

            }
            else
            {
                echo "nu este in lista!";
            }


        }
        else
        {
            echo "no session!";
        }
            
    $con->close();
?>

