<div class="eo-slider">
    <div class="owl-carousel owl-theme" id="eo-slider1">

        <?php foreach ($slider as $slide) { ?>
        <div class="item" style="background-image:url('<?php echo base_url(); ?>slider/<?php echo $slide->resim; ?>')" data-dot="01">
            <div class="container">
                <div class="content text-end">
                    <h3 class="subtitle text-oswald">Saçlarınız</h3>
                    <h2 class="title text-oswald">Bizim İçin<br>Çok Önemli!</h2>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>