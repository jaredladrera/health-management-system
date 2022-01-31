<?php 
include_once "./../../connections/mysqlConnection.php";
$database = new Database;
session_start();

if(!isset($_SESSION['id']) || $_SESSION['access'] != 'nurse') {
		header('location: ./../../index.php');
}

$getName = $database->conn->query("SELECT name FROM account_information WHERE id = ".$_SESSION['id']."");
$name = $getName->fetch_assoc();

?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Nurse</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./../../css/nurse.css">
		<link rel="stylesheet" href="./../../css/nurseCustom.css">
		<link rel="stylesheet" href="./../../css/dataTablesBootstrap.css">
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
				<div class="p-4">
		  		<h1><a href="index.html" class="logo">Welcome! <span><?php echo $name["name"]; ?></span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="index.php?page=dashboard"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="index.php?page=patients"><span class="fa fa-medkit mr-3"></span> Patients</a>
	          </li>
	          <li>
              <a href="index.php?page=accountSettings"><span class="fa fa-user mr-3"></span> My Account</a>
	          </li>
	          <li>
              		<a href="./../../operations/logout.php"><span class="fa fa-power-off mr-3"></span> Logout</a>
	          </li>
	        </ul>



	        <div class="footer">
	        	<p>
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
				</p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <!-- <h2 class="mb-4">Sidebar #05</h2> -->
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
    <script src="../../javascript/nurse.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  </body>
</html>
<script>

$(document).ready(function() {
	$('#patient_table').DataTable();

var ctx = document.getElementById('myChart').getContext('2d');
 
  $.ajax({ 
      url: './../../operations/fetchDataForGraph.php',
      method: 'post',
      dataType: 'json',
      data: {
        key: 'monthly_data_graph',
      }, success: function(response) {
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
                  data: [response.jan, response.feb, response.march, response.apr, response.may, response.june, response.july, response.aug, response.sept, response.oct, response.nov, response.dec],
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

      } // end of success function
  })




//  end of document ready
})

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


function getFullTime(identifier) {
  let timeInput;
  if(identifier === 'save') {
     timeInput = document.getElementById('time_issue');
  } else {
    timeInput = document.getElementById('etime_issue');
  }
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

function savePatients() {

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
let medecine = $('#medecine').val();
let date_issue = $('#date_issue').val();
let department = $('#department').val();
let course = $('#course').val();

if(name == '' || lastname == '' || id_number == '' || issue == '' || contact_number == '' || address == '') {

  Alt.alternative({
  status:'warning',
  showConfirmButton:false,
  title:'Incompelte Credentials!',
  text:'Please complete all fields before you save!'
  })
} else {
$.ajax({ 
				  url: './../../operations/fetchingAjaxRequest.php',
				  method: 'post',
				  dataType: 'text',
				  data: {
					  key: 'save_patient',
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
					  medecine: medecine,
					  department: department,
					  course: course,
					  time_issue: getFullTime('save')
				  }, success: function(response){

					  alert(response);
					  
					$('#name').val('');
					$('#lastname').val('');
					$('#id_number').val('');
					$('#issue').val('');
					$('#contact_number').val('');
					$('#age').val('');
					$('#gender').val('');
					$('#guardian').val('');
					$('#issue_status').val('');
					$('#parent_contact').val('');
					$('#notes').val('');
					$('#address').val('');
					$('#medecine').val('');
					$('#date_issue').val('');

		  
					//   Alt.alternative({
					//   status:'success',
					//   title:'Success',
					//   text: response
					//   }).then((res) => {
					// 	  setTimeout(() => {
					// 		  location.reload();
					// 	  }, 1000);
					//   })

				  }
  
			  });

}



} // end function

function patientDetails(id) {
	// alert(id)
    $.ajax({ 
         url: './../../operations/fetchingAjaxRequest.php',
         method: 'post',
         dataType: 'json',
         data: {
             key: 'getUpdatingData',
             id: id
         }, success: function(response){
    
             $('#ename').val(response.name);
             $('#elastname').val(response.lastname);
             $('#eid_number').val(response.id_number);
             $('#eissue').val(response.issue);
             $('#econtact_number').val(response.contact_number);
             $('#eage').val(response.age);
             $('#egender').val(response.gender);
             $('#eguardian').val(response.guardian);
             $('#eissue_status').val(response.issue_status);
             $('#eparent_contact').val(response.parent_contact);
             $('#enotes').val(response.note);
             $('#eaddress').val(response.address);
             $('#patientID').val(response.id);
             $('#emedecine').val(response.medicine);
             $('#ecourse').val(response.department);
             $('#edepartment').val(response.course);
             $('#student_id').val(id);
             document.getElementById("edate_issue").value = response.date_issue;

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
            document.getElementById("etime_issue").value = sHours + ":" + sMinutes;

            document.getElementById("AMPM").value = AMPM;

         }
    
    });

           
} // end function


function updatePatients() {
  let name = $('#ename').val();
  let lastname = $('#elastname').val();
  let id_number = $('#eid_number').val();
  let issue = $('#eissue').val();
  let contact_number = $('#econtact_number').val();
  let age = $('#eage').val();
  let gender = $('#egender').val();
  let guardian = $('#eguardian').val();
  let issue_status = $('#eissue_status').val();
  let parent_contact = $('#eparent_contact').val();
  let note = $('#enotes').val();
  let address = $('#eaddress').val();
  let id = $('#patientID').val();
  let date_issue = $('#edate_issue').val();
  let medicine_take = $('#emedecine').val();
//   let timeDetails = document.getElementById('time_issue').value === '' ? document.getElementById('timeDetails').innerText : getFullTime();
  let timeDetails = getFullTime('update')
  // console.log(timeDetails);

  if(name == '' || lastname == '' || id_number == '' || issue == '' || contact_number == '' || address == '') {
	  alert('Please complete all fields before you save!')
    // Alt.alternative({
    // status:'warning',
    // showConfirmButton:false,
    // title:'Incompelte Credentials!',
    // text:'Please complete all fields before you save!'
    // })
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
						alert(response)
                        // Alt.alternative({
                        // status:'success',
                        // title:'Success',
                        // text: response
                        // }).then((res) => {
                        //     setTimeout(() => {
                        //         location.reload();
                        //     }, 1000);
                        // });
                    }
    
    });

 }
} //end


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

print_only = () => {
  const id = $('#student_id').val();
  window.open("./../../forms/patient_pdf.php?id="+id+"");
}

print_all = () => {
  const name = $('#ename').val();
  const lastname = $('#elastname').val();

  window.open("./../../forms/patients_pdf.php?name="+name+"&lastname="+lastname);
}


</script>