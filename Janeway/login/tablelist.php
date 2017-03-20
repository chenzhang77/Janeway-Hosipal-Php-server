<?php
include_once 'dbconnect.php';

$offsetvalue=$_GET['val'];

$res=mysql_query("SELECT * FROM notification ORDER BY time DESC LIMIT 15 OFFSET $offsetvalue" ) or die("Query failed: ".mysql_error() );

?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link href="scripts/jtable/themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="css/custom.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>

.pagination {
margin: 0px !important;
}

.table-editable {
  position: relative;
}
.table-editable .glyphicon {
  font-size: 20px;
}

.table-remove {
  color: #700;
  cursor: pointer;
}
.table-remove:hover {
  color: #f00;
}

.table-up, .table-down {
  color: #007;
  cursor: pointer;
}
.table-up:hover, .table-down:hover {
  color: #00f;
}

.table-add {
  color: #070;
  cursor: pointer;
  position: absolute;
  top: 8px;
  right: 0;
}
.table-add:hover {
  color: #0b0;
}

#tableID tr td:nth-child(1){
    width:1%;
}
#tableID tr td:nth-child(2){
    width:1%;
}
#tableID tr td:nth-child(3){
    width:15%;
}
#tableID tr td:nth-child(4){
    width:20%;
}
</style>

<table class="table table-striped" id="tableID">
<thead>
<tr>
 <td class="hide"></td>
 <th>#</th>
<th>Image</th>
<th>Title</th>
<th>Detail</th>

</tr>
</thead>
 <tbody>


<?php
      $i = 0;
      while ($item = mysql_fetch_assoc($res)) { $i= $i+1;
?>
   <tr>
   <td><?php echo $i?></td>
   <td class="hide"><?php echo $item['id'];?></td>
   <td><img src="../images/mail.png" alt="HTML5 Icon" style="width:28px;height:28px;"></td>
   <td><?php echo $item['title']; ?></td>
   <td style="white-space:pre-wrap ; word-wrap:break-word;" ><?php echo $item['detail']; ?>
   </td>
   </tr>
 
<?php } ?>
           

</tbody>
</table>
