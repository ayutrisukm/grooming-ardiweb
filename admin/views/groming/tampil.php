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
        <table border="0" cellpadding="0" cellspacing="0">
        <thead>
            <tr> 
                <td rowspan="15"><a href="index.php?mod=groming&page=add"><img height="150" src="https://drive.google.com/uc?export=view&id=1gfDKFFxK6RrkwlT0UMWqa6VP6odddvEA" alt=""></a></td>
            </tr>
            <tr>
                <td rowspan="15"><a href="index.php?mod=groming&page=add"><img height="150" src="https://drive.google.com/uc?export=view&id=1mzFjXY1hE_7mgjxdJKaOJYpbwCI1u6_b" alt=""></td>
            </tr>
            <tr>
                <td rowspan="15"><a href="index.php?mod=groming&page=add"> <img height="150" src="https://drive.google.com/uc?export=view&id=1qQChAmwK6atFc_bmfkvTtPgupf3K6Uhf" alt=""></td>
            </tr>
            <tr>
                <td rowspan="15"><a href="index.php?mod=groming&page=add"><img height="150" src="https://drive.google.com/uc?export=view&id=1c2_4LhYkjfkjs35YZEZv9b3j267fq84E" alt=""></td>
            </tr>
        </thead>
        <hr>
        <thead>
            <tr>
                <td rowspan="15"><a href="index.php?mod=groming&page=add"><img height="150" src="https://drive.google.com/uc?export=view&id=17VWocDlaHExR-geX3N6iqWUL89F18UC3" alt=""></td>
            </tr>
            <tr> 
                <td rowspan="15"><a href="index.php?mod=groming&page=add"> <img height="150" src="https://drive.google.com/uc?export=view&id=1mWvofTsNmSiK7CpF-4mN-pSZgeLAeTn-" alt=""></td>
            </tr>
            <tr>
                <td rowspan="15"><a href="index.php?mod=groming&page=add"> <img height="150" src="https://drive.google.com/uc?export=view&id=11Ur9miiNyKj8B67fI-yAKYdtmpj-0cXZ" alt=""></td>
            </tr>
        </thead>
</table>
<table class="table">
        <thead>
            <tr>
                <td>
                    No.
                </td>
                <td>Nama Pelanggan</td><td>Alamat</td><td>Jenis Jasa</td> <td>Tarif</td> <td>Tanggal</td><td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($groming != NULL){  
                $no=1;
                foreach($groming as $row){?>
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
    </div>
</body>
</html>