<?php
session_start();

if($_SESSION['status'] != "login"){
    header('location:homepage.php?pesan=belum_login');
}

include_once("config.php");


$result = mysqli_query($mysqli, "SELECT*FROM tbl_mahasiswa ORDER BY ID ASC"); ?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <title>Data Mahasiswa</title>
</head>

<body>
  <h1>Data Mahasiswa</h1>
  <div class="row">
    <div class="col">
      <a href="create.html">
        <button type="button" class="btn btn-primary mt-4">Tambah data</button>
      </a>
    </div>
    <div class="col-xs">
      <form class="form-inline my-2 my-lg-0 " action="index.php" method="get">
        <input class="form-control mr-sm-2 mt-4" type="search" placeholder="Search by name" aria-label="Search" name="cari">
        <button class="btn btn-outline-success mt-4" type="submit">Search</button>
      </form>
      <br>
      <?php
      if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];
        echo "Hasil pencarian : " . $cari . "";
      }
      ?>
    </div>
  </div>

  <table class="table mt-4">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nama</th>
        <th scope="col">NIM</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Email</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_GET['cari'])) {
        $cari = $_GET['cari'];

        $result = mysqli_query($mysqli, "SELECT * FROM tbl_mahasiswa
        WHERE NAMA like '%" . $cari . "%'
        OR JURUSAN LIKE '%" . $cari . "%'
        ");
    }else {
          $result = mysqli_query($mysqli, "SELECT * FROM tbl_mahasiswa ORDER BY ID ASC");
    }
    while ($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $res['NAMA'] . "</td>";
        echo "<td>" . $res['NIM'] . "</td>";
        echo "<td>" . $res['JURUSAN'] . "</td>";
        echo "<td>" . $res['EMAIL'] . "</td>";
        echo "<td><a href=\"edit.php?id=$res[ID]\">Edit</a> | <a href=\"delete.php?ID=$res[ID]\" onClick=\"return confirm
        ('Are you sure you want to delete?')\">Delete</a></td>";
        }
        ?>
      <?php
      while ($res = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $res['NAMA'] . "</td>";
        echo "<td>" . $res['NIM'] . "</td>";
        echo "<td>" . $res['JURUSAN'] . "</td>";
        echo "<td>" . $res['EMAIL'] . "</td>";
        echo "<td><a href=\"edit.php?id=$res[ID]\">Edit</a> | <a href=\"delete.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      }
      ?>
    </tbody>
  </table>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>