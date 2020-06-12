<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SignUp</title>

    <link href="signuppage.css" rel="stylesheet">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>


</head>

<body>

    <form class="signUp" id="signUpDiv">

        <span id="signUpText" >Sign up to BoRe</span>

        <input name="username" type="text" class="signUpLabel" id="name" required placeholder="name:">

        <input name="email" type="email" id="email" class="signUpLabel" placeholder="email:">

        <input name="telephone" type="text" id="telephone" class="signUpLabel" placeholder="telephone number:">

        <input name="password"   type="password" id="password1" class="signUpLabel" placeholder="set password:">

        <input name="confirm-password" type="password" id="password" class="signUpLabel" placeholder="confirm password:">

        <p id="termsText">By signing up you agree to our <a id="termsLink" href="termsOfUsage.html">Terms of Use</a></p>

        <button type="submit" id="signUpButton" > </button>
        
    </form>

</body>

<script>
// document.querySelector
    $("#signUpDiv").submit(function(e)
    {

        e.preventDefault(); 
        if($('input[name="telephone"]').val()== "" || $('input[name="username"]').val()== "" || $('input[name="password"]').val()== "" || $('input[name="confirm-password"]').val()== "" || $('input[name="email"]').val()== "" )
        {
            alert("Please fill all fields!")
            return;
        }

        if($('input[name="password"]').val().length<8)
        {
            alert("Password must contain at least 8 characters");
            $('input[name="password"]').val("");
            $('input[name="confirm-password"]').val("");
            return;
        }
        else if($('input[name="password"]').val()!=$('input[name="confirm-password"]').val())
        {
            alert("Passwords doesn't match!");
            $('input[name="password"]').val("");
            $('input[name="confirm-password"]').val("");

            return;
        }
        else
        {

            var form = $(this);
            var url = "SignUpDatabase.php";
            
            $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function(data)
                {
                    alert(data);

                    if(data == "You signed up succesfully!")
                    {
                        location.replace("Home.php");
                    }
                }
            }); 
        }  
        
    });    

</script>

</html>