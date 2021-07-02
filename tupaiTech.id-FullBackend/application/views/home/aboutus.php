    <!-- about-us-header -->
    <section class="about-us-header">
        <div class="container">
            <h1>Know more about us</h1>
            <p>We're the team of diversified talens making a mark in the local and regional IT industry</p>
        </div>
    </section>
    <!-- end about-us-header -->

    <!-- About us content -->
    <section class="about-us-content">
        <div class="container">
            <!-- <h1 class="title" data-aos="fade-up" data-aos-duration="500">About Us</h1> -->
            <div class="top-content" data-aos="zoom-out-up" data-aos-duration="500">
                <p><Span>Tupai Tech</Span> Tupai Tech Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem
                    ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit
                    amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem
                    ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit
                    amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
            </div>
            <div class="offers">
                <div class="row">
                    <div class="first-column" data-aos="zoom-out-right">
                        <div class="offer-item">
                            <img src="<?= base_url('assets/') ?>assets/img/circle-checkbox.svg" alt="">
                            <p>Quick to respond</p>
                        </div>
                        <div class="offer-item">
                            <img src="<?= base_url('assets/') ?>assets/img/circle-checkbox.svg" alt="">
                            <p>Flexible price</p>
                        </div>
                        <div class="offer-item">
                            <img src="<?= base_url('assets/') ?>assets/img/circle-checkbox.svg" alt="">
                            <p>24/7 Hours support</p>
                        </div>
                    </div>
                    <div class="seccond-column" data-aos="zoom-out-left">
                        <div class="offer-item">
                            <img src="<?= base_url('assets/') ?>assets/img/circle-checkbox.svg" alt="">
                            <p>Professional</p>
                        </div>
                        <div class="offer-item">
                            <img src="<?= base_url('assets/') ?>assets/img/circle-checkbox.svg" alt="">
                            <p>Conscientious </p>
                        </div>
                        <div class="offer-item">
                            <img src="<?= base_url('assets/') ?>assets/img/circle-checkbox.svg" alt="">
                            <p>Ontime at service</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image" data-aos="flip-up">
                <img src="<?= base_url('assets/') ?>assets/img/aboutus.png" alt="" class="img-fluid">
            </div>
            <div class="bottom-content" data-aos="slide-up">
                <p>Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum
                    dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                    Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum
                    dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                    Lorem ipsum dolor sit ametLorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum
                    dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                    Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum
                    dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet
                    Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
            </div>
        </div>
    </section>
    <!-- End about us content -->

    <!-- Team section -->
    <section class="team-section">
        <div class="container">
            <h1 class="title" data-aos="zoom-in-up">Leadership Team</h1>
            <div class="employes">
                <div class="row">
                    <?php foreach ($teams as $team) : ?>
                        <div class="items col-12 col-md-5 col-lg-4 col-xl-3" data-aos="zoom-out-up">
                            <div class="card">
                                <button type="button" class="btn p-0 tampilkan" data-nama="<?= $team['nama']; ?>" data-pss="<?= $team['posisi']; ?>" data-img="<?= $team['img']; ?>" data-desc="<?= $team['deskripsi']; ?>" data-toggle="modal" data-target="#exampleModalCenter">
                                    <img src="<?= base_url('assets/') ?>/images/team/<?= $team['img']; ?>" alt="" class="card-img-top">
                                    <div class="card-body pb-0">
                                        <h4><?= $team['nama']; ?></h4>
                                        <p class="card-text"><?= $team['posisi']; ?></p>
                                    </div>
                                </button>
                                <div class="links mt-2">
                                    <ul class="d-flex justify-content-center">
                                        <li><a href="https://instagram.com/<?= $team['ig']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://facebook.com/<?= $team['fb']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://twitter.com/<?= $team['twt']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End team section -->
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="container">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <img src="<?= base_url('assets/') ?>assets/img/leadership-1.jpg" alt="" class="img-profil img-fluid foto">
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="profil-content">
                                    <h1 class="nama"></h1>
                                    <h4 class="posisi"></h4>
                                    <p class="desc"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    <script>
        $(document).ready(function() {
            $('.tampilkan').on('click', function(e) {
                e.preventDefault();
                var nama = $(this).data('nama');
                var pss = $(this).data('pss');
                var img = '<?= base_url('assets/images/team/') ?>' + $(this).data('img');
                var desc = $(this).data('desc');
                $('.nama').text(nama);
                $('.posisi').text(pss);
                $('.desc').text(desc);
                $('.foto').attr('src', img);
            });
        });
    </script>