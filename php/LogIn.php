<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="htmlTitle">Login page</title>
    <link href="../css/loginpage.css" rel="stylesheet">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

</head>
<body>
    <div class="loginDiv" id="loginDiv">
    <!-- action="" method="POST" onsubmit="" -->
        <form  name="div1" id="div1" class="cardDiv1">

            <p id="welcomeText" class="" id="Item1">Welcome to BoRe!</p>
            <input autofocus value="" type="email" class="labelItem" id="email" name="email" placeholder="email" required>
            <input type="password" class="labelItem" id="password" name="password" placeholder="password" required>
            <button type="submit" id="logInButton" class="button" onclick="validateForm()" >Login</button>

        </form>

        <div id="div2" class="cardDiv2">

            <p id="SignUpText">Don't have an account? You can </p>
            <button type="button" id="signUpButton" class="button" onclick="window.location.href='SignUp.php';">Sign Up</button>
            <p id="guestText" >Or you can sign in as a</p>
            <button type="button" id="guestLoginButton" onclick="window.location.href='../php/Home.php';" class="button">guest</button>
        </div>
        
    </div>
    

</body>

<script>

    function validateForm(){

        var form = document.querySelector('form');
        var formEmail = document.getElementById("email").value;
        var formPassword = document.getElementById("password").value;
        var data = JSON.stringify({"email": formEmail, "password": formPassword});
        var xhttp = new XMLHttpRequest();

        xhttp.onreadystatechange = function() {
            // alert("111");
            if (this.readyState == 4 && this.status == 200) 
            {
                // alert ("readystate! ");
                
                if(this.responseText != "no") {      
                    location.replace("../php/Home.php");
                    alert(this.responseText);
                }
                else {
                    alert("Incorrect email or password!");
                    document.location.reload();
                    // alert(this.responseText);
                }
            }
        };
        
        xhttp.open("POST", "LogInDatabase.php", true);
        xhttp.send(data);

    }
    
    

</script>

</html>