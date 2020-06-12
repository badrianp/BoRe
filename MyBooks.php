<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books</title>
    <link rel="stylesheet" href="mybooks.css">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

</head>
<body>
    
    <div id="meniuBar" class="meniuBar">

        <div class="tooltipButton">
            <button id="home" class="meniuBtn"><img class="buttonImage" src="home.png"></button>
            <spam class="tooltipInfo">Home</spam>
        </div>

        <input type="search" id="searchBar" class="searchBar" placeholder="search here...">
        
        <div class="meniuDiv">

            <div class="tooltipButton">
                <button id="groups" class="meniuBtn"><img class="buttonImage" src="group.png"></button>
                <spam class="tooltipInfo">My Groups</spam>
            </div>

            <div class="tooltipButton">
                <button id="my books" class="meniuBtn"><img class="buttonImage" src="book.png"></button>
                <spam class="tooltipInfo">My Books</spam>
            </div>

            <div class="tooltipButton">
                <button id="notifications" class="meniuBtn"><img class="buttonImage" src="notification.png"></button>
                <spam class="tooltipInfo">Notifications</spam>
            </div>

            <div class="tooltipButton">
                <button id="profile" class="meniuBtn" onclick="window.location.href='Profile.php';" ><img class="buttonImage" src="user (1).png"></button>
                <spam class="tooltipInfo">Profile</spam>
            </div>
            
        </div>
             
    </div>

    <div class="postCards" id="postCards">
        
        <?php

            $con = mysqli_connect('localhost','root','','boredb');
        
            if (!$con) {
        
                die('Could not connect: ' . mysqli_error($con));
        
            }

            // $id = $_SESSION("userID"); 
            echo"ok1";
            $sql="SELECT * FROM citesc";
            // $sql="SELECT ID FROM utilizatori where ";

            $result = mysqli_query($con,$sql);
            // $result2= mysqli_query($con,$sql2);
            //$max=0;
        
            while($row = mysqli_fetch_array($result)){
        
                //in while => and $max<5
                if($row["userID"]== $_SESSION["userID"] )
                {
                    echo "
                    <div class=postCard id=postCard>
                        
                        <img class=postCard id=postCardImage src=".$row["imagine"]." alt=".$row["titlu"].">
                    
                        <div class=postCard id=postCardContent>
                        
                            <div id='titluautorbuton'>
                                
                                <div class='titluAutor'>
                                    <p id='titlu'>".$row["titlu"]."</p>
                                    <p id='autor'>by ".$row["autor"]." </p>
                                    <p id='gen'>".$row["gen"]."</p>

                                </div>

                               
                            </div>

                            <div id='descriereDiv'>
                                <p id='decriere'>".$row["descriere"]."</p>
                            </div>

                        </div>
                        
                        <button type='button' id='addBook'> <img src='reading.png' id='addBookIcon'></button>

                    </div>"
                ;
                }
        
                

                //$max++;
            }

            $con->close();
        ?>

    </div>

    
    <script>
    
        $("#home").click(
            function(e){
                
                location.replace("Home.php");
            }
        )

        $("#profile").click(
            function(e){
                
                location.replace("Profile.php");
            }
        )
        
        $("#mybooks").click(
            function(e){
                
                location.replace("MyBooks.php");
            }
        )

        $("#addbook").click(
            function(e){
                
            }
        )
        
    </script>

</body>
</html>