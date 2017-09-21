<?php
include 'config.php';
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Upload Question</title>

  </head>
<body>
<?php if(isset($_SESSION['admin']))
{ ?>
		<strong>Please fill all the fields</strong>

	<form method="POST" enctype="multipart/form-data">
    <textarea name="question" cols="26" rows="3" placeholder="Question" required></textarea><br><br><br>
    <textarea name="answer" cols="26" rows="3" placeholder="Answer" required></textarea><br><br><br>
			<label>Image <sup>*</sup></label>
		 <input type="file" name="image1" required>
     <input type="file" name="image2" required>
			<input type="submit" name="submit" value="Upload">
      <br><br>
  	</form>
    <form method="post">
      <button name="logout">Logout</button>
    </form>
  <?php }
  else {
    echo "Please login to continue";
  } ?>
</body>
</html>

<?php
if (isset($_POST['submit']))
 {
$question = $_POST['question'];
$answer=$_POST['answer'];
$upload_image = $_FILES["image1"][ "name" ];
$upload_image2 = $_FILES["image2"][ "name" ];
$folder = "uploads/";

move_uploaded_file($_FILES["image1"]["tmp_name"], "$folder".$_FILES["image1"]["name"]);
$file = 'uploads2/'.$_FILES["image1"]["name"];
$uploadimage = $folder.$_FILES["image1"]["name"];
$newname = $_FILES["image1"]["name"];
$resize_image = $folder.$newname;
$actual_image = $folder.$newname.".jpg";
list( $width,$height ) = getimagesize( $uploadimage );
$newwidth = 640;
$newheight = 480;
$thumb = imagecreatetruecolor( $newwidth, $newheight );
$source = imagecreatefromjpeg( $resize_image );
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg( $thumb, $resize_image, 100 );
$out_image=addslashes(file_get_contents($resize_image));


move_uploaded_file($_FILES["image2"]["tmp_name"], "$folder".$_FILES["image2"]["name"]);
$file = 'uploads2/'.$_FILES["image2"]["name"];
$uploadimage = $folder.$_FILES["image2"]["name"];
$newname = $_FILES["image2"]["name"];
$resize_image = $folder.$newname;
$actual_image = $folder.$newname.".jpg";
list( $width,$height ) = getimagesize( $uploadimage );
$newwidth = 640;
$newheight = 480;
$thumb = imagecreatetruecolor( $newwidth, $newheight );
$source = imagecreatefromjpeg( $resize_image );
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
imagejpeg( $thumb, $resize_image, 100 );
$out_image=addslashes(file_get_contents($resize_image));

mysql_query("INSERT INTO `questions`(`question`, `answer`,`img1_name`,`img2_name` ,`img_path`)
      VALUES('$question','$answer','$upload_image','$upload_image2','$folder')") or die (mysql_error());

echo "<script type='text/javascript'>alert('Question added successfully');</script>";
	}

if (isset($_POST['logout']))
{
  session_destroy();
  session_unset();
  header("location:index.php");
}
?>
