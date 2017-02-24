<!DOCTYPE html>
<!--
    @name: index.php
    @author: Joan Fernández
    @version: 1.0
    @description: Main Page to start the program
    @date: 09/02/17
-->
<?php
    //Showing errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once 'model/ArticleDAO.php';
    
    //Starting session
    session_start();
    
    //unset($_SESSION['articleDAO']);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BioProven Store</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
        <?php
            //Menu nav inclusion
            include "views/topmenu.html";
        ?>
        
        <h2>Welcome to the BioProven Store!</h2>
        
        <?php
            require_once "controllers/MainController.php";
            
            //Intance of the MainController class and calling its method processRequest()
            $control = new MainController();
            $control->processRequest();
        ?>
    </body>
</html>
