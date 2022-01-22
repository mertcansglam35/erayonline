<?php

if ($this->session->userdata('email') && $this->session->userdata('password')) {
    redirect(base_url("admin"));
} else {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eray Online | Yönetim Paneli Giriş</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/backend/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?php echo base_url("admin/login"); ?>" class="h1"><b>Eray </b>Online</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg"></p>

            <form action="<?php echo base_url("admin/loginPost"); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="E-Mail">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Şifre">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/backend/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/dist/js/adminlte.min.js"></script>

</body>
</html>
<?php } ?>