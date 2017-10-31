<?php
/*
Report
Product
*/

session_start();

include("../_system/secure.php");

include("../_lib/fpdf/fpdf.php");

include("../_system/connection.php");

include("../_prepare/types.php");
include("../_prepare/subtypes.php");
include("../_prepare/products.php");

$pdf = new FPDF('P','mm','Letter');

$pdf->setTitle("Product");
$pdf->addPage();
$pdf->setMargins(20,0,20);

$pdf->Image('../pics/b.jpg',100,10,20);

$pdf->setFont('Arial','B',15);
$pdf->Text(103,30,"B.A.E.");

$pdf->setFont('Arial','',15);
$pdf->Text(78,35,"Glass and Aluminum Supply");

$pdf->setFont('Arial','B',20);
$pdf->Text(96,45,"Product");

$pdf->setXY(100,50);


foreach($types_array as $type){
	$t_id = $type['product_type_id'];
	$t_n = $type['name'];

	$pdf->setFont('Arial','B',15);
	$c_y = $pdf->getY();
	$pdf->setXY(20,$c_y+7);
	$pdf->Text(20,$c_y+10,$t_n);

	foreach($subtypes_array as $subtype){
		$s_id = $subtype['product_subtype_id'];
		$s_n = $subtype['name'];
		$s_t_id = $subtype['product_type_id'];

		if($s_t_id == $t_id){
			$pdf->setFont('Arial','',13);
			$c_y = $pdf->getY();
			$pdf->setXY(25,$c_y+10);
			$pdf->Text(25,$c_y+10,$s_n);

			$c_y = $pdf->getY();
			$pdf->setXY(10,$c_y+5);
			$pdf->setFont('Arial','',10);
			$pdf->SetFillColor(46,139,87);
			$pdf->SetTextColor(255,255,255);

			$pdf->Cell(10,5, 'ID',1,0,'C','true');
			$pdf->Cell(30,5, 'Code',1,0,'C','true');
			$pdf->Cell(50,5, 'Name',1,0,'C','true');
			$pdf->Cell(60,5, 'Description',1,0,'C','true');
			$pdf->Cell(25,5, 'Price',1,0,'C','true');
			$pdf->Cell(20,5, 'Av. Stocks',1,0,'C','true');

			$pdf->SetFillColor(255,255,255);
			$pdf->setFont('Arial','',9);


			foreach($product_array as $product){
				$p_st_id = $product['product_subtype_id'];
				if($p_st_id ==$s_id){

					$product_id = $product['product_id'];
					$product_code = $product['product_code'];
					$product_name = $product['product_name'];
					$product_description = $product['product_description'];
					$product_price = $product['product_price'];
					$product_available_stocks = $product['product_available_stocks'];

					$c_y = $pdf->getY();
					$pdf->SetTextColor(10,10,10);
					$pdf->setXY(10,$c_y+5);

					$pdf->Cell(10,5, $product_id,1,0,'C','true');
					$pdf->Cell(30,5, $product_code,1,0,'C','true');
					$pdf->Cell(50,5, $product_name,1,0,'C','true');
					$pdf->Cell(60,5, $product_description,1,0,'C','true');
					$pdf->Cell(25,5, $product_price,1,0,'C','true');
					$pdf->Cell(20,5, $product_available_stocks,1,0,'C','true');

				}
			}

		}

		$c_y = $pdf->getY();
		$pdf->setXY(20,$c_y+2);

	}

$c_y = $pdf->getY();
$pdf->setXY(20,$c_y+5);


}


// Output Document
$pdf->Output();
?>