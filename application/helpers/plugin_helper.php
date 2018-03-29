<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function veritrans()
{
    require_once('veritrans/Veritrans.php');
}

function tcpdf()
{
    require_once('tcpdf/config/lang/eng.php');
    require_once('tcpdf/tcpdf.php');
}

function phpexcel()
{
   require_once('PHPExcel/Classes/PHPExcel.php');
   require_once('PHPExcel/Classes/PHPExcel/IOFactory.php');
}

?>