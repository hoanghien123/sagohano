		<?php 
		$link = base_url().'userpage/';
		$page = $this->uri->segment(2);
		$curr_hopthuden = $page=="homthulienlac" ? "current" : "" ;
		$curr_thuxemlai = $page=="thuxemlai" ? "current" : "" ;
		$curr_thudagui = $page=="thudagui" ? "current" : "" ;
		$curr_thunhap = $page=="thunhap" ? "current" : "" ;
		$curr_thuspam = $page=="thuspam" ? "current" : "" ;
		$curr_thurac = $page=="thungrac" ? "current" : "" ;
		?>
		<div class="list_menu">
			<div><a class="soanthumoi" id="soanthumoi">Soạn thư mới</a></div>
			<li><a class="icon_hopthuden <?php echo $curr_hopthuden ?>" href='<?php echo $link."homthulienlac" ?>'>Hộp thư đến</a></li>
			<li><a class="icon_xemthulai <?php echo $curr_thuxemlai ?>" href='<?php echo $link."thuxemlai" ?>'>Thư xem lại</a></li>
			<li><a class="icon_thudagui <?php echo $curr_thudagui ?>" href='<?php echo $link."thudagui" ?>'>Thư đã gửi</a></li>
			<li><a class="icon_nhap <?php echo $curr_thunhap ?>" href='<?php echo $link."thunhap" ?>'>Nháp</a></li>
			<li><a class="icon_spam <?php echo $curr_thuspam ?>" href='<?php echo $link."thuspam" ?>'>Spam</a></li>
			<li><a class="icon_thungrac <?php echo $curr_thurac ?>" href='<?php echo $link."thungrac" ?>'>Thùng rác</a></li>
			<a class="icon_chat">Chat</a>
			<li class="child">
				<a class="icon_bangbaogia">Bảng báo giá <span></span></a>
				<ul>
					<li><a href=''>Xem tất cả</a></li>
					<li><img src='' />Công ty TNHH TM và SX Kim Liên</li>
					<li><img src='' />Công ty TNHH TM và SX Kim Liên</li>
				</ul>
			</li>
			<a class="icon_thuyeucaubaogia">Thư yêu cầu báo giá</a>
		</div>

		<div class="choose_sendmail">
			<div class="tools_box">
				<a id="minibox" data="down">_</a>
				<a id="zoombox">+</a>
				<a id="closebox">x</a>
			</div>
			<div class="content_sendmail">
				<div class="first_choose">
					<h3>Hãy chọn loại thư bạn muốn gửi</h3>
					<div>
						<li><a id="load_sendmail_message" rel="rightbox">Gửi thư thông thường</a></li>
						<li><a id="load_sendmail_guibaogia" rel="centerbox">Gửi thư báo giá</a></li>
						<li><a id="load_sendmail_guiyeucaubaogia" rel="centerbox">Gửi thư yêu cầu báo giá</a></li>
					</div>
				</div>
			</div>
		</div>

<script>
	var base_url="<?php echo base_url().'userpage/' ?>";
	var classadd = "rightbox";
	var classremove = "centerbox";
	$("#soanthumoi").click(function(){
		classadd = "rightbox";
		classremove = "centerbox";
		$(".choose_sendmail").removeClass(classremove);
		$(".choose_sendmail").addClass(classadd);
	});

	$("#minibox").click(function(){
		$(".choose_sendmail").removeClass(classremove);
		$(".choose_sendmail").addClass(classadd);
		var status = $(this).attr("data");
		if(status=="down"){
			$(this).attr("data","up");
			$(".content_sendmail").hide();
		}else{
			$(this).attr("data","down");
			$(".content_sendmail").show();
		}
	});

	$("#zoombox").click(function(){
		classadd = "centerbox";
		classremove = "rightbox";
		$("#minibox").attr("data","down");
		$(".content_sendmail").show();
		$(".choose_sendmail").removeClass(classremove);
		$(".choose_sendmail").addClass(classadd);
	});

	$("#closebox").click(function(){
		$(".choose_sendmail").removeClass("rightbox");
		$(".choose_sendmail").removeClass("centerbox");
	});

	$(".first_choose div li a").click(function(){
		var data = $(this).attr("id");
		var obj = $(this).attr("rel");
		$(".choose_sendmail").removeClass("rightbox");
		$(".choose_sendmail").removeClass("centerbox");
		$(".choose_sendmail").addClass(obj);
		$.ajax({
	        type: "POST",
	        url: base_url+data,
	        dataType:"html",
	        data: '',
	        cache: false,
	        beforeSend: function(){
	            $(".content_sendmail").html("Loading ...");
	        },
	        success: function(html)
	        {
	            $(".content_sendmail").html(html);
	        }
	    });
	});

</script>