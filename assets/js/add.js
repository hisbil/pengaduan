function hapus()
{
	var d = document.getElementById("baru");
	d.remove();
}

function add(divName){
	  var newdiv = document.createElement('div');
	  newdiv.innerHTML = "<div id='baru'><div class='col-md-2' id='labelbaru'></div><div class='col-md-9' id='textareabaru'><textarea class='form-control text-justify' row='5' cols='500' name='pertanyaan[]' placeholder='Apa yang mau anda tanyakan ?' style='margin-top: 15px; font-size: 20px;'></textarea></div><div class='col-md-1' id='buttonbaru'><button type='button' class='btn btn-primary' onClick='hapus();' style='margin-top: 30px;'><span class='glyphicon glyphicon-remove-circle'></span></button></div></div>";
	  document.getElementById(divName).appendChild(newdiv);
}