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
    <title>DATA BASE</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background-color: black;">


<div class="container" style="width : 900px;">
<a href="course.php" class="btn bg-danger text-white">Course</a>
<a href="author.php" class="btn bg-danger text-white">Author</a>
<a href="content.php" class="btn bg-danger text-white">Content</a> <br><br>


        <?php $lemari = mysqli_query($koneksi, "SELECT * from course INNER JOIN author ON course.id_a = author.id_a INNER JOIN content ON course.id_c = content.id_c");
        while ($koper = mysqli_fetch_array($lemari)) : ?>

    <div class="col-md-4 mt 5 float-left">
            <div class="card mb-4 box-shadow" style="">
                <div  class="header bg-danger text-white text-center" style="height : 50px; border-radius : 20px 20px 0 0;"><a style="text-decoration:none; color:white;" href="view.php?hal=<?= $koper['id_cn']?>"><?= $koper['name_c']?></a></div>
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 100%; width: 100%; display: block;" src="img/<?=$koper['thumbnail']?>" data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text" style="height: 50px; overflow: auto"><?= $koper['description']?></p>
                <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Author : <?= $koper['name_a']?></button>
                </div>
                    <small class="text-muted">Duration : <?= $koper['duration']?></small>
                  </div>
                </div>
            </div>
    </div>

       
    <?php endwhile; ?>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>








