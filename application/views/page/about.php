<!-- BANNER -->
<div class="section subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption">ABOUT CLUB</div>
            </div>
        </div>
    </div>
</div>

<!-- ABOUT SECTION -->
<div class="section singlepage">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="page-title">
                    <h2 class="lead">ABOUT CLUB</h2>
                    <div class="border-style"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="welcome">
                    <div class="title-block">WELCOME TO IJECK FC</div>
                    <p>
                        <?php foreach ($mykonfig as $kf) {
                            if ($kf['profil'] != '') echo nl2br($kf['profil']);
                        } ?>
                    </p>
                </div>
            </div>

            <div class="col-sm-12 col-md-6">
                <div id="about-caro" class="owl-carousel owl-theme">
                    <?php if ($myslidprofil) {
                        foreach ($myslidprofil as $sp) { ?>
                            <div class="item">
                                <img style="height: 308px; width: 100%" src="<?= base_url('adminfc/public/images/profil/') . $sp['gambar'] ?>" alt="" class="img-responsive" />
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- COACH SECTION -->
<?php if ($myleader) { ?>
    <div class="section coach bg-coach">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="page-title">
                        <h2 class="lead">MEET OUR COACH</h2>
                        <div class="border-style"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($myleader as $ld) { ?>
                    <div class="col-sm-12 col-md-4">
                        <div class="coach-item">
                            <div class="gambar">
                                <img style="height: 360px; width: 100%" src="<?= base_url('adminfc/public/images/photo/') . $ld['photo'] ?>" alt="" class="img-responsive" />
                            </div>
                            <div class="item-body">
                                <div class="name"><?= $ld['nama'] ?></div>
                                <div class="position"><?= $ld['posisi'] ?></div>
                                <div class="c-sosmed">
                                    <?php if ($ld['facebook']) { ?>
                                        <a href="<?= $ld['facebook'] ?>" title="">
                                            <div class="item">
                                                <i class="fa-brands fa-facebook fa-lg"></i>
                                            </div>
                                        </a>
                                    <?php }
                                    if ($ld['twitter']) { ?>
                                        <a href="<?= $ld['twitter'] ?>" title="">
                                            <div class="item">
                                                <i class="fa-brands fa-twitter fa-lg"></i>
                                            </div>
                                        </a>
                                    <?php  }
                                    if ($ld['instagram']) { ?>
                                        <a href="<?= $ld['instagram'] ?>" title="">
                                            <div class="item">
                                                <i class="fa-brands fa-instagram fa-lg"></i>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>


<!-- CLUB HISTORY SECTION -->
<?php if ($myhistori) { ?>
    <div class="section history">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="page-title">
                        <h2 class="lead">CLUB HISTORY</h2>
                        <div class="border-style"></div>
                        <div class="page-description">
                            <p>
                                <strong>IJECK FC</strong> Lorem ipsum dolor sit
                                amet, libero turpis non cras ligula, id commodo, aenean est in
                                volutpat amet sodales, porttitor bibendum facilisi
                                suspendisse, aliquam ipsum ante morbi sed ipsum mollis.
                                Sollicitudin viverra, vel varius eget sit mollis. Commodo enim
                                aliquam suspendisse tortor cum diam, commodo facilisis, rutrum
                                et duis nisl porttitor, vel eleifend odio ultricies ut, orci
                                in adipiscing felis velit nibh.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="nav-history"></div>

                    <div id="history-caro" class="history-caro owl-carousel owl-theme">
                        <?php foreach ($myhistori as $ht) { ?>
                            <div class="item history-item">
                                <div class="gambar">
                                    <img style="height: 216px; width: 100%" src="<?= base_url('adminfc/public/images/histori/') . $ht['gambar'] ?>" alt="" class="img-responsive" />
                                </div>
                                <div class="item-body">
                                    <div class="title" data-year="<?= $ht['tahun'] ?>"><?= $ht['judul'] ?></div>
                                    <p>
                                        <?= nl2br($ht['keterangan']) ?>
                                    </p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>