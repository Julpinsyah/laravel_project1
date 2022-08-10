<!-- BANNER -->
<div class="section subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption">NEWS</div>
            </div>
        </div>
    </div>
</div>


<!-- NEWS SECTION -->
<div class="section singlepage">
    <div class="container">

        <div class="row pbot-main">
            <?php if ($mynews) { ?>
                <div class="col-xs-12 col-md-8">
                    <?php foreach ($mynews as $nw) { ?>
                        <div class="post-item">
                            <div class="image-wrap">
                                <img style="height: 417px; width: 100%;" src="<?= base_url('adminfc/public/images/berita/') . $nw['gambar'] ?>" alt="..." class="img-responsive">
                                <div class="meta">
                                    <div class="blog-author">
                                        <div class="blog-thumb">
                                            <?php foreach ($mykonfig as $kf) {
                                                if ($kf['icon'] != '') echo '<img class="img-responsive" src="' . base_url('adminfc/public/images/img/') . $kf['icon'] . '" alt="...">';
                                            } ?>
                                        </div>
                                    </div>
                                    <div class="blog-date"><span><?= date('d', strtotime($nw['tanggal'])) ?></span><?= date('M', strtotime($nw['tanggal'])) ?></div>
                                </div>
                            </div>
                            <h3 class="post-title"><a href="news-single.html" title=""><?= $nw['judul'] ?></a></h3>
                            <p><?= $nw['tentang'] ?></p>
                            <a href="<?= base_url('page/newsingle/') . md5($nw['id']) ?>" class="post-read-more" title="">Read More <i class="fa fa-chevron-circle-right"></i></a>
                        </div>
                    <?php } ?>

                    <ul class="pagination"><?php echo $pagination; ?></ul>

                </div>
            <?php } ?>



            <div class="col-xs-12 col-md-4">
                <?php if ($mysbenner) { ?>
                    <div class="widget shop">
                        <div id="shop-caro" class="owl-carousel owl-theme">
                            <?php foreach ($mysbenner as $bn) { ?>
                                <div class="item shop-item">
                                    <div class="img">
                                        <img style="height: 438px; width: 100%;" src="<?= base_url('adminfc/public/images/benner/') . $bn['gambar'] ?>" alt="" class="img-responsive" />
                                    </div>
                                    <div class="description">
                                        <div class="collection-name">
                                            <strong><?= $bn['judul'] ?></strong>
                                            <div class="category"><?= $bn['keterangan'] ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>
</div>