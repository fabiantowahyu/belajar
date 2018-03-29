<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_lse_daglu extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();

        $this->load->model('Md_report_daglu');
        $this->load->model('md_template_email');
        $this->tblName = $this->config->item('ttrs_lse');
        $this->field = 'id';
    }

    public function index() {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('list')) {

            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {

            /* Bread crum */
            $this->load->model('md_ref_json');
            $params = $this->router->fetch_class();
            $hasil = $this->md_ref_json->MDL_SelectMenu($params);
            $parentt = $hasil->parentt;
            $nm_menu = $hasil->custom_title;
            $path_icon = $hasil->path_icon;
            $this->breadcrumbs->add($parentt, '#', $path_icon);
            $this->breadcrumbs->add($nm_menu, base_url());
            $breadcrum = $this->breadcrumbs->output();
            $data['breadcrum'] = $breadcrum;
            /* end */

            $req_startdate = $this->input->post('req_startdate');
            $req_startdate = strlen($req_startdate) ? $req_startdate : date("Y-m-01");
            $req_enddate = $this->input->post('req_enddate');
            $req_enddate = strlen($req_enddate) ? $req_enddate : date("Y-m-t");

            $data['req_startdate'] = $req_startdate;
            $data['req_enddate'] = $req_enddate;


            $data['results'] = $this->Md_report_daglu->MDL_Select($req_startdate, $req_enddate);


            $data['url_excel'] = sprintf("%s%s/%s/%s", site_url(), "report_lse_daglu/CTRL_PrintData_Excel/", $data['req_startdate'], $data['req_enddate']);

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s", $nm_title);
            $data['page'] = 'Report_daglu/view';
            $data['plugin'] = 'Report_daglu/plugin';
            $this->load->view('template_admin', $data);
        }
    }

    public function CTRL_PrintData_Excel($start, $end) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            $nm_title = $this->auth->Auth_getNameMenu();
            $title = sprintf("Report %s", $nm_title);

            $aryRows = $this->Md_report_daglu->MDL_SelectReport($start, $end);


            $this->load->helper('plugin_helper');
            /** Error reporting */
            error_reporting(E_ALL);
            ini_set('display_errors', TRUE);
            ini_set('display_startup_errors', TRUE);

            if (PHP_SAPI == 'cli')
                die('This example should only be run from a Web Browser');

            /** Include PHPExcel */
            phpexcel();

            // Create new PHPExcel object
            $sheet = "Sheet1";
            $objPHPExcel = new PHPExcel();

            // Rename worksheet
            $objPHPExcel->getActiveSheet()->setTitle($sheet);

            // Create a first sheet, representing sales data
            $objPHPExcel->setActiveSheetIndex(0);
            /* $objPHPExcel->getActiveSheet()->setCellValue('B1', 'Inspection-Surveyor Application');
              $objPHPExcel->getActiveSheet()->setCellValue('B2', ''); */

            $stardate = date("d F Y", strtotime($start));
            $enddate = date("d F Y", strtotime($end));
            $objPHPExcel->getActiveSheet()->setCellValue('A2', 'REKAPITULASI PENERBITAN LAPORAN SURVEYOR EKSPOR BATUBARA DAN PRODUK BATUBARA');
            $objPHPExcel->getActiveSheet()->setCellValue('A5', "PERIODE TANGGAL     : $stardate - $enddate");
            $objPHPExcel->getActiveSheet()->setCellValue('A6', 'VERIFIKATOR     : PT. CARSURIN');

