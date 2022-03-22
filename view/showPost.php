<?php require_once 'shared/header.php' ?>

	<div class="details " >
		<div class="container">
			<div class="card ml-3 blue-backgorund">
				<h3 class="ml-3"><?=$this->post->date?></h3>
				<h2><?=htmlspecialchars($this->post->title)?></h2>
				<div class="row text-center">
				<img src="content/images/logo.png" class="img-responsive"  class="w-200"/>
				</div>
				<div class="det_text">
					<p><?=nl2br(htmlspecialchars($this->post->content))?></p>
				</div>
				 <span class="icon_text"><?=$this->post->author?></span>
				
			</div>
			
			<br/><br/>
        
		</div>
	</div>
	
