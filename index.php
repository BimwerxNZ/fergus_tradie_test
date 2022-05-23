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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

</head>

<body>

    <div class="jumbotron text-center" style="background:#444 !important;margin-bottom:0; z-index: 200">
        <a href="#">
            <img class="img-responsive center-block" src="img/fergus_l.png" width="5%" height="auto" alt="Fergus">
        </a>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="info.php">Fergus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">My Jobs <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="info.php">Info</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a id="logout" class="nav-link" href="php/logout.php">Log Out</a>
            </form>
        </div>
    </nav>


    <div class="container" id="mbody">

        <div class='card'>

            <h1>My Jobs</h1>

            <hr>

            <div id="accordion1">

                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Clients
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion1">
                        <div class="card-body">
                            <div id="clientdata">

                                <table class="table table-hover" id="ClientTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Tel No</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Notes</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="datatable">
                                        <tr>
                                            <th scope="row">xxx</th>
                                            <td>xxx</td>
                                            <td>xxx</td>
                                            <td>xxx</td>
                                            <td>xxx</td>
                                            <td>xxx</td>
                                            <td><a class="btn btn-success" role="button" onclick="btnAddJob();">Add Job</a><br><a class="btn btn-danger" role="button" onclick="btnDeleteClient();">Delete Client</a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                            <button class="btn btn-success" onclick="showAddClient();" aria-expanded="false" type="button">Add Client</button>
                        </div>
                    </div>
                </div>


            </div>


            <div id="accordion2">

                <div class="card">
                    <div class="card-header" id="headingOne2">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                                My Jobs
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne2" class="collapse show" aria-labelledby="headingOne2" data-parent="#accordion2">
                        <div class="card-body">
                            <input type="text" id="myInput2" onkeyup="xSearchTable2(this);" placeholder="Search for jobs..." title="Type in a client- name">
                            <br>
                            <br>
                            <div id="jobdata">
                                <p>No Jobs to show yet. Click "Add Job" next to a Client to add a new job.</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>




        </div>

    </div>






    <!-- Add Client -->
    <div class="modal fade" id="xAddClient" tabindex="-1" role="dialog" aria-labelledby="xAddClient" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="xAddClient">Add Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Dismiss">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Client Name:</span>
                        </div>
                        <input type="text" id="xclient_name" class="form-control" placeholder="example: Peter Family" aria-label="Name" aria-describedby="basic-addon3">

                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Contact Name:</span>
                        </div>
                        <input type="text" id="xcontact_name" class="form-control" placeholder="example: Peter Pan" aria-label="Name" aria-describedby="basic-addon3">

                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Contact Nr:</span>
                        </div>
                        <input type="text" id="xcontact_nr" class="form-control" placeholder="example: +642111456789" aria-label="Name" aria-describedby="basic-addon3">

                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Address:</span>
                        </div>
                        <input type="text" id="xcontact_address" class="form-control" placeholder="example: 123 Happy Street, Flowerville, Auckland, 0626" aria-label="Name" aria-describedby="basic-addon3">

                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Notes:</span>
                        </div>
                        <input type="text" id="xcontact_notes" class="form-control" placeholder="example: Broken Pipes" aria-label="Name" aria-describedby="basic-addon3">

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                    <button type="button" id="btnAddClient" class="btn btn-primary" data-dismiss="modal" onclick="btnAddClient();">OK</button>
                </div>
            </div>
        </div>
    </div>








    <!-- Add Job -->
    <div class="modal fade" id="xAddJob" tabindex="-1" role="dialog" aria-labelledby="xAddJob" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="xAddJob">Add Job</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Dismiss">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Notes:</span>
                        </div>
                        <input type="text" id="xjob_notes" class="form-control" placeholder="example: Broken Pipe" aria-label="Name" aria-describedby="basic-addon3">

                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Status:</span>
                        </div>
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="ddStatus" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select
                        </button>
                        <div class="dropdown-menu" aria-labelledby="ddStatus">
                            <a class="dropdown-item" onclick="btnStatus('Scheduled');">Scheduled</a>
                            <a class="dropdown-item" onclick="btnStatus('Active');">Active</a>
                            <a class="dropdown-item" onclick="btnStatus('Invoicing');">Invoicing</a>
                            <a class="dropdown-item" onclick="btnStatus('To priced');">To priced</a>
                            <a class="dropdown-item" onclick="btnStatus('Completed');">Completed</a>
                        </div>
                    </div>
                    </div>

                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                    <button type="button" id="btnAddJob" class="btn btn-primary" data-dismiss="modal" onclick="btnAddJob();">OK</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Add Job Note -->
    <div class="modal fade" id="xAddJobNote" tabindex="-1" role="dialog" aria-labelledby="xAddJobNote" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="xAddJobNote">Add Job Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Dismiss">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="input-group">

                        <div class="input-group-prepend">
                            <span class="input-group-text">Note:</span>
                        </div>
                        <input type="text" id="xjob_notes_add" class="form-control" placeholder="example: Broken Pipe" aria-label="Name" aria-describedby="basic-addon3">

                    </div>                  

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                    <button type="button" id="btnAddJobNote" class="btn btn-primary" data-dismiss="modal" onclick="btnAddJobNote();">OK</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Change Job Status -->
    <div class="modal fade" id="xJobStatus" tabindex="-1" role="dialog" aria-labelledby="xJobStatus" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="xJobStatus">Change Job Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Dismiss">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Status:</span>
                        </div>
                        <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="ddStatusChange" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Select
                        </button>
                        <div class="dropdown-menu" aria-labelledby="ddStatusChange">
                            <a class="dropdown-item" onclick="btnStatusChange('Scheduled');">Scheduled</a>
                            <a class="dropdown-item" onclick="btnStatusChange('Active');">Active</a>
                            <a class="dropdown-item" onclick="btnStatusChange('Invoicing');">Invoicing</a>
                            <a class="dropdown-item" onclick="btnStatusChange('To priced');">To priced</a>
                            <a class="dropdown-item" onclick="btnStatusChange('Completed');">Completed</a>
                        </div>
                    </div>
                    </div>

                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Dismiss</button>
                    <button type="button" id="btnAddJob" class="btn btn-primary" data-dismiss="modal" onclick="btnJobStatusChange();">OK</button>
                </div>
            </div>
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

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="js/index.js"></script>

</html>