//Header
            $objPHPExcel->getActiveSheet()->setCellValue('A8', 'No.');
            $objPHPExcel->getActiveSheet()->setCellValue('B8', 'Nama Surveyor');
            $objPHPExcel->getActiveSheet()->setCellValue('C8', 'Nama Eksportir');
            $objPHPExcel->getActiveSheet()->setCellValue('D8', 'Nomor ET Batubara');
            $objPHPExcel->getActiveSheet()->setCellValue('E8', 'Tanggal ET Batubara');
            $objPHPExcel->getActiveSheet()->setCellValue('F8', 'Masa Berlaku ET Batubara');
            $objPHPExcel->getActiveSheet()->setCellValue('G8', 'POS Tarif /HS');
            $objPHPExcel->getActiveSheet()->setCellValue('H8', 'HS-Description');
            $objPHPExcel->getActiveSheet()->setCellValue('I8', 'Pelabuhan Muat');
            $objPHPExcel->getActiveSheet()->setCellValue('J8', 'Propinsi');
            $objPHPExcel->getActiveSheet()->setCellValue('K8', 'Negara Tujuan');
            $objPHPExcel->getActiveSheet()->setCellValue('L8', 'Nomor LS');
            $objPHPExcel->getActiveSheet()->setCellValue('M8', 'Tanggal LS');
            $objPHPExcel->getActiveSheet()->setCellValue('N8', 'Nilai (USD)');
            $objPHPExcel->getActiveSheet()->setCellValue('O8', 'Volume (TON)');

            //rows
            $no = 1;
            $i = 9;
            foreach ($aryRows as $row) {

                $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $no);
                $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, 'PT. CARSURIN');
                $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $row->client_name);
                $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $row->no_reg_exporter);
                $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, date("d M Y", strtotime($row->date_reg_exporter)));
                $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, date("d M Y", strtotime($row->date_expired)));
                $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, number_format($row->hs, 2));
                $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $row->description);
                $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $row->loading_port_name);
                $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $row->province_name);
                $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $row->country_name.', '.$row->port_destination);
                $objPHPExcel->getActiveSheet()->setCellValue('L' . $i, $row->no_lse);
                $objPHPExcel->getActiveSheet()->setCellValue('M' . $i, date("d M Y", strtotime($row->date_issued)));
                $objPHPExcel->getActiveSheet()->setCellValue('N' . $i, number_format($row->total_fas, 2));
                $objPHPExcel->getActiveSheet()->setCellValue('O' . $i, number_format($row->total_quantity, 0));




                $objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('F' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('G' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('H' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('J' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('K' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('L' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('M' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('N' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $objPHPExcel->getActiveSheet()->getStyle('O' . $i)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                

                $i++;
                $no++;
            }


            // Set column widths
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(25);
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);

            // Merge cells
            // $objPHPExcel->getActiveSheet()->mergeCells('A1:U1');
            /* $objPHPExcel->getActiveSheet()->mergeCells('B2:H2');
              $objPHPExcel->getActiveSheet()->mergeCells('A4:H4');
              $objPHPExcel->getActiveSheet()->mergeCells('A5:H5'); */

            // Set fonts
            $styleHeader = array(
                'font' => array(
                    'name' => 'Candara',
                    'size' => 18,
                    'bold' => true,
                    'color' => array('argb' => PHPExcel_Style_Color::COLOR_WHITE)
                )
            );
            //$objPHPExcel->getActiveSheet()->getStyle('A1:H2')->applyFromArray($styleHeader);
            //$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setSize(14);
            // Set fonts -- Title
            //     $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setSize(14);
            //   $objPHPExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
            //  $objPHPExcel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            // Set fonts -- SubTitle
            // $objPHPExcel->getActiveSheet()->getStyle('A5')->getFont()->setSize(12);
            // $objPHPExcel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
            // $objPHPExcel->getActiveSheet()->getStyle('A5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('A3')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('A5')->getFont()->setBold(true);
            $objPHPExcel->getActiveSheet()->getStyle('A6')->getFont()->setBold(true);

            $objPHPExcel->getActiveSheet()->getStyle('A8:U8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            // Set thin black border outline around column
            $styleThinBlackBorderOutline = array(
                'borders' => array(
                    'outline' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN,
                        'color' => array('argb' => 'FF000000'),
                    ),
                ),
            );
            $objPHPExcel->getActiveSheet()->getStyle('A8:O' . $i)->applyFromArray($styleThinBlackBorderOutline);

            // Set fills
            /* $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
              $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFill()->getStartColor()->setARGB('FF808080');
              $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
              $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->getFill()->getStartColor()->setARGB('FF808080'); */

            // Set style for header row using alternative method
            $objPHPExcel->getActiveSheet()->getStyle('A8:O8')->applyFromArray(
                    array(
                        'font' => array(
                            'bold' => true
                        ),
                        /* 'alignment' => array(
                          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                          ), */
                        'borders' => array(
                            'top' => array(
                                'style' => PHPExcel_Style_Border::BORDER_THIN
                            ),
                            'bottom' => array(
                                'style' => PHPExcel_Style_Border::BORDER_THIN
                            )
                        ),
//                        'fill' => array(
//                            'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
//                            'rotation' => 90,
//                            'startcolor' => array(
//                                'argb' => 'FFA0A0A0'
//                            ),
//                            'endcolor' => array(
//                                'argb' => 'FFFFFFFF'
//                            )
//                        )
                    )
            );

            // Add a drawing to the worksheet
            /* $objDrawing = new PHPExcel_Worksheet_Drawing();
              $objDrawing->setName('Logo');
              $objDrawing->setDescription('Logo');
              $objDrawing->setPath('');
              $objDrawing->setWidthAndHeight(90,60);
              $objDrawing->setResizeProportional(true);
              $objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); */
            // Set active sheet index to the first sheet, so Excel opens this as the first sheet
            //$objPHPExcel->setActiveSheetIndex(0);


            $filename = "LSE - Report Daglu " . $stardate . "-" . $enddate . ".xlsx";
            ob_end_clean();

            // Redirect output to a client’s web browser (Excel2007)
            header('Content-Type: application/application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-Control: max-age=0');
            // If you're serving to IE 9, then the following may be needed
            header('Cache-Control: max-age=1');

            // If you're serving to IE over SSL, then the following may be needed
            header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
            header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
            header('Pragma: public'); // HTTP/1.0 


            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $objWriter->save('php://output');
            //$objWriter->save(str_replace('.php', '.xls', __FILE__));
            exit;
        }
    }

}
