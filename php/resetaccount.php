<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fergus | Reset Account</title>
    <meta name="title" content="Fergus">
    <meta name="description" content="Sample web tool to display tradie jobs - by Chris Vorster (May 2022)">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="../image/png" sizes="32x32" href="../img/favicon-32x32.png">
    <link rel="icon" type="../image/png" sizes="16x16" href="../img/favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/fergus.css">

</head>

<body>

    <div class="jumbotron text-center" style="background:#444 !important;margin-bottom:0; z-index: 200">
        <a href="#">
            <img class="img-responsive center-block" src="../img/fergus_l.png" width="5%" height="auto" alt="Fergus">
        </a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="../info.php">Fergus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Password Reset <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Back</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a id="logout" class="nav-link" href="login.php">Log In</a>
            </form>
        </div>
    </nav>




    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-md-auto">

                <h2>Reset your account password:</h2>
                <p>Please provide the following information:</p>

                <label>Email</label>
                <input id="usr" type="text" name="username" class="form-control" placeholder="Enter email address here..."><br>

                <button class='btn btn-danger' id="btnuser" onclick='sendInstructions();'>Reset</button>

                <br>
                <p>We will send account reset instructions to your email address.</p>

            </div>

        </div>
    </div>



    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
        <div class="fixed-bottom">
            <div class="container text-center">
                <small>Copyright &copy; Chris Vorster - 2022</small><br>
            </div>
        </div>
    </footer>


    <script>
        function sendInstructions() {

            var xxuser = document.getElementById("usr").value;

            $.post("./getid.php", {
                    xuser: xxuser
                },
                function(data) {

                    if (data.length == "") {
                        alert("No user account found with this email address");
                    } else {

                        var xxid = data;
                        var xxtitle = "Account Password Reset";
                        var xxmess = "Click on the following link to reset your password: \n\nhttps://cumulusgate.com/php/altlogin.php?xuser=" + xxuser + "&xid=" + xxid;

                        $.post("./sendmessage.php", {
                                xemail: xxuser,
                                xtitle: xxtitle,
                                xmsg: xxmess
                            },
                            function(data) {
                                if (data == "Error occured") {
                                    alert(errormsg);
                                } else {
                                    if (data == "Message sent") {
                                        window.location.href = 'resetsuccess.php';
                                    } else {
                                        alert("Something went wrong.");
                                    }
                                }


                            }
                        );

                    }

                }
            );

        }
    </script>


</body>

</html>