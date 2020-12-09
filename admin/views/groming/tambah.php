<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=groming&page=save" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Nama Pelanggan</label>
            <input type="text" name="nama" required value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" class="form-control">
            <input type="hidden" name="idform"  value="<?=(isset($_POST['idform']))?$_POST['idform']:'';?>" class="form-control">
            <input type="hidden" name="photos_old"  value="<?=(isset($_POST['photos']))?$_POST['photos']:'';?>">
            <span class="text-danger"><?=(isset($err['nama']))?$err['nama']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">Alamat</label>
            <input type="text" name="alamat" value="<?=(isset($_POST['alamat']))?$_POST['alamat']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['alamat']))?$err['alamat']:'';?></span>
        </div>
        <div class="form-group">
        <label for="">Nomer Telpon</label>
            <input type="number" name="nohp" value="<?=(isset($_POST['nohp']))?$_POST['nohp']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['nohp']))?$err['nohp']:'';?></span>
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group">
            <label for="">Paket</label>
            <select name="idpaket" class="form-control" required id="">
                <option value="">Pilih Paket</option>
                <?php if($paket != NULL){
                    foreach($paket as $row){?>
                        <option <?=(isset($_POST['idpaket']) && $_POST['idpaket']==$row['idpaket'] )?"selected":'';?> value="<?=$row['idpaket'];?>"> <?=$row['namapaket'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['idpaket']))?$err['idpaket']:'';?></span>
    </div>
    <div class="form-group">
            <label for="">Pegawai</label>
            <select name="idpegawai" class="form-control" required id="">
                <option value="">Pilih Pegawai</option>
                <?php if($pegawai != NULL){
                    foreach($pegawai as $row){?>
                        <option <?=(isset($_POST['idpegawai']) && $_POST['idpegawai']==$row['idpegawai'] )?"selected":'';?> value="<?=$row['idpegawai'];?>"> <?=$row['namapegawai'];?></option>
                    <?php }
                }?>
            </select>
            <span class="text-danger"><?=(isset($err['idpegawai']))?$err['idpegawai']:'';?></span>
    </div>
    <div class="form-group">
        <label for="">Tanggal</label>
            <input type="date" name="tanggal" value="<?=(isset($_POST['tanggal']))?$_POST['tanggal']:'';?>" class="form-control">
            <span class="text-danger"><?=(isset($err['tanggal']))?$err['tanggal']:'';?></span>
        </div>
    <div class="form-group">
        Pilih file:
        <img src="../media/<?=$_POST['photos']?>" width="100">
        <input type="file" name="photos" id="photos" value="Upload Image">
        <span class="text-danger"><?=(isset($err['photos']))?$err['photos']:'';?></span>
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>