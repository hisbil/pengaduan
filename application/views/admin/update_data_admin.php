<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<?php foreach ($data as $d) { ?>
		<?php echo form_open('admin/update'); ?>
			<div class="from-group">
				<label>ID</label>
				<input type="text" class="form-control" readonly="true" placeholder="ID Admin" name="id" value="<?php echo $d['id']; ?>">
				<label>Nama</label>
				<input type="text" class="form-control" placeholder="Nama Admin" name="nama" value="<?php echo $d['nama']; ?>">
				<label>User Name</label>
				<input type="text" class="form-control" placeholder="User Name" name="username" value="<?php echo $d['username']; ?>">
				<label>Password</label>
				<input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $d['password']; ?>">
				<label>E-Mail</label>
				<input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $d['email']; ?>" required>
				<label>Status</label><br>	
				<?php 
					if ($d['status']==1) {
						echo "
							<div class='radio-inline'> <input type='radio' name='radiostatus' value='1' checked='true'> Administrator </div>
							<div class='radio-inline'> <input type='radio' name='radiostatus' value='0'> Operator </div>
						";
					}else if ($d['status']==0) {
						echo "
							<div class='radio-inline'> <input type='radio' name='radiostatus' value='1' > Administrator </div>
							<div class='radio-inline'> <input type='radio' name='radiostatus' value='0' checked='true'> Operator </div>
						";
					}
				 ?>
				<br>
				<div class="pull-right">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<a href="<?php echo base_url().'index.php/admin/'; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
				</div>
			</div>
		<?php echo form_close(); ?>
		<?php } ?>
		</div>
	</div>
</div>