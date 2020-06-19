<?php
session_Start();

    if(isset($_SESSION["username"]))
    {
        unset( $_SESSION["username"]);
    }
?> 