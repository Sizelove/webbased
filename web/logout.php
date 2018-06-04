<?php
session_start(); // Ensure session is not null
if(session_destroy()) // End session
{
header("Location: Tabbed.php"); // Login
}
?>

