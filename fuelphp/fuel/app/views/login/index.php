<h2>Listing <span class='muted'>Logins</span></h2>
<br>
<?php if ($logins): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>User</th>
			<!--<th>Password</th>-->
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($logins as $item): ?>	
		<tr>
			<td><?php echo $item->user; ?></td>
			<!--<td><?php //echo $item->password; ?></td> -->
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('login/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('login/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('login/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Logins.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('login/create', 'Add new Login', array('class' => 'btn btn-success')); ?>

</p>
