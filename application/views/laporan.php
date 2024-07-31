<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->setFont('times','B',15);
$pdf->AddPage();
$judul = "Laporan tanggal ". $tanggal1." sampai ". $tanggal2;
$pdf->Cell(25,5,$judul,0,1);
$pdf->Ln();
$pdf->setFont('times','',12);
$pdf->Cell(8,5,'No',1,0,'C');
$pdf->Cell(25,5,'Tanggal',1,0,'C');
$pdf->Cell(60,5,'Keterangan',1,0,'C');
$pdf->Cell(25,5,'Pemasukan',1,0,'C');
$pdf->Cell(25,5,'Pengeluaran',1,0,'C');
$pdf->Cell(25,5,'Saldo',1,1,'C');
$pdf->setFont('times','',12);

$saldo_awal=0;
$pdf->setFont('times','',12);
$pdf->Cell(8,5,'',1,0,'C');
$pdf->Cell(85,5,'saldo awal sebelum tanggal '.$tanggal1,1,0,'L');
$pdf->Cell(25,5,'',1,0,'C');
$pdf->Cell(25,5,'',1,0,'C');
$pdf->Cell(25,5,number_format($saldo_awal),1,1,'L');
$pdf->setFont('times','',12);

$no = 1;
$saldo= $this->Transaksi_model->saldo_awal($tanggal1);
foreach($laporan as $ya){
    $pdf->Cell(8,5,$no,1,0,'C');
    $pdf->Cell(25,5,$ya['tanggal'],1,0,'C');
    $pdf->Cell(60,5,$ya['keterangan'],1,0,'C');
    if($ya['jenis_transaksi']=='Pemasukan'){
        $pdf->Cell(25,5,number_format($ya['nominal']),1,0,'L');
        $pdf->Cell(25,5,' ',1,0,'L');
    }else{
        $pdf->Cell(25,5,' ',1,0,'L');
        $pdf->Cell(25,5,number_format($ya['nominal']),1,0,'L');
    }
    
    $saldo = $saldo+$ya['nominal'];
    $pdf->Cell(25,5,number_format($saldo),1,1,'L');
    $no ++;
}

$pdf->Output('laporan.pdf', 'I');
