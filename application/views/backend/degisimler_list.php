<?php

if ($this->session->userdata('email') && $this->session->userdata('password'))
{

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
                            <h1 class="m-0">Değişimler</h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p><a href="<?php echo base_url("admin/degisimler_add"); ?>" class="btn btn-success">Yeni Ekle</a></p>
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0"></h5>
                                </div>
                                <div class="card-body">

                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Resim</th>
                                                <th>Youtube Video Code</th>
                                                <th>İşlem</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($degisimler as $degisim) { ?>
                                            <tr>
                                                <td><?php echo $degisim->id; ?></td>
                                                <td><img src="<?php echo base_url(); ?>uploads/<?php echo $degisim->resimurl; ?>" alt="" class="img-fluid" width="200px" loading="lazy" height="200px"></td>
                                                <td><?php echo $degisim->videolink; ?></td>
                                                <td>
                                                    <a href="<?php echo base_url("admin/degisimler_form/$degisim->id") ?>" class="btn btn-warning">Düzenle</a>
                                                    <a href="<?php echo base_url("admin/degisimler_delete/$degisim->id") ?>" class="btn btn-danger">Sil</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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

<?php } else
{
    redirect(base_url("admin/login"));
}

?>