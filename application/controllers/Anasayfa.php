<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anasayfa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        $viewData = new stdClass();

        $mikrokaynak = $this->Default_model->get("anasayfa_mikrokaynak");
        $viewData->mikrokaynak = $mikrokaynak;

        $iletisim_bilgi = $this->Default_model->get("iletisim_bilgileri");
        $viewData->iletisim_bilgileri = $iletisim_bilgi;

        $genel_ayarlar = $this->Default_model->get("genel_ayarlar", array("id" => 1));
        $viewData->genel_ayarlar = $genel_ayarlar;

        $slider = $this->Default_model->get_all("slider");
        $viewData->slider = $slider;

        $gfcode = $this->Default_model->get("gf_code", array("id" => 1));
        $viewData->gfcode = $gfcode;

        $this->load->view('frontend/index', $viewData);
	}
}
