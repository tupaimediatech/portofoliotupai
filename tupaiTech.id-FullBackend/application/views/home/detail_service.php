        <!-- About us content -->
        <section class="detail-services">
            <div class="header-section">
                <div class="container">
                    <h1 class="section-title" data-aos="slide-up">What we do?</h1>
                    <div class="section-info" data-aos="fade-up">
                        <p><Span>Tupai Tech</Span> Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum
                            dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit
                            amet. We at Tupai Tech specialize in the provision of the following IT services to help your
                            business succeed :</p>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-5" data-aos="fade-up" data-aos-duration="3000">
                        <div class="nav-option card">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <?php $a = 1;
                                foreach ($services as $servis) : ?>
                                    <a class="nav-link <?= $a == 1 ? 'active' : '';
                                                        $a++; ?>" id="<?= $servis['link']; ?>-tab" data-toggle="pill" href="#<?= $servis['link']; ?>" role="tab" aria-controls="<?= $servis['link']; ?>" aria-selected="<?= $a == 1 ? 'true' : 'false'; ?>"><i class="fas fa-chevron-right"></i> <?= $servis['nama_service']; ?></a>
                                <?php endforeach ?>

                            </div>
                        </div>
                        <div class="question">
                            <img src="<?= base_url('assets/') ?>assets/img/telemarketer.png" class="img-fluid" alt="">
                            <p class="question-title">Have a question?</p>
                            <p class="text-left question-info">If you have a question or need helps, please feel free to
                                contact us.</p>
                            <div class="contact">
                                <a href="tel:+6281-2345-6789">
                                    <p><i class="fas fa-phone-alt"></i> +6281-2345-6789</p>
                                </a>
                                <a href="mailto:cs@tupaitech.com">
                                    <p><i class="fas fa-envelope"></i> cs@tupaitech.com</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 content" data-aos="fade-down" data-aos-duration="3000">
                        <div class="tab-content" id="v-pills-tabContent">
                            <?php $a = 1;
                            foreach ($services as $servis) : ?>
                                <div class="tab-pane fade <?= $a == 1 ? 'active show' : '';
                                                            $a++; ?>" id="<?= $servis['link']; ?>" role="tabpanel" aria-labelledby="<?= $servis['link']; ?>-tab">
                                    <div class="content-banner">
                                        <img src="<?= base_url('assets/') ?>images/service/<?= $servis['img']; ?>" alt="" class="img-fluid">
                                    </div>
                                    <div class="content-text">
                                        <h4 class="content-text-title"><?= $servis['nama_service']; ?></h4>
                                        <div class="content-text-info">
                                            <p><?= $servis['deskripsi']; ?></p>

                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End about us content -->