<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../dependency/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../register.css">
    <title>Register</title>
</head>
<body  style="background-color: #508bfc;">

<div class="container mt-5">

            <div class="row jumbotron">
                <div class="row mb-4">
                    <div class="col col-lg-12 text-center" >
                        <h2 class="text-center">Registration Form</h2>  
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-6 form-group">
                        <label for="fname">First Name</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Enter your first name." required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="lname">Last name</label>
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Enter your last name." required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email." required>
                    </div>
             
                    <div class="col-sm-6 form-group">
                        <label for="middle">Middle name</label>
                        <input type="text" class="form-control" name="middle" id="middle" placeholder="Enter middle name" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="address">Address</label>
                        <input type="address" class="form-control" name="Locality" id="address" placeholder="Locality/House/Street no." required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="id_number">ID number</label>
                        <input type="text" class="form-control" name="id_number" id="id_number" placeholder="ID number." required>
                    </div>
                    <!-- <div class="col-sm-6 form-group">
                        <label for="gender">Country</label>
                        <select class="form-control custom-select browser-default">
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Åland Islands">Åland Islands</option>
        
                        </select>
                    </div> -->
                    <div class="col-sm-6 form-group">
                        <label for="birthday">Date Of Birth</label>
                        <input type="Date" name="dob" class="form-control" id="birthday" placeholder="" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" class="form-control browser-default custom-select">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="unspesified">Unspecified</option>
                    </select>
                    </div>
                    <!-- <div class="col-sm-2 form-group">
                        <label for="cod">Country code</label>
                        <select class="form-control browser-default custom-select">
                            <option data-countryCode="US" value="1" selected>USA (+1)</option>
          <option data-countryCode="GB" value="44">UK (+44)</option>
        
          <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                        </select>
                    </div> -->
                    <div class="col-sm-6 form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Your Contact Number." required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="pass">Password</label>
                        <input type="Password" name="password" class="form-control" id="pass" placeholder="Enter your password." required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="pass2">Confirm Password</label>
                        <input type="Password" name="cnf-password" class="form-control" id="pass2" placeholder="Re-enter your password." required>
                        <div id="errMessage"></div>
                    </div>

                    <div class="col-sm-6 form-group">
                        <label for="account_access">Request access</label>
                        <select id="account_access" class="form-control browser-default custom-select">
                        <option value="nurse">Nurse Account</option>
                        <option value="admin">Admin  Account</option>
                    </select>
                    </div>
        
        
                    <div class="col-sm-12 form-group mb-0 mt-3">
                        <a href="./../" class="btn btn-secondary float-right ml-2">Back to login</a>
                       <button class="btn btn-primary float-right" onclick="register()">Submit</button>
                    </div>
                </div>
            
        </div>
 
    </div>


<script src="../dependency/jquery.min.js"></script>
<script src="../dependency/popper.min.js"></script>
<script src="../dependency/bootstrap/js/bootstrap.min.js"></script>
<script src="../dependency/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<script>

const register = () => {
     fname = $('#fname').val();
     lname = $('#lname').val();
     middle = $('#middle').val();
     address = $('#address').val();
     id_number = $('#id_number').val();
     birthday = $('#birthday').val();
     gender = $('#gender').val();
     phone = $('#phone').val();
     email = $('#email').val();
     pass = $('#pass').val();
     pass2 = $('#pass2').val();
     account_access = $('#account_access').val();

    if(pass === pass2) {
        $.ajax({ 
                    url: '../operations/fetchingAjaxRequest.php',
                    method: 'post',
                    dataType: 'text',
                    data: {
                        key: 'registerUser',
                        fname: fname,
                        lname: lname,
                        middle: middle,
                        address: address,
                        id_number: id_number,
                        birthday: birthday,
                        gender: gender,
                        phone: phone,
                        email: email,
                        pass: pass,
                        account_access: account_access
                    }, success: function(response){
                        alert(response);
                        window.location="./../index.php";
                    }
    
                });
    } else {
        document.getElementById('errMessage').innerHTML = '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert"><strong>Error : </strong> Password Not Match!!! <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
}

</script>