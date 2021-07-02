<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->flashdata('pesan'); ?>
            <?php echo validation_errors('<div class="error">', '</div>'); ?>
            <div class="card">
                <div class="card-header d-block">
                    <h3>Team <button type="button" class="btn btn-primary tambah" style="float: right;" data-toggle="modal" data-target="#Team"><i class="ik ik-plus-square ml-0"></i>Tambah Testimoni</button></h3>
                </div>
                <div class="card-body" style="overflow: auto;">
                    <div class="dt-responsive">
                        <table id="simpletable"
                               class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Posisi</th>
                                <th>Deskripsi Singkat</th>
                                <th width="10%">Sosmed</th>
                                <th width="7%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ; foreach ($teams as $team): ?>
                                <tr>
                                    <td><?= $a++ ?></td>
                                    <td><img height="70px" width="70px" src="<?= base_url('assets/images/team/').$team['img'] ?>"></td>
                                    <td><?= $team['nama'] ?></td>
                                    <td><?= $team['posisi'] ?></td>
                                    <td><?= substr($team['deskripsi'] , 0, 150); ?></td>
                                    <td><div class="table-actions" style="float: left;">
                                            <?php if ($team['ig'] != null): ?>
                                                <a  href="$team['ig']" target="_blank"><i class="ik ik-instagram text-pink"></i></a>
                                            <?php endif ?>
                                            <?php if ($team['fb'] != null): ?>
                                                <a  href="<?= $team['fb'] ?>" target="_blank"><i class="ik ik-facebook text-blue"></i></a>
                                            <?php endif ?>
                                            <?php if ($team['twt'] != null): ?>
                                                <a  href="<?= $team['twt']; ?>" target="_blank"><i class="ik ik-twitter text-blue"></i></a>
                                            <?php endif ?>
                                        </div>
                                        
                                    </td>
                                    
                                    <td><div class="table-actions" style="float: left;">
	                                        <a href="#" class="ubah" data-toggle="modal" data-target="#Team" data-nama="<?= $team['nama'] ?>" 
                                                data-id="<?= $team['id_team'] ?>" 
                                                data-img="<?= $team['img'] ?>" 
                                                data-posisi="<?= $team['posisi'] ?>" 
                                                data-desc="<?= $team['deskripsi'] ?>" 
                                                data-ig="<?= $team['ig'] ?>" 
                                                data-fb="<?= $team['fb'] ?>" 
                                                data-twt="<?= $team['twt'] ?>" 
                                                ><i class="ik ik-edit-2 text-green"></i></a>
	                                        <a class="hapus" href="<?= base_url('admin/team_del/').$team['id_team'] ?>" data-toggle="modal" data-target="#Hapus"><i class="ik ik-trash-2 text-red"></i></a>
	                                    </div>
	                                </td>
                                </tr>
                                <?php endforeach ?>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Team" tabindex="-1" role="dialog" aria-labelledby="Testimoni" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Tambah Testimoni</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
	            <div class="card card-content border-left-0 border-bottom-0 border-right-0 border-success rounded-0 shadow-sm">
	                <div class="card-body pt-0">  
	                    <form id="cek1" action="<?= base_url('admin/team/') ?>" method="POST" enctype="multipart/form-data" >
	                        <div class="form-group">
	                            <label for="nama"><b>Nama *</b></label>
                                <input type="hidden" name="id" value="">
	                            <input type="text" class="form-control" id="nama" name="nama" autofocus autocomplete="off">
	                            <span id="nama_error" class="text-danger"></span>
	                        </div>
                            <div class="gambar">
                                <div class="form-group">
                                    <label for="img"><b>Foto *</b></label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input" name="img" id="img" autofocus autocomplete="off" value="<?= set_value('img') ?>">
                                        <label class="custom-file-label" for="img" id="custumfile1">Choose file</label><small class="form-text text-muted">Hanya dapat mengupload gambar</small>
                                        <span id="img_error" class="text-danger" ></span>
                                    </div>
                                </div>
                            </div>
	                        <div class="form-group">
                                <label for="posisi"><b>Posisi *</b></label>
                                <input type="text" class="form-control" id="posisi" name="posisi" autofocus autocomplete="off">
                                <span id="posisi_error" class="text-danger"></span>
                            </div>
	                        <div class="form-group">
	                            <label for="desc"><b>Deskripsi singkat</b></label>
	                            <textarea class="form-control ck_editor_editable" id="desc" name="desc" rows="7"><?= set_value('desc') ?></textarea>
	                        </div>
                            <div class="form-group">
                                <label for="ig"><b>Instagram </b></label>
                                <input type="text" class="form-control" id="ig" name="ig" autofocus autocomplete="off">
                                <span id="posisi_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="fb"><b>Facebook </b></label>
                                <input type="text" class="form-control" id="fb" name="fb" autofocus autocomplete="off">
                                <span id="posisi_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="twt"><b>Twitter </b></label>
                                <input type="text" class="form-control" id="twt" name="twt" autofocus autocomplete="off">
                                <span id="posisi_error" class="text-danger"></span>
                            </div>
	                        
	                       
	                </div>
            	</div>
            </div>
	        <div class="modal-footer">
	          <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
	          <button type="reset" class="btn btn-danger btn-ripple">Reset</button>
	          <button type="submit" name="TambahTesti" id="btn-tambah" class="btn btn-outline-success btn-ripple"><i class="far fa-save"></i> Simpan</button>
	        </div>
	        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Hapus" tabindex="-1" role="dialog" aria-labelledby="Hapus" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="background-color: red">
                <h5 class="modal-title" id="demoModalLabel">Hapus Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p align="center">Apakah anda yakin ingin menghapus <br> data?</p>
                <div class="row">
                    <div class="col">
                        <a href="" class="hps"><button class="btn btn-danger center">ya</button></a>
                    </div>
                    <div class="col">
                        <button class="btn btn-ripple" style="float: right;" data-dismiss="modal">tidak</button>
                    </div>
                </div>
                            
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {


    $('.ubah').on('click', function(e){
        e.preventDefault();
        var nama = $(this).data('nama');
        var id = $(this).data('id');
        var posisi = $(this).data('posisi');
        var img = '<?= base_url('assets/images/team/') ?>' + $(this).data('img');
        var desc = $(this).data('desc');
        var ig = $(this).data('ig');
        var fb = $(this).data('fb');
        var twt = $(this).data('twt');
        var gambar = "<div class='row mb-4 mt-2'><div class='col-md-4'><img src='"+img+"' width='200px' height='200px' class='img'></div><div class='col-md-8'> <div class='form-group'><label for='img'>Foto *</label><div class='custom-file '><input type='file' class='custom-file-input' name='img' id='img' autofocus autocomplete='off' value=''><label class='custom-file-label' for='img' id='custumfile1'>Choose file</label><small class='form-text text-muted'>Hanya dapat mengupload gambar</small><span id='img_error' class='text-danger' ></span></div></div></div></div>";

        $('.modal-title').text('Ubah Data Team');
        $('.gambar').html(gambar);
        $('#btn-tambah').html('<i class="far fa-save"></i> Ubah');
        $('#btn-tambah').attr('name', 'UbahTeam');
        $('[name="id"]').val(id);
        $('[name="desc"]').val(desc);
        $('[name="nama"]').val(nama);
        $('[name="posisi"]').val(posisi);
        $('[name="ig"]').val(ig);
        $('[name="fb"]').val(fb);
        $('[name="twt"]').val(twt);
        $('input[name="img"]').change(function(e){
            var fileName1 = e.target.files[0].name;
            console.log(fileName1);
            $('#custumfile1').text(fileName1);
        });

    });
    $('.tambah').on('click', function(e){
        var gambar = "<div class='form-group'><label for='img'><b>Foto *</b></label><div class='custom-file '><input type='file' class='custom-file-input' name='img' id='img' autofocus autocomplete='off' value='<?= set_value('img') ?>'><label class='custom-file-label' for='img' id='custumfile1'>Choose file</label><small class='form-text text-muted'>Hanya dapat mengupload gambar</small><span id='img_error' class='text-danger' ></span></div></div>";
        $('.modal-title').text('Tambah Data Team');
        $('.gambar').html(gambar);
        $('#btn-tambah').html('<i class="far fa-save"></i> Simpan');
        $('#btn-tambah').attr('name', 'TambahTeam');
        $('#cek1')[0].reset();
        $('input[name="img"]').change(function(e){
            var fileName1 = e.target.files[0].name;
            console.log(fileName1);
            $('#custumfile1').text(fileName1);
        });
    });

    $('.hapus').on('click', function(e){
        e.preventDefault();
        var hps = $(this).attr('href');
        $('.hps').attr('href', hps);
        
    });

    
});
</script>