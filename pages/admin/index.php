<?php 
include_once "./../../connections/mysqlConnection.php";
$database = new Database;
session_start();

if(!isset($_SESSION['id']) || $_SESSION['access'] != 'admin') {
		header('location: ./../../index.php');
}

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Administrator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- <link rel="stylesheet" href="css/style.css"> -->
		<link rel="stylesheet" href="./../../css/admin.css">
		<link rel="stylesheet" href="./../../css/customAdmin.css">
		<link rel="stylesheet" href="./../../css/dataTablesBootstrap.css">
    
		<!-- <link rel="stylesheet" href="../../dependency/datatables/datatables.min.css"> -->
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4 pt-5">
		  		<h1><a href="index.html" class="logo">Admin</a></h1>
	        <ul class="list-unstyled components mb-5">
	          <!-- <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul>
	          </li> -->
	          <li>
	              <a href="index.php?page=dashboard">Dashboard</a>
	          </li>
	          <li>
	              <a href="index.php?page=patient_list">Patient List</a>
	          </li>
	          <li>
              <!-- <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul> -->
	          </li>
	          <li>
              <a href="index.php?page=request_access">Request Access</a>
	          </li>
	          <li>
              <a href="index.php?page=all_users">All users</a>
	          </li>
	          <li>
              <a href="index.php?page=my_account">My Account</a>
	          </li>
	          <li>
              <a href="./../../operations/logout.php">Logout</a>
	          </li>
	        </ul>

	        <!-- <div class="mb-5">
						<h3 class="h6">Subscribe for newsletter</h3>
						<form action="#" class="colorlib-subscribe-form">
	            <div class="form-group d-flex">
	            	<div class="icon"><span class="icon-paper-plane"></span></div>
	              <input type="text" class="form-control" placeholder="Enter Email Address">
	            </div>
	          </form>
					</div> -->

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">

    <?php 

        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          $display = "pages/".$page.'.php';               

          include($display);
        } else {
          $page = 'dashboard';
          $display = "pages/".$page.'.php';
          include($display);
        }

	?>
      </div>
		</div>

		<script src="../../dependency/jquery.min.js"></script>
		<script src="../../dependency/popper.min.js"></script>
		<script src="../../dependency/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../dependency/bootstrap/js/bootstrap.min.js"></script>
		<script src="../../dependency/datatables/datatables.min.js"></script>
    <script src="../../javascript/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  </body>
</html>
<script>

$(document).ready(function() {
	$('.requestTable').DataTable();
	$('#patientTable').DataTable();

  var ctx = document.getElementById('myChart').getContext('2d');


var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',
    backgroundColor: 'rgba(0, 0, 0, 0.1)',

    // The data for our dataset
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Total ',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [20, 50, 100, 80, 45, 78, 90, 91, 23, 67, 34, 79],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
              ],
              borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
              ],
              borderWidth: 3
        }]
    },
    options:{
      legend: {
      display: false
    }  
    }
});

//  end of document ready
});

approveRequest = (id) => {
	if(confirm("Are you sure you want to approve this?")) {
	$.ajax({ 
      url: './../../operations/fetchingAjaxRequest.php',
      method: 'post',
      dataType: 'text',
      data: {
        key: "approve_request",
        id: id
      }, success: function(response) {
		  alert(response);
          $('#id_'+id).parent().remove();
      }
    });
	}
}

revertUser = (id) => {
	if(confirm("Are you sure you want to approve this?")) {
	$.ajax({ 
      url: './../../operations/fetchingAjaxRequest.php',
      method: 'post',
      dataType: 'text',
      data: {
        key: "revert_request",
        id: id
      }, success: function(response) {
		  alert(response);
          $('#id_'+id).parent().remove();
      }
    });
	}
}

deleteRequest = (id, key) => {
	
	if(confirm("Are you sure?")) {
	$.ajax({ 
      url: './../../operations/fetchingAjaxRequest.php',
      method: 'post',
      dataType: 'text',
      data: {
        key: key,
        id: id
      }, success: function(response) {
		  alert(response);
          $('#id_'+id).parent().remove();
      }
    })
	}
}

requestDetails = (id) => {
	// alert(id);
	$.ajax({ 
      url: './../../operations/fetchingAjaxRequest.php',
      method: 'post',
      dataType: 'json',
      data: {
        key: 'get_reqest_details',
        id: id
      }, success: function(response) {
		//   alert(response)
		// console.log(response)
		  $('#name').val(response.name);
		  $('#lastname').val(response.lastname);
		  $('#middlename').val(response.middlename);
		  $('#id_number').val(response.id_number);
		  $('#contact').val(response.contact_number);
		  $('#gender').val(response.gender);
		  $('#birthday').val(response.birthday);
		  $('#access').val(response.access);
		  $('#address').val(response.address);
		  $('#request_id').val(response.id);


		$("#requestModal").modal('show');
      }
    })
}

