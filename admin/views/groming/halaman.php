<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="../style1.css">
</head>
<body class="bg">
<div class="row">
    <div class="pull-right">
        <a href="index.php?mod=groming&page=add">
            <button class="btn btn-primary">Spesial Layanan Grooming</button>
        </a>
    </div>
</div>
<br>
<div class="row">

<table class="table">
        <thead>
            <tr>
                <td>
                    No.
                </td>
                <td>Nama Pelanggan</td><td>Alamat</td><td>Jenis Jasa</td> <td>Tarif</td> <td>Pegawai</td><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($data != NULL){  
                $no=1;
                foreach($data as $row){?>
                    <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['nama']?></td>
                        <td><?=$row['alamat'];?></td>
                        <td><?=$row['namapaket']?></td>
                        <td><?=$row['tarif']?></td>
                        <td><?=$row['tanggal']?></td>                        
                        <td>
                            <a href="index.php?mod=groming&page=edit&id=<?=$row['idform']?>"><i class="fa fa-pencil"></i> </a>
                            <a href="index.php?mod=groming&page=delete&id=<?=$row['idform']?>"><i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>
<footer class="footer">
        <font color="black">Memberikan Pelayanan Sepnuh Hati</black>
    </footer>
    </div>
</body>
</html>