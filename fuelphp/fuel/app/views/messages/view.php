<h2>Viewing <span class='muted'>#<?php echo $message->id; ?></span></h2>


	<h3>Owner:</h3><?php echo $message->name; ?>

<!--<?php if (Auth::instance()->check()) : ?>
	<p><?php echo Html::anchor('comments/create/'.$message->id, 'Add new Comment'); ?></p>
<?php endif;?>
-->
<h3>Message:</h3>
<ul>
	<pre><?php echo $message->messages; ?></pre>
</ul>
<h3>Comments</h3>
<ul>
	<?php foreach ($comments as $comment): ?>
		
		
			<ui>
			<storong>Name : </storong><?php echo $comment->name;?></br>
			<storong>Comment :</storong><pre><?php echo $comment->comment;?></pre>
			<?php if ($comment->name == Auth::instance()->get_screen_name()) :?>
				<?php echo Html::anchor('comments/edit/' .$comment->id, 'Edit'); ?>
				<?php echo Html::anchor('comments/delete/' .$comment->id, 'Delete', array('onclick' => "return confirm('Are you sure?')"));?></br>
			<?php endif;?>
			</ui>
	<?php endforeach; ?>
</ul>


<p>
<?php 
	if (Auth::instance()->check())
	{
		echo Html::anchor('comments/create/'.$message->id, 'Add new Comment', array("class"=>"btn btn-success"));
	}
?>
</p>

<?php 
	if ($message->name == Auth::instance()->get_screen_name())
		{
			echo Html::anchor('messages/edit/'.$message->id, 'Edit');
			echo ' | ';
		}
	echo Html::anchor('messages', 'Back');

?>




