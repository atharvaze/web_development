<?php
if($_FILES["file"]["error"]>0)
{
	echo "Error".$_FILES["file"]["error"]."<br/>";

}
else
{
	echo "Upload".$_FILES["file"]["name"]."<br/>";
	echo "Type".$_FILES["file"]["type"]."<br/>";
	echo "size".($_FILES["file"]["size"]/1024)."<br/>";
	echo "stored in".$_FILES["file"]["tmp_name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],"/uploads/");
}
?>