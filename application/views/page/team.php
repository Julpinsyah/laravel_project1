<!-- BANNER -->
<div class="section subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption">TEAM</div>
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
                    <h2 class="lead">TEAM</h2>
                    <div class="border-style"></div>
                    <div class="page-description">
                        <p><strong>PRO SOCCER FC .inc</strong> Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse, aliquam ipsum ante morbi sed ipsum mollis. Sollicitudin viverra, vel varius eget sit mollis. Commodo enim aliquam suspendisse tortor cum diam, commodo facilisis, rutrum et duis nisl porttitor, vel eleifend odio ultricies ut, orci in adipiscing felis velit nibh.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-12 col-md-12">

                <div class="team-tab" data-example-id="togglable-tabs">
                    <ul id="myTabs" class="nav nav-tabs nav-tabs-team" role="tablist">
                        <?php if ($myplayer) { ?>
                            <li class="active"><a href="#primary" id="primary-tab" role="tab" data-toggle="tab" aria-controls="primary" aria-expanded="true">PRIMARY TEAM</a></li>
                        <?php }
                        if ($myplayers) { ?>
                            <li <?php if (!$myplayer) echo 'class="active"'  ?>><a href="#secondary" role="tab" id="secondary-tab" data-toggle="tab" aria-controls="secondary">SECONDARY TEAM</a></li>
                        <?php } ?>
                    </ul>
                    <div id="myTabContent" class="tab-content tab-team tab-team-bg">
                        <?php if ($myplayer) { ?>
                            <div role="tabpanel" class="tab-pane fade in active" id="primary" aria-labelledBy="primary-tab">
                                <div class="teams">
                                    <div class="nav-team" id="primary-nav">
                                        <?php foreach ($myplayer as $pl) { ?>
                                            <div class="position active">
                                                <a title=""><span class="<?= strtolower($pl['kode_posisi']) ?>"><?= $pl['kode_posisi'] ?></span> #<?= $pl['nomor'] . '.&nbsp;&nbsp;' . $pl['nama'] ?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="teams-caro">
                                    <div id="primary-team-caro" class="owl-carousel owl-theme">
                                        <?php foreach ($myplayer as $pd) { ?>
                                            <div class="item">
                                                <div class="teams-image">
                                                    <img style="height: 570px;" src="<?= base_url('adminfc/public/images/photo/') . $pd['photo'] ?>" alt="" class="img-responsive" />
                                                </div>
                                                <div class="teams-description">
                                                    <p><span class="title">NATIONAL : </span><?= $pd['negara'] ?></p>
                                                    <p><span class="title">DATE OF BIRTH : </span><?= date('Y, d M', strtotime($pd['tanggal_lahir'])) ?></p>
                                                    <p><span class="title">HEIGHT : </span><?= $pd['tinggi'] ?> cm</p>
                                                    <p><span class="title">WEIGHT : </span><?= $pd['berat'] ?> kg</p>
                                                    <p><span class="title">POSITION : </span><?= $pd['posisi'] ?></p>
                                                    <p><span class="title">PLAYED : </span><?= $pd['bermain'] ?></p>
                                                    <p><span class="title">GOAL : </span><?= $pd['goal'] ?></p>
                                                    <p><span class="title">RED CARDS : </span><?= $pd['kartu_merah'] ?></p>
                                                    <p><span class="title">YELLOW CARDS : </span><?= $pd['kartu_kuning'] ?></p>
                                                    <p><span class="title">INFORMATION </span></p>
                                                    <p class="font-normal"><?= $pd['informasi_lain'] ?></p>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php }
                        if ($myplayers) { ?>
                            <div role="tabpanel" class="tab-pane fade <?php if (!$myplayer) echo 'in active'  ?>" id="secondary" aria-labelledBy="secondary-tab">
                                <div class="teams">
                                    <div class="nav-team" id="secondary-nav">
                                        <?php foreach ($myplayers as $ps) { ?>
                                            <div class="position active">
                                                <a title=""><span class="<?= strtolower($ps['kode_posisi']) ?>"><?= $ps['kode_posisi'] ?></span> #<?= $ps['nomor'] . '.&nbsp;&nbsp;' . $ps['nama'] ?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="teams-caro">
                                    <div id="secondary-team-caro" class="owl-carousel owl-theme">
                                        <?php foreach ($myplayers as $ps) { ?>
                                            <div class="item">
                                                <div class="teams-image">
                                                    <img style="height: 570px;" src="<?= base_url('adminfc/public/images/photo/') .  $ps['photo'] ?>" alt="" class="img-responsive" />
                                                </div>
                                                <div class="teams-description">
                                                    <p><span class="title">NATIONAL : </span><?= $ps['negara'] ?></p>
                                                    <p><span class="title">DATE OF BIRTH : </span><?= date('Y, d M', strtotime($ps['tanggal_lahir'])) ?></p>
                                                    <p><span class="title">HEIGHT : </span><?= $ps['tinggi'] ?> cm</p>
                                                    <p><span class="title">WEIGHT : </span><?= $ps['berat'] ?> kg</p>
                                                    <p><span class="title">POSITION : </span><?= $ps['posisi'] ?></p>
                                                    <p><span class="title">PLAYED : </span><?= $ps['bermain'] ?></p>
                                                    <p><span class="title">GOAL : </span><?= $ps['goal'] ?></p>
                                                    <p><span class="title">RED CARDS : </span><?= $ps['kartu_merah'] ?></p>
                                                    <p><span class="title">YELLOW CARDS : </span><?= $ps['kartu_kuning'] ?></p>
                                                    <p><span class="title">INFORMATION </span></p>
                                                    <p class="font-normal"><?= $ps['informasi_lain'] ?></p>
                                                </div>
                                            </div>
                                        <?PHP } ?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div><!-- /example -->

            </div>


        </div>
    </div>
</div>