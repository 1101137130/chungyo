<h2>Listing <span class='muted'>Messages</span></h2>
<br>
<?php if($messages): ?>
	
	<ul>
		<?php foreach($messages as $message): ?>
			<li><?php echo $message->name; 	?>
				<ul>
				
					<li><?php echo $message->messages; ?></li>
					<li><?php echo Html::anchor('messages/view/'.$message->id, $comment_links[$message->id]); ?></li>
					
					<?php if ($message->name == Auth::instance()->get_screen_name()) :?>
						<li><?php echo Html::anchor('messages/edit/'.$message->id, 'Edit'); ?></li>
						<li><?php echo Html::anchor('messages/delete/'.$message->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?></li>				
					<?php endif;?>

				</ul>
			</li>
		<?php endforeach;  ?>
	</ul>
	
<?php else: ?>
	
	<p>No Messages.</p>
<?php endif; ?>
<p>
	<?php 
		if( !Auth::check())
		{	
			echo Html::anchor("messages/create", "Loigin to add messages", array("class" => "btn btn-success",'disabled' => 'disabled')); 
		}else{
			echo Html::anchor("messages/create", "Add new Message", array("class" => "btn btn-success")); 
		}
	
	?>
	
</p>

