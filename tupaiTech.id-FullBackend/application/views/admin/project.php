<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card">
                <div class="card-header d-block">
                    <h3>Data Project <button type="button" class="btn btn-primary tambah" style="float: right;" data-toggle="modal" data-target="#TambahProject"><i class="ik ik-plus-square ml-0"></i>Tambah Project</button></h3>
                </div>
                <div class="card-body" style="overflow: auto;">
                    <div class="dt-responsive">
                        <table id="simpletable"
                               class="table table-striped table-bordered nowrap">
                            <thead>
                            <tr>
                                <th width="5%">No.</th>
                                <th width="20%">Nama Project</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Status</th>
                                <th width="10%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; foreach ($projects as $project): ?>
                                <tr>
                                    <td><?= $a++ ?>.</td>
                                    <td><?= $project['nama_project'] ?></td>
                                    <td><?= $this->Admin_m->service($project['service_id'])[0]['nama_service'] ?></td>
                                    <td><?= substr($project['deskripsi'] , 0, 70) ?></td>
                                    <td><?= format_indo($project['tanggal_mulai'])  ?></td>
                                    <td><?= $project['tanggal_selesai'] != null ? format_indo($project['tanggal_selesai']) : '<button class="btn btn-danger selesai" data-id="'.$project['id_project'].'" data-toggle="modal" data-target="#ProjectDone">Done?</button>' ?></td>
                                    <td> 
                                        <?php if ($project['status'] == "Done"): ?>
                                            <span class="badge badge-success mb-1"><?= $project['status'] ?></span> </td>
                                        <?php elseif ($project['status'] == "InProgress"): ?> 
                                            <span class="badge badge-primary mb-1"><?= $project['status'] ?></span> </td>  
                                        <?php endif ?>
                                    <td><div class="table-actions">
	                                        <a href="" class="ubah" data-toggle="modal" data-target="#TambahBerita" data-nama="<?= $project['nama_project'] ?>" data-kat="<?= $project['service_id'] ?>" data-id="<?= $project['id_project'] ?>" data-img="<?= $project['img'] ?>" data-desc="<?= $project['deskripsi'] ?>" data-tgl="<?= date('m/d/Y', strtotime($project['tanggal_mulai'])) ?>" ><i class="ik ik-edit-2 text-green"></i></a>
	                                        <a class="hapus" href="<?= base_url('admin/project_del/').$project['id_project'] ?>" data-toggle="modal" data-target="#Hapus"><i class="ik ik-trash-2 text-red"></i></a>
	                                    </div>
	                                </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Tanggal</th>
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

<div class="modal fade" id="TambahProject" tabindex="-1" role="dialog" aria-labelledby="TambahProject" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Tambah Project</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
	            <div class="card card-content border-left-0 border-bottom-0 border-right-0 border-success rounded-0 shadow-sm">
	                <div class="card-body pt-0">  
	                    <form id="cek1" action="<?= base_url('admin/project') ?>" method="POST" enctype="multipart/form-data" >
	                        <div class="form-group">
	                            <label for="nama"><b>Nama Project *</b></label>
                                <input type="hidden" name="id" value="">
	                            <input type="text" class="form-control" id="nama" name="nama" autofocus autocomplete="off">
	                            <span id="nama_error" class="text-danger"></span>
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
                            <div class="gambar">
                                <div class="form-group">
                                    <label for="img"><b>Cover Project *</b></label>
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input" name="img" id="img" autofocus autocomplete="off" value="<?= set_value('img') ?>">
                                        <label class="custom-file-label" for="img" id="custumfile1">Choose file</label><small class="form-text text-muted">Hanya dapat mengupload gambar</small>
                                        <span id="img_error" class="text-danger" ></span>
                                    </div>
                                </div>
                            </div>
	                        
	                        <div class="form-group">
	                            <label for="desc"><b> Deskripsi </b></label>
	                            <textarea class="form-control" id="desc" name="desc" rows="10"><?= set_value('desc') ?></textarea>
	                        </div>
	                        <div class="form-group">
	                            <label for="mulai"><b>Mulai *</b></label>
                                <div class="tabselesai">
	                               <input type="text" class="form-control datetimepicker-input" id="datepicker" name="mulai" autocomplete="off" data-toggle="datetimepicker" data-target="#datepicker">
                                </div>
	                            <span id="mulai_error" class="text-danger" value="<?= set_value('mulai') ?>"></span>
	                        </div>
	                       
	                </div>
            	</div>
            </div>
	        <div class="modal-footer">
	          <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
	          <button type="reset" class="btn btn-danger btn-ripple">Reset</button>
	          <button type="submit" name="TambahProject" id="btn-tambah" class="btn btn-outline-success btn-ripple"><i class="far fa-save"></i> Simpan</button>
	        </div>
	        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Hapus" tabindex="-1" role="dialog" aria-labelledby="Hapus" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header alert bg-danger alert-danger text-white" >
                <h5 class="modal-title" id="demoModalLabel">Hapus Project</h5>
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

