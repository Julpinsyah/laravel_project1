<!-- BANNER -->
<div class="section subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption">Gallery</div>
            </div>
        </div>
    </div>
</div>

<!-- GALLERY SECTION -->
<div class="section singlepage">


    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="page-title">
                            <h2 class="lead">GALLERY</h2>
                            <div class="border-style"></div>
                        </div>
                    </div>
                </div>
                <div class="row popup-gallery">
                    <?php foreach ($mygallery as $gl) { ?>
                        <div class="col-xs-4 col-sm-3 col-md-3">
                            <div class="w-item">
                                <a href="<?= base_url('adminfc/public/images/galeri/') . $gl['gambar'] ?>" title="Gallery #1">
                                    <img style="height: 184px; width: 100%;" src="<?= base_url('adminfc/public/images/galeri/') . $gl['gambar'] ?>" alt="" class="img-responsive" />
                                    <div class="project-info">
                                        <div class="project-icon">
                                            <span class="fa fa-magnifying-glass-plus"></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <ul class="pagination"><?php echo $pagination; ?></ul>

            </div>

        </div>
    </div>
</div>
</div>