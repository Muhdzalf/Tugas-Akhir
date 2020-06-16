<?php
include("config.php");?>

<?php
if (isset($_POST['update'])){
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $nama = mysqli_real_escape_string($mysqli, $_POST['nama']);
    $nim = mysqli_real_escape_string($mysqli, $_POST['nim']);
    $jurusan = mysqli_real_escape_string($mysqli, $_POST['jurusan']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

    //chek empty fields
    if(empty($nama) ||empty($nim) ||empty($jurusan) ||empty($email)){
        if(empty($nama)){
            echo"<font color='red'>Nama masih belum diisi</font><br/>";
        }
        if(empty($nim)){
            echo"<font color='red'>NIM masih belum diisi</font><br/>";
        }
        if(empty($jurusan)){
            echo"<font color='red'>Jurusan masih belum diisi</font><br/>";
        }
        if(empty($email)){
            echo"<font color='red'>Email masih belum diisi</font><br/>";
        }
    }else{
        //update table
        $mysqli = mysqli_query(
            $mysqli,
            "UPDATE tbl_mahasiswa SET NAMA='$nama', NIM='$nim', JURUSAN='$jurusan', EMAIL='$email' WHERE ID='$id' "
        );

        //back to display page
        header("Location: index.php");
    }
    
}
?>

<?php
// getting id from url
$id = $_GET['id'];

//Selecting data asociation
$result = mysqli_query($mysqli, "SELECT * FROM tbl_mahasiswa WHERE ID=$id");

while($res = mysqli_fetch_array($result)) {
    $nama = $res['NAMA'];
    $nim = $res['NIM'];
    $jurusan = $res['JURUSAN'];
    $email = $res['EMAIL'];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Edit</title>
  </head>
  <body>
      <div class="container">
        <h1>Form Edit Data</h1>

        <form class="col-4" action="edit.php" method="post" name="form1">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="nama" class="form-control" name="nama"
                value="<?php echo $nama; ?>">
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="nim" class="form-control" name="nim"
                value="<?php echo $nim; ?>">
            </div>
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <input type="jurusan" class="form-control" name="jurusan"
                value="<?php echo $jurusan; ?>">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" class="form-control" name="email"
                value="<?php echo $email; ?>">
            </div>
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="index.php"><button type="button" class="btn btn-success">Home</button></a>
        </form>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>