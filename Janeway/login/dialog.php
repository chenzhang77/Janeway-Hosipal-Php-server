<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/jquery-1.12.0.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>	
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/lumino.glyphs.js"></script> 


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
	
<div class="row">
<div class="col-xs-6  col-md-offset-3">
<textarea  rows="4" cols="50" class="form-control" name="detail" placeholder="Detail" required ></textarea>
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