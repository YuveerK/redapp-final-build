<?php
include_once("db_connect.php");
$sql = "SELECT id, name, image, description, address, website, facebook, gplus, twitter FROM cards";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while( $record = mysqli_fetch_assoc($resultset) ) {
?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
</head>
<div class="card hovercard">
<div class="cardheader">
<div class="avatar">
<img alt="" src="<?php echo $record['image']; ?>">
</div>
</div>
<div class="card-body info">
<div class="title">
<a href="#"><?php echo $record['name']; ?></a>
</div>
<div class="desc"> <a target="_blank" href="<?php echo $record['website']; ?>"><?php echo $record['website']; ?></a></div>
<div class="desc"><?php echo $record['description']; ?></div>
<div class="desc"><?php echo $record['address']; ?></div>
</div>
<div class="card-footer bottom">
<a class="btn btn-primary btn-twitter btn-sm" href="<?php echo $record['twitter']; ?>">
<i class="fa fa-twitter"></i>
</a>
<a class="btn btn-danger btn-sm" rel="publisher"
href="<?php echo $record['gplus']; ?>">
<i class="fa fa-google-plus"></i>
</a>
<a class="btn btn-primary btn-sm" rel="publisher"
href="<?php echo $record['facebook']; ?>">
<i class="fa fa-facebook"></i>
</a>
</div>
</div>
<?php } ?>