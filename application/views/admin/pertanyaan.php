<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 table-responsive">
			<table class="table" >
				<thead>
					<tr>
						<th class="col-md-1">No</th>
						<th class="col-md-1">Tgl</th>
						<th class="col-md-2">Nama Pegawai</th>
						<th class="col-md-2">Satker</th>
						<th class="col-md-3">Pertanyaan</th>
						<th class="col-md-2">Aksi</th>
					</tr>
				</thead>
				<?php $i = 1; ?>
				<?php foreach ($data as $d) { ?>
				<tbody>
				<?php if ($d['z']==0) { ?>
					<tr bgcolor="#838673">
						<td><?php echo $i++; ?></td>
						<td><?php echo $d['tgl']; ?></td>
						<td><?php echo $d['a']; ?></td>
						<td>
						<?php $res = mysql_query("SELECT * FROM tbsatker");
					        while ($r = mysql_fetch_array($res)) {
							if ($r['id_satker']==$d['id_satker']) {
								echo $r['satker'];
								$satker = $r['satker'];
							};
					    } ?>
						</td>
						<td class="setwidht concat"><div><?php echo $d['tanya']; ?></div></td>
						<td>
							<a href="<?php echo base_url().'index.php/pertanyaan/get_id/'.$d['id_petugas'].'/'.$d['tgl']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Detail</a>
							<a href="<?php echo base_url().'index.php/pertanyaan/delete_data/'.$d['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
						</td>
					</tr>
				<?php } else if ($d['z']==1) { ?>
					<tr bgcolor="white">
						<td><?php echo $i++; ?></td>
						<td><?php echo $d['tgl']; ?></td>
						<td><?php echo $d['a']; ?></td>
						<td>
						<?php $res = mysql_query("SELECT * FROM tbsatker");
					        while ($r = mysql_fetch_array($res)) {
							if ($r['id_satker']==$d['id_satker']) {
								echo $r['satker'];
								$satker = $r['satker'];
							};
					    } ?>
						</td>
						<td class="setwidht concat"><div><?php echo $d['tanya']; ?></div></td>
						<td>
							<a href="<?php echo base_url().'index.php/pertanyaan/get_id/'.$d['id_petugas'].'/'.$d['tgl']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt"></span> Detail</a>
							<a href="<?php echo base_url().'index.php/pertanyaan/delete_data/'.$d['id']; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Hapus</a>
						</td>
					</tr>
				<?php } ?>
				</tbody>
				<?php } ?>
			</table>
		</div>
	</div>
</div>	