
<div class="title">
		 <h1><?= $title ?></h1> 
</div>


	<div class="row">
		<div class="col-sm-8">
			<?php foreach($posts as $post) : ?>
				<div class="post">
					<!-- title should have proper description -->
				<div class="post-title"><?php echo $post['title']; ?></div>
				<img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
				<div class="border">
				<small class="post-date">
					Posted on: <?php echo $post['created_at']; ?> in 
					<strong><?php echo $post['name']; ?></strong>
				</small>
				<br>
				<div class="post-body">
					<?php echo word_limiter($post['body'], 60); ?>
				</div>
				<br>
					<div class="btn-read">
						<a class="btn btn-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">
						Read More
						</a>
					</div>
				</div>	
			</div>
	    
		<?php endforeach; ?>
		</div>

		<div class="col col-sm-4">
			<h3>Categories</h3>
			  <ul class="list-group">
				<?php foreach($categories as $category) : ?>
					<li class="list-group-item"><a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
						<?php if($this->session->userdata('user_id') == $category['user_id']): ?>
							<form class="cat-delete" action="categories/delete/<?php echo $category['id']; ?>" method="POST">
								<input type="submit" class="btn-link text-danger" value="[X]">
							</form>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
				</ul>

				<h3>Our Previous Posts</h3>
				<ul class="list-group">
				 <?php foreach($latests as $latest) : ?>
					<li class="list-group-item">
						<a href="<?php echo site_url('/posts/'.$latest['slug']); ?>"><?php echo $latest['title']; ?></a>

					</li>
				 <?php endforeach; ?>
				</ul>



		</div>


	</div>

<div class="pagination-links">
		<?php echo $this->pagination->create_links(); ?>
</div>