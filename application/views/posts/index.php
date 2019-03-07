<h2><?= $title ?></h2>


	<div class="row">
		<div class="col-sm-8">
	    <?php foreach($posts as $post) : ?>
	        <h3><?php echo $post['title']; ?></h3>
			<img class="post-thumb" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>">
			<div class="border">
			<small class="post-date">Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small><br>
			<?php echo word_limiter($post['body'], 60); ?>
			<br><br>
			<p><a class="btn btn-default" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Read More</a></p>
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