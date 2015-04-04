<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-xs-12 col-sm-12">
		<?php foreach ($data as $d) { ?>
		<?php echo form_open('pertanyaan/balas'); ?>
			<label>Tanggal</label>
			<input type="text" class="form-control" name="tgl" readonly="true" value="<?php echo $d['tgl']; ?>" name="tanggal"/>
			<label>Nama Pegawai</label>
			<input type="text" class="form-control" readonly="true" value="<?php echo $d['a']; ?>" />
			<label>Satker</label>
			<input type="text" class="form-control" name="satker" readonly="true" value="<?php echo $d['satker']; ?>" />
			<label>Email</label>
			<input type="text" class="form-control" readonly="true" name="email" value="<?php echo $d['email']; ?>" />
			<label>Penerima</label>
			<input type="text" class="form-control" readonly="true" value="<?php echo $d['b']; ?>" />
			<label>Pertanyaan</label>
			<?php $i = $d['id_petugas']; $tgl = $d['tgl']; $res = mysql_query("SELECT tanya, satker FROM pertanyaan WHERE id_petugas=$i and tgl='$tgl'"); ?>
			<?php while ($r = mysql_fetch_array($res)) { ?>
			<ul>
				<li class="glyphicon glyphicon-question-sign" style="font-size: 15px;list-style: none;">&nbsp<?php echo $r['tanya']; ?></li>
			</ul>
			<?php } ?>
		<?php } ?>
			<a href="<?php echo base_url().'index.php/pertanyaan/'; ?>" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
		</div>
		<div class="col-lg-4 col-md-8 col-xs-12 col-sm-12">
			<label>Balas : </label>
			<textarea name="balas"  class="form-control" cols="500" rows="4" placeholder="Tulis E-mail balasan disini"></textarea><br>
			<button class="btn btn-primary pull-right"><span class="glyphicon glyphicon-share-alt"></span> Tanggapi</button>
			<?php if ($this->session->flashdata('item') != NULL) {
	        	$message = $this->session->flashdata('item');
	        ?>
	        <br><br><div class="<?php echo $message['class']; ?>" align="center"><span class="<?php echo $message['icon']; ?>"></span> <?php echo $message['message']; ?></div>
	        <?php } ?>
		<?php echo form_close(); ?>	
		</div>
	</div>
</div>	