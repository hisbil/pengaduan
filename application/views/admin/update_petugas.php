<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<?php foreach ($data as $d) { ?>
		<?php echo form_open('petugas/update'); ?>
			<div class="from-group">
				<label>ID</label>
				<input type="text" class="form-control" readonly="true" placeholder="ID Petugas" name="id" value="<?php echo $d['id']; ?>">
				<label>Nama</label>
				<input type="text" class="form-control" placeholder="Nama Petugas" name="nama" value="<?php echo $d['nama']; ?>">
				<label>User Name</label>
				<input type="text" class="form-control" placeholder="User Name" name="username" value="<?php echo $d['username']; ?>">
				<label>E-mail</label>
				<input type="text" class="form-control" placeholder="E-mail" name="email" value="<?php echo $d['email']; ?>">
				<label>Password</label>
				<input type="text" class="form-control" placeholder="Password" name="password" value="<?php echo $d['password']; ?>">
				<label>Nama Satker</label>
				<p><select name="satker" class="btn btn-group btn-default btn-select">
				<?php $res = mysql_query("SELECT * FROM tbsatker"); ?>
			    <?php while ($r = mysql_fetch_array($res)) { ?>
			  	<option value="<?php echo $r['id_satker']; ?>"<?php if ($r['id_satker']==$d['id_satker']){echo "selected";}; ?>>
				  	<?php echo $r['satker']; ?>
				</option>
			  	<?php } ?>
			    </select></p>
				<br>
				<div class="pull-right">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<a href="<?php echo base_url().'index.php/petugas/'; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
				</div>
			</div>
		<?php echo form_close(); ?>
		<?php } ?>
		</div>
	</div>
</div>	