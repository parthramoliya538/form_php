<?php 

	$con = mysqli_connect("localhost","root","","syphp");

	if (isset($_GET['id'])) {		
		$id = $_GET['id'];
		$sql = "delete from form where id=".$id;
		$res = mysqli_query($con,$sql);

	}

	$sql = "select * from form";
	$res = mysqli_query($con,$sql);
 
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
 </head>
 <body>
 	
 	<table border="2">
 		<tr>
 			<th>Id</th>
 			<th>Name</th>
 			<th>Contact</th>
 			<th>Email</th>
 			<th>Gender</th>
 			<th>Hobby</th>
 			<th>City</th>
 			<th>Address</th>
 			<th>Password</th>
 			<th>Image</th>
 			<th>Action</th>
 		</tr>

 		<?php while ($data = mysqli_fetch_assoc($res)) { 	?>

 			<tr>
 				<th><?php echo @$data['id'] ?></th>
 				<th><?php echo @$data['name'] ?></th>
 				<th><?php echo @$data['contact'] ?></th>
 				<th><?php echo @$data['email'] ?></th>
 				<th><?php echo @$data['gender'] ?></th>
 				<th><?php echo @$data['hobby'] ?></th>
 				<th><?php echo @$data['city'] ?></th>
 				<th><?php echo @$data['address'] ?></th>
 				<th><?php echo @$data['password'] ?></th>
				<th><img style="height: 100px;,width: 100px;object-fit: cover;" src="image/<?php echo @$data['image'] ?>"></th>
 				<th><a href="form_img_view.php?id=<?php echo $data['id'] ?>">Delete</a>||<a href="form_img.php?id=<?php echo $data['id'] ?>">Edit</a></th>
 			</tr>

 		<?php } ?>

 	</table>

 </body>
 </html>