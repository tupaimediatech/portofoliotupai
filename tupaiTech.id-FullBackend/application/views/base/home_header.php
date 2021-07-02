<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/bootstrap/css/bootstrap.css">

    <!-- aos -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/aos/aos.css">

    <!-- Slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" />

    <!-- fontawsome -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/fontawesome-free/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/fontawesome-free/css/brands.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/fontawesome-free/css/solid.css">

    <!-- main css -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>assets/css/main.css">
    <script src="<?= base_url('assets/'); ?>assets/jquery/jquery-3.6.0.js"></script>

    <title><?= $title; ?></title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar fixed-top  navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="<?= base_url('assets/'); ?>assets/img/logo-tupai.png" width="40" height="40" class="d-inline-block align-top" alt="">
                <p class="d-inline"> TUPAI TECH</p>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item <?= $this->uri->segment(1) == 'home' || $this->uri->segment(1) == ''  ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('home'); ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(1) == 'about_us' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= $this->uri->segment(1) == 'home' ? '#aboutUs' :  base_url('home#aboutUs') ?>">About Us</a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(1) == 'service' ? 'active' : '' ?>">
                        <a class="nav-link " href="<?= $this->uri->segment(1) == 'home' ? '#services' :  base_url('home#services') ?>">IT Services</a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(1) == 'project' ? 'active' : '' ?>">
                        <a class="nav-link" href="<?= base_url('project'); ?>">Projects</a>
                    </li>
                    <li class="nav-item <?= $this->uri->segment(2) == '#contactus' ? 'active' : '' ?>">
                        <a class="nav-link scroll-to" href="#contactus">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <!-- content -->
    <div class="body-content">