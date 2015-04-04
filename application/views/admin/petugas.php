<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<?php echo form_open('petugas/tambah_data'); ?>
			<div class="from-group">
				<label>Nama</label>
				<input type="text" class="form-control" placeholder="Nama Petugas" name="nama">
				<?php echo form_error('nama', '<p class="alert alert-danger">' , '</p>'); ?>
				<label>User Name</label>
				<input type="text" class="form-control" placeholder="User Name" name="username">
				<?php echo form_error('username', '<p class="alert alert-danger">' , '</p>'); ?>
				<label>E-mail</label>
				<input type="text" class="form-control" placeholder="E-mail" name="email">
				<?php echo form_error('email', '<p class="alert alert-danger">' , '</p>'); ?>
				<label>Password</label>
				<input type="text" class="form-control" placeholder="Password" name="password">
				<?php echo form_error('password', '<p class="alert alert-danger">' , '</p>'); ?>
				<label>Nama Satker</label>
				<p><select name="satker" class="btn btn-group btn-default btn-select">
				<?php $res = mysql_query("SELECT * FROM tbsatker"); ?>
			    <?php while ($r = mysql_fetch_array($res)) { ?>
			  	<option value="<?php echo $r['id_satker']; ?>">
				  	<?php echo $r['satker']; ?>
				  	</option>
			  	<?php } ?>
			    </select></p>
				<br>
				<div class="pull-right">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				</div>
			</div>
		<?php echo form_close(); ?>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>User Name</th>
						<th>E-mail</th>
						<th>Password</th>
						<th>Satker</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<?php $i = 1; ?>
				<?php foreach ($data as $d) { ?>
				<tbody>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $d['nama']; ?></td>
						<td><?php echo $d['username']; ?></td>
						<td><?php echo $d['email']; ?></td>
						<td><?php echo $d['password']; ?></td>
						<td><?php echo $d['satker']; ?></td>
						<td>
							<a href="<?php echo base_url().'index.php/petugas/get_id/'.$d['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
							<a href="<?php echo base_url().'index.php/petugas/delete_data/'.$d['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</div>
</div>	