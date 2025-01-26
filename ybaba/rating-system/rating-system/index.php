<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Rating System</title>
	<!-- style.css -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<h1>Rating System</h1>
			<?php
				// check session is started ?
				if(!session_id()){ session_start(); }
				// check session exists
				if(isset($_SESSION['user'])){ ?>
				<div class="user-info">
					<span>Hello, <?php echo $_SESSION['user']; ?></span> |
					<a href="logout.php">Logout</a>
				</div>
			<?php }else{ ?>
				<div class="user-info">
					<a href="login.php">Login</a>
				</div>
			<?php } ?>
		</div>
		<div id="content">
			<?php
			 // db connection 
			include 'config.php';
			// fetch all posts
			$sql = "SELECT * FROM posts";
			$result = mysqli_query($conn,$sql);

			if(mysqli_num_rows($result) > 0){

				while($row = mysqli_fetch_assoc($result)){ ?>

					<div class="post-box">
						<h3><?php echo $row['post_title']; ?></h3>
						<p><?php echo substr($row['post_desc'],0,100).'...'; ?></p>
						<?php
							if($row['rating_by'] == '0'){ ?>

								<ul class="rating" id="rating_<?php echo $row['post_id']; ?>">
								<?php for( $j = 0; $j <= 4; $j++){
										echo '<li class="icon-star" data-index="'.$j.'" ></li>';
									} ?>
								</ul>
								(<span class="rated"><?php echo $row['rating_count']; ?></span>)

						<?php }else{ ?>

									<ul class="rating" id="rating_<?php echo $row['post_id']; ?>">
									<?php $rated = ceil($row['rating_count']/$row['rating_by']);
									for( $j = 0; $j <= 4; $j++){
										if($j < $rated){
											echo '<li class="icon-star" data-index="'.$j.'" style="color:red"></li>';
										}else{
											echo '<li class="icon-star" data-index="'.$j.'" ></li>';
										}
									} ?>
									</ul>
									(<span class="rated"><?php echo $rated; ?></span>)

						<?php } ?>

						<input type="hidden" class="post_id" value="<?php echo $row['post_id']; ?>" />
				</div>
				<?php }
			}else{
				echo '<div class="message">Result Not Found.</div>';
			} ?>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script>
		$(document).ready(function(){
			// on mouseover
			$('.rating li').mouseover(function(){
				var curIndex = $(this).attr('data-index');
				var curId = $(this).parent().attr('id');
				for(var i=0;i<=curIndex;i++){
					$("#"+curId+" li:eq("+i+")").css('color','red');
				}
			});
			$('.rating li').mouseleave(function(){
				$(this).css('color','black');
			});

			// mouse leave on ul
			$('.rating').mouseleave(function(){
				var id = $(this).attr('id');
				resetStarColor(id);
			});

			// resert star color
			function resetStarColor(id){
				
				var rating = $("#"+id).siblings('.rated').html();
				
				if(rating != '0'){
					for(var i=0;i<=4;i++){
						if(i<rating){
							$("#"+id+" li:eq("+i+")").css('color','red');
						}else{
							$("#"+id+" li:eq("+i+")").css('color','black');
						}
					}
				}else{
					$("#"+id).children("li").css('color','black');
				}
				
			}


			$('.rating li').click(function(){

				var id = $(this).parent().attr('id');
				var curIndex = $(this).attr('data-index');
				var cur = (parseInt(curIndex) + 1);

				var post_id = $("#"+id).siblings('.post_id').val();
				$.ajax({
					url: 'rating.php',
					type: 'post',
					data: {post:post_id,rating:cur},
					success: function(response){
						if(response == 'true'){
							location.reload();
						}else if(response == 'please_login'){
							window.location.href = 'login.php';
						}
					}
				});

			});

		});
	</script>
</body>
</html>