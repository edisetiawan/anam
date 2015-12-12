<?php
require_once "Classes/PHPExcel.php";

$arrData = array(array('tahun' => 1980, 'jumlah' => '5000'), array('tahun' => 1981, 'jumlah' => '4000'), array('tahun' => 1982, 'jumlah' => '700'), array('tahun' => 1983, 'jumlah' => '2000'), array('tahun' => 1984, 'jumlah' => '3500'), array('tahun' => 1985, 'jumlah' => '1250'));

$objExcel = new PHPExcel();

$objExcel->setActiveSheetIndex(0);
$sheet = $objExcel->getActiveSheet();

// set default font setting for document
$sheet->getDefaultStyle()->getFont()->setName('Arial')->setSize('10');

// setting paging
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
$sheet->getPageSetup()->setFitToWidth(1);
$sheet->getPageSetup()->setFitToHeight(0);
$sheet->getPageSetup()->setHorizontalCentered(true);
$sheet->getPageSetup()->setVerticalCentered(false);

// set worksheet name
$sheet->setTitle('Penduduk');
$sheet->setShowGridlines(true);

// generate value
if (empty($arrData)) {
   $sheet->setCellValue('A1', '-- Data Tidak Ditemukan --');
} else {
   
   // set coloum
   $sheet->getColumnDimension('A')->setWidth('7');
   $sheet->getColumnDimension('B')->setWidth('15');
   $sheet->getColumnDimension('C')->setWidth('15');
   
   $sheet->SetCellValue('A1', 'NO');
   $sheet->SetCellValue('B1', 'TAHUN');
   $sheet->SetCellValue('C1', 'JUMLAH');
   
   $setFirstColumn = '1';
   $number = 0;
   foreach ($arrData as $key => $value) {
      $number++;
      $value['number'] = $number;
      $sheet->setCellValueByColumnAndRow(0, $setFirstColumn + $number, $value['number']);
      $sheet->setCellValueByColumnAndRow(1, $setFirstColumn + $number, $value['tahun']);
      $sheet->setCellValueByColumnAndRow(2, $setFirstColumn + $number, $value['jumlah']);
   }
}

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Penduduk_' . date('ymdHis') . '.xlsx"');
header('Cache-Control: max-age=0');

// Save Excel 2007 file
$objWriter = PHPExcel_IOFactory::createWriter($objExcel, 'Excel2007');
$objWriter->save('php://output');
$objExcel->disconnectWorksheets();
unset($objExcel);
?>