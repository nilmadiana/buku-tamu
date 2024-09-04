<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfview extends CI_Controller {
    public function index()
    {

        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Laporan Rekap Tamu';
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Rekap Tamu';
        // setting paper
        $paper = 'Legal';
        //orientasi paper potrait / landscape
        $orientation = "landscape";
        
		$html = $this->load->view('laporan_pdf',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }
}