		<!-- project-header -->
		<section class="project-header">
			<h1 class="title">Our Projects</h1>
			<p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum</p>
		</section>
		<!-- end project-header -->
		<!-- About us content -->
		<section class="projects-content">
			<div class="container">
				<div class="button-group">
					<button class="button-images active" data-filter="all">All</button>
					<?php foreach ($services as $servis) : ?>
						<button class="button-images" data-filter="<?= $servis['link']; ?>"><?= $servis['nama_service']; ?></button>
						<!-- <?= $servis['link'] ?> -->
					<?php endforeach ?>
				</div>
				<div class="projects">
					<div class="row">
						<?php foreach ($projects as $pro) : ?>
							<div class="box col-12 col-md-4 <?= $pro['link']; ?>">
								<button class="btn p-0 tampilkan" data-nama="<?= $pro['nama_project']; ?>" data-desc="<?= $pro['deskripsi']; ?>" data-img="<?= $pro['img']; ?>" data-serv="<?= $pro['nama_service']; ?>" data-toggle="modal" data-target="#projectDetail">
									<img src="<?= base_url() ?>assets/images/project/<?= $pro['img']; ?>" alt="">
									<div class="info">
										<h6><?= $pro['nama_project']; ?></h6>
										<h4><?= $pro['deskripsi']; ?></h4>
									</div>
								</button>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- <div class="project-pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link previous" href="#">&#60;</a></li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link next" href="#">&#62;</a></li>
                        </ul>
                    </nav>
                </div> -->
				<div class="project-button">
					<button class="btn hire-us">Hire Us</button>
				</div>
			</div>
		</section>
		<!-- End projects content -->

		<!-- Modal -->
		<div class="modal fade bd-example-modal-lg" id="projectDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
								<div class="project-img col-12 col-lg-6">
									<img src="" alt="" class="img-profil img-fluid">
								</div>
								<div class="col-12 col-lg-6">
									<div class="profil-content">
										<h1 class="nama"></h1>
										<h4 class="serv"></h4>
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
					var serv = $(this).data('serv');
					var img = '<?= base_url('assets/images/project/') ?>' + $(this).data('img');
					var desc = $(this).data('desc');
					$('.nama').text(nama);
					$('.serv').text(serv);
					$('.desc').text(desc);
					$('.img-profil').attr('src', img);
				});
			});
		</script>