<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/profilepage.css">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

    </head>

    <body>
    
        <div id="meniuBar" class="meniuBar">

            <div class="tooltipButton">
                <button id="home" class="meniuBtn" onclick="window.location.href='../php/Home.php';"><img class="buttonImage" src="../images/home.png"></button>
                <spam class="tooltipInfo">Home</spam>
            </div>

            <input type="search" id="searchBar" class="searchBar" placeholder="search here...">

            <div class="meniuDiv">

                <div class="tooltipButton">
                    <button id="groups" class="meniuBtn"><img class="buttonImage" src="../images/group.png"></button>
                    <spam class="tooltipInfo">My Groups</spam>
                </div>

                <div class="tooltipButton">
                    <button id="myBooks" class="meniuBtn" onclick="window.location.href='../php/MyBooks.php';"><img class="buttonImage" src="../images/book.png"></button>
                    <spam class="tooltipInfo">My Books</spam>
                </div>

                <div class="tooltipButton">
                    <button id="notifications" class="meniuBtn" onclick="window.location.href='../php/notifications.php';"><img class="buttonImage" src="../images/notification.png"></button>
                    <spam class="tooltipInfo">Notifications</spam>
                </div>

                <div class="tooltipButton">
                    <button id="profile" class="meniuBtn" onclick="window.location.href='../php/Profile.php';" ><img class="buttonImage" src="../images/user (1).png"></button>
                    <spam class="tooltipInfo">Profile</spam>
                </div>
            
            </div>
        </div>
        <!-- style="display: none;" -->
        <div id="detailsDiv"  class='detailsDiv'>
                    
            <form class='detailsForm'>

                <input name='username' type='text' class='updateInfoLabel' id='name' required >
        
                <input name='email' type='email' id='email' class='updateInfoLabel' disabled required >
        
                <input name='telephone' type='text' id='telephone' class='updateInfoLabel' required >

                <input name='password' minlength="8" type='password' id='password' class='updateInfoLabel' required >

                <button type='submit' class='updateInfoLabel' >Update info</button>

            </form>
    
            <button id='logOut'>LogOut</button>
        
        </div>

        <div id='messageForm'>
            <p id='message'> You are not logged in </p>
            <button type='submit' id='logInButton'onclick="window.location.href='../php/LogIn.php';"><p id='logInButtonText'>LogIn</p> </button>
        </div>

        
        

    </body>

    <script>

        (function (){
            if(window.XMLHttpRequest) {

                xhttp = new XMLHttpRequest();
            } else {
                
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    showDetails(this.responseText);
                }
            };
            xhttp.open("GET", "../php/profileCheck.php", true)
            xhttp.send();

        })();

        function showDetails(details) {
            // alert (details);
            // var x = details;
            if(details == "no") {
                document.getElementById("detailsDiv").style = "display: none;";
            } else {

                document.getElementById("messageForm").style = "display: none;";

                var x = JSON.parse(details);

                document.getElementById("name").value =x["username"] ;
                document.getElementById("telephone").value =x["telephone"] ;
                document.getElementById("email").value =x["email"] ;
                document.getElementById("password").value =x["password"] ;

            }
        }

        
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

        // $("#logOut").click
        // (
        //     function(e)    
        //     {      

        //         if (window.XMLHttpRequest)
        //         {
        //             // code for IE7+, Firefox, Chrome, Opera, Safari  
        //             xmlhttp = new XMLHttpRequest();
        //         } 
        //         else 
        //         {
        //             // code for IE6, IE5
        //             xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        
        //         }
            
        //         xmlhttp.open("GET","../php/LogOut.php",true);          
        //         xmlhttp.send();          
        //         location.replace("../php/LogIn.php");            
        //     }    
        // )

        document.getElementById("logOut").addEventListener("click", logOut);
        function logOut(){
            if(window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.open("GET", "../php/LogOut.php", true)
            xmlhttp.send();
            alert("Logged out!");
            location.reload();
        }

    </script>

    <?php

            // session_Start();

            // // echo "hello";
            // $con = mysqli_connect('localhost','root','','boredb');
            // if (!$con)
            // {
            //     die('Could not connect: ' . mysqli_error($con));
            // }
            // // echo"hello1";

            // if (isset($_SESSION["email"]))
            // {
                
            //     // echo"hello2";
            //     $sql="SELECT * FROM boredb.utilizatori where email='".$_SESSION["email"]."'" ;

            //     $result = mysqli_query($con,$sql);

            //     if($row = mysqli_fetch_array($result)){

            //         // echo"hello3";

            //         $username= $row["username"] ;

            //         $email= $row["email"];

            //         $telephone= $row["telephone"];

            //         $password= $row["password"];

            //         echo 
            //         "<div class='detailsDiv'>
                    
            //             <form class='detailsForm'>

            //                 <input name='username' type='text' class='updateInfoLabel' id='name'  value=". $username.">
                    
            //                 <input name='email' type='email' id='email' class='updateInfoLabel' disabled value=".$email.">
                    
            //                 <input name='telephone' type='text' id='telephone' class='updateInfoLabel' value=" .$telephone .">

            //                 <input name='password' type='password' id='password1' class='updateInfoLabel' value=".$password.">

            //                 <button type='submit' class='updateInfoLabel' >Update info</button>

            //             </form>
                
            //             <button id='logOut'>LogOut</button>
                    
            //         </div>";
                
            //     }
            // }
            // else    
            // {

            //     // echo"incognito";
            //     echo "<div id='messageForm'>
            //     <p id='message'> You are not logged in </p>
            //     <button type='submit' id='logInButton'onclick="."window.location.href='../php/LogIn.php';"." ><p id='logInButtonText'>LogIn</p> </button>
            //     </div>";

            //         //  this belongs up there in #logInButton 
            // }

            // $con->close();
        

        ?>

</html>