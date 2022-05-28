<?php 
$get_total_user_query = $database->conn->query('SELECT COUNT(id) as user FROM account_information');
$total_user = $get_total_user_query->fetch_array();

$get_total_vaccinated_query = $database->conn->query('SELECT COUNT(id) as vaccinated FROM patient_data WHERE vaccinated = true');
$total_vaccinated = $get_total_vaccinated_query->fetch_array();

$get_total_minor_cases = $database->conn->query('SELECT COUNT(id) as minor FROM patient_data WHERE issue_status = "minor"');
$total_minor_status = $get_total_minor_cases->fetch_array();

$get_total_major_cases = $database->conn->query('SELECT COUNT(id) as major FROM patient_data WHERE issue_status = "major"');
$total_major_status = $get_total_major_cases->fetch_array();

$get_total_patients = $database->conn->query('SELECT COUNT(id) as total_patient FROM patient_data');
$total_patient = $get_total_patients->fetch_array();

?>

<h2>Dashboard</h2>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-blue">
                <div class="inner">
                    <h3> <?php echo $total_user['user']; ?> </h3>
                    <p> Total System User </p>
                </div>
                <div class="icon">
                    <!-- <i class="fa fa-graduation-cap" aria-hidden="true"></i> -->
                </div>
                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-green">
                <div class="inner">
                    <h3> <?php echo $total_vaccinated['vaccinated']; ?> </h3>
                    <p> Total vaccinated</p>
                </div>
                <div class="icon">
                    <!-- <i class="fa fa-money" aria-hidden="true"></i> -->
                </div>
                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-orange">
                <div class="inner">
                    <h3> <?php echo $total_minor_status['minor']; ?> </h3>
                    <p> Total Minor Cases</p>
                </div>
                <div class="icon">
                    <!-- <i class="fa fa-user-plus" aria-hidden="true"></i> -->
                </div>
                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card-box bg-red">
                <div class="inner">
                    <h3> <?php echo $total_major_status['major']; ?> </h3>
                    <p> Total Major Cases</p>
                </div>
                <div class="icon">
                    <!-- <i class="fa fa-users"></i> -->
                </div>
                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="card-box bg-orange">
                <div class="inner">
                    <h3> <?php echo $total_patient['total_patient']; ?> </h3>
                    <p> Total patients</p>
                </div>
                <div class="icon">
                    <!-- <i class="fa fa-users"></i> -->
                </div>
                <!-- <a href="#" class="card-box-footer">View More <i class="fa fa-arrow-circle-right"></i></a> -->
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

    <!-- end of container-fluid -->
</div>

<div class="container">
    <h2 class="text-secondary">Total patient per month</h2>
    <canvas id="myChart"></canvas>
</div>

