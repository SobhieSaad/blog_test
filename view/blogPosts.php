<?php require_once 'shared/header.php' ?>

<!-- content -->
<div class="content">
	<div class="container">
				<!-- If no blog posts are found we ask the user to create his first post -->
				<?php if (empty($this->posts)): ?>
					<li>
						<div class="l_g">
							<div class="col-md-12">
								<div class="l_g_r">
									<div class="dapibus">
										<h2>&iexcl;&iexcl; No blog posts found !!</h2>
										<br/>
                                        <?php if(!empty($_SESSION['active'])) : ?>
										    <h2><button type="button" onclick="window.location='<?=ROOT_URL?>?p=blogController&amp;a=add'" class="bold addFirstPost">Add your first blog post here.</button></h2>
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
										<div class="row">
												<div class="col-md-9">
													<a href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>">
														
														<h2 >
															<?=$post->date?>	
															<?=htmlspecialchars($post->title)?>
														</h2>
														<br/>
															<p><?=nl2br(htmlspecialchars($post->content))?> </p>
													</a>
													<p class="adm">
														Posted by 
														<a onclick="showAuthorsModal()"><?=$post->author?></a>
														
														
													<a class="float" href="<?=ROOT_URL?>?p=blogController&amp;a=post&amp;id=<?=$post->id?>">
															Kommentare: &nbsp;<?= $post->comments_count ?>
														</a>
													</p>
													</div>
											
												<div class="col-md-3">
													<img src='localhost:8000.<?=$post->image ?>' alt="img" width="200px" height="100px"/>
												</div>
											</div>
									</div>
                                        
									</div>
									<div class="clearfix"></div>
								</div>
						</li>
					<?php endforeach ?>
				<?php endif ?>
	</div>

	
</div>