updateAccount = (id) => {
	
	let name = $('#name').val();
	let lastname = $('#lastname').val();
	let middlename = $('#middlename').val();
	let email = $('#email').val();
	let id_number = $('#id_number').val();
	let contact_number = $('#contact_number').val();
	let address = $('#address').val();
	let birthday = $('#birthday').val();
	let gender = $('#gender').val();
	let password = $('#password').val();
	let re_pass = $('#re_pass').val();


	// alert(birthday)

	if(password === re_pass) { 

		$.ajax({ 
		url: './../../operations/fetchingAjaxRequest.php',
		method: 'post',
		dataType: 'text',
		data: {
			key: "update_my_account",
			id: id,
			name: name,
			lastname: lastname,
			middlename: middlename,
			email: email,
			id_number: id_number,
			contact_number: contact_number,
			address: address,
			birthday: birthday,
			gender: gender,
			password: password,
		}, success: function(response) {
			alert(response);
			//   $('#id_'+id).parent().remove();
		}
		})
	} else {
		alert("Password not Match!");
	}
}

function patientDetails(id) {

    $.ajax({ 
         url: './../../operations/fetchingAjaxRequest.php',
         method: 'post',
         dataType: 'json',
         data: {
             key: 'getUpdatingData',
             id: id
         }, success: function(response){
    
             $('#name').val(response.name);
             $('#lastname').val(response.lastname);
             $('#id_number').val(response.id_number);
             $('#issue').val(response.issue);
             $('#contact_number').val(response.contact_number);
             $('#age').val(response.age);
             $('#gender').val(response.gender);
             $('#guardian').val(response.guardian);
             $('#issue_status').val(response.issue_status);
             $('#parent_contact').val(response.parent_contact);
             $('#notes').val(response.note);
             $('#address').val(response.address);
             $('#patientID').val(response.id);
             $('#medecine').val(response.medicine);
             document.getElementById("date_issue").value = response.date_issue;

             document.getElementById('modalTitle').innerHTML = 'Update Patient';
             document.getElementById("savePatientsBtn").style.display = "none";
             document.getElementById("updatePatientsBtn").style.display = "";
             $('#myModal').modal('show');


             var time = response.time_issue;
            var hours = Number(time.match(/^(\d+)/)[1]);
            var minutes = Number(time.match(/:(\d+)/)[1]);
            var AMPM = time.match(/\s(.*)$/)[1];
            if(AMPM == "PM" && hours<12) hours = hours+12;
            if(AMPM == "AM" && hours==12) hours = hours-12;
            var sHours = hours.toString();
            var sMinutes = minutes.toString();
            if(hours<10) sHours = "0" + sHours;
            if(minutes<10) sMinutes = "0" + sMinutes;
            document.getElementById("time_issue").value = sHours + ":" + sMinutes;

            document.getElementById("AMPM").value = AMPM;

         }
    
    });

           
} // end function

function getFullTime() {
  let timeInput = document.getElementById('time_issue');
  var timeSplit = timeInput.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  return hours + ':' + minutes + ' ' + meridian;
}


updatePatients = () => {
  let name = $('#name').val();
  let lastname = $('#lastname').val();
  let id_number = $('#id_number').val();
  let issue = $('#issue').val();
  let contact_number = $('#contact_number').val();
  let age = $('#age').val();
  let gender = $('#gender').val();
  let guardian = $('#guardian').val();
  let issue_status = $('#issue_status').val();
  let parent_contact = $('#parent_contact').val();
  let note = $('#notes').val();
  let address = $('#address').val();
  let id = $('#patientID').val();
  let date_issue = $('#date_issue').val();
  let medicine_take = $('#medecine').val();
  

  let timeDetails = getFullTime();


  if(name == '' || lastname == '' || id_number == '' || issue == '' || contact_number == '' || address == '') {
	  alert("Some fields are required");
  } else {

	$.ajax({ 
					url: './../../operations/fetchingAjaxRequest.php',
                    method: 'post',
                    dataType: 'text',
                    data: {
                        key: 'updatePatient',
                        id: id,
                        name: name,
                        lastname: lastname,
                        address: address,
                        contact_number: contact_number,
                        gender: gender,
                        age: age,
                        id_number: id_number,
                        guardian: guardian,
                        issue_status: issue_status,
                        issue: issue,
                        note: note,
                        parent_contact: parent_contact,
                        date_issue: date_issue,
                        time_issue: timeDetails,
                        medicine_take: medicine_take
                    }, success: function(response){
                        // Alt.alternative({
                        // status:'success',
                        // title:'Success',
                        // text: response
                        // }).then((res) => {
                        //     setTimeout(() => {
                        //         location.reload();
                        //     }, 1000);
                        // });

						alert(response);
						window.location.ref = 'index.php?page=patient_list' 
                    }
    
    });


  }

}




</script>