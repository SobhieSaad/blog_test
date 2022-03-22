<?php require_once 'shared/header.php' ?>

<!-- content -->
<div class="content">
	<div class="container">
	 <div class="load_more">
			<ul id="myList">
				<!-- If no blog posts are found we ask the user to create his first post -->
				<?php if (empty($this->posts)): ?>
					<li>
						<div class="l_g">
							<div class="col-md-12 praesent">
								<div class="l_g_r">
									<div class="dapibus">
										<h2>&iexcl;&iexcl; No blog posts found !!</h2>
										<br/>
                                        <?php if(!empty($_SESSION['active'])) : ?>
										    <h2><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blogController&amp;a=add'" class="bold addFirstPost">Add your first blog post here.</button></h2>
                                        <?php elseif(empty($_SESSION['active'])) : ?>
                                            <h2 class="addFirstPost">Please <a href="<?=ROOT_URL?>?p=blogController&amp;a=login">login</a> to add a post.</h2>
                                        <?php endif ?>
                                    </div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
					</li>
				<?php else: ?>
					<?php foreach ($this->posts as $post): ?>
						<li>
                            <div class="l_g">
                                <div class="col-md-12 praesent">
                                    <div class="l_g_r">
                                        <div class="card">
                                            <h2><a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>">
											<?=htmlspecialchars($post->title)?>
										</a></h2>
                                            <br/>
                                            <p><?=nl2br(htmlspecialchars($post->content))?> </p>
                                            <p class="adm">Posted by <?=$post->author?> | <?=$post->date?></p>

				
											</div>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
						</li>
					<?php endforeach ?>
				<?php endif ?>
			</ul>
	 </div>
	</div>
</div>

