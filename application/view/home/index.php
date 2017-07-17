<div class="col-sm-4 col-sm-offset-4">
	<br><br><br>
	<form method="post" action="<?php echo URL.'home/validate'?>">
		<div class="form-group">
			<input type="text" name="username" class="form-control" autofocus>
			<label class="control-label">Username</label>
		</div>
		<div class="form-group">
			<input type="password" name="password" class="form-control">
			<label class="control-label">Password</label>
		</div>

		<button type="submit" class="btn btn-primary">Validate</button>
	</form>
</div>