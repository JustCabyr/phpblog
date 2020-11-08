<?php

	error_reporting(-1);

	require('config/config.php');
	require('config/db.php');

	$query = 'SELECT * FROM posts ORDER BY created_at DESC';

	$result = mysqli_query($conn, $query);

	// var_dump(mysqli_num_rows($result));
	// die();

	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// if ($result){
		// $posts = mysqli_query($conn, $query);
	// 	while ($posts = mysqli_fetch_assoc($result)){
	// 		$id = $posts['id'];
	// 	}
	// }
	mysqli_free_result($result);
	// var_dump($posts);
	mysqli_close($conn);
?>



<?php include('inc/header.php'); ?>
	<div class="container">
		<h1>Posts</h1>
		<?php foreach($posts as $post) : ?>
			<div class="card-header">
				<h3><?php echo $post['title']; ?></h3>
				<small>Created on <?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></small>
				<p></p><p><?php echo $post['body']; ?></p>
				<a class="btn btn-default" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
			</div>
			<p></p>
		<?php endforeach; ?>
	</div>
<?php include('inc/footer.php'); ?>
