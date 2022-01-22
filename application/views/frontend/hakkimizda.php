<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $genel_ayarlar->description; ?>">
    <meta name="keywords" content="<?php echo $genel_ayarlar->keywords; ?>">
    <meta name="google-site-verification" content="<?php echo $gfcode->google; ?>">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="author" content="Smartmetrics">
    <meta property="og:url" content="<?php echo $gfcode->facebook; ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $genel_ayarlar->title; ?>">
    <meta property="og:description" content="<?php echo $genel_ayarlar->description; ?>">
    <meta property="og:image" content="">
    <title><?php echo $genel_ayarlar->title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/vendor/owlcarousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/assets/css/style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>

<?php $this->load->view('frontend/menu'); ?>

<?php $this->load->view('frontend/slider'); ?>

<div class="eo-home-contact">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 col-img">

                <div class="eo-hc-slider">
                    <div class="head">
                        <h3 class="subtitle text-oswald">Hakkımızda</h3>
                        <h2 class="title"><?php echo $hakkimizda->title; ?></h2>
                    </div>
                    <div class="owl-carousel owl-theme" id="eo-slider2">
                        <div class="item">
                            <p><?php echo $hakkimizda->content; ?></p>
                            <span class="user text-oswald"><?php echo $hakkimizda->author; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="eo-hc-form">
                    <div class="head">
                        <img src="<?php echo base_url(); ?>assets/frontend/assets/img/icons/makas.png" loading="lazy" alt="Makas">
                        <h2 class="title">Onlıne Randevu</h2>
                    </div>
                    <form action="<?php echo base_url("hakkimizda/randevuOlustur"); ?>" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3"><input type="text" name="isim_soyisim" class="form-control" placeholder="İsim Soyisim" required></div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="E-mail" required></div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"><input type="text" name="telefon" class="form-control" placeholder="Telefon Numarası" required></div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <select name="servis_secimi" class="form-select" required>
                                        <option>Servis Seçimi</option>
                                        <?php foreach ($hizmetlerimiz as $hizmet) { ?>
                                        <option value="<?php echo $hizmet->title; ?>"><?php echo $hizmet->title; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3"><input type="text" class="form-control" name="tarih" placeholder="Tarih" id="datepicker" required></div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <input type="time" class="form-control" name="saat" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-red text-oswald">Randevu Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('frontend/calismasaatleri'); ?>

<?php $this->load->view('frontend/footer'); ?>

<script src="<?php echo base_url(); ?>assets/frontend/vendor/jquery/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/vendor/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/vendor/bootstrap/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/vendor/owlcarousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/frontend/assets/js/main.js"></script>

</body>
</html>