<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'coursedb';

$koneksi = mysqli_connect($server, $user, $pass, $db)or die(mysqli_error($koneksi));



// SUBMIT

if(isset($_POST['submit_u'])){
    // EDIT

    if ($_GET['hal'] == "edit"){
        $hapus = mysqli_query($koneksi, "UPDATE course SET
        name_c = '$_POST[name_c]',
        thumbnail = '$_POST[thumbnail]',
        id_a = '$_POST[id_a]',
        duration = '$_POST[duration]',
        description = '$_POST[description]'
        WHERE id_c = '$_GET[id]'    
        

        ");
        if (mysqli_affected_rows($koneksi)>0){
            echo    "<script>
                alert('EDIT SUKSES');
                document.location= 'course.php';
            </script>";
            
        } else {
            echo    "<script>
                alert('EDIT GAGAL');
                document.location= 'course.php';
            </script>";
        }
    } else { // UPLOAD
    
        $simpan = mysqli_query($koneksi, "INSERT INTO course (name_c, thumbnail, id_a, duration, description) VALUES
                                ('$_POST[name_c]','$_POST[thumbnail]','$_POST[id_a]','$_POST[duration]','$_POST[description]')");

        if (mysqli_affected_rows($koneksi)>0){
            echo    "<script>
                alert('INPUT SUKSES');
                document.location= 'course.php';
            </script>";
        } else {
            echo    "<script>
                alert('INPUT GAGAL USER ID SALAH!');
                document.location= '4.php';
            </script>";
        }
    }
}
// DELETE USER
if (isset($_GET['hal']))
{
    if ($_GET['hal'] == "hapus")
    {
        $hapus = mysqli_query($koneksi, "DELETE FROM course WHERE id_c = '$_GET[id]' ");
        if (mysqli_affected_rows($koneksi)>0){
            echo    "<script>
                alert('HAPUS SUKSES');
                document.location= 'course.php';
            </script>";
        }
    } else if ($_GET['hal'] == "edit")
    {   
        $tampiluser = mysqli_query($koneksi, "SELECT * FROM course WHERE id_c = '$_GET[id]'");
        $datauser = mysqli_fetch_array($tampiluser);
        if($datauser)
        {
            $vname_c = $datauser['name_c'];
            $vthumbnail = $datauser['thumbnail'];
            $vid_a = $datauser['id_a']; 
            $vduration = $datauser['duration'];
            $vdescription = $datauser['description'];
        
        }
        
        
     }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Field</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background-color: white;">


<div class="container" style="width : 900px;">
<a href="index.php" class="btn btn-warning">Kembali</a>
<div class="card text-center mt-3">
  		<div class="card-header bg-danger text-white">
    		Input Course
  		</div>
  		<div class="card-body text-justify">
   		    <form method="post" action="">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name_c" value="<?=@$vname_c?>" class="form-control" placeholder="Input Nama Course" required="">
                    <label>Author</label>
                    <input type="text" name="id_a" value="<?=@$vid_a?>" class="form-control" placeholder="Input ID Author" required="">
                    <label>Duration</label>
                    <input type="text" name="duration" value="<?=@$vduration?>" class="form-control" placeholder="Input Duration (mm:dd)" required="">
                    <label>Description</label>
                    <textarea type="text" name="description" value="<?=@$vdescription?>" class="form-control" placeholder="Input Course Description" required=""></textarea>
                    <label>Thumbnail</label>
                    <input type="file" name="thumbnail" value="<?=@$vthumbnail?>" class="form-control" required="">
                    <br>
                    <button type="submit" class="btn btn-success" name="submit_u">Submit</button>
                    <button type="reset" class="btn btn-danger" name="reset_u">Clear</button>
                </div>
            </form>
   	    </div>
    </div>
    </div>





    <div class="card text-center mt-3">
  <div class="card-header bg-danger text-white">
    Data USER
  </div>
  <div class="card-body text-justify">
   <table class = "table table-bordered">
   	<tr>
   		<th>ID Course</th>
        <th>Course Name</th>
        <th>Thumbnail</th>
        <th>ID Author</th>
        <th>Duration</th>
        <th>Description</th>
        <th>Aksi</th>
   		
   	</tr>
   	<?php 
   		$tampil = mysqli_query($koneksi, "SELECT * from course");
   		while ($data = mysqli_fetch_array($tampil)) :
   	 ?>
   	<tr>
   		<th><?=$data['id_c']?></th>
        <th><?=$data['name_c']?></th>
        <th><img src="img/<?=$data['thumbnail']?>" alt=""></th>
        <th><?=$data['id_a']?></th>
        <th><?=$data['duration']?></th>
        <th><?=$data['description']?></th>
   		<td>
   			<a onclick="return confirm('Anda Yakin?');" href="course.php?hal=edit&id=<?=$data['id_c']?>" class="btn btn-warning">Edit</a>
   			<a onclick="return confirm('Anda Yakin?');" href="course.php?hal=hapus&id=<?=$data['id_c']?>" class="btn btn-danger">Delete</a>
   		</td>
   	</tr>
   <?php endwhile ?>
   </table>
   	</div>
  </div>

<br><br>
</div>




























<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>








