<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PdfBeranda extends CI_Controller {
    public function index()
    {
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Resepsionis';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Rekap Tamu';
        // setting paper
        $paper = 'legal';
        //orientasi paper potrait / landscape
        $orientation = "landscape";
        
		$html = $this->load->view('laporan_beranda',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }
}