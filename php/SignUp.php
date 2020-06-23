<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SignUp</title>

    <link href="../css/signuppage2.css" rel="stylesheet">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>


</head>

<body>

    <button type="button" id="backBtn" onclick="window.location.href='../php/LogIn.php'"></button>

    <form class="signUp" id="signUpDiv">

        <span id="signUpText" >Sign up to BoRe</span>

        <input name="username" type="text" class="signUpLabel" id="username" required placeholder="name:">

        <input name="email" type="email" id="email" class="signUpLabel" required placeholder="email:">

        <input name="telephone" type="text" id="telephone" class="signUpLabel" required placeholder="telephone number:">

        <input name="password"   type="password" id="password1" class="signUpLabel" required placeholder="set password:">

        <input name="confirm-password" type="password" id="password" class="signUpLabel" required placeholder="confirm password:">

        <p id="termsText">By signing up you agree to our <a id="termsLink" href="termsOfUsage.html">Terms of Use</a></p>

        <button type="requestSubmit" id="signUpButton" onclick="validateForm()"> </button>
        
    </form>

</body>

<script>


    // document.querySelector('form').addEventListener("requestSubmit", validateForm());
        
    function validateForm(){

        var form = document.querySelector('form');
        var formUsername = document.getElementById("username").value;
        var formEmail = document.getElementById("email").value;
        var formTelephone = document.getElementById("telephone").value;
        var formPassword1 = document.getElementById("password1").value;
        var formPassword2 = document.getElementById("password").value;


        if( formUsername == "") {
            // alert ( "Please provide a valid username!" );
            return;
        }
        if( formEmail == "" ) {
            // alert ( "Please provide a valid email address!" );
            return;
        }
        if( formTelephone == "") {
            // alert ( "Please provide a valid telephone number!" );
            return;
        }

        if( formPassword1 == "" ) {
        //    alert ("Please enter a valid password!");
           return;
        }

        if( formPassword2 == "" ) {
        //    alert ("Please enter a valid password!");
           return;
        }

        if( formPassword1 != formPassword2 ) {
           alert ("Passwords don't match!");
           return;
        }

        

        var data = JSON.stringify({"email": formEmail , "username": formUsername , "telephone": formTelephone , "password1": formPassword1 , "password2": formPassword2 });
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            // alert("111");
            if (this.readyState == 4 && this.status == 200) 
            {
                // alert ("readystate! ");
                
                if(this.responseText != "You signed up succesfully!") {      
                    alert(this.responseText);
                    // location.replace("../php/Home.php");
                }
                else {
                    alert(this.responseText);
                    
                    location.replace("../php/Home.php");
                    // document.location.reload();
                    // alert(this.responseText);
                }
            } else {
                // alert (this.readyState + " - - " + this.status);
            }
        };

        xhttp.open("POST", "SignUpDatabase.php", true);
        xhttp.send(data);


    }




    // document.querySelector
    // $("#signUpDiv").submit(function(e)
    // {

    //     e.preventDefault(); 
    //     if($('input[name="password"]').val()!=$('input[name="confirm-password"]').val())
    //     {
    //         alert("Passwords doesn't match!");
    //         // $('input[name="password"]').val("");
    //         $('input[name="confirm-password"]').val("");

    //         return;
    //     }
    //     else
    //     {

    //         var form = $(this);
    //         var url = "SignUpDatabase.php";
            
    //         $.ajax({
    //             type: "POST",
    //             url: url,
    //             data: form.serialize(),
    //             success: function(data)
    //             {
    //                 alert(data);

    //                 if(data == "You signed up succesfully!")
    //                 {
    //                     location.replace("Home.php");
    //                 }
    //             }
    //         }); 
    //     }  
        
    // });    

</script>

</html>