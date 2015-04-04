<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
		
		</div>
		<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
		<?php foreach ($data as $d) { ?>
		<?php echo form_open('satker/update'); ?>
			<div class="from-group">
				<label>ID Satker</label>
				<input type="text" class="form-control" value="<?php echo $d['id_satker']; ?>" name="id" readonly="true">
				<label>Nama Satker</label>
				<input type="text" class="form-control" placeholder="Nama Satker" value="<?php echo $d['satker']; ?>" name="satker">
				<br>
				<div class="pull-right">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				<button type="reset" class="btn btn-primary"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
				</div>
			</div>
		<?php echo form_close(); ?>
		<?php } ?>
		</div>
		<div class="col-lg-4 col-md-4 col-xs-12 col-sm-12">
		
		</div>
	</div>
</div>