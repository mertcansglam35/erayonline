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

<div class="eo-changes">

    <div class="title">
        <h2>Fark Yaratan Değişimler</h2>
    </div>

    <div class="container-fluid">
        <div class="row">

            <?php foreach ($degisimler as $degisim) { ?>
            <div class="col-6 col-lg-3 col-img">
                <div class="eo-change-image">
                    <img src="<?php echo base_url(); ?>uploads/<?php echo $degisim->resimurl; ?>" alt="Değişim" lazy="loading" class="img-change">
                    <div class="content-change">
                        <iframe width="560" height="400" src="https://www.youtube.com/embed/<?php echo $degisim->videolink; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <?php } ?>

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