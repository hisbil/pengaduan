<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Satker</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<?php $i = 1; ?>
				<?php foreach ($data as $d) { ?>
				<tbody>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $d['satker']; ?></td>
						<td>
							<a href="<?php echo base_url().'index.php/satker/get_id/'.$d['id_satker']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
							<a href="<?php echo base_url().'index.php/satker/delete_data/'.$d['id_satker']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
						</td>
					</tr>
				</tbody>
				<?php } ?>
			</table>
		</div>
		<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
		<?php echo form_open('satker/tambah_data'); ?>
			<div class="from-group">
				<label>Nama Satker</label>
				<input type="text" class="form-control" placeholder="Nama Satker" name="satker">
				<?php echo form_error('satker', '<p class="alert alert-danger">' , '</p>'); ?>
				<br>
				<div class="pull-right">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				</div>
			</div>
		<?php echo form_close(); ?>
		</div>
	</div>
</div>