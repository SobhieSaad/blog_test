<?php require_once 'shared/header.php' ?>

<div class="content">
	<div class="container">
	 <div class="load_more">
		<div class="row">

            <div class="col-lg-8 col-lg-offset-2">

                <h1>Add a new blog post</h1>

                <?php if (!empty($this->msgError)): ?>
					<p class="msg"><?=$this->msgError?></p>
				<?php endif ?>

				<?php if (!empty($this->msgSuccess)): ?>
					<p class="msg"><?=$this->msgSuccess?></p>
				<?php endif ?>


                <form method="post" action="" role="form">

                    <div class="messages"></div>

                    <div class="controls">
						
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Title * </label>
                                    <input id="title" type="text" name="title" class="form-control" placeholder="Please enter the post's title *" required="required" data-error="The title is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
						</div>
						<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="author">Author *</label>
                                    <input id="author" type="text" name="author" class="form-control" placeholder="Please enter your name *" required="required" data-error="Author is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input id="image" type="file" name="image" class="form-control" >
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="content">Content *</label>
                                    <textarea id="content" name="content" class="form-control" placeholder="Content of your post *" rows="4" required="required" data-error="Kindly write your post's content"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" name="add_submit" class="btn btn-success btn-send" value="Add">
                            </div>
                        </div>
                    
                    </div>

                </form>

            </div>

        </div>
	 </div>
	</div>
</div>
