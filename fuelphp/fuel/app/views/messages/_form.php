<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label'));?>
			<?php echo Auth::instance()->get_screen_name(); ?>

			<!--<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>
			<?php echo Form::input('name', Input::post('name', isset($message) ? $message->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>
			-->
		</div>
		<div class="form-group">
			<?php echo Form::label('Messages', 'messages', array('class'=>'control-label')); ?>
			<?php echo Form::textarea('messages', Input::post('messages', isset($message) ? $message->messages : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Messages')); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>
		</div>
	</fieldset>
<?php echo Form::close(); ?>