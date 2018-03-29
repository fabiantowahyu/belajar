<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

//if($isPrint) {

ob_clean();
$this->load->helper('plugin_helper');
tcpdf();
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$title = 'CARSURIN';
$subtitle = 'Quality With Integrity';
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, $subtitle);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//PDF_MARGIN_TOP = 27
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP-11, 10);
$pdf->SetMargins(15, 10, 10);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, 15); //PDF_MARGIN_BOTTOM

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// ---------------------------------------------------------

// set array for viewer preferences
$preferences = array(
	'HideToolbar' => true,
	'HideMenubar' => true,
	'HideWindowUI' => true,
	'FitWindow' => true,
	'CenterWindow' => true,
	'DisplayDocTitle' => true,
	'NonFullScreenPageMode' => 'UseNone', // UseNone, UseOutlines, UseThumbs, UseOC
	'ViewArea' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
	'ViewClip' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
	'PrintArea' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
	'PrintClip' => 'CropBox', // CropBox, BleedBox, TrimBox, ArtBox
	'PrintScaling' => 'AppDefault', // None, AppDefault
	'Duplex' => 'DuplexFlipLongEdge', // Simplex, DuplexFlipShortEdge, DuplexFlipLongEdge
	'PickTrayByPDFSize' => true,
	'PrintPageRange' => array(1,1,2,3),
	'NumCopies' => 2
);

// Check the example n. 60 for advanced page settings

// set pdf viewer preferences
$pdf->setViewerPreferences($preferences);

// set font
$pdf->SetFont('helvetica', '', 9);

// add a page
//$pdf->AddPage();
$pdf->AddPage('P','letter');

/* // print a line
$pdf->Cell(0, 12, 'DISPLAY PREFERENCES - PAGE 1', 1, 1, 'C');

$pdf->Ln(5);

$pdf->Write(0, 'You can use the setViewerPreferences() method to change viewer preferences.', '', 0, 'L', true, 0, false, false, 0);
 */
 // create some HTML content
 // define some HTML content with style
/*$params = $pdf->serializeTCPDFtagParameters(array('40144399300102444888207482244309', 'C128C', '', '', 0, 0, 0.2, array('position'=>'S', 'border'=>false, 'padding'=>5, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>false, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>2), 'N')); */

$html = <<<EOF
$content
EOF;

// output the HTML content
//$pdf->writeHTML($html, true, 0, true, 0);
$pdf->writeHTML($html, true, false, true, false, '');

//echo $contents;
//die();
// Start Barcode
// new style

/*$pdf->writeHTML($html);
    $style = array(
        'position' => '0',
	    'align' => 'L',
	    'stretch' => false,
	    'fitwidth' => true,
	    'cellfitalign' => '',
	    'border' => true,
	    'hpadding' => 'auto',
	    'vpadding' => 'auto',
	    'fgcolor' => array(0,0,0),
	    'bgcolor' => false, //array(255,255,255),
	    'text' => false,
	    'font' => 'helvetica',
	    'fontsize' => 8,
	    'stretchtext' => 4,
    );*/

 // ---------------------------------------------------------

$filename = sprintf("request_form.pdf");
ob_clean();
$pdf->Output($filename, 'I');
?>