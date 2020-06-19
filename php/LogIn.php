<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="htmlTitle">Login page</title>
    <link href="../css/login.css" rel="stylesheet">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

</head>
<body>
    <div class="loginDiv" id="loginDiv">
        
        <form action="../php/LogInDatabase.php" onsubmit="return validateForm()" id="div1" class="cardDiv1">

            <p id="welcomeText" class="" id="Item1">Welcome to BoRe!</p>
            <input autofocus value="" type="email" class="labelItem" id="email" name="email" placeholder="email" required>
            <input type="password" class="labelItem" id="password" name="password" placeholder="password" required>
            <button type="submit" id="logInButton" class="button">Login</button>

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

    function validateForm()
    {
        var x=document.forms["div1"]["email"].value;
        if(x==""){
            alert("please enter your email!");
        }
        return;

    }




    $("#div1").submit(function(e)
    {

        e.preventDefault(); 

        if($('input[name="email"]').val()== "" || $('input[name="password"]').val()== "")
        {

            alert("Complete every field!")
            return;

        }

        else
        {

            var form = $(this);
            var url = "LogInDatabase.php";
            
            $.ajax
            ({

                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data)
                {

                    if (data=="no")
                    {

                        alert("Incorrect email or password!");
                        $('input[name="password"]').val("");

                    }else
                    {

                        alert(data);
                        location.replace("Home.php");
                    }

                }

            }); 

        }

    });

</script>

</html>