
<h2>Editing Comment</h2>
<br/>
<?php $message = isset($message) ? $message : ''; ?>
<?php echo $form; ?>
<p><?php echo Html::anchor('messages/view'. $comment->message_id, 'Back');?></p>