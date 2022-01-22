<?php

if ($this->session->userdata('email') && $this->session->userdata('password')) {

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Eray Online | Yönetim Paneli</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?php $this->load->view("backend/menu"); ?>

        <?php $this->load->view("backend/sidebar"); ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Genel Ayarlar Düzenle</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0"></h5>
                                </div>
                                <div class="card-body">
                                    <form action="<?php echo base_url("admin/genelayarlar_update/$genel_ayarlar->id"); ?>" method="POST">
                                        <div class="form-group">
                                            <label>Site Başlığı</label>
                                            <input type="text" name="title" class="form-control" value="<?php echo $genel_ayarlar->title; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Site Açıklaması</label>
                                            <textarea rows="6" name="description" class="form-control"><?php echo $genel_ayarlar->description; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Anahtar Kelimeler</label>
                                            <textarea rows="6" name="keywords" class="form-control"><?php echo $genel_ayarlar->keywords; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success" value="Güncelle">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view("backend/footer"); ?>

    </div>

    <script src="<?php echo base_url(); ?>assets/backend/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/backend/dist/js/adminlte.min.js"></script>

    </body>
    </html>

<?php } else {
    redirect(base_url("admin/login"));
}

?>