<?php
require_once  "fpdf/fpdf.php";
require_once "functions/functions.php";

$sql = "select * from orders where id = 42";
$data = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($data);
if(isset($_POST['btn_pdf'])){
    //echo "Working";
    $pdf = new FPDF("P","mm","A4");
    $pdf ->AddPage();
    $pdf->SetTitle("Jambo eshop: Order Receipt");
    $pdf ->SetFont("Arial","b","12");

//display the title with a border around it
    $pdf->SetXY(50,20);
  //  $pdf->SetDrawColor(50,60,100);
    $pdf->SetTextColor(150,80,50);
    $pdf->Cell(100,10,'Jambo Electronics',0,1,'C',0);

    $pdf->Cell(180,10,'Daystar University, Athi River',0,1,'C',0);



    $pdf->Cell(180,10,'+254 708 745 191',0,1,'C',0);
    $pdf ->cell(59,5,"",0,1); //end of line


    $pdf->Cell(20,10,'Date',0,0,"C");
    $pdf ->cell(80,10,$currentdate = date("d-m-Y"),0,1); //end of line


    $pdf ->cell(180,10,"Order Receipt",0,"1","C");
    $pdf ->cell(59,5,"",0,1); //end of line



    $pdf ->cell(50,10,"Order Number",1,0,"C");
    $pdf ->cell(100,10,$row['id'],1,"1");

    $pdf ->cell(50,10,"Customer Name",1,0,"C");
    $pdf ->cell(100,10,$row['name'],1,"1");

    $pdf ->cell(50,10,"Email Address",1,0,"C");
    $pdf ->cell(100,10,$row['email'],1,"1");

    $pdf ->cell(50,10,"Phone Number",1,0,"C");
    $pdf ->cell(100,10,$row['phone'],1,"1");

    $pdf ->cell(50,10,"Payment Mode",1,0,"C");
    $pdf ->cell(100,10,$row['pmode'],1,"1");

    $pdf ->cell(50,20,"Products Ordered",1,0,"C");
    $pdf ->MultiCell(100,10,$row['products'],1,1);

    $pdf ->cell(50,10,"Amount",1,0,"C");
    $pdf ->cell(100,10,"Ksh ".number_format($row['amount_paid']),1,"1");

     $filename = $row['name'].'-'.$row['id']. '.pdf';


    $pdf ->Output('D',$filename);

}
