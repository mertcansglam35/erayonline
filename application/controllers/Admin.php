<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('backend/index');
    }

    public function login()
    {
        $this->load->view('backend/login');
    }

    public function loginPost()
    {
        if ($this->input->method() == "post") {
            $this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Şifre', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                echo validation_errors();
            } else {
                $query = $this->Default_model->get("admin",
                    array(
                        "email" => htmlspecialchars(trim($this->input->post('email', true))),
                        "password" => sha1(md5(htmlspecialchars(trim($this->input->post('password', true)))))
                    )
                );

                if ($query) {
                    $this->session->set_userdata([
                        'oturum' => true,
                        'email' => $query->email,
                        'password' => $query->password
                    ]);

                    $this->load->view("backend/basarili");
                    header("Refresh:5; url=" . base_url('admin') . "");
                } else {
                    $this->load->view("backend/hata");
                    header("Refresh:5; url=" . base_url('admin/login') . "");
                }
            }
        } else {
            redirect(base_url("admin/login"));
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect(base_url("admin/login"));
    }

    public function hakkimizda()
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("hakkimizda");
        $viewData->hakkimizda = $data;

        $this->load->view('backend/hakkimizda_list', $viewData);
    }

    public function hakkimizda_form($id)
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("hakkimizda", array("id" => $id));
        $viewData->hakkimizda = $data;

        $this->load->view('backend/hakkimizda_form', $viewData);
    }

    public function hakkimizda_update($id)
    {
        if ($this->input->method() == "post") {

            $title = strip_tags(htmlspecialchars($this->input->post('title', true)));
            $content = strip_tags(htmlspecialchars($this->input->post('content', true)));
            $author = strip_tags(htmlspecialchars($this->input->post('author', true)));

            if (empty($title) || empty($content) || empty($author)) {
                redirect(base_url("admin/hakkimizda"));
            } else {
                $update = $this->Default_model->update("hakkimizda",
                    array(
                        "id" => $id
                    ),
                    array(
                        "title" => $title,
                        "content" => $content,
                        "author" => $author
                    ));

                if ($update) {
                    $this->load->view('backend/basariligenel');
                    header("Refresh:3; url=" . base_url("admin/hakkimizda") . "");
                } else {
                    $this->load->view('backend/hatagenel');
                    header("Refresh:3; url=" . base_url("admin/hakkimizda") . "");
                }
            }

        } else {
            redirect(base_url("admin"));
        }
    }

    public function hizmetlerimiz()
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get_all("hizmetlerimiz");
        $viewData->hizmetlerimiz = $data;

        $this->load->view('backend/hizmetlerimiz_list', $viewData);
    }

    public function hizmetlerimiz_add()
    {
        $this->load->view('backend/hizmetlerimiz_add');
    }

    public function hizmetlerimiz_form($id)
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("hizmetlerimiz", array("id" => $id));
        $viewData->hizmetlerimiz = $data;

        $this->load->view('backend/hizmetlerimiz_form', $viewData);
    }

    public function hizmetlerimiz_update($id)
    {
        if ($this->input->method() == "post") {

            $title = strip_tags(htmlspecialchars($this->input->post('title', true)));
            $content = strip_tags(htmlspecialchars($this->input->post('content', true)));

            if (empty($title) || empty($content)) {
                redirect(base_url("admin/hizmetlerimiz"));
            } else {

                $config['upload_path'] = './icons/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('icon')) {
                    echo $this->upload->display_errors();
                } else {
                    $filedata = $this->upload->data();
                    $filename = $filedata['file_name'];
                }

                $update = $this->Default_model->update("hizmetlerimiz",
                    array(
                        "id" => $id
                    ),
                    array(
                        "title" => $title,
                        "content" => $content,
                        "icon" => $filename
                    ));

                if ($update) {
                    $this->load->view('backend/basariligenel');
                    header("Refresh:3; url=" . base_url("admin/hizmetlerimiz") . "");
                } else {
                    $this->load->view('backend/hatagenel');
                    header("Refresh:3; url=" . base_url("admin/hizmetlerimiz") . "");
                }
            }

        } else {
            redirect(base_url("admin"));
        }
    }

    public function hizmetlerimiz_delete($id)
    {
        $delete = $this->Default_model->delete("hizmetlerimiz",
            array(
                "id" => $id
            )
        );

        if ($delete) {
            $this->load->view('backend/basariligenel');
            header("Refresh:3; url=" . base_url("admin/hizmetlerimiz") . "");
        } else {
            $this->load->view('backend/hatagenel');
            header("Refresh:3; url=" . base_url("admin/hizmetlerimiz") . "");
        }
    }

    public function hizmetlerimiz_addPost()
    {
        if ($this->input->method() == "post") {
            $title = strip_tags(htmlspecialchars($this->input->post("title", true)));
            $content = strip_tags(htmlspecialchars($this->input->post("content", true)));

            if (empty($title) || empty($content)) {
                $this->load->view('backend/bosalan');
                header("Refresh:3; url=" . base_url('admin/hizmetlerimiz') . "");
            } else {
                $sorgulaHizmet = $this->Default_model
                    ->get_all("hizmetlerimiz",
                        array(
                            "title" => $title,
                            "content" => $content
                        )
                    );

                if ($sorgulaHizmet) {
                    $this->load->view('backend/zatenvargenel');
                    header("Refresh:3; url=" . base_url('admin/hizmetlerimiz_add') . "");
                } else {

                    $config['upload_path'] = './icons/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['encrypt_name'] = true;

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('icon')) {
                        echo $this->upload->display_errors();
                    } else {
                        $filedata = $this->upload->data();
                        $filename = $filedata['file_name'];
                    }

                    // Hizmet Ekle
                    $hizmetEkle = $this->Default_model->insert("hizmetlerimiz",
                        array(
                            "title" => $title,
                            "content" => $content,
                            "icon" => $filename
                        )
                    );

                    if ($hizmetEkle) {
                        $this->load->view('backend/basariligenel');
                        header("Refresh:3; url=" . base_url("admin/hizmetlerimiz") . "");
                    } else {
                        $this->load->view('backend/hatagenel');
                        header("Refresh:3; url=" . base_url("admin/hizmetlerimiz") . "");
                    }
                }
            }
        }
    }

    public function degisimler()
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get_all("degisimler");
        $viewData->degisimler = $data;

        $this->load->view('backend/degisimler_list', $viewData);
    }

    public function degisimler_form($id)
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("degisimler", array("id" => $id));
        $viewData->degisimler = $data;

        $this->load->view('backend/degisimler_form', $viewData);
    }

    public function degisimler_update($id)
    {
        if ($this->input->method() == "post") {

            $videolink = strip_tags(htmlspecialchars($this->input->post('videolink', true)));

            if (empty($videolink)) {
                redirect(base_url("admin/degisimler"));
            } else {

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['encrypt_name'] = true;

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('resimurl')) {
                    echo $this->upload->display_errors();
                } else {
                    $filedata = $this->upload->data();
                    $filename = $filedata['file_name'];
                }

                $update = $this->Default_model->update("degisimler",
                    array(
                        "id" => $id
                    ),
                    array(
                        "resimurl" => $filename,
                        "videolink" => $videolink
                    ));

                if ($update) {
                    $this->load->view('backend/basariligenel');
                    header("Refresh:3; url=" . base_url("admin/degisimler") . "");
                } else {
                    $this->load->view('backend/hatagenel');
                    header("Refresh:3; url=" . base_url("admin/degisimler") . "");
                }
            }

        } else {
            redirect(base_url("admin"));
        }
    }

    public function degisimler_addPost()
    {
        if ($this->input->method() == "post") {
            $resimurl = strip_tags(htmlspecialchars($this->input->post("resimurl", true)));
            $videolink = strip_tags(htmlspecialchars($this->input->post("videolink", true)));

            if (empty($resimurl) || empty($videolink)) {
                $this->load->view('backend/bosalan');
                header("Refresh:3; url=" . base_url('admin/degisimler') . "");
            } else {
                $sorgulaDegisimler = $this->Default_model
                    ->get_all("degisimler",
                        array(
                            "resimurl" => $resimurl,
                            "videolink" => $videolink
                        )
                    );

                if ($sorgulaDegisimler) {
                    $this->load->view('backend/zatenvargenel');
                    header("Refresh:3; url=" . base_url('admin/degisimler') . "");
                } else {
                    // Değişimler Ekle
                    $degisimEkle = $this->Default_model->insert("degisimler",
                        array(
                            "resimurl" => $resimurl,
                            "videolink" => $videolink
                        )
                    );

                    if ($degisimEkle) {
                        $this->load->view('backend/basariligenel');
                        header("Refresh:3; url=" . base_url("admin/degisimler") . "");
                    } else {
                        $this->load->view('backend/hatagenel');
                        header("Refresh:3; url=" . base_url("admin/degisimler") . "");
                    }
                }
            }
        }
    }

    public function degisimler_add()
    {
        $this->load->view('backend/degisimler_add');
    }

    public function degisimler_delete($id)
    {
        $delete = $this->Default_model->delete("degisimler",
            array(
                "id" => $id
            )
        );

        if ($delete) {
            $this->load->view('backend/basariligenel');
            header("Refresh:3; url=" . base_url("admin/degisimler") . "");
        } else {
            $this->load->view('backend/hatagenel');
            header("Refresh:3; url=" . base_url("admin/degisimler") . "");
        }
    }

    public function randevu_list()
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get_all("randevu");
        $viewData->randevular = $data;

        $this->load->view('backend/randevu_list', $viewData);
    }

    public function randevu_delete($id)
    {
        $delete = $this->Default_model->delete("randevu",
            array(
                "id" => $id
            )
        );

        if ($delete) {
            $this->load->view('backend/basariligenel');
            header("Refresh:3; url=" . base_url("admin/randevu_list") . "");
        } else {
            $this->load->view('backend/hatagenel');
            header("Refresh:3; url=" . base_url("admin/randevu_list") . "");
        }
    }

    public function genel_ayarlar()
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("genel_ayarlar", array("id" => 1));
        $viewData->genel_ayarlar = $data;

        $this->load->view('backend/genelayarlar_list', $viewData);
    }

    public function genelayarlar_form($id)
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("genel_ayarlar", array("id" => 1));
        $viewData->genel_ayarlar = $data;

        $this->load->view('backend/genelayarlar_form', $viewData);
    }

    public function genelayarlar_update($id)
    {
        if ($this->input->method() == "post") {

            $title = strip_tags(htmlspecialchars($this->input->post('title', true)));
            $description = strip_tags(htmlspecialchars($this->input->post('description', true)));
            $keywords = strip_tags(htmlspecialchars($this->input->post('keywords', true)));

            if (empty($title) || empty($description) || empty($keywords)) {
                redirect(base_url("admin/genel_ayarlar"));
            } else {
                $update = $this->Default_model->update("genel_ayarlar",
                    array(
                        "id" => $id
                    ),
                    array(
                        "title" => $title,
                        "description" => $description,
                        "keywords" => $keywords
                    ));

                if ($update) {
                    $this->load->view('backend/basariligenel');
                    header("Refresh:3; url=" . base_url("admin/genel_ayarlar") . "");
                } else {
                    $this->load->view('backend/hatagenel');
                    header("Refresh:3; url=" . base_url("admin/genel_ayarlar") . "");
                }
            }

        } else {
            redirect(base_url("admin"));
        }
    }

    public function mikrokaynak()
    {
        $viewData = new stdClass();

        $mikrokaynak = $this->Default_model->get("anasayfa_mikrokaynak", array("id" => 1));
        $viewData->mikrokaynak = $mikrokaynak;

        $this->load->view('backend/mikrokaynak_list', $viewData);
    }

    public function mikrokaynak_form($id)
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("anasayfa_mikrokaynak", array("id" => 1));
        $viewData->mikrokaynak = $data;

        $this->load->view('backend/mikrokaynak_form', $viewData);
    }

    public function mikrokaynak_update($id)
    {
        if ($this->input->method() == "post") {

            $subtitle = strip_tags(htmlspecialchars($this->input->post('subtitle', true)));
            $title = strip_tags(htmlspecialchars($this->input->post('title', true)));
            $content = strip_tags(htmlspecialchars($this->input->post('content', true)));

            if (empty($subtitle) || empty($title) || empty($content)) {
                redirect(base_url("admin/mikrokaynak"));
            } else {
                $update = $this->Default_model->update("anasayfa_mikrokaynak",
                    array(
                        "id" => $id
                    ),
                    array(
                        "subtitle" => $subtitle,
                        "title" => $title,
                        "content" => $content
                    ));

                if ($update) {
                    $this->load->view('backend/basariligenel');
                    header("Refresh:3; url=" . base_url("admin/mikrokaynak") . "");
                } else {
                    $this->load->view('backend/hatagenel');
                    header("Refresh:3; url=" . base_url("admin/mikrokaynak") . "");
                }
            }

        } else {
            redirect(base_url("admin"));
        }
    }

    public function iletisim_bilgileri()
    {
        $viewData = new stdClass();

        $iletisim_bilgi = $this->Default_model->get("iletisim_bilgileri");
        $viewData->iletisim_bilgileri = $iletisim_bilgi;

        $this->load->view('backend/iletisimbilgileri_list', $viewData);
    }

    public function iletisimbilgileri_form($id)
    {
        $viewData = new stdClass();

        $iletisim_bilgi = $this->Default_model->get("iletisim_bilgileri");
        $viewData->iletisim_bilgileri = $iletisim_bilgi;

        $this->load->view('backend/iletisimbilgileri_form', $viewData);
    }

    public function iletisimbilgileri_update($id)
    {
        if ($this->input->method() == "post") {

            $adres = $this->input->post('adres', true);
            $telefon = $this->input->post('telefon', true);
            $telefon2 = $this->input->post('telefon2', true);
            $email = $this->input->post('email', true);
            $facebook = $this->input->post('facebook', true);
            $twitter = $this->input->post('twitter', true);
            $google = $this->input->post('google', true);
            $instagram = $this->input->post('instagram', true);
            $pinterest = $this->input->post('pinterest', true);

            if (empty($adres) || empty($telefon) || empty($telefon2) || empty($email) || empty($facebook) || empty($twitter) || empty($google) || empty($instagram) || empty($pinterest)) {
                redirect(base_url("admin/iletisim_bilgileri"));
            } else {
                $update = $this->Default_model->update("iletisim_bilgileri",
                    array(
                        "id" => $id
                    ),
                    array(
                        "adres" => $adres,
                        "telefon" => $telefon,
                        "telefon2" => $telefon2,
                        "email" => $email,
                        "facebook" => $facebook,
                        "twitter" => $twitter,
                        "google" => $google,
                        "instagram" => $instagram,
                        "pinterest" => $pinterest
                    ));

                if ($update) {
                    $this->load->view('backend/basariligenel');
                    header("Refresh:3; url=" . base_url("admin/iletisim_bilgileri") . "");
                } else {
                    $this->load->view('backend/hatagenel');
                    header("Refresh:3; url=" . base_url("admin/iletisim_bilgileri") . "");
                }
            }

        } else {
            redirect(base_url("admin"));
        }
    }

    public function slider()
    {
        $viewData = new stdClass();

        $slider_bilgi = $this->Default_model->get_all("slider");
        $viewData->slider = $slider_bilgi;

        $this->load->view('backend/slider_list', $viewData);
    }

    public function slider_add()
    {
        $this->load->view('backend/slider_add');
    }

    public function slider_addPost()
    {
        if ($this->input->method() == "post") {

            $config['upload_path'] = './slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('resim')) {
                echo $this->upload->display_errors();
            } else {
                $filedata = $this->upload->data();
                $filename = $filedata['file_name'];
            }

            // Slider Ekle
            $sliderEkle = $this->Default_model->insert("slider",
                array(
                    "resim" => $filename
                )
            );

            if ($sliderEkle) {
                $this->load->view('backend/basariligenel');
                header("Refresh:3; url=" . base_url("admin/slider") . "");
            } else {
                $this->load->view('backend/hatagenel');
                header("Refresh:3; url=" . base_url("admin/slider") . "");
            }
        }
    }

    public function slider_form($id)
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("slider");
        $viewData->slider = $data;

        $this->load->view('backend/slider_update', $viewData);
    }

    public function slider_update($id)
    {
        if ($this->input->method() == "post") {

            $config['upload_path'] = './slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('resim')) {
                echo $this->upload->display_errors();
            } else {
                $filedata = $this->upload->data();
                $filename = $filedata['file_name'];
            }

            $update = $this->Default_model->update("slider",
                array(
                    "id" => $id
                ),
                array(
                    "resim" => $filename
                ));

            if ($update) {
                $this->load->view('backend/basariligenel');
                header("Refresh:3; url=" . base_url("admin/slider") . "");
            } else {
                $this->load->view('backend/hatagenel');
                header("Refresh:3; url=" . base_url("admin/slider") . "");
            }

        } else {
            redirect(base_url("admin"));
        }
    }
    
    public function slider_delete($id)
    {
        $delete = $this->Default_model->delete("slider",
            array(
                "id" => $id
            )
        );

        if ($delete) {
            $this->load->view('backend/basariligenel');
            header("Refresh:3; url=" . base_url("admin/slider") . "");
        } else {
            $this->load->view('backend/hatagenel');
            header("Refresh:3; url=" . base_url("admin/slider") . "");
        }
    }

    public function bilgilerim()
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("admin", array("id" => 1));
        $viewData->bilgilerim = $data;

        $this->load->view('backend/bilgilerim_list', $viewData);
    }

    public function bilgilerim_form($id)
    {
        $viewData = new stdClass();

        $data = $this->Default_model->get("admin", array("id" => 1));
        $viewData->bilgilerim = $data;

        $this->load->view('backend/bilgilerim_form', $viewData);
    }

    public function bilgilerim_update($id)
    {
        if ($this->input->method() == "post")
        {
            $email    = htmlspecialchars(strip_tags($this->input->post('email', true)));
            $password = sha1(md5(htmlspecialchars(strip_tags($this->input->post('password', true)))));

            if (empty($email) || empty($password))
            {
                redirect(base_url("admin/bilgilerim"));
            }
            else
            {
                $update = $this->Default_model->update("admin",
                    array(
                        "id" => $id
                    ),
                    array(
                        "email" => $email,
                        "password" => $password
                    ));

                if ($update) {
                    $this->load->view('backend/basariligenel');
                    header("Refresh:3; url=" . base_url("admin/login") . "");
                } else {
                    $this->load->view('backend/hatagenel');
                    header("Refresh:3; url=" . base_url("admin/bilgilerim") . "");
                }
            }
        }
        else
        {
            redirect(base_url("admin"));
        }
    }

    public function gf_code()
    {
        $viewData = new stdClass();

        $gfcode = $this->Default_model->get("gf_code", array("id" => 1));
        $viewData->gf_code = $gfcode;

        $this->load->view('backend/gfcode_list', $viewData);
    }

    public function gf_code_form($id)
    {
        $viewData = new stdClass();

        $gfcode = $this->Default_model->get("gf_code", array("id" => 1));
        $viewData->gf_code = $gfcode;

        $this->load->view('backend/gfcode_form', $viewData);
    }

    public function gfcode_update($id)
    {
        if ($this->input->method() == "post")
        {
            $google = htmlspecialchars(strip_tags($this->input->post('google', true)));
            $facebook = htmlspecialchars(strip_tags($this->input->post('facebook', true)));

            if (empty($google) || empty($facebook))
            {
                redirect(base_url("admin/gf_code"));
            }
            else
            {
                $update = $this->Default_model->update("gf_code",
                    array(
                        "id" => $id
                    ),
                    array(
                        "google" => $google,
                        "facebook" => $facebook
                    ));

                if ($update) {
                    $this->load->view('backend/basariligenel');
                    header("Refresh:3; url=" . base_url("admin/gf_code") . "");
                } else {
                    $this->load->view('backend/hatagenel');
                    header("Refresh:3; url=" . base_url("admin/gf_code") . "");
                }
            }


        }
        else
        {
            redirect(base_url("admin"));
        }
    }
}
