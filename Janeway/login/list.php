<?php
session_start();
include_once 'dbconnect.php';
$u_id = $_SESSION['userID'];
if(!isset($_SESSION['userID']))
{
	header("Location: ../index.php");
}
$res=mysql_query("SELECT * FROM user WHERE id=$u_id");
$userRow=mysql_fetch_array($res);

$count=mysql_query("SELECT COUNT(*) FROM notification") or die("Query failed: ".mysql_error());
$row=mysql_fetch_array($count);
$totalPage = floor($row['COUNT(*)']/15+1);

?>
<?php
if(isset($_POST['submit']))
{
	$title =  $_POST['title'];
	$detail =  $_POST['detail'];
	$detail = preg_replace('/^[ \t]*[\r\n]+/m', '', $detail);
	$detail = ltrim($detail);
	$detail = preg_replace('/^\s+|\s+$/m', '', $detail);
	//$detail = trim($detail," ");
		$filepath="";
		$target_dir = "uploads/";
		
		$file= time().substr(str_replace(" ", "_", $txt), 0);
		$info = pathinfo($file);
		$filename = $file.".".$ext;
		
		$target_file = $target_dir . $filename . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
// 		if(isset($_POST["submit"])) {
// 			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
// 			if($check !== false) {
				
// 				$uploadOk = 1;
// 			} else {
// 				echo "File is not an image.";
// 				$uploadOk = 0;
// 			}
// 		}
// 		// Check if file already exists
// 		if (file_exists($target_file)) {
			
// 			$uploadOk = 0;
// 		}
// 		// Check file size
// 		if ($_FILES["fileToUpload"]["size"] > 500000) {

// 			$uploadOk = 0;
// 		}
// 		// Allow certain file formats
// 		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			
// 			$uploadOk = 0;
// 		}
// 		// Check if $uploadOk is set to 0 by an error
// 		if ($uploadOk == 0) {		
// 			// if everything is ok, try to upload file
// 		} else {
			
// 			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
// 			} else {
// 				echo "Sorry, there was an error uploading your file.";
// 			}
// 		}
		
		
	if(mysql_query("INSERT INTO notification(title,detail,imageID) VALUES('$title','$detail','".addslashes($target_file)."')"))
	{
		?>
		<script>document.location = 'list.php';</script>
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



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>List</title>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="js/lumino.glyphs.js"></script> 
</head>

<body>
	<span id="maxvalue" hidden="true"><?php echo $totalPage ?></span>
	<span id="minvalue" hidden="true">1</span>
	
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="../index.php"><span> Home </span></a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg><?php echo $userRow['email']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="logout.php?logout">
							<svg class="glyph stroked cancel">
							<use xlink:href="#stroked-cancel">
							</use>
							</svg> Logout</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>


<div class="container">
<h1>All information Table</h1>
<p>(Some descriptions here: Sample ->) Through the powers of <strong>contenteditable</strong> and some simple jQuery you can easily create a custom editable table. No need for a robust JavaScript library anymore these days.</p>

<ul>
<li>(Some descriptions here Sample ->) An editable table that exports a hash array. Dynamically compiles rows from headers</li>
</ul>


<div class="row">
	<div class="col-lg-12">
		<a data-toggle="modal" data-target="#insert" class="btn btn-primary">Add New Notification</a><br><br>
	</div> 
</div>


<div id="tableList" class="table-editable table-striped">

</div>



<nav aria-label="Page navigation example">

  <ul class="pagination pull-right">
    <li class="page-item">
    
    
      <a class="page-link"  onclick="previous()" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
      
      
    </li>
    <li  class="page-item"><a id="currentpage" class="page-link" href="#">1</a></li>
    <li class="page-item">
    
    
      <a class="page-link" onclick="next()" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
   
  </ul>
  
  <span class = "label label-info ">Total <?php echo $totalPage  ?> pages</span>
</nav>


</div>

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
							
					<div class="row"  >
						<div class="col-xs-6  col-md-offset-3">
						 <textarea style="height: 250px;" class="form-control" name="detail" placeholder="Detail" required ></textarea>
						</div>
					</div>
	<!--	
			<br>
					<div class="row">
						<div class="col-xs-6  col-md-offset-3">
						<label>Add Images</label>
						<input type="file" name="fileToUpload" id="fileToUpload">						 
						</div>
					</div>
			<br>
	-->
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
				
				
					
</div>

<script>

function previous()
{
	
	var currentpage = document.getElementById("currentpage").innerHTML;
	if(currentpage > 1) {
		var newpage = (new Number(currentpage)-1);
		document.getElementById("currentpage").textContent = newpage;

		var offset = (newpage-1)*15;
		
		$( "#tableList" ).load( "tablelist.php?val="+offset );
	}
		
}

function next() 
{
	var currentpage = document.getElementById("currentpage").innerHTML;
	if(currentpage < <?php echo $totalPage  ?>) {
		var newpage = (new Number(currentpage)+1);
		document.getElementById("currentpage").textContent = newpage;
		
		var offset = (newpage-1)*15;
		
		$( "#tableList" ).load( "tablelist.php?val="+offset );
	}
}

$(document).ready(function(){
	$( "#tableList" ).load( "tablelist.php?val=0" );
});


</script>

 <script>





var $TABLE = $('#table');
var $BTN = $('#export-btn');
var $EXPORT = $('#export');

$('.table-add').click(function () {
  var $clone = $TABLE.find('tr.hide').clone(true).removeClass('hide table-line');
  $TABLE.find('table').append($clone);
});

$('.table-remove').click(function () {
  $(this).parents('tr').detach();
});

$('.table-up').click(function () {
  var $row = $(this).parents('tr');
  if ($row.index() === 1) return; // Don't go above the header
  $row.prev().before($row.get(0));
});

$('.table-down').click(function () {
  var $row = $(this).parents('tr');
  $row.next().after($row.get(0));
});

// A few jQuery helpers for exporting only






jQuery.fn.pop = [].pop;
jQuery.fn.shift = [].shift;

$BTN.click(function () {
  var $rows = $TABLE.find('tr:not(:hidden)');
  var headers = [];
  var data = [];
  
  // Get the headers (add special header logic here)
  $($rows.shift()).find('th:not(:empty)').each(function () {
    headers.push($(this).text().toLowerCase());
  });
  
  // Turn all existing rows into a loopable array
  $rows.each(function () {
    var $td = $(this).find('td');
    var h = {};
    
    // Use the headers from earlier to name our hash keys
    headers.forEach(function (header, i) {
      h[header] = $td.eq(i).text();   
    });
    
    data.push(h);
  });
  
  // Output the result
  $EXPORT.text(JSON.stringify(data));
});
</script>


</body>

</html>


