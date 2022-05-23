var dtable_c;
    var arrclients = [];

    $(document).ready(function() {

        document.getElementById('xcopyr').innerHTML = "Copyright &copy; Chris Vorster - " + new Date().getFullYear();

        $.post("./php/guid.php", {}, function(data) {

            //Get the clients:
            
            $.post("./php/get_allclients.php", {
                id: data
            }, function(data1) {


                var htmlTable = "";

                if (data1.includes("|")) {

                    var arrDatL1 = data1.split("|");
                    var intL1 = arrDatL1.length;

                    for (var i = 0; i < intL1; i++) {

                        var arrDat2 = arrDatL1[i].split("*");

                        htmlTable = htmlTable + '<tr><th scope="row">' + arrDat2[0] + '</th>' +
                            '<td>' + arrDat2[1] + '</td>' +
                            '<td>' + arrDat2[2] + '</td>' +
                            '<td>' + arrDat2[3] + '</td>' +
                            '<td>' + arrDat2[4] + '</td>' +
                            '<td>' + arrDat2[5] + '</td>' +
                            '<td>' + '<a class="btn btn-success" id="' + 'btnaddjob' + arrDat2[0] + '" role="button" onclick="showAddJob(this);">Add Job</a><br><a class="btn btn-danger id="delclient' + arrDat2[0] + '" role="button" onclick="btnDelClient(this);">Delete Client</a>' + '</td>'
                        '</div>' +
                        '</td>' +

                        '</tr>';

                        var t_client = {
                            name: arrDat2[1],
                            id: arrDat2[0]
                        }

                        arrclients.push(t_client);

                    }

                } else {


                    var arrDat2 = data1.split("*");

                    htmlTable = htmlTable + '<tr><th scope="row">' + arrDat2[0] + '</th>' +
                        '<td>' + arrDat2[1] + '</td>' +
                        '<td>' + arrDat2[2] + '</td>' +
                        '<td>' + arrDat2[3] + '</td>' +
                        '<td>' + arrDat2[4] + '</td>' +
                        '<td>' + arrDat2[5] + '</td>' +
                        '<td>' + '<a class="btn btn-success" id="' + 'btnaddjob' + arrDat2[0] + '" role="button" onclick="showAddJob(this);">Add Job</a><br><a class="btn btn-danger id="delclient' + arrDat2[0] + '" role="button" onclick="btnDelClient(this);">Delete Client</a>' + '</td>'
                    '</div>' +
                    '</td>' +

                    '</tr>';

                    var t_client = {
                        name: arrDat2[1],
                        id: arrDat2[0]
                    }

                    arrclients.push(t_client);

                }

                document.getElementById("datatable").innerHTML = htmlTable;



                dtable_c = $('#ClientTable').DataTable({
                    "pagingType": "full_numbers",
                    "order": [
                        [
                            0, "asc"
                        ]
                    ],
                    "lengthMenu": [
                        [
                            10,
                            25,
                            50,
                            100,
                            200,
                            -1
                        ],
                        [
                            10,
                            25,
                            50,
                            100,
                            200,
                            "All"
                        ]
                    ]
                });


                //Get the jobs:

                $.post("./php/get_jobs.php", {
                    id: data
                }, function(data2) {

                    var strCard = "";

                    if (data2.includes("|")) {

                        var arrDatL2 = data2.split("|");
                        var intL2 = arrDatL2.length;

                        for (var i = 0; i < intL2; i++) {

                            var arrDat4 = arrDatL2[i].split("*");

                            var iCo = arrclients.length;
                            var companyname = "";

                            for (var j = 0; j < iCo; j++) {
                                if (arrclients[j].id == arrDat4[2]) {
                                    companyname = arrclients[j].name;
                                }
                            }

                            var strNotes = "";

                            if(arrDat4[3].includes("^")) {

                                var arrDatn = arrDat4[3].split("^");
                                var inotes = arrDatn.length;

                                for (var k = 0; k < inotes; k++) {
                                    if(k == 0) {
                                        strNotes = arrDatn[k];
                                    } else {
                                        strNotes = strNotes + "<br>" + arrDatn[k];
                                    }
                                }
                                
                            } else {
                                strNotes = arrDat4[3];
                            }


                            strCard = strCard + '<div class="pcard" id="pc' + i + '">' +
                                '<img src="img/android-chrome-512x512.png" alt="fergus" style="width:100%">' +
                                '<h4>Client:' + companyname + '|' + arrDat4[0] + '</h4>' +
                                '<h5>Date: ' + arrDat4[1] + '</h5>' +
                                '<hr><h5><b>Notes:</b><br>' + strNotes + '</h5><hr>' +
                                '<h5>Status: ' + arrDat4[4] + '</h5>' +
                                '<p><button class="btn btn-danger btn-block" id="deljob' + arrDat4[0] + '" onclick="btnDelJob(this);">Delete</button><button class="btn btn-primary btn-block" id="addjobnote' + arrDat4[0] + '" onclick="showAddJobNote(this);">Add Note</button>' + 
                                '<button class="btn btn-primary btn-block" id="updatestatus' + arrDat4[0] + '" onclick="showJobStatusChange(this);">Change Status</button></p>' +
                                '</div>';                               

                        }

                    } else {
                        
                        var arrDat4 = data2.split("*");

                        var iCo = arrclients.length;
                        var companyname = "";

                        for (var j = 0; j < iCo; j++) {
                            if (arrclients[j].id == arrDat4[2]) {
                                companyname = arrclients[j].name;
                            }
                        }

                        var strNotes = "";

                        if(arrDat4[3].includes("^")) {

                            var arrDatn = arrDat4[3].split("^");
                            var inotes = arrDatn.length;

                            for (var k = 0; k < inotes; k++) {
                                if(k == 0) {
                                    strNotes = arrDatn[k];
                                } else {
                                    strNotes = strNotes + "<br>" + arrDatn[k];
                                }
                            }
                                
                        } else {
                            strNotes = arrDat4[3];
                        }

                        strCard = strCard + '<div class="pcard" id="pc' + i + '">' +
                            '<img src="img/android-chrome-512x512.png" alt="fergus" style="width:100%">' +
                            '<h4>Client:' + companyname + '|' + arrDat4[0] + '</h4>' +
                            '<h5>Date: ' + arrDat4[1] + '</h5>' +
                            '<hr><h5><b>Notes:</b><br>' + strNotes + '</h5><hr>' +
                            '<h5>Status: ' + arrDat4[4] + '</h5>' +
                            '<p><button class="btn btn-danger btn-block" id="deljob' + arrDat4[0] + '" onclick="btnDelJob(this);">Delete</button><button class="btn btn-primary btn-block" id="addjobnote' + arrDat4[0] + '" onclick="showAddJobNote(this);">Add Note</button>' + 
                            '<button class="btn btn-primary btn-block" id="updatestatus' + arrDat4[0] + '" onclick="showJobStatusChange(this);">Change Status</button></p>' +                            '</div>';

                    }

                    document.getElementById("jobdata").innerHTML = strCard;

                });


            });



        });





    });


    function xSearchTable2(el) {

        var searchSTR = el.value.toUpperCase();

        var slides = document.getElementsByClassName("pcard");

        for (var i = 0; i < slides.length; i++) {

            var arrRaw = slides[i].innerText.split("|");

            if (arrRaw[0].toUpperCase().includes(searchSTR) == false) {
                slides[i].style.display = "none";
            } else {
                slides[i].style.display = "block";
            }
        }


    }


    function showAddClient() {
        $("#xAddClient").modal();
    }

    function btnAddClient() {

        $.post("./php/add_client.php", {
            xdate: (new Date()).toLocaleDateString('en-NZ'),
            xname: document.getElementById("xclient_name").value,
            xcontact: document.getElementById("xcontact_name").value,
            xtelno: document.getElementById("xcontact_nr").value,
            xaddress: document.getElementById("xcontact_address").value,
            xnotes: document.getElementById("xcontact_notes").value
            }, function(data2) {
                
        });

        window.location.href = "index.php";

    }

    var tempid;

    function showAddJob(btn) {
        tempid = btn.id.replace("btnaddjob","");        
        $("#xAddJob").modal();
    }

    function btnAddJob() {

        if(document.getElementById("ddStatus").innerText == "Select") {
            alert("Specify Status please");
            return;
        }

        $.post("./php/add_job.php", {
            xdate: (new Date()).toLocaleDateString('en-NZ'),
            xclientid: tempid,           
            xnotes: document.getElementById("xjob_notes").value,
            xstatus: document.getElementById("ddStatus").innerText
            }, function(data2) {
                
        });

        window.location.href = "index.php";

    }

    

    function showAddJobNote(btn) {
        tempid = btn.id.replace("addjobnote","");        
        $("#xAddJobNote").modal();        
    }

    function btnAddJobNote() {
        
        $.post("./php/add_jobnote.php", {
            xjobid: tempid,
            xnote: document.getElementById("xjob_notes_add").value
            }, function(data) {
                
        });

        window.location.href = "index.php";

    }


    var jstatus;

    function btnStatusChange(strin) {
        jstatus = strin;
        //console.log(tempid + " - " + jstatus);   
    }

    function showJobStatusChange(btn) {
        jstatus = "";
        tempid = btn.id.replace("updatestatus","");
        $("#xJobStatus").modal();  
        //console.log(tempid + " - " + jstatus);      
    }

    function btnJobStatusChange() {

        if (jstatus != "") {

            $.post("./php/update_jobstatus.php", {
                xjobid: tempid,
                xstatus: jstatus
                }, function(data) {
                    
            });
    
            window.location.href = "index.php";

        } else {
            alert("No update");
        }
               

    }



    function btnStatus(strin) {
        document.getElementById("ddStatus").innerText = strin;
    }

    function btnDelClient(btn){
        alert("Not implemented yet...");
        xid = btn.id.replace("delclient","");        
    }


    function btnDelJob(btn){
        alert("Not implemented yet...");
        xid = btn.id.replace("deljob","");
    }