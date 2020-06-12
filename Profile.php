<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="profilepage.css">
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
        <button id="myBooks" class="meniuBtn"><img class="buttonImage" src="book.png"></button>
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
                $sql="SELECT * FROM boredb.utilizatori where email='".$_SESSION["email"]."'" ;

                $result = mysqli_query($con,$sql);

                if($row = mysqli_fetch_array($result)){

                    // echo"hello3";

                    $username= $row["username"] ;

                    $email= $row["email"];

                    $telephone= $row["telephone"];

                    $password= $row["password"];

                    echo 
                    "<div class='detailsDiv'>
                    
                        <form class='detailsForm'>

                            <input name='username' type='text' class='updateInfoLabel' id='name'  value=". $username.">
                    
                            <input name='email' type='email' id='email' class='updateInfoLabel' disabled value=".$email.">
                    
                            <input name='telephone' type='text' id='telephone' class='updateInfoLabel' value=" .$telephone .">

                            <input name='password' type='password' id='password1' class='updateInfoLabel' value=".$password.">

                            <button type='submit' class='updateInfoLabel' >Update info</button>

                        </form>
                
                        <button id='logOut'>LogOut</button>
                    
                    </div>";
                
                }
            }
            else    
            {

                // echo"incognito";
                echo "<div id='messageForm'>
                <p id='message'> You are not logged in </p>
                <button type='submit' id='logInButton'onclick="."window.location.href='LogIn.php';"." ><p id='logInButtonText'>LogIn</p> </button>
                </div>";

                    //  this belongs up there in #logInButton 
            }

            $con->close();
        

        ?>

    </body>

    <script>

        $("#home").click
        (
            function(e){
                location.replace("Home.php");
            }
        )

        $("#myBooks").click
        (
            function(e){
                location.replace("MyBooks.php");
            }
        )

        $("#logInButton").click
        (
            function(e){

                location.replace("LogIn.php");
            }
        )

        $(".detailsForm").submit(function(e)
        {

            e.preventDefault(); 

            if($('input[name="telephone"]').val()== "" || $('input[name="password"]').val()== "" || $('input[name="username"]').val() == "" )
            {
                alert("No field can be empty!")
                return;
            }
        
            if($('input[name="password"]').val().length<8)
            {
                alert("Password must contain al least 8 characters length!");
                $('input[name="password"]').val("");
                return;
            }
            else
            {
                var form = $(this);
                var url = "DetailsSave.php";                    
                
                $.ajax
                ({

                    type: "POST",

                    url: url,

                    data: form.serialize(),

                    success: function(data)
                    {
                        if(data == "You just updated your account informations!")
                        {
                            location.replace("Home.php");
                            // alert(data);
                        }
                        else{
                            alert(data);
                        }
                    }
                }); 
            }  
        });

        $("#logOut").click
        (
            function(e)    
            {      

                if (window.XMLHttpRequest)
                {
                    // code for IE7+, Firefox, Chrome, Opera, Safari  
                    xmlhttp = new XMLHttpRequest();
                } 
                else 
                {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        
                }
            
                xmlhttp.open("GET","LogOut.php",true);          
                xmlhttp.send();          
                location.replace("LogIn.php");            
            }    
        )

    </script>


</html>