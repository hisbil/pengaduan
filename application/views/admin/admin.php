<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Administrator Aplikasi Pengaduan</title>
    <link href="<?php echo base_url().'assets/';?>font/stylesheet.css" rel="stylesheet">
	<link href="<?php echo base_url().'assets/';?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/';?>css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo base_url().'assets/'; ?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url().'assets/'; ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/'; ?>js/notifikasi.js"></script>
    <script type="text/javascript">
        function chek(){
             $.ajax({
                    type: "POST",
                    url: "<?php echo base_url().'administrator/notifikasi'; ?>",
                    dataType:'json',
                    success: function(response){
                        $("#notifikasi").text(""+response+"");
                        timer = setTimeout("chek()",3000);
                    }
             });  
        }

        $(document).ready(function(){
            chek();
            $("#notifikasi").click(function(){
                $("#notifikasi").hide();
            });
        });
    </script>
    <style type="text/css">
    .setwidht{
    	max-width: 100px;
    }
    .concat div{
    	overflow: hidden;
    	--ms-text-overflow: ellipsis;
    	--o-text-overflow: ellipsis;
    	text-overflow: ellipsis;
    	white-space: nowrap;
    	width: inherit;
    }
    </style>
</head>
<body style="font-family: hisbilFont;font-size: 17px;">
<div style="background-color: #53A9FF; ">
	<div class="container">
		<ul class="nav nav-tabs" style="border: none;">
			<li role="presentation"><a href="<?php echo base_url().'administrator'; ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
			<li role="presentation"><a href="<?php echo base_url().'satker'; ?>"><span class="glyphicon glyphicon-list-alt"></span> Data Satker</a></li>
			<li role="presentation"><a href="<?php echo base_url().'petugas'; ?>"><span class="glyphicon glyphicon-user"></span> Data Petugas Satker</a></li>
			<li role="presentation"><a href="<?php echo base_url().'pertanyaan'; ?>"><span class="glyphicon glyphicon-align-left"></span> Pertanyaan <span class="badge" id="notifikasi"></span></a></li>
			<li role="presentation"><a href="<?php echo base_url().'admin'; ?>"><span class="glyphicon glyphicon-user"></span> Data Admin</a></li>
			<li role="presentation" class="pull-right"><a href="<?php echo base_url().'administrator/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
		</ul>
	</div>
</div>

	<?php echo $main_view; ?>

	
</body>
</html>