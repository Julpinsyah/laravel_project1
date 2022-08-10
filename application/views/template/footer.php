<div class="section stat-client p-main bg-client">
  <div class="container">

    <div class="row">
      <center>
        <?php foreach ($mysponsorp as $sp) { ?>
          <div class="client-img" style="display: -webkit-inline-box;">
            <img style="height: 90px; width: 100%;" src="<?= base_url('adminfc/public/images/sponsor/') . $sp['logo'] ?>" alt="" class="img-responsive" />
          </div>
        <?php } ?>
      </center>
    </div>

    <div class="row">
      <center>
        <?php foreach ($mysponsors as $ss) { ?>
          <div class="client-img" style="display: -webkit-inline-box;">
            <img style="height: 90px; width: 100%;" src="<?= base_url('adminfc/public/images/sponsor/') . $ss['logo'] ?>" alt="" class="img-responsive" />
          </div>
        <?php } ?>
      </center>
    </div>

    <!-- <div class="row">
      <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
        <div class="client-img">
          <img src="<?= base_url('adminfc/public/images/sponsor/') . 'client1.png' ?>" alt="" class="img-responsive" />
        </div>
      </div>
    </div> -->
  </div>
</div>



<?php $this->benchmark->mark('code_end'); ?>
<div class="footer">
  <div class="fcopy">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <p class="ftex">
		  <center>
            <?php foreach ($mykonfig as $kf) {
              if ($kf['versi'] != '') echo 'Version ' . $kf['versi'] . ' ';
            } ?>
            <?php foreach ($mykonfig as $kf) {
              if ($kf['copyright'] != '') echo '&copy; ' . $kf['copyright'] . ' ';
            } ?>
            <?php foreach ($mykonfig as $kf) {
              if ($kf['singkatan'] != '') echo $kf['singkatan'] . ' ';
            } ?>
            - All Rights Reserved
            <!-- <small><br />Load <?= $this->benchmark->elapsed_time('code_start', 'code_end'); ?> Sec. | Memory <?= round(memory_get_peak_usage(false) / 1048576, 2) . "MB"; ?></small> -->
		  </center>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?= base_url('vendor/') . 'js/jquery.min.js' ?>"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&#038;ver=4.1.5"></script>
<script type="text/javascript" src="<?= base_url('vendor/') . 'js/jqBootstrapValidation.js' ?>"></script>
<script type="text/javascript" src="<?= base_url('vendor/') . 'js/bootstrap.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url('vendor/') . 'js/owl.carousel.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url('vendor/') . 'js/bootstrap-hover-dropdown.min.js' ?>"></script>
<script type="text/javascript" src="<?= base_url('vendor/') . 'js/jquery.magnific-popup.min.js' ?>"></script>

<script type="text/javascript" src="<?= base_url('vendor/') . 'js/script.js' ?>"></script>
</body>

</html>