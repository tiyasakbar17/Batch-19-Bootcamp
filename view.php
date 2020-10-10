<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'coursedb';

$koneksi = mysqli_connect($server, $user, $pass, $db)or die(mysqli_error($koneksi));


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal No. 4B</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body   class="text-center" style= " background-color : black;">

<?php $lemari = mysqli_query($koneksi, "SELECT * from course INNER JOIN author ON course.id_a = author.id_a INNER JOIN content ON course.id_c = content.id_cn WHERE id_cn = '$_GET[hal]'");
 while ($koper = mysqli_fetch_array($lemari)) : ?>

<div class="card" style="width: 700px; margin: 30px auto;">


<video width="690px" height="340" controls>
  <source src="vd/<?=$koper['video_link']?>" type="video/mp4">
 </video>

  
  <div class="card-body">
    <h5 class="card-title"><?=$koper['name_cn']?></h5>
    <p class="card-text"><?=$koper['type']?></p>
  </div>
  
    <a href="index.php" class="card-link">Kembali</a>
  </div>
</div>

        <?php endwhile;?>









</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>