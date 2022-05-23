<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: php/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fergus | Tradie Jobs</title>
    <meta name="title" content="Fergus">
    <meta name="description" content="Sample web tool to display tradie jobs - by Chris Vorster (May 2022)">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/fergus.css">
    
</head>

<body>

    <div class="jumbotron text-center" style="background:#444 !important;margin-bottom:0; z-index: 200">
        <a href="#">
            <img class="img-responsive center-block" src="img/fergus_l.png" width="5%" height="auto" alt="Fergus">
        </a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="#">Fergus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">My Jobs</a>
                </li>                
                <li class="nav-item active">
                <a class="nav-link" href="#">Info <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">                
                <a id="logout" class="nav-link" href="php/logout.php">Log Out</a>
            </form>
        </div>
    </nav>


    <div class="container" id="mbody">

        <div class='card'>

            <h1>Fergus Practical Test Project</h1>

            <hr>

            <h2>Features</h2>

            <ul>
                <li>
                    Sign Up + Sign In system
                </li>
                <li>
                    Record new clients
                </li>
                <li>
                    Record new jobs
                </li>
                <li>
                    Display clients in filtered list (data table)
                </li>
                <li>
                    Display jobs as "cards" with filter option
                </li>
                <li>
                    Unique identifiers for jobs
                </li>
                <li>
                    "scheduled", "active", "invoicing", “to priced” or “completed” status options for jobs
                </li>
                <li>
                    Job creation date shown
                </li>
                <li>
                    Client info and contact details (and more) in clients table
                </li>
            </ul>

            <hr>

            <h2>Limitations</h2>

            <ul>
                <li>
                    Not extensively bug-tested
                </li>
                <li>
                    Job cards not displayed in grid properly (can be fixed easily, require a bit more time)
                </li>
                <li>
                    Job status change could be improved, bit more time required
                </li>
            </ul>

            <hr>

            <h2>Summary</h2>
            <p>Created by Chris Vorster on 23/05/2022, using Visual Studio Code with HTML, CSS, JS, PHP and XAMPP.</p>
            <p>Approx 3 hours total development time, could be improved given more time.</p>
            <p>Using bootstrap 4, JQuery, and some other resources for data tables.</p>

        </div>
        
    </div>




    <footer class="footer">
        <div class="fixed-bottom">
            <div class="container text-center">
                <small class="text-muted" id="xcopyr">Copyright &copy; Chris Vorster - 2022</small>
            </div>
        </div>
    </footer>


</body>


<script>
    $(document).ready(function() {
        
        document.getElementById('xcopyr').innerHTML = "Copyright &copy; Chris Vorster - " + new Date().getFullYear();

    });

</script>

</html>