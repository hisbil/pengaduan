<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Pengaduan Inspektorat Kota Probolinggo</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url().'assets/';?>font/stylesheet.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/';?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url().'assets/';?>css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo base_url().'assets/';?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url().'assets/';?>js/bootstrap.min.js"></script>
</head>
<body style="background-color: #66B3FF;font-family: hisbilFont;">
    <div class="container">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-header">
              <div class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headmenulogin">
                <h5><img src="<?php echo base_url().'assets/images/logo.png'; ?>" width="40px" height="50px;"></h5>
              </div>
              <h4 class="visible-xs visible-sm navbar-brand">KLINIK AKUNTABILITAS KAB. PROBOLINGGO</h4>
            </div>

            <div class="collapse navbar-collapse" id="headmenulogin">
              <div class="row">
                <div class="col-lg-1 col-md-1" ><img src="<?php echo base_url().'assets/images/logo.png'; ?>"></div>
                <div class="col-lg-11 col-md-11"><h1 align="left" style="margin-left: 20px;color:#585858;">KLINIK AKUNTABILITAS KABUPATEN PROBOLINGGO</h1></div>
              </div>
            </div>
          </div>
        </nav>
    </div>
    <div>
      <div class="container">
        <div class="row" >
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <div class="collapse navbar-collapse" style="opacity: 0.7;" align="center">
                    <h3 style=" position: fixed; margin-top: 150px; margin-left: 140px; color: #FFFF00"> Selamat Datang di Klinik Akuntabilitas Kabupaten Probolinggo.</h3>
                    <h4 style="position: fixed; margin-top: 190px;
                    margin-left: 140px; color: #FFFF00"> Silahkan Login dan Sampaikan Pertanyaan Anda !</h4>

                    <img  src="<?php echo base_url().'assets/images/banner.png'; ?>">
                  </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="panel panel-default" style="background-color: #fff;margin-top:20px;">
                <div class="panel-heading">
                  <h2 class="panel-title"><span class="glyphicon glyphicon-exclamation-sign"></span> Login</h2>
                </div>
                <div class="panel-body">
                  <?php echo form_open('verify_login'); ?>
                      <p style="font-size: 20px; color:#333;">Username</p>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-user"></span>
                        </span>
                        <input type="text" class="form-control" id="username" name="username" style="width:100%;">
                      </div>
                      <p style="font-size: 20px; color:#333;">Password</p>
                      <div class="input-group">
                        <span class="input-group-addon">
                          <span class="glyphicon glyphicon-lock"></span>
                        </span>
                        <input type="password" class="form-control" id="passowrd" name="password" style="width:100%;">
                      </div><br><br>
                      <button type="submit" name="submit" class="btn btn-danger btn-md pull-right"><span class="glyphicon glyphicon-log-in"></span> &nbsp Login</button><br>
                  </form>
                </div>
                <div class="panel-footer">
                  <h4 style="color: #FF5B5B;"> <?php echo validation_errors(); ?> </h4>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="container">  
          <footer class="navbar navbar-default navbar-toggle" data-toggle="collapse" data-target="#footer" style="width: 95%;height:10px;text-align: center;">
              <p class="navbar-text">&copy CV. Miladiyyah</p>
          </footer>

          <footer class="collapse navbar-collapse navbar navbar-default navbar-fixed-bottom inline" id="footer">
          <div class="container">
              <p class="navbar-text pull-left">&copy CV. Miladiyyah</p>
          </div>
          </footer>
    </div>
</body>
</html>