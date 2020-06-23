<?php   
    session_Start();
        // echo('connected!');
        // $titlu=$_POST['titlu'];
        // $autor=$_POST['autor'];
        // $gen=$_POST['gen'];
        $bookid=$_REQUEST['bookID'];
        // echo('parameters collected');
        $con = mysqli_connect('localhost','root','','boredb');
        if (!$con)
        {
            die('Could not connect: ' . mysqli_error($con));
        }

        if(isset($_SESSION["email"]))
        {
            $max=0;
            // echo('isset!');
            $sql="SELECT * FROM utilizatori WHERE email = '".$_SESSION["email"]."'";

            $result = mysqli_query($con,$sql);

            if($row = mysqli_fetch_array($result))
            {
                $userid=$row["userID"];
            }
            
            $sql="SELECT * from citesc;";
            $result = mysqli_query($con,$sql);
            $max=0;$ver=1;
            while($row = mysqli_fetch_array($result))
            {
                if($row['userID'] == $userid and $row['bookID'] == $bookid){
                    $ver=0;
                }    

                if($row["citescID"]>=$max) {
                    $max = $row["citescID"] + 1;
                }
               
            }

            if($ver==1)
            {
                // $max++;
                $sql="INSERT INTO citesc (citescID, userID, bookID) values(".$max.",".$userid.",".$bookid.")";
                if($con->query($sql))
                {
                    echo "Book added to your library!";
                }
                else
                {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }

            }
            else
            {
                echo "This book is in your reading list! ";
            }


        }
        else
        {
            
            echo "no session";
        }
            
    $con->close();
?>

