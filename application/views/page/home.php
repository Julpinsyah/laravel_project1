 <!-- BANNER -->
 <div class="section banner">
     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
         <!-- Indicators -->
         <ol class="carousel-indicators">
             <?php for ($i = 0; $i < count($myslide); $i++) { ?>
                 <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" <?php if ($i == 0) echo 'class="active"' ?>></li>
             <?php } ?>
         </ol>
         <!-- Wrapper for slides -->
         <div class="carousel-inner" role="listbox">
             <?php $no = 0;
                foreach ($myslide as $sd) {
                    ++$no ?>
                 <div class="item <?php if ($no == 1) echo 'active' ?>">
                     <img style="height: 768px;" src="<?= base_url('adminfc/public/images/slide/') . $sd['gambar'] ?>" alt="" />
                     <div class="carousel-caption">
                         <div class="container">
                             <div class="wrap-caption">
                                 <div class="caption-heading"><?= $sd['judul'] ?></div>
                                 <div class="caption-desc"><?= $sd['keterangan'] ?></div>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php } ?>
         </div>
         <!-- Controls -->
         <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
             <span class="fa fa-chevron-left"></span>
             <span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
             <span class="fa fa-chevron-right"></span>
             <span class="sr-only">Next</span>
         </a>
     </div>
     <!-- END CAROUSEL -->
 </div>


 <!-- MATCH FACTS -->
 <?php //var_dump($mymatch['clubtandang']); ?>
 <?php if ($mymatch['clubtandang']) { ?>
     <div class="section stat-facts">
         <div class="bg-overlay">
             <div class="container">
                 <div class="row">
                     <div class="col-sm-12 col-md-10 col-md-offset-1">
                         <div class="row">
                             <div class="col-sm-4 col-md-4">
                                 <div class="match-club">
                                     <img width="150" height="150" src="<?= base_url('adminfc/public/images/klub/') . $mymatch['logo_tandang'] ?>" alt="" />
                                     <div class="club-name"><?= strtoupper($mymatch['clubtandang']) ?></div>
                                 </div>
                             </div>

                             <div class="col-sm-4 col-md-4">
                                 <div class="match-description">
                                     <div class="liga-name"><?= strtoupper($mymatch['pertandingan']) ?></div>
                                     <div class="liga-date"><?= strtoupper(date('F d', strtotime($mymatch['tanggal'])))  . ', ' . date('H:i', strtotime($mymatch['waktu'])) . ' WIB' ?></div>
                                     <div class="liga-vs">VS</div>
                                     <div class="liga-location"><?= strtoupper($mymatch['lapangan']) . '<br />' . strtoupper($mymatch['lokasi']) ?></div>
                                 </div>
                             </div>

                             <div class="col-sm-4 col-md-4">
                                 <div class="match-club">
                                     <img width="150" height="150" src="<?= base_url('adminfc/public/images/klub/') . $mymatch['logo_tanding'] ?>" alt="" />
                                     <div class="club-name"><?= strtoupper($mymatch['clubtanding']) ?></div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 <?php } ?>


 <!-- ABOUT SECTION -->
 <?php if ($myschedule || $mytraining) { ?>
     <div class="section about">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12 col-md-12">
                     <div class="page-title">
                         <h2 class="lead">ABOUT FC</h2>
                         <div class="border-style"></div>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="col-sm-12 col-md-4">
                     <?php if ($mysbenner) { ?>
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
                     <?php } ?>
                 </div>

                 <div class="col-sm-12 col-md-8">
                     <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                         <ul id="myTabs" class="nav nav-tabs" role="tablist">
                             <?php if ($myschedule) { ?>
                                 <li class="active">
                                     <a href="#match" id="match-tab" role="tab" data-toggle="tab" aria-controls="match" aria-expanded="true">NEXT MATCH</a>
                                 </li>
                             <?php }
                                if ($mytraining) { ?>
                                 <li <?php if (!$myschedule) echo 'class="active"'; ?>>
                                     <a href="#training" role="tab" id="training-tab" data-toggle="tab" aria-controls="training">TRAINING SCHEDULE</a>
                                 </li>
                             <?php } ?>

                             <li>
                                 <a href="#league" role="tab" id="league-tab" data-toggle="tab" aria-controls="league">LEAGUE TABLE</a>
                             </li>
                         </ul>
                         <div id="myTabContent" class="tab-content tab-content-bg" style="min-height: 398px; width: 100%;">
                             <?php if ($myschedule) { ?>
                                 <div role="tabpanel" class="tab-pane fade in active" id="match" aria-labelledBy="match-tab">
                                     <div class="table-responsive">
                                         <table class="table table-striped">
                                             <tbody>
                                                 <?php foreach ($myschedule as $ms) { ?>
                                                     <tr>
                                                         <td class="tw40">
                                                             <div class="match-date"><?= date('Y, d M', strtotime($ms['tanggal'])) . ' - ' . date('H:i', strtotime($ms['waktu'])) . ' WIB' ?></div>
                                                         </td>
                                                         <td>
                                                             <div class="match-title text-right <?php if ($ms['clubtandang'] == 'IJECK FC') echo 'color-orange'; ?>"><?= $ms['clubtandang'] ?></div>
                                                         </td>
                                                         <td>
                                                             <div class="text-center">VS</div>
                                                         </td>
                                                         <td>
                                                             <div class="match-title <?php if ($ms['clubtanding'] == 'IJECK FC') echo 'color-orange'; ?>"><?= $ms['clubtanding'] ?></div>
                                                         </td>
                                                     </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             <?php }
                                if ($mytraining) { ?>
                                 <div role="tabpanel" class="tab-pane fade <?php if (!$myschedule) echo 'in active'; ?>" id="training" aria-labelledBy="training-tab">
                                     <div class="table-responsive">
                                         <table class="table table-striped">
                                             <tbody>
                                                 <?php foreach ($mytraining as $tr) { ?>
                                                     <tr>
                                                         <td class="tw40">
                                                             <div class="match-date"><?= $tr['hari'] . ' - ' . date('H:i', strtotime($tr['waktu_mulai']))  . ' s.d ' .  date('H:i', strtotime($tr['waktu_selesai'])) . ' WIB' ?></div>
                                                         </td>
                                                         <td>
                                                             <div class="match-title"><?= $tr['nama'] ?></div>
                                                         </td>
                                                     </tr>
                                                 <?php } ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             <?php } ?>

                             <div role="tabpanel" class="tab-pane fade" id="league" aria-labelledBy="league-tab">
                                 <div class="table-responsive">
                                     <table class="table table-striped">
                                         <thead>
                                             <tr>
                                                 <td class="tw50">TEAM</td>
                                                 <td class="tw10">W</td>
                                                 <td class="tw10">D</td>
                                                 <td class="tw10">L</td>
                                                 <td>POINT</td>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>
                                                     <div class="match-title <?php if ('Jupentus' == 'IJECK FC') echo 'color-orange'; ?>">1. Jupentus</div>
                                                 </td>
                                                 <td>4</td>
                                                 <td>0</td>
                                                 <td>1</td>
                                                 <td>
                                                     <div class="match-title">12</div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <div class="match-title <?php if ('IJECK FC' == 'IJECK FC') echo 'color-orange'; ?>">
                                                         2. IJECK FC
                                                     </div>
                                                 </td>
                                                 <td>3</td>
                                                 <td>1</td>
                                                 <td>1</td>
                                                 <td>
                                                     <div class="match-title">10</div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <div class="match-title">3. Atalantas</div>
                                                 </td>
                                                 <td>2</td>
                                                 <td>2</td>
                                                 <td>2</td>
                                                 <td>
                                                     <div class="match-title">8</div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <div class="match-title">4. ACE Milan</div>
                                                 </td>
                                                 <td>2</td>
                                                 <td>1</td>
                                                 <td>3</td>
                                                 <td>
                                                     <div class="match-title">7</div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <div class="match-title">19. AES Roma</div>
                                                 </td>
                                                 <td>0</td>
                                                 <td>1</td>
                                                 <td>6</td>
                                                 <td>
                                                     <div class="match-title">1</div>
                                                 </td>
                                             </tr>
                                             <tr>
                                                 <td>
                                                     <div class="match-title">20. Navoli</div>
                                                 </td>
                                                 <td>0</td>
                                                 <td>1</td>
                                                 <td>8</td>
                                                 <td>
                                                     <div class="match-title">0</div>
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- /example -->
                 </div>
             </div>
         </div>
     </div>
 <?php } ?>

 <!-- VIDEO SECTION -->
 <?php if ($myvideo) { ?>
     <div class="section video bg-section">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12 col-md-12">
                     <div class="page-title">
                         <h2 class="lead">LATEST VIDEO</h2>
                         <div class="border-style"></div>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-sm-12 col-md-8 col-md-offset-2">
                     <!-- 16:9 aspect ratio -->
                     <div class="embed-responsive embed-responsive-16by9">
                         <iframe class="embed-responsive-item" src="<?= $myvideo['link'] ?>"></iframe>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 <?php } ?>


 <!-- OUR PLAYER SECTION -->
 <?php if ($myplayer) { ?>
     <div class="section player">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12 col-md-12">
                     <div class="page-title">
                         <h2 class="lead">OUR PLAYER</h2>
                         <div class="border-style"></div>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <div id="player-caro" class="owl-carousel owl-theme">
                     <?php foreach ($myplayer as $pl) { ?>
                         <div class="item player-item">
                             <div class="gambar">
                                 <img style="height: 394px; width: 100%;" src="<?= base_url('adminfc/public/images/photo/') . $pl['photo'] ?>" alt="" class="img-responsive" />
                             </div>
                             <div class="item-body">
                                 <div class="name"><?= $pl['nama'] ?></div>
                                 <div class="position"><span class="<?= strtolower($pl['kode_posisi']) ?>"><?= $pl['kode_posisi'] ?></span> <?= $pl['posisi'] ?></div>
                             </div>
                         </div>
                     <?php } ?>
                 </div>
             </div>

             <div class="player-pagination pagination">
                 <a href="<?= base_url('page/team') ?>" title="">View Team</a>
             </div>
         </div>
     </div>
 <?php } ?>


 <!-- GALLERY SECTION -->
 <?php if ($mygallery) { ?>
     <div class="section gallery bg-section">
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
                             <a href="<?= base_url('adminfc/public/images/galeri/') . $gl['gambar'] ?>" title="<?= $gl['judul'] ?>">
                                 <img style="height: 184px; width: 100%;" src="<?= base_url('adminfc/public/images/galeri/') . $gl['gambar'] ?>" alt="" class="img-responsive" />
                                 <div class="project-info">
                                     <div class="project-icon">
                                         <span class="fa fa-search-plus"></span>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </div>
                 <?php } ?>
             </div>

             <div class="loadmore">
                 <a href="<?= base_url('page/gallery') ?>" title="">See More</a>
             </div>
         </div>
     </div>
 <?php } ?>


 <!-- BLOG/NEWS SECTION -->
 <?php if ($mynews) { ?>
     <div class="section blog">
         <div class="container">
             <div class="row">
                 <div class="col-sm-12 col-md-6 col-md-offset-3">
                     <div class="page-title">
                         <h2 class="lead">LATEST NEWS</h2>
                         <div class="border-style"></div>
                     </div>
                 </div>
             </div>

             <div class="row">
                 <?php foreach ($mynews as $br) { ?>
                     <div class="col-sm-12 col-md-4">
                         <div class="blog-item">
                             <div class="gambar">
                                 <div class="date"><?= date('M d, Y', strtotime($br['tanggal'])) ?></div>
                                 <img style="height: 200px; width: 100%;" src="<?= base_url('adminfc/public/images/berita/') . $br['gambar'] ?>" alt="" class="img-responsive" />
                             </div>
                             <div class="item-body">
                                 <div class="description">
                                     <p class="lead"><?= $br['tentang'] ?></p>
                                     <a href="<?= base_url('page/newsingle/') . md5($br['id']) ?>" title="" class="readmore">Read More</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php } ?>
                 <div class="loadmore">
                     <a href="<?= base_url('page/news') ?>" title="">Load More</a>
                 </div>
             </div>
         </div>
     </div>
 <?php } ?>