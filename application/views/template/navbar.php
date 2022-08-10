<div class="navbar navbar-main navbar-fixed-top">
  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
          <div class="info">
            <?php if ($myinformasi) {
              echo '<h3>News:&nbsp;&nbsp;</h3>
              <div class="info-item">';
              foreach ($myinformasi as $fm) {
                echo '<div>' . $fm['informasi'] . '</div>';
              }
              echo '</div>';
            } ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
          <div class="top-sosmed pull-right">
            <?php foreach ($mykonfig as $kf) {
              if ($kf['facebook'] != '') echo '<a href="' . $kf['facebook'] . '" title=""><span><i class="fa-brands fa-facebook fa-lg"></i></span></i></a>';
              if ($kf['instagram'] != '') echo '<a href="' . $kf['instagram'] . '" title=""><span><i class="fa-brands fa-instagram fa-lg"></i></span></i></a>';
              if ($kf['twitter'] != '') echo '<a href="' . $kf['twitter'] . '" title=""><span><i class="fa-brands fa-twitter fa-lg"></i></span></i></a>';
              if ($kf['pinterest'] != '') echo '<a href="' . $kf['pinterest'] . '" title=""><span><i class="fa-brands fa-pinterest fa-lg"></i></span></i></a>';
              if ($kf['youtube'] != '') echo '<a href="' . $kf['youtube'] . '" title=""><span><i class="fa-brands fa-youtube fa-lg"></i></span></i></a>';
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= base_url() ?>">
        <?php foreach ($mykonfig as $kf) {
          if ($kf['logo'] != '') echo '<img src="' .  base_url('adminfc/public/images/img/') . $kf['logo'] . '" alt="" />';
        } ?>
      </a>
    </div>
    <nav class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= base_url() ?>">HOME</a></li>
        <li <?php if ($this->uri->segment(2) == 'about') echo 'class="active"'; ?>><a href="<?= base_url('page/about') ?>">ABOUT</a></li>
        <li <?php if ($this->uri->segment(2) == 'team') echo 'class="active"'; ?>><a href="<?= base_url('page/team') ?>">TEAM</a></li>
        <li <?php if ($this->uri->segment(2) == 'gallery') echo 'class="active"'; ?>><a href="<?= base_url('page/gallery') ?>">GALLERY</a></li>
        <li <?php if ($this->uri->segment(2) == 'news' || $this->uri->segment(2) == 'newsingle') echo 'class="active"'; ?>><a href="<?= base_url('page/news') ?>">NEWS</a></li>
        <li <?php if ($this->uri->segment(2) == 'contact') echo 'class="active"'; ?>><a href="<?= base_url('page/contact') ?>">CONTACT</a></li>
      </ul>
    </nav>
  </div>
</div>