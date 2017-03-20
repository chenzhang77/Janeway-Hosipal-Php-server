<?php include("header.php");?>
<?php 
		$res=mysql_query("SELECT * FROM notification") or die("Query failed: ".mysql_error());
?>
<?php
if(isset($_POST['submit']))
{
	$title =  $_POST['title'];
	$detail =  $_POST['detail'];
	
		$filepath="";
		$target_dir = "uploads/";
		
		$file= time().substr(str_replace(" ", "_", $txt), 0);
		$info = pathinfo($file);
		$filename = $file.".".$ext;
		
		$target_file = $target_dir . $filename . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
		if ($_FILES["fileToUpload"]["size"] > 500000) {
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
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					
						echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}
		
		
	if(mysql_query("INSERT INTO notification(title,detail,imageID) VALUES('$title','$detail','".addslashes($target_file)."')"))
	{
		?>
		<script>document.location = 'notificationList.php';</script>
		<?php
	}
	else
	{
		?>
		<script>alert('Error while Inserting data ! Blank Data Provided');</script>
		<?php
	}			
}

?>

<html>
<body>

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

			
	<!-- Modal Insert Item -->
	<div class="modal fade" id="insert" role="dialog" aria-labelledby="insert" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
				</button>
				<h4 class="modal-title custom_align" id="Heading">Add New Item</h4>
			</div>
				
			<form class="form-horizontal" method="post" enctype="multipart/form-data">  
				
				
			<div class="modal-body">
		
							
			<br>

					<div class="row" align="center">
						<div class="col-xs-6  col-md-offset-3">
						 <input type="text"class="form-control" name="title" placeholder="Title"required>
						</div>
					</div>
				<br>
							
					<div class="row" style="height: 500px;">
						<div class="col-xs-6  col-md-offset-3">
						 <textarea rows="4" cols="50" style="height: 500px;" class="form-control" name="detail" placeholder="Detail 2" required ></textarea>
						</div>
					</div>
				<br>
					<div class="row">
						
						<div class="col-xs-6  col-md-offset-3">
						<label>Add Images</label>
						<input type="file" name="fileToUpload" id="fileToUpload">
						 
						</div>
					</div>
				<br>

			</div>

			<div class="modal-footer">		
					<button type="submit" name="submit" id="submit" class="btn btn-success btn-lg" style="width: 100%;">
						<span class="glyphicon glyphicon-ok-sign"></span>
							Add New Item
					</button>					   
			</div>
			</form> 
			
				</div> <!-- /.modal-content --> 
				</div> <!-- /.modal-dialog --> 
				</div>
				
				
					
		<div class="row">
			<div class="col-lg-12">
				<a data-toggle="modal" data-target="#insert" href="#" class="btn btn-primary">Add New Notification</a><br><br>
			</div> <!-- add new vehicle  button -->
		</div>
	
	
	 </div>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
 
</body>

</html>