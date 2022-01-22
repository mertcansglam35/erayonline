<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hakkimizda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("hakkimizda");
        $viewData->hakkimizda = $data;

        $iletisim_bilgi = $this->Default_model->get("iletisim_bilgileri");
        $viewData->iletisim_bilgileri = $iletisim_bilgi;

        $hizmetlerimiz = $this->Default_model->get_all("hizmetlerimiz");
        $viewData->hizmetlerimiz = $hizmetlerimiz;

        $genel_ayarlar = $this->Default_model->get("genel_ayarlar", array("id" => 1));
        $viewData->genel_ayarlar = $genel_ayarlar;

        $slider = $this->Default_model->get_all("slider");
        $viewData->slider = $slider;

        $gfcode = $this->Default_model->get("gf_code", array("id" => 1));
        $viewData->gfcode = $gfcode;

        $this->load->view('frontend/hakkimizda', $viewData);
    }

    public function randevuOlustur()
    {

        if ($this->input->method() == "post") {

            $isim_soyisim = htmlspecialchars(strip_tags($this->input->post('isim_soyisim', true)));
            $email = htmlspecialchars(strip_tags($this->input->post('email', true)));
            $telefon = htmlspecialchars(strip_tags($this->input->post('telefon', true)));
            $servis_secimi = htmlspecialchars(strip_tags($this->input->post('servis_secimi', true)));
            $tarih = htmlspecialchars(strip_tags($this->input->post('tarih', true)));
            $saat = htmlspecialchars(strip_tags($this->input->post('saat', true)));
            
            if (empty($isim_soyisim) || empty($email) || empty($telefon) || empty($servis_secimi) || empty($tarih) || empty($saat)) {

                $viewData = new stdClass();

                $iletisim_bilgi = $this->Default_model->get("iletisim_bilgileri");
                $viewData->iletisim_bilgileri = $iletisim_bilgi;
                $mikrokaynak = $this->Default_model->get("anasayfa_mikrokaynak");
                $viewData->mikrokaynak = $mikrokaynak;
                $genel_ayarlar = $this->Default_model->get("genel_ayarlar", array("id" => 1));
                $viewData->genel_ayarlar = $genel_ayarlar;
                $slider = $this->Default_model->get_all("slider");
                $viewData->slider = $slider;
                $gfcode = $this->Default_model->get("gf_code", array("id" => 1));
                $viewData->gfcode = $gfcode;

                $this->load->view('frontend/randevubosalan', $viewData);
                header("Refresh:5; url=" . base_url('hakkimizda') . "");

            } else {

                // Daha Önceden Eşleşen Alınmış Randevu Varmı Sorgula Var ise Ekleme Yok İse Ekle
                $sorgulaRandevu = $this->Default_model
                    ->get("randevu",
                        array(
                            "isim_soyisim" => $isim_soyisim,
                            "email" => $email,
                            "telefon" => $telefon,
                            "servis_secimi" => $servis_secimi,
                            "tarih" => $tarih,
                            "saat" => $saat
                        )
                    );

                if ($sorgulaRandevu) {

                    $viewData = new stdClass();

                    $iletisim_bilgi = $this->Default_model->get("iletisim_bilgileri");
                    $viewData->iletisim_bilgileri = $iletisim_bilgi;
                    $mikrokaynak = $this->Default_model->get("anasayfa_mikrokaynak");
                    $viewData->mikrokaynak = $mikrokaynak;
                    $genel_ayarlar = $this->Default_model->get("genel_ayarlar", array("id" => 1));
                    $viewData->genel_ayarlar = $genel_ayarlar;
                    $slider = $this->Default_model->get_all("slider");
                    $viewData->slider = $slider;
                    $gfcode = $this->Default_model->get("gf_code", array("id" => 1));
                    $viewData->gfcode = $gfcode;

                    $this->load->view('frontend/randevuvar', $viewData);
                    header("Refresh:5; url=" . base_url('hakkimizda') . "");

                } else {

                    // Randevu Ekle
                    $randevuEkle = $this->Default_model->insert("randevu",
                        array(
                            "isim_soyisim" => $isim_soyisim,
                            "email" => $email,
                            "telefon" => $telefon,
                            "servis_secimi" => $servis_secimi,
                            "tarih" => $tarih,
                            "saat" => $saat
                        )
                    );

                    if ($randevuEkle) {

                        $viewData = new stdClass();

                        $iletisim_bilgi = $this->Default_model->get("iletisim_bilgileri");
                        $viewData->iletisim_bilgileri = $iletisim_bilgi;
                        $mikrokaynak = $this->Default_model->get("anasayfa_mikrokaynak");
                        $viewData->mikrokaynak = $mikrokaynak;
                        $genel_ayarlar = $this->Default_model->get("genel_ayarlar", array("id" => 1));
                        $viewData->genel_ayarlar = $genel_ayarlar;
                        $slider = $this->Default_model->get_all("slider");
                        $viewData->slider = $slider;
                        $gfcode = $this->Default_model->get("gf_code", array("id" => 1));
                        $viewData->gfcode = $gfcode;

                        $this->load->view('frontend/randevubasarili', $viewData);
                        header("Refresh:5; url=" . base_url() . "");

                    } else {

                        $viewData = new stdClass();

                        $iletisim_bilgi = $this->Default_model->get("iletisim_bilgileri");
                        $viewData->iletisim_bilgileri = $iletisim_bilgi;
                        $mikrokaynak = $this->Default_model->get("anasayfa_mikrokaynak");
                        $viewData->mikrokaynak = $mikrokaynak;
                        $genel_ayarlar = $this->Default_model->get("genel_ayarlar", array("id" => 1));
                        $viewData->genel_ayarlar = $genel_ayarlar;
                        $slider = $this->Default_model->get_all("slider");
                        $viewData->slider = $slider;
                        $gfcode = $this->Default_model->get("gf_code", array("id" => 1));
                        $viewData->gfcode = $gfcode;

                        $this->load->view('frontend/randevubasarisiz', $viewData);
                        header("Refresh:5; url=" . base_url('hakkimizda') . "");

                    }
                }

            }

        }
        else
        {
            redirect(base_url("hakkimizda"));
        }
    }
}
