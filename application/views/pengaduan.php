<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pengaduan Inspektorat Kota Probolinggo</title>
    <link href="<?php echo base_url().'assets/';?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/';?>font/stylesheet.css" rel="stylesheet">
</head>
<script type="text/javascript" language="javascript" src="<?php echo base_url().'assets/js/add.js'; ?>"></script>
<body style="background-color: #E69B64; font-family: hisbilFont; font-size: 22px;">
<div class="container" >
	<div class="row">
	    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
		    <div class="sidebar-nav" >
		      <div class="navbar" >
		        <div class="navbar-header">
		          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="glyphicon glyphicon-th-list"></span>
		          </button>
		          <span class="visible-xs navbar-brand">Menu</span>
		        </div>
		        <div class="navbar-collapse collapse sidebar-navbar-collapse" style="margin-top: 72px;">
		          <ul class="nav navbar-nav">
		            <li class="active" style="background-color: #4A73FD; margin-bottom: 5px;"><a href="<?php echo base_url(); ?>" style="color: #fff;"><span class="glyphicon glyphicon-home"></span> Home</a></li>
		            <li style="background-color: #4A73FD;"><a href="<?php echo base_url().'pengaduan/logout/'; ?>" style="color: #fff"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
		          </ul>
		        </div>
		      </div>
		    </div>
		</div>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<h2 align="center">Selamat Datang di Klinik Akuntabilitas Kabupaten Probolinggo</h2><hr>
		    <div role="form" class="form-horizontal">
		    <?php echo form_open('pengaduan/tambah_data'); ?>
		    	<?php foreach ($data as $d) { ?>
		        <div class="form-group">
		            <label for="nama" class="control-label col-md-2">Nama</label>
		            <div class="col-md-9"><input type="text" name="nama" class="form-control" placeholder="Nama Pegawai" readonly="true" value="<?php echo $d['nama']; ?>" style="font-size: 20px;"/></div>
		        </div>
		        <div class="form-group">
		            <label for="satker" class="control-label col-md-2">Satker</label>
		            <div class="col-md-9"><input type="text" name="satker" class="form-control" placeholder="Satker" readonly="true" value="<?php echo $d['satker']; ?>" style="font-size: 20px;"/></div>
		        </div>
		        <div class="form-group">
		            <label for="konsultan" class="control-label col-md-2">Pilih Irban</label>
		            <div class="col-md-9">
		            	<select name="admin" class="btn btn-group btn-default btn-select" style="font-size: 20px;">
						<?php $res = mysql_query("SELECT * FROM admin WHERE status=0"); ?>
					    <?php while ($r = mysql_fetch_array($res)) { ?>
					  	<option value="<?php echo $r['id']; ?>">
						  	<?php echo $r['nama']; ?>
					  	</option>
					  	<?php } ?>
					    </select>
		            </div>
		        </div>
			    <div class="form-group">
		            <label for="email" class="control-label col-md-2">Email</label>
		            <div class="col-md-9"><input type="email" id="email" name="email"  class="form-control" placeholder="Masukkan email" readonly="true" value="<?php echo $d['email']; ?>" style="font-size: 20px;"></div>
		        </div>
		        <?php } ?>
			    <div class="form-group"  id="pertanyaan">
		            <label for="pertanyaan" class="control-label col-md-2">Pertanyaan</label>
		            <div class="col-md-9">
		            	<textarea class="form-control text-justify" row="5" cols="500" name="pertanyaan[]" placeholder="Apa yang mau anda tanyakan ?" style="font-size: 20px;" required></textarea>
		            </div>		            
		        	<div class="col-md-1">
		        		<button type="button" id="tambah_pertanyaan" onclick="add('pertanyaan');" class="btn btn-primary" style="margin-top: 15px;"><span class="glyphicon glyphicon-plus"></span></button>
		        	</div>
		        </div> 
		        <div class="col-md-offset-2"><button type="submit" class="btn btn-primary" style="margin-left: 5px;"><span class="glyphicon glyphicon-send"></span> Kirim</button></div>
		        <?php if ($this->session->flashdata('item') != NULL) {
		        	$message = $this->session->flashdata('item');
		        ?>
		        <br><div class="<?php echo $message['class']; ?>" align="center"><span class="<?php echo $message['icon']; ?>"></span> <?php echo $message['message']; ?></div>
		        <?php } ?>
		    <?php echo form_close(); ?>
		    </div>	
	    </div>
	</div>
</div>
	<script src="<?php echo base_url().'assets/'; ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/bootstrap.min.js"></script>
</body>
</html>