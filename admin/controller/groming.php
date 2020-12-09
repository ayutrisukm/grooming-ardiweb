<?php
$con->auth();
$conn=$con->koneksi();
switch (@$_GET['page']){
    case 'add':
        $paket="select * from paket";
        $paket=$conn->query($paket);
        $sql="select * from pegawai";
        $pegawai=$conn->query($sql);
        $content="views/groming/tambah.php";
        include_once 'views/template.php';
    break;
    case 'save':
        if($_SERVER['REQUEST_METHOD']=="POST"){
            //validasi
            if(empty($_POST['nama'])){
                $err['nama']="Nama Pelanggan Wajib Terisi";
            }
            if(empty($_POST['alamat'])){
                $err['alamat']="Alamat Pelanggan Wajib Terisi";
            }
             }
            if(empty($_POST['nohp'])){
            $err['nohp']="No Hp Pelanggan Wajib Terisi";
            }
            if(empty($_POST['tanggal'])){
                $err['tanggal']="Tanggal Wajib Terisi";
            }
            if(empty($_POST['idpaket'])){
                $err['idpaket']="Jenis Jasa Wajib Terisi";
            }
            if(!is_numeric($_POST['idpegawai'])){
                $err['idpegawai']="Pegawai Wajib Terisi";
            }
            if(!empty($_FILES['photos']['name'])){
            $target_dir = "../media/";
            $photos=basename($_FILES["photos"]["name"]);
            $target_file = $target_dir . $photos;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["photos"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["photos"]["size"] > 500000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["photos"]["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars( basename( $_FILES["photos"]["name"])). " has been uploaded.";
                $_POST['photos']=$photos;
                //if(isset($_POST['photos_old']) && $_POST['photos_old']!=''){
                //    unlink($target_dir.$_POST['photos_old']);
                //}else{
                //    echo "Succses";
                //}
            } else {
                //echo "Sorry, there was an error uploading your file.";
                $err["photos"]="Sorry";
            }
            }
            }
            if(!isset($err)){
                $idpegawai=$_SESSION['login']['id'];
                if(!empty($_POST['idform'])){
                    //update
                    if (isset($_POST['photos'])){
                    $sql="UPDATE form SET alamat='$_POST[alamat]',nama='$_POST[nama]', idpaket='$_POST[idpaket]',nohp='$_POST[nohp]',
                    idpegawai='$_POST[idpegawai]',photos='$_POST[photos]',tanggal='$_POST[tanggal]' WHERE idform='$_POST[idform]'";
                    }else{
                    $sql="UPDATE form SET alamat='$_POST[alamat]',nama='$_POST[nama]', idpaket='$_POST[idpaket]',nohp='$_POST[nohp]',
                    idpegawai='$_POST[idpegawai]',tanggal='$_POST[tanggal]' WHERE idform='$_POST[idform]'";
                }
            }
                else{
                    //save
                    if(isset($_POST['photos'])){
                    $sql = "INSERT INTO form (nama,alamat,idpaket,nohp,idpegawai,photos,tanggal) 
                    VALUES ('$_POST[nama]','$_POST[alamat]','$_POST[idpaket]','$_POST[nohp]','$_POST[idpegawai]','$_POST[photos]','$_POST[tanggal]')";
                    }else{
                    $sql = "INSERT INTO form (nama,alamat,idpaket,nohp,idpegawai,tanggal)
                    VALUES ('$_POST[nama]','$_POST[alamat]','$_POST[idpaket]','$_POST[nohp]','$_POST[idpegawai]','$_POST[tanggal]')";
                    }
                    
            }
            if ($conn->query($sql) === TRUE) {
                header('Location:http://localhost/groming/admin/index.php?mod=groming');
            } else {
                $err['msg']= "Error: " . $sql . "<br>" . $conn->error;
            }

        }else{
            $err['msg']="tidak diijinkan";
        }
        if(isset($err)){
            $paket="select * from paket";
            $paket=$conn->query($paket);
            $sql="select * from pegawai";
            $pegawai=$conn->query($sql);
            $content="views/groming/tambah.php";
    
            include_once 'views/template.php';
        }
    break;
    case 'edit':
        $groming ="select * from form where idform='$_GET[id]'";
        $groming=$conn->query($groming);
        $_POST=$groming->fetch_assoc();
        $_POST['idform']=$_POST['idform'];
        $_POST['idpaket']=$_POST['idpaket'];
        //var_dump($groming);
        $paket="select * from paket";
        $paket=$conn->query($paket);
        $sql="select * from pegawai";
        $pegawai=$conn->query($sql);
        $content="views/groming/tambah.php";
        include_once 'views/template.php';
    break;
    case 'delete';
        $groming ="delete from form where idform='$_GET[id]'";
        $groming=$conn->query($groming);
        header('Location: '.$con->site_url().'/admin/index.php?mod=groming');
    break;
    default:
        $sql="SELECT*FROM pegawai INNER JOIN form ON form.idpegawai=pegawai.idpegawai INNER JOIN status ON status.idstatus=pegawai.idstatus INNER JOIN paket ON paket.idpaket=form.idpaket";
        $groming=$conn->query($sql);
        $conn->close();
        $content="views/groming/tampil.php";
        include_once 'views/template.php';
}
?>
