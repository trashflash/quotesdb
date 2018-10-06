<?php
session_start();
// Destroys all sessions.
if(session_destroy())
{
// Redirecting To Log-In
    header("Location: login.php");
}