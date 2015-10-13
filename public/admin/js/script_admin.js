$(document).ready(function(){
	/*
	*	Warning delete
	*/
	$(".delete").click(function(){
		if (!confirm('BẠN CÓ CHẮC XÓA DỮ LIỆU NÀY KHÔNG ??')) {
			return false;
		}
	});
});