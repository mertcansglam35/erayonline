<footer class="eo-footer">
    <div class="container">
        <div class="logo">
            <img src="<?php echo base_url(); ?>assets/frontend/assets/img/logo-footer.png" alt="Logo Footer" loading="lazy">
        </div>
        <div class="form">
            <div class="row">
                <div class="col-lg-10"><input type="mail" class="form-control text-oswald" placeholder="Yeniliklerden haberdar olmak için e-maıl adresinizi yazın."></div>
                <div class="col-lg-2"><button type="submit" class="btn btn-red btn-block text-oswald text-uppercase">Gönder</button></div>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4">
                <div class="eo-footer-content">
                    <h2 class="title text-oswald">Bize Ulaşın</h2>

                    <div class="fc-flex">
                        <div class="icon"><span class="lnr lnr-map-marker"></span></div>
                        <div class="content">
                            <span class="text text-uppercase"><?php echo $iletisim_bilgileri->adres; ?></span>
                        </div>
                    </div>

                    <div class="fc-flex">
                        <div class="icon"><span class="lnr lnr-envelope"></span></div>
                        <div class="content">
                            <a href="mailto:<?php echo $iletisim_bilgileri->email; ?>" class="text"><?php echo $iletisim_bilgileri->email; ?></a>
                        </div>
                    </div>

                    <div class="fc-flex">
                        <div class="icon"><span class="lnr lnr-phone"></span></div>
                        <div class="content">
                            <a href="<?php echo base_url(); ?>" class="text"><?php echo $iletisim_bilgileri->telefon; ?></a><br>
                            <a href="<?php echo base_url(); ?>" class="text"><?php echo $iletisim_bilgileri->telefon2; ?></a><br>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="eo-footer-content">
                    <h2 class="title text-oswald">Çalışma Saatlerimiz</h2>
                    <div class="fc-hour">
                        <span class="text-uppercase">Hafta İçi</span>
                        <span>09:00 - 19:00</span>
                    </div>
                    <div class="fc-hour">
                        <span class="text-uppercase">Hafta Sonu</span>
                        <span>09:00 - 18:00</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="social">
            <ul class="list-unstyled">
                <li><a href="<?php echo $iletisim_bilgileri->facebook; ?>"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="<?php echo $iletisim_bilgileri->twitter; ?>"><i class="fab fa-twitter"></i></a></li>
                <li><a href="<?php echo $iletisim_bilgileri->google; ?>"><i class="fab fa-google-plus-g"></i></a></li>
                <li><a href="<?php echo $iletisim_bilgileri->instagram; ?>"><i class="fab fa-instagram"></i></a></li>
                <li><a href="<?php echo $iletisim_bilgileri->pinterest; ?>"><i class="fab fa-pinterest"></i></a></li>
            </ul>
        </div>
    </div>
</footer>