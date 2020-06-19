<?php
session_Start();
    if(isset($_SESSION["email"]))
    {
        unset( $_SESSION["email"]);

    }
    if(isset($_SESSION["email"]))
    {
        echo "could not disconnect!";

    }
?> 