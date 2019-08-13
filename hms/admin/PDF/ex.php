<?php
session_start();
?>

<?php
require('fpdf181/fpdf.php');
$date = new DateTime();
$datetime = $date->format('Y-m-d H:i:s');
class PDF extends FPDF {
 var $angle=0;
    function Header() {
     //  $this->SetFont('Arial','B',15);
       //$this->Cell(100,10,0,0);
       $this->cell(12);
      $this->Image('https://www.hsp-software.de/wp-content/uploads/2017/05/64x64.png',10,10,20,20);
    
    }
    function temporaire( $texte )
    {
        $this->SetFont('Arial','B',50);
        $this->SetTextColor(203,203,203);
        $this->Rotate(45,55,190);
        $this->Text(55,190,$texte);
        $this->Rotate(0);
        $this->SetTextColor(0,0,0);
    }
    function Rotate($angle, $x=-1, $y=-1)
    {
        if($x==-1)
            $x=$this->x;
            if($y==-1)
                $y=$this->y;
                if($this->angle!=0)
                    $this->_out('Q');
                    $this->angle=$angle;
                    if($angle!=0)
                    {
                        $angle*=M_PI/180;
                        $c=cos($angle);
                        $s=sin($angle);
                        $cx=$x*$this->k;
                        $cy=($this->h-$y)*$this->k;
                        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
                    }
    }
}
$pdf = new PDF();

$pdf->AddPage();

$pdf->temporaire( "Handels software Partner" );
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,50,'HSP Handels software Partner',0,0);
$pdf->Cell(59 ,50,'Invoice',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Notkestraße 9',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'Deutschland, 22607 Hamburg ',0,0);
$pdf->Cell(25 ,5,'Date:',0,0);
$pdf->Cell(34 ,5,$datetime,0,1);//end of line

$pdf->Cell(130 ,5,'Phone: +12345678',0,0);
$pdf->Cell(25 ,5,'Invoice :',0,0);
$pdf->Cell(34 ,5,$_SESSION['invoiceId'],0,1);//end of line

$pdf->Cell(130 ,5,'Fax: +12345678',0,0);
$pdf->Cell(25 ,5,'Customer ID:',0,0);
$pdf->Cell(34 ,5,$_SESSION['custID'],0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$_SESSION['name'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$_SESSION['companyName'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$_SESSION['address'],0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$_SESSION['phone'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(25 ,5,'Taxable',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$pdf->Cell(130 ,5,$_SESSION['Product1'],1,0);
$pdf->Cell(25 ,5, $_SESSION['Menge1'],1,0);
$pdf->Cell(34 ,5,'3,250',1,1,'R');//end of line

$pdf->Cell(130 ,5,$_SESSION['Product2'],1,0);
$pdf->Cell(25 ,5, $_SESSION['Menge2'],1,0);
$pdf->Cell(34 ,5,'1,200',1,1,'R');//end of line

$pdf->Cell(130 ,5,$_SESSION['Product3'],1,0);
$pdf->Cell(25 ,5, $_SESSION['Menge1'],1,0);
$pdf->Cell(34 ,5,'1,000',1,1,'R');//end of line

//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Taxable',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'0',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'10%',1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'$',1,0);
$pdf->Cell(30 ,5,'4,450',1,1,'R');//end of line


$pdf->Output();


?>