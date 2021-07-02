
    <!-- jumbotron -->
    <section class="jumbotron">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-6">
            <img src="<?= base_url('assets/'); ?>assets/img/hero.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6">
            <p class="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat aspernatur tenetur aperiam
              similique? Facilis molestiae modi fugiat consequatur voluptas quibusdam ab aliquam minima accusantium iure
              perferendis, natus quas unde neque labore nobis ducimus cupiditate dolor similique doloremque voluptate
              incidunt? Saepe fugit pariatur eveniet laboriosam, nesciunt, natus labore, ea autem dolores consequatur
              quibusdam. Ducimus ullam reprehenderit alias exercitationem corporis. Quos, dolorem!</p>
            <div class="button">
              <a href="#contactus" class="btn tp-btn scroll-to">Hire Us</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end jumbotron -->

    <!-- aboutus -->
    <section class="aboutus" data-aos="fade-up" id="aboutUs">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <img src="<?= base_url('assets/'); ?>assets/img/aboutus.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 text-right">
            <h1 class="title">About Us</h1>
            <p class="info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam quos soluta animi dicta
              necessitatibus dolore ipsum consectetur id eius molestias laboriosam unde quaerat labore at atque autem a,
              harum corrupti. Corrupti sunt quidem harum eveniet velit ex voluptatem doloribus tempora aliquid? Minima
              consequatur earum ut non neque, aliquam accusamus excepturi.</p>
            <div class="button">
              <a href="<?= base_url('about_us/') ?>" class="btn tp-btn">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end aboutus -->

    <!-- services -->
    <section class="services" data-aos="fade-down" id="services">
      <div class="container">
        <h1 class="title text-center">Our Services</h1>
        <div class="row flex-row-reverse justify-content-end">
          <div class="col-lg-5 text-right">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <?php $a=1; foreach ($services as $servis): ?>
                <a class="nav-link nav-services-home ns-<?= $a; ?> <?= $a == 1 ? 'active' : ''; ?>" id="v-pills-<?= $servis['link']; ?>-tab" data-toggle="pill" href="#v-pills-<?= $servis['link']; ?>" role="tab" aria-controls="v-pills-<?= $servis['link']; ?>" aria-selected="<?= $a == 1 ? 'true' : 'false'; $a++; ?>"><?= $servis['nama_service']; ?></a>
              <?php endforeach ?>
              
            </div>
          </div>
          <div class="col-lg-7">
            <div class="tab-content" id="v-pills-tabContent">
              <?php $a=1; foreach ($services as $servis): ?>
                <div class="tab-pane fade <?= $a == 1 ? 'active show' : ''; $a++; ?>" id="v-pills-<?= $servis['link']; ?>" role="tabpanel"
                  aria-labelledby="v-<?= $servis['link']; ?>-tab">
                  <h2 class="title-tab"><?= $servis['nama_service']; ?></h2>
                  <p class="info-tab"><?= $servis['deskripsi']; ?></p>
                  <div class="button-tab">
                    <a href="<?= base_url('service/detail') ?>#itconsultancy" class="btn tp-btn">Read More</a>
                  </div>
                </div>
              <?php endforeach ?>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end services -->

    <!-- ouroffer -->
    <section class="ouroffer" data-aos="fade-up">
      <div class="container">
        <h4 class="subtitle">Why Tupai Tech?</h4>
        <h2 class="title">Because we are more than you expect</h2>
        <p class="info">We help the strategic process, implementation to support after the implementation process.
          Simplify the implementation process so that the time and costs required are affordable for micro, small and
          medium enterprises.</p>
        <div class="row content-box justify-content-between">
          <div class="col-lg-5 content text-center">
            <img src="<?= base_url('assets/'); ?>assets/img/Customizable.png" class="img-fluid content-img" alt="">
            <h1 class="content-title">Customizable</h1>
            <p class="content-info">The system has a high enough flexibility to adapt to the needs of each company, such
              as adding and changing fields, tables, layouts and even reports.</p>
          </div>

          <div class="col-lg-5 content text-center">
            <img src="<?= base_url('assets/'); ?>assets/img/Best Price.png" class="img-fluid content-img" alt="">
            <h1 class="content-title">Best Price</h1>
            <p class="content-info">With an integrated process for all parts of the company, it is certain that
              efficiency and productivity can be improved.</p>
          </div>

          <div class="col-lg-5 content text-center">
            <img src="<?= base_url('assets/'); ?>assets/img/Integrated.png" class="img-fluid content-img" alt="">
            <h1 class="content-title">Integrated</h1>
            <p class="content-info">General functions such as accounting, finance, purchasing, sales, inventory,
              production and transportation are integrated into one system that can improve company performance</p>
          </div>

          <div class="col-lg-5 content text-center">
            <img src="<?= base_url('assets/'); ?>assets/img/expandabel.png" class="img-fluid content-img" alt="">
            <h1 class="content-title">Extendable</h1>
            <p class="content-info">The system can be developed by adding additional functions to form a specific
              vertical industry solution. Such as retail, manufacturing, etc.</p>
          </div>

        </div>

      </div>
    </section>
    <!-- end ouroffer -->
