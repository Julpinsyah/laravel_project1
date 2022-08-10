<!-- BANNER -->
<div class="section subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption">DETAIL NEWS</div>
            </div>
        </div>
    </div>
</div>


<!-- NEWS SECTION -->
<div class="section singlepage">
    <div class="container">

        <div class="row pbot-main">
            <?php if ($mynewsingel) { ?>
                <div class="col-xs-12 col-md-8">
                    <div class="post-item">
                        <div class="image-wrap">
                            <img style="height: 417px; width: 100%;" src="<?= base_url('adminfc/public/images/berita/') . $mynewsingel['gambar'] ?>" alt="..." class="img-responsive">
                            <div class="meta">
                                <div class="blog-author">
                                    <div class="blog-thumb">
                                        <img class="img-responsive" src="<?= base_url('adminfc/public/images/img/') . 'ijeck-icon.png' ?>" alt="...">
                                    </div>
                                </div>
                                <div class="blog-date"><span><?= date('d', strtotime($mynewsingel['tanggal'])) ?></span><?= date('M', strtotime($mynewsingel['tanggal'])) ?></div>
                            </div>
                        </div>
                        <h3 class="post-title"><a href="news-single.html" title=""><?= $mynewsingel['judul'] ?></a></h3>
                        <p><?= $mynewsingel['deskripsi'] ?></p>
                    </div>
                </div>
            <?php } ?>

            <div class="col-xs-12 col-md-4">
                <?php if ($mynews) { ?>
                    <div class="widget recent-post">
                        <h4 class="widget-heading">HOT NEWS</h4>
                        <div class="widget-wrap">
                            <?php foreach ($mynews as $nw) { ?>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="<?= base_url('page/newsingle/') . md5($nw['id']) ?>" title="detail news">
                                            <img class="media-object" src="<?= base_url('adminfc/public/images/berita/') . $nw['gambar'] ?>" alt="...">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p><a href="<?= base_url('page/newsingle/') . md5($nw['id']) ?>" title="detail news"><?= $nw['judul'] ?></a></p>
                                        <div class="meta-date">
                                            <?= date('M d - Y', strtotime($nw['tanggal'])) ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>


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