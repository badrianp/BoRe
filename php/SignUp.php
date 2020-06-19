<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SignUp</title>

    <link href="../css/signuppage.css" rel="stylesheet">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>


</head>

<body>

    <form class="signUp" id="signUpDiv">

        <span id="signUpText" >Sign up to BoRe</span>

        <input name="username" type="text" class="signUpLabel" id="name" required placeholder="name:">

        <input name="email" type="email" id="email" class="signUpLabel" required placeholder="email:">

        <input name="telephone" type="text" id="telephone" class="signUpLabel" required placeholder="telephone number:">

        <input name="password"   type="password" id="password1" class="signUpLabel" required placeholder="set password:">

        <input name="confirm-password" type="password" id="password" class="signUpLabel" required placeholder="confirm password:">

        <p id="termsText">By signing up you agree to our <a id="termsLink" href="termsOfUsage.html">Terms of Use</a></p>

        <button type="submit" id="signUpButton" > </button>
        
    </form>

</body>

<script>
// document.querySelector
    $("#signUpDiv").submit(function(e)
    {

        e.preventDefault(); 
        if($('input[name="password"]').val()!=$('input[name="confirm-password"]').val())
        {
            alert("Passwords doesn't match!");
            // $('input[name="password"]').val("");
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