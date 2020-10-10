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
        $hapus = mysqli_query($koneksi, "UPDATE content SET
        name_cn = '$_POST[name_cn]',
        video_link = '$_POST[video_link]',
        type = '$_POST[type]',
        id_c = '$_POST[id_c]'        
        WHERE id_cn = '$_GET[id]'    
        

        ");
        if (mysqli_affected_rows($koneksi)>0){
            echo    "<script>
                alert('EDIT SUKSES');
                document.location= 'content.php';
            </script>";
            
        } else {
            echo    "<script>
                alert('EDIT GAGAL');
                document.location= 'content.php';
            </script>";
        }
    } else { // UPLOAD
    
        $simpan = mysqli_query($koneksi, "INSERT INTO content (name_cn, video_link, type, id_c) VALUES
                                ('$_POST[name_cn]','$_POST[video_link]','$_POST[type]','$_POST[id_c]')");

        if (mysqli_affected_rows($koneksi)>0){
            echo    "<script>
                alert('INPUT SUKSES');
                document.location= 'content.php';
            </script>";
        } else {
            echo    "<script>
                alert('INPUT GAGAL USER ID SALAH!');
                document.location= 'content.php';
            </script>";
        }
    }
}
// DELETE
if (isset($_GET['hal']))
{
    if ($_GET['hal'] == "hapus")
    {
        $hapus = mysqli_query($koneksi, "DELETE FROM content WHERE id_cn = '$_GET[id]' ");
        if (mysqli_affected_rows($koneksi)>0){
            echo    "<script>
                alert('HAPUS SUKSES');
                document.location= 'content.php';
            </script>";
        }
    } else if ($_GET['hal'] == "edit")
    {   
        $tampiluser = mysqli_query($koneksi, "SELECT * FROM content WHERE id_cn = '$_GET[id]'");
        $datauser = mysqli_fetch_array($tampiluser);
        if($datauser)
        {
            $vname_cn = $datauser['name_cn'];
            $vvideo_link = $datauser['video_link'];
            $vtype = $datauser['type']; 
            $vid_c = $datauser['id_c'];
            
        
        }
        
        
     }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Field</title> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body style="background-color: white;">


<div class="container" style="width : 900px;">
<a href="index.php" class="btn btn-warning">Kembali</a>
<div class="card text-center mt-3">
  		<div class="card-header bg-danger text-white">
    		Input content
  		</div>
  		<div class="card-body text-justify">
   		    <form method="post" action="">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name_cn" value="<?=@$vname_cn?>" class="form-control" placeholder="Input Nama Content" required="">
                    <label>Video</label>
                    <input type="file" name="video_link" value="<?=@$vvideo_link?>" class="form-control" required="">
                    <label>Type</label>
                    <input type="text" name="type" value="<?=@$vtype?>" class="form-control" placeholder="Input Type Content" required="">
                    
                    <label>ID Course</label>
                    <input type="text" name="id_c" value="<?=@$vid_c?>" class="form-control" required="" placeholder="Input ID Course">
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
    Content List
  </div>
  <div class="card-body text-justify">
   <table class = "table table-bordered">
   	<tr>
   		<th>ID Content</th>
        <th>Content Name</th>
        <th>Video</th>
        <th>Content Type</th>
        <th>ID Course</th>
        <th>Aksi</th>
   		
   	</tr>
   	<?php 
   		$tampil = mysqli_query($koneksi, "SELECT * from content");
   		while ($data = mysqli_fetch_array($tampil)) :
   	 ?>
   	<tr>
   		<th><?=$data['id_cn']?></th>
        <th><?=$data['name_cn']?></th>
        <th><video width="240px" height="144px" controls><source src="vd/<?=$data['video_link']?>" type="video/mp4"></video></th>
        <th><?=$data['type']?></th>
        <th><?=$data['id_c']?></th>
        
   		<td>
   			<a onclick="return confirm('Anda Yakin?');" href="content.php?hal=edit&id=<?=$data['id_cn']?>" class="btn btn-warning">Edit</a>
   			<a onclick="return confirm('Anda Yakin?');" href="content.php?hal=hapus&id=<?=$data['id_cn']?>" class="btn btn-danger">Delete</a>
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