<div class="modal fade" id="ProjectDone" tabindex="-1" role="dialog" aria-labelledby="ProjectDone" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header alert bg-info alert-info text-white">
                <h5 class="modal-title" id="demoModalLabel">Project Selesai ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <p align="center"><b>Apakah Project sudah selesai?</b></p>
                <div class="card card-content border-left-0 border-bottom-0 border-right-0 border-success rounded-0 shadow-sm">
                    <div class="card-body pt-0">  
                        <form id="cek2" action="<?= base_url('admin/project_selesai/') ?>" method="POST" >
                            <div class="form-group">
                                <label for="selesai"><b>Tanggal Selesai </b></label>
                                <input type="hidden" name="id_done" value="">
                                <input type="text" class="form-control datetimepicker-input" id="datepicker2" name="selesai" autocomplete="off" data-toggle="datetimepicker" data-target="#datepicker2">
                                <span id="selesai_error" class="text-danger" value="<?= set_value('selesai') ?>"></span>
                            </div>
                    </div>
                </div>            
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
              <button type="reset" class="btn btn-danger btn-ripple">Reset</button>
              <button type="submit" name="ProjectDone" id="done" class="btn btn-outline-success btn-ripple"><i class="far fa-save"></i> Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    
$(document).ready(function() {
    // CKEDITOR.replace('isi');
    $('.ubah').on('click', function(e){
        e.preventDefault();
        var nama = $(this).data('nama');
        var id = $(this).data('id');
        var kat = $(this).data('kat');
        var img = '<?= base_url('assets/images/project/') ?>' + $(this).data('img');
        var desc = $(this).data('desc');
        var tgl = $(this).data('tgl');
        var gambar = "<div class='row mb-4 mt-2'><div class='col-sm-4'><img src='"+img+"' width='200px' height='200px' class='img'></div><div class='col-sm-8'> <div class='form-group'><label for='img'>Cover Project *</label><div class='custom-file '><input type='file' class='custom-file-input' name='img' id='img' autofocus autocomplete='off' value=''><label class='custom-file-label' for='img' id='custumfile1'>Choose file</label><small class='form-text text-muted'>Hanya dapat mengupload gambar</small><span id='img_error' class='text-danger' ></span></div></div></div></div>";

        $('.modal-title').text('Ubah Project');
        $('.gambar').html(gambar);
        $('#btn-tambah').html('<i class="far fa-save"></i> Ubah');
        $('#btn-tambah').attr('name', 'UbahProject');
        $('[name="id"]').val(id);
        $('[name="kategori"]').val(kat);
        $('[name="nama"]').val(nama);
        $('[name="desc"]').val(desc);
        $('[name="mulai"]').val(tgl);
        $('#TambahProject').modal('show');
        $('input[name="img"]').change(function(e){
            var fileName1 = e.target.files[0].name;
            console.log(fileName1);
            $('#custumfile1').text(fileName1);
        });

    });
    $('.tambah').on('click', function(e){
        var gambar = "<div class='form-group'><label for='img'><b>Cover Project *</b></label><div class='custom-file '><input type='file' class='custom-file-input' name='img' id='img' autofocus autocomplete='off' value='<?= set_value('img') ?>'><label class='custom-file-label' for='img' id='custumfile1'>Choose file</label><small class='form-text text-muted'>Hanya dapat mengupload gambar</small><span id='img_error' class='text-danger' ></span></div></div>";
        $('.modal-title').text('Tambah Project');
        $('.gambar').html(gambar);
        $('#btn-tambah').html('<i class="far fa-save"></i> Simpan');
        $('#btn-tambah').attr('name', 'TambahProject');
        $('#cek1')[0].reset();
        $('input[name="img"]').change(function(e){
            var fileName1 = e.target.files[0].name;
            console.log(fileName1);
            $('#custumfile1').text(fileName1);
        });
    });
    $('.selesai').on('click', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $('[name="id_done"]').val(id);
        
    });

    $('.hapus').on('click', function(e){
        e.preventDefault();
        var hps = $(this).attr('href');
        $('.hps').attr('href', hps);
        
    });




    
});
</script>