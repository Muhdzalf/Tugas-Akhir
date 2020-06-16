<?php
include("config.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   if(isset($_POST['Submit'])){
       $nama = mysqli_real_escape_string($mysqli, $_POST['nama']); 
       $nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
       $jurusan = mysqli_real_escape_string($mysqli, $_POST['jurusan']);
       $email = mysqli_real_escape_string($mysqli, $_POST['email']);

       //check empty fields
       if(empty($nama) || empty($nim) || empty($jurusan) || empty($email)){
           if(empty($nama)){
               echo"<font color='red'>Nama Masih Kosong</font><br/>";
           }
           if(empty($nim)){
                echo"<font color='red'>NIM Masih Kosong</font><br/>";
           }
           if(empty($jurusan)){
                echo"<font color='red'>Jurusan Masih Kosong</font><br/>";
           }
           if(empty($email)){
                echo"<font color='red'>Email Masih Kosong</font><br/>";
           }

           //link the previous page
           echo"<br/><a href='javascript:self.history.back();'>Go back</a>";
       }else {
           //if all the field are filled 

           //insert data to database
           $result = mysqli_query($mysqli, "INSERT INTO tbl_mahasiswa(NAMA, NIM, JURUSAN, EMAIL)VALUES
           ('$nama','$nim','$jurusan','$email')");

           //display success message
           echo"<font color='green'>Data Added Succesfully.";
           echo"<br/><a href='index.php'>View Result</a>";
       }
   } 
   ?>
</body>
</html>