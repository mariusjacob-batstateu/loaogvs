<?php
include_once '../include/dbh.inc.php';
require('fpdf17/fpdf.php');

$lrn= mysqli_real_escape_string($conn, $_GET['lrn']);
$section= mysqli_real_escape_string($conn, $_GET['section']);
$sql = "SELECT * from ".$section."_student WHERE student_lrn=$lrn";
$result= mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$sqls = "SELECT * from student WHERE user_lrn=$lrn";
$results= mysqli_query($conn, $sqls);
$rows = mysqli_fetch_assoc($results);

$lrn='LRN: ' . $row['student_lrn'];
$name="Name: " . $rows['user_first'] . " " . $rows['user_last'];

$pdf = new FPDF('L','mm',array(230,300));

$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(140, 5, 'Dear Parents', 0, 0, 'L');
$pdf->Cell(10, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, 'SF 9-SHS', 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, '            This   report  card   shows  the   ability   and   progress   your   child', 0, 0, 'L');
$pdf->Cell(140, 5, 'Republic of the Philippines', 0, 1, 'C');
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('../../ocv/pics/loa.png',165,15,-1200);
$pdf->Image('../../ocv/pics/deped.jpg',255,15,23);
$pdf->Cell(140, 5, 'has  made  in  different  learning   areas  as   well  as  his/her  progress   in ', 0, 0, 'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(140, 5, 'DEPARTMENT OF EDUCATION', 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'character development.', 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'NATIONAL CAPITAL REGION', 0, 1, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, '         The    school    welcomes    you    if   you    desire    to   know   more', 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'Division of City Schools, Muntinlupa', 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, 'about the progress of your child.', 0, 0, 'L');



$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('');
$pdf->Cell(140, 5, '___________________________             ', 0, 0, 'R');
$pdf->SetFont('Times','B',20);
$pdf->Cell(140, 5, 'LYCEUM OF ALABANG INC.', 0, 1, 'C');
$pdf->SetFont('Arial','B',8);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Adviser's Signature over Printed Name              ", 0, 0, 'R');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Km. 30, National Road, Tunasan, Muntinlupa City", 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->Cell(140, 5, '1773 Philippines', 0, 1, 'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "PARENT/GUARDIAN'S SIGNATURE", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "First Quarter:         _________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140, 5, "Basic Education Department", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Second Quarter:    _________________________________________________", 0, 1, 'L');
$pdf->Cell(140, 5, "Third Quarter:        _________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(140, 5, "SENIOR HIGH SCHOOL", 0, 1, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Fourth Quarter:      _________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(140, 5, "K-12", 0, 1, 'C');
$pdf->Cell(140, 5, "CERTIFICATE OF TRANSFER", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "Admitted to Grade: ________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',16);
$pdf->SetFont('');
$pdf->Cell(140, 5, "PROGRESS REPORT CARD", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Eligibility for admission to:    _________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',9);
$pdf->SetFont('');
$pdf->Cell(0, 5, "SCHOOL YEAR: 2020-2021", 0, 0, 'C');

$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
$pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 1, 'C');
$pdf->Cell(70, 5, "Principal", 0, 0, 'C');
$pdf->Cell(70, 5, "Directress", 0, 0, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Name: ______________________________________", 0, 1, 'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, "CANCELLATION OF ELIGIBILITY TO TRANSFER", 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, $name, 0, 1, 'C');
$pdf->SetFont('Arial','B',1);
$pdf->SetFont('');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Admitted in:       ____________________________________________________", 0, 0, 'L');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(65, 5, $lrn, 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(140, 5, "Date:                 _____________________________________________________", 0, 1, 'L');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(70, 5, "Engr. Rodrigo P. Calapan", 0, 0, 'C');
$pdf->Cell(70, 5, "Ms. Charito F. Cano", 0, 0, 'C');
$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, "                      Age: ________________         ", 0, 0, 'C');
$pdf->Cell(0, 5, "            Sex: _________________                         ", 0, 1, 'C');
$pdf->SetFont('Arial','B',10);
$pdf->SetFont('');
$pdf->Cell(70, 5, "Principal", 0, 0, 'C');
$pdf->Cell(70, 5, "Directress", 0, 1, 'C');
$pdf->Cell(140, 5, '', 0, 0, 'L');

$pdf->SetFont('Arial','B',12);
$pdf->SetFont('');
$pdf->Cell(70, 5, "                  Grade: _____________        ", 0, 0, 'C');
$pdf->Cell(70, 5, "        Section: ________________                         ", 0, 1, 'C');
$pdf->Cell(262, 5, "", 0, 1, 'R');
$pdf->Cell(262, 5, "  Track: ______________________________________", 0, 1, 'R');
$pdf->Cell(262, 5, "", 0, 1, 'R');
$pdf->Cell(263, 5, "          Strand: ______________________________________", 0, 1, 'R');

$pdf->AddPage();
#$pdf->Ln();
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
$pdf->Cell(10, 5, '', 0, 1, 'L');
#require('alphapdf.php');
#$pdf = new AlphaPDF();
#$pdf->AddPage();
#$pdf->SetLineWidth(1.5);
#$pdf->SetAlpha(0.5);
#$pdf->Image('../../ocv/pics/loa-background.png',40, 10, 215);
#Cell(width, height, text, border, endline, 'align')
$pdf->Cell(140, 5, 'REPORT ON LEARNING PROGRESS & ACHIEVEMENT', 0, 0, 'C');
$pdf->Cell(150, 5, 'REPORT ON LEARNERS OBSERVED VALUES', 0, 1, 'C');

$pdf->SetFont('Arial','B',8);
$pdf->Cell(140, 5, 'First Semester', 0, 1, 'L');
$pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
$pdf->Cell(20, 5, 'Quarter', 1, 0, 'C');
$pdf->Cell(20, 10, 'Final Grade', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(20, 10, 'Core Values', 1, 0, 'C');
$pdf->Cell(60, 5, 'Quarterly Assessment', 1, 0, 'C');
$pdf->Cell(40, 5, 'Quarter', 1, 1, 'C');
$pdf->Cell(180, 10, '', 0, 0, 'L');
$pdf->Cell(60, 5, 'Behavioral Statement', 1, 0, 'C');
$pdf->Cell(10, 5, '1', 1, 0, 'C');
$pdf->Cell(10, 5, '2', 1, 0, 'C');
$pdf->Cell(10, 5, '3', 1, 0, 'C');
$pdf->Cell(10, 5, '4', 1, 0, 'C');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Core Subjects', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(60, 5, "      Expresses one's  spiritual  beliefs  while ", 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 1, 'L');

$pdf->Cell(20, 5, 'CS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Contemporary Philippine Arts from the Region', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(60, 5, 'respecting  the  spiritual  beliefs  of   others', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 1, 'L');


$pdf->Cell(20, 5, 'CS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Media and Information Literacy', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(20, 5, '1. Maka-Diyos', 1, 0, 'L');
$pdf->Cell(60, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 1, 'L');

$pdf->Cell(20, 5, 'CS 15-3', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Education and Health 3', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(60, 5, '     Shows  adherence  to  ethical  principles  ', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 1, 'L');

$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(60, 5, 'by upholding truth.', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 1, 'L');


$pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(60, 5, "      Expresses one's  spiritual  beliefs  while ", 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 1, 'L');
$pdf->Cell(20, 5, 'AS 3', 1, 0, 'L');
$pdf->Cell(80, 5, 'Practical Research 2', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'AS 4', 1, 0, 'L');
$pdf->Cell(80, 5, 'Pagsulat sa Filipino sa Larangan ng Akademik', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'AS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Entrepreneurship', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'ABMS 5', 1, 0, 'L');
$pdf->Cell(80, 5, 'Fundamentals of Accountancy, Business and Management 2', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'ABMS 6', 1, 0, 'L');
$pdf->Cell(80, 5, 'Business Finance', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 1, 'L');
$pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
$pdf->Cell(20, 5, '', 1, 1, 'R');

$pdf->Cell(140, 5, 'First Semester', 0, 1, 'L');
$pdf->Cell(100, 10, 'Subject', 1, 0, 'L');
$pdf->Cell(20, 5, 'Quarter', 1, 0, 'L');
$pdf->Cell(20, 10, 'Final Grade', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 0, 'L');
$pdf->Cell(35, 5, 'Core Value', 1, 1, 'L');
$pdf->Cell(100, 5, '', 0, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '', 0, 1, 'L');
$pdf->Cell(140, 5, 'Core Subjects', 1, 1, 'L');
$pdf->Cell(20, 5, 'CS 5', 1, 0, 'L');
$pdf->Cell(80, 5, '21st Century Literature from the Philippines and the World', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'CS 11', 1, 0, 'L');
$pdf->Cell(80, 5, 'Disaster Readiness and Risk Reduction', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'CS 13', 1, 0, 'L');
$pdf->Cell(80, 5, 'Understanding Culture, Society and Politics', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'CS 15-4', 1, 0, 'L');
$pdf->Cell(80, 5, 'Physical Education and Health 4', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 1, 'L');
$pdf->Cell(140, 5, 'Applied and Specialized Subjects', 1, 1, 'L');
$pdf->Cell(20, 5, 'AS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Research Project (Feasibility Study)', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'ABMS 7', 1, 0, 'L');
$pdf->Cell(80, 5, 'Applied Economics', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'ABMS 8', 1, 0, 'L');
$pdf->Cell(80, 5, 'Business Ethics and Social Responsibility', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, 'ABMS 9', 1, 0, 'L');
$pdf->Cell(80, 5, 'Work Immersion/ CA i.e. Business Enterprise Simulation', 1, 0, 'L');
$pdf->Cell(10, 5, '1', 1, 0, 'L');
$pdf->Cell(10, 5, '2', 1, 0, 'L');
$pdf->Cell(20, 5, '2', 1, 1, 'L');
$pdf->Cell(20, 5, '', 1, 0, 'L');
$pdf->Cell(80, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(10, 5, '', 1, 0, 'L');
$pdf->Cell(20, 5, '', 1, 1, 'L');
$pdf->Cell(120, 5, 'Average for the Semester', 1, 0, 'R');
$pdf->Cell(20, 5, '', 1, 1, 'R');



$pdf->Output();
