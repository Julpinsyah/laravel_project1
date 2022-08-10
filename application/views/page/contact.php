<!-- BANNER -->
<div class="section subbanner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="caption">CONTACT</div>
            </div>
        </div>
    </div>
</div>

<!-- SECTION -->
<div class="section singlepage">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="page-title" style="margin-bottom: 40px;">
                    <h2 class="lead">CONTACT CLUB</h2>
                    <div class="border-style"></div>
                    <div class="page-description">
                        <p>
                            <strong>This our Head Office contact about Club, Ticket, Our Store
                                and Our Media.
                            </strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="contact-content">
                <div class="col-sm-12 col-md-7" style="padding-bottom: 40px;">
                    <p class="contact-title">MAP LOCATION</p>
                    <?php foreach ($mykonfig as $kf) {
                        if ($kf['map_embed'] != '') echo '<iframe style="min-height: 350px; width: 100%; border: 2px solid #ffdb5b;" src="' . htmlentities($kf['map_embed']) . '" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>';
                    } ?>
                </div>

                <div class="col-sm-12 col-md-5">
                    <div class="contact-address">
                        <div class="row">
                            <div class="col-sm-12 col-md-5">
                                <div class="contact-address-item">
                                    <p class="contact-title">HEAD OFFICE</p>
                                    <p class="contact-address-heading">Address</p>
                                    <p>
                                        <?php
                                        foreach ($mykonfig as $kf) {
                                            if ($kf['alamat'] != '') echo $kf['alamat'] . '<br />';
                                        }
                                        foreach ($mykonfig as $kf) {
                                            if ($kf['kota'] != '') echo $kf['kota'] . ' ';
                                        }
                                        foreach ($mykonfig as $kf) {
                                            if ($kf['kodepos'] != '') echo '( ' . $kf['kodepos'] . ' )<br />';
                                        }
                                        foreach ($mykonfig as $kf) {
                                            if ($kf['provinsi'] != '') echo $kf['provinsi'] . '<br />';
                                        }
                                        foreach ($mykonfig as $kf) {
                                            if ($kf['negara'] != '') echo $kf['negara'];
                                        }  ?>
                                    </p>
                                    <br />

                                    <p class="contact-address-heading">Phone</p>
                                    <p>
                                        <?php foreach ($mykonfig as $kf) {
                                            if ($kf['telepon'] != '') echo $kf['telepon'] . '<br />';
                                            if ($kf['handphone'] != '') echo $kf['handphone'];
                                        } ?>
                                    </p>
                                    <br />
                                    <p class="contact-address-heading">Working Hours</p>
                                    <p>
                                        <?php foreach ($mykonfig as $kf) {
                                            if ($kf['hari_kerja'] != '') echo $kf['hari_kerja'] . ':<br />';
                                            if ($kf['jam_kerja'] != '') echo $kf['jam_kerja'] . ' WIB<br />';
                                        } ?>
                                        <span style="color: red">Minggu dan Libur Nasional:<br />Tutup</span>
                                    </p>
                                    <br />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-7">
                                <?php foreach ($mykonfig as $kf) {
                                    if ($kf['gedung'] != '') echo '<img src="' . base_url('adminfc/public/images/img/') . $kf['gedung'] . '" alt="" class="img-responsive" />';
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>