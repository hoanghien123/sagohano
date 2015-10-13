$(document).ready(function() {
	var inputLocalFont = document.getElementById('files');
	inputLocalFont.addEventListener('change', previewImages, false);
});

function previewImages(){
    var fileList = this.files;
    var anyWindow = window.URL || window.webkitURL;
	created_node('1');
	var total = document.getElementById('total');
	total.innerHTML = "";
	var id = document.getElementById("ID").value;
	var LinkReal = document.getElementById("LinkReal").value;
	upload_multi(LinkReal,id);
}

