<?php

require('./../dependency/fpdf/fpdf.php');
require "./../connections/mysqlConnection.php";

class PDF extends FPDF
{
    
// Page header
function Header()
{
    // Logo
     $this->Image('../images/bsu_logo.png',20,10,20);
    //  $this->Image('../images/form-back.jpg',5,50,200);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Ln(25);
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'',0,0,'C');
    // Line break
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);

    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}

function FancyTable() {

$database = new Database();


$name = $_GET['name'];
$lastname = $_GET['lastname'];

$query = $database->conn->query("SELECT * FROM patient_data WHERE name = '$name' AND lastname='$lastname'");

while($row = $query->fetch_array()) {

$this->SetFont('Arial','B',13);
$this->Cell(25, 5, 'Patient(s) Information', 0, 0);
$this->Cell(118, 5, '', 0, 0);
$this->Cell(15, 5, 'Date', 0, 0);
$this->Cell(32, 5, ': '.date("Y/m/d", strtotime("+7 hours")), 0, 1);


$this->Line(10, 50, 200, 50);
$this->Ln(5); // line break

$this->SetFont('Arial','',12);
// Cell(width, height, text, border, new line, text align)
$this->Cell(55, 5, 'Name', 0, 0);
$this->Cell(118, 5, ': '.$row['name'].' '.$row['lastname'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'ID Number', 0, 0);
$this->Cell(58, 5, ': '.$row['id_number'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Gender', 0, 0);
$this->Cell(58, 5, ': '.$row['gender'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Issue', 0, 0);
$this->Cell(58, 5, ': '.$row['issue'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Address', 0, 0);
$this->Cell(58, 5, ': '.$row['address'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Contact Number', 0, 0);
$this->Cell(58, 5, ': '.$row['contact_number'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Department', 0, 0);
$this->Cell(58, 5, ': '.$row['department'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Course', 0, 0);
$this->Cell(58, 5, ': '.$row['course'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Age', 0, 0);
$this->Cell(58, 5, ': '.$row['age'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Guardian', 0, 0);
$this->Cell(58, 5, ': '.$row['guardian'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Guadian Contact', 0, 0);
$this->Cell(58, 5, ': '.$row['parent_contact'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Medicine Take', 0, 0);
$this->Cell(58, 5, ': '.$row['medicine_take'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Issue Status', 0, 0);
$this->Cell(58, 5, ': '.$row['issue_status'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Time and Date issue', 0, 0);
$this->Cell(58, 5, ': '.$row['time_issue'].' / '.$row['date_issue'], 0, 1);

$this->Ln(3); //line break

$this->Cell(55, 5, 'Notes', 0, 0);
$this->Cell(58, 5, ': '.$row['note'], 0, 1);



$this->AddPage();
}

}

}

// Instanciation of inherited class


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->Ln(8);
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// Column headings


$pdf->FancyTable();

// $pdf->Cell(50 ,10,'',0,1);


$pdf->Output('','report_tracking.pdf'); 

?>