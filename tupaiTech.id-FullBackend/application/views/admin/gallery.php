<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card">
                <div class="card-header d-block">
                    <h3>Data Berita <button type="button" class="btn btn-primary tambah" style="float: right;" data-toggle="modal" data-target="#TambahGallery"><i class="ik ik-plus-square ml-0"></i>Tambah Berita</button></h3>
                </div>
                <div class="card-body" style="overflow: auto;">
                    <div class="dt-responsive">
                        <table id="simpletable"
                               class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th>Foto</th>
                                <th>Caption</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $a=1; foreach ($gallerys as $img): ?>
                                <tr>
                                    <td><?= $a++ ?></td>
                                    <td><img height="70px" width="70px" src="<?= base_url('assets/images/gallery/').$img['foto'] ?>"></td>
                                    <td><?= $img['caption'] ?></td>
                                    <td><?= $img['nama_service'] ?></td>
                                    <td><?= format_indo($img['tanggal'])  ?></td>
                                    <td><div class="table-actions">
                                            <a href="#" class="ubah" data-toggle="modal" data-target="#TambahGallery" 
                                            data-caption="<?= $img['caption'] ?>" 
                                            data-id="<?= $img['id_gallery'] ?>" 
                                            data-kategori="<?= $img['kategory'] ?>" 
                                            data-img="<?= $img['foto'] ?>"
                                            data-tgl="<?= date('m/d/Y', strtotime($img['tanggal'])) ?>"><i class="ik ik-edit-2 text-green"></i></a>
                                            <a class="hapus" href="<?= base_url('admin/gallery_del/').$img['id_gallery'] ?>" data-toggle="modal" data-target="#Hapus"><i class="ik ik-trash-2 text-red"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="TambahGallery" tabindex="-1" role="dialog" aria-labelledby="TambahGallery" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Tambah Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="card card-content border-left-0 border-bottom-0 border-right-0 border-success rounded-0 shadow-sm">
                    <div class="card-body pt-0">  
                        <form id="cek1" action="<?= base_url('admin/gallery/') ?>" method="POST" enctype="multipart/form-data" >
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
                                <label for="caption"><b>Caption *</b></label>
                                <input type="hidden" name="id" value="">
                                <input type="text" class="form-control" id="caption" name="caption" autofocus autocomplete="off">
                                <span id="caption_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="kategori"><b>Kategori *</b></label>
                                <select class="form-control" id="kategori" name="kategori" style="width: 100%; height: 38px;" value="<?= set_value('kategori') ?>">
                                    <option selected>- Pilih -</option>
                                    <?php foreach ($services as $servis): ?>
                                        <option value="<?= $servis['id_service'] ?>"><?= $servis['nama_service'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <span id="kategori_error" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="tanggal"><b>Tanggal</b></label>
                                <input type="text" class="form-control datetimepicker-input" class="tbh" id="datepicker" name="tanggal" data-toggle="datetimepicker" data-target="#datepicker">
                                <span id="tanggal_error" class="text-danger" value="<?= set_value('tanggal') ?>"></span>
                            </div>
                           
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-danger btn-ripple">Reset</button>
              <button type="submit" name="tambahberita" id="btn-tambah" class="btn btn-outline-success btn-ripple"><i class="far fa-save"></i> Simpan</button>
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
        var caption = $(this).data('caption');
        var id = $(this).data('id');
        var img = '<?= base_url('assets/images/gallery/') ?>' + $(this).data('img');
        var kategori = $(this).data('kategori');
        var tgl = $(this).data('tgl');
        var gambar = "<div class='row mb-4 mt-2'><div class='col-md-4'><img src='"+img+"' width='200px' height='200px' class='img'></div><div class='col-md-8'> <div class='form-group'><label for='img'><b>Foto *</b></label><div class='custom-file '><input type='file' class='custom-file-input' name='img' id='img' autofocus autocomplete='off' value=''><label class='custom-file-label' for='img' id='custumfile1'>Choose file</label><small class='form-text text-muted'>Hanya dapat mengupload gambar</small><span id='img_error' class='text-danger' ></span></div></div></div></div>";

        $('.modal-title').text('Ubah Gallery');
        $('.gambar').html(gambar);
        $('#btn-tambah').html('<i class="far fa-save"></i> Ubah');
        $('#btn-tambah').attr('name', 'UbahGallery');
        $('[name="id"]').val(id);
        $('[name="caption"]').val(caption);
        $('[name="tanggal"]').val(tgl);
        $('[name="kategori"]').val(kategori);
        $('input[name="img"]').change(function(e){
            var fileName1 = e.target.files[0].name;
            console.log(fileName1);
            $('#custumfile1').text(fileName1);
        });

    });
    $('.tambah').on('click', function(e){
        var gambar = "<div class='form-group'><label for='img'><b>Foto *</b></label><div class='custom-file '><input type='file' class='custom-file-input' name='img' id='img' autofocus autocomplete='off' value='<?= set_value('img') ?>'><label class='custom-file-label' for='img' id='custumfile1'>Choose file</label><small class='form-text text-muted'>Hanya dapat mengupload gambar</small><span id='img_error' class='text-danger' ></span></div></div>";
        $('.modal-title').text('Tambah Gallery');
        $('.gambar').html(gambar);
        $('#btn-tambah').html('<i class="far fa-save"></i> Simpan');
        $('#btn-tambah').attr('name', 'TambahGallery');
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