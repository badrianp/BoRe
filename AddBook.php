<?php   
    session_Start();
        echo('connected!');
        $titlu=$_POST['titlu'];
        $autor=$_POST['autor'];
        $gen=$_POST['gen'];
        // $bookid=$_POST['bookID'];

        $con = mysqli_connect('localhost','root','','boredb');
        if (!$con)
        {
            die('Could not connect: ' . mysqli_error($con));
        }

        if(isset($_SESSION["email"]))
        {
            $max=0;
            echo('isset!');
            $sql="SELECT * FROM clienti WHERE email = '".$_SESSION["email"]."'";

            $result = mysqli_query($con,$sql);

            if($row = mysqli_fetch_array($result))
            {
                $userid=$row["userID"];
            }

            $sql="SELECT * FROM carti WHERE titlu = '$titlu' , autor='$autor', gen='$gen';";
            $result=mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result))
            {
                // $max++;
                $bookid=$row["bookID"];
            }

            // WHERE userID = ".$userid." and bookID = ".$bookid."
            $sql="SELECT * from citeste;";
            $result = mysqli_query($con,$sql);
            $max=1;$ver=1;
            while($row = mysqli_fetch_array($result))
            {
                if($row['userID'] == $userid and $row['bookID'] == $bookid)
                    $ver=0;
    
                $max++;
            }

            if($ver==1)
            {
                $sql="INSERT INTO 'citesc' ('citescID', 'userID', 'bookID') values(".$max.",".$userid."".$bookid.")";
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
                echo "este in lista!";
            }


        }
        else
        {
            echo "no session!";
        }
            
    $con->close();
?>

