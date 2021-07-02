<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card">
                <div class="card-header d-block">
                    <h3>Data User <button type="button" class="btn btn-primary tambah" style="float: right;" data-toggle="modal" data-target="#TambahService"><i class="ik ik-plus-square ml-0"></i>Tambah User</button></h3>
                </div>
                <div class="card-body" style="overflow: auto;">
                    <div class="dt-responsive">
                        <table id="simpletable"
                               class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Posisi</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1 ; foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $a++ ?>.</td>
                                    <td><?= $user['nama'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?= $user['posisi'] ?></td>
                                    <td><div class="table-actions">
	                                        <a href="" class="ubah" 
                                            data-nama="<?= $user['nama'] ?>"
                                            data-username="<?= $user['username'] ?>"
                                            data-id="<?= $user['id_user'] ?>"
                                            data-img="<?= $user['img'] ?>"
                                            data-posisi="<?= $user['posisi'] ?>"
                                            ><i class="ik ik-edit-2 text-green"></i></a>
	                                        <a class="hapus" href="<?= base_url('admin/user_del/').$user['id_user'] ?>" data-toggle="modal" data-target="#Hapus"><i class="ik ik-trash-2 text-red"></i></a>
	                                    </div>
	                                </td>
                                </tr>
                                <?php endforeach ?>
                                
                            </tbody>
                            <tfoot>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Posisi</th>
                                <th width="10%">Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="TambahService" tabindex="-1" role="dialog" aria-labelledby="TambahService" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Tambah Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card card-content border-left-0 border-bottom-0 border-right-0 border-success rounded-0 shadow-sm">
                    <div class="card-body pt-0">  
                        <form id="cek1" action="<?= base_url('admin/user/') ?>" method="POST" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="nama"><b>Nama User *</b></label>
                                <input type="hidden" name="id" value="">
                                <input type="text" class="form-control" id="nama" name="nama" autofocus autocomplete="off">
                                <span id="nama_error" class="text-danger" value="<?= set_value('nama_service') ?>"></span>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="username"><b>Username *</b></label>
                                    <input type="text" class="form-control" id="username" name="username" autofocus autocomplete="off">
                                    <span id="username_error" class="text-danger" value="<?= set_value('username') ?>"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="penulis"><b>Password</b></label>
                                    <input type="text" class="form-control" id="password" name="password" autocomplete="off" 
                                    value="<?= set_value('password') ?>">
                                    <span id="password_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="gambar">
                            <div class="form-group">
                                <label for="nama_service">Foto *</label>
                                <div class="custom-file ">
                                    <input type="file" class="custom-file-input" name="img" id="img" autofocus autocomplete="off" value="<?= set_value('File1') ?>">
                                    <label class="custom-file-label" for="File1" id="custumfile1">Choose file</label><small class="form-text text-muted">Hanya dapat mengupload gambar</small>
                                    <span id="File1_error" class="text-danger" ></span>
                                </div>
                            </div>
                            </div>
                            <div class="form-group">
                                <label for="posisi"><b>Posisi *</b></label>
                                <input type="text" class="form-control" id="posisi" name="posisi" autofocus autocomplete="off">
                                <span id="posisi_error" class="text-danger" value="<?= set_value('posisi') ?>"></span>
                            </div>

                           
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-danger btn-ripple">Reset</button>
              <button type="submit" name="TambahService" id="btn-simpan" class="btn btn-outline-success btn-ripple"><i class="far fa-save"></i> Simpan</button>
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
        var username = $(this).data('username');
        var id = $(this).data('id');
        var img = '<?= base_url('assets/images/user/') ?>' + $(this).data('img');
        var posisi = $(this).data('posisi');
        var gambar = "<div class='row mb-4 mt-2'><div class='col-md-4'><img src='"+img+"' width='200px' height='200px' class='img'></div><div class='col-md-8'> <div class='form-group'><label for='img'>Cover Service *</label><div class='custom-file '><input type='file' class='custom-file-input' name='img' id='img' autofocus autocomplete='off' value=''><label class='custom-file-label' for='img' id='custumfile1'>Choose file</label><small class='form-text text-muted'>Hanya dapat mengupload gambar</small><span id='img_error' class='text-danger' ></span></div></div></div></div>";

        $('.modal-title').text('Ubah User');
        $('.gambar').html(gambar);
        $('#btn-simpan').html('<i class="far fa-save"></i> Ubah');
        $('#btn-simpan').attr('name', 'UbahUser');
        $('[name="id"]').val(id);
        $('[name="nama"]').val(nama);
        $('[name="username"]').val(username);
        $('[name="posisi"]').val(posisi);
        $('#TambahService').modal('show');
        $('input[name="img"]').change(function(e){
            var fileName1 = e.target.files[0].name;
            console.log(fileName1);
            $('#custumfile1').text(fileName1);
        });

    });
    $('.tambah').on('click', function(e){
        var gambar = "<div class='form-group'><label for='img'><b>Foto *</b></label><div class='custom-file '><input type='file' class='custom-file-input' name='img' id='img' autofocus autocomplete='off' value='<?= set_value('img') ?>'><label class='custom-file-label' for='img' id='custumfile1'>Choose file</label><small class='form-text text-muted'>Hanya dapat mengupload gambar</small><span id='img_error' class='text-danger' ></span></div></div>";
        $('.modal-title').text('Tambah User');
        $('.gambar').html(gambar);
        $('#btn-simpan').html('<i class="far fa-save"></i> Simpan');
        $('#btn-simpan').attr('name', 'TambahUser');
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
