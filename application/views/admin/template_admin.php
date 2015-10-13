<?php echo $_doctype; ?>
<html>
    <head>
        <meta charset="utf-8">
        <?php echo $_styles; ?>
        <?php echo $_scripts; ?>
        <?php echo $_title; ?>
    </head>
    <body>
		<div id='menu'>
			<ul>
				<li><a href="<?php echo base_url().'admin' ?>">Quản lý chung</a>
					<ul>
						<li><a href="<?php echo base_url().'admin/home/home/account' ?>">» Tài khoản quản trị</a></li>
						<li><a href="<?php echo base_url().'admin/home/tinhthanh/' ?>">» Danh sách tỉnh thành</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url().'admin' ?>">Site chính</a>
					<ul>
						<li><a href="<?php echo base_url().'admin/site/categories' ?>">» Danh mục sản phẩm</a></li>
					</ul>
				</li>
				<li><a href="<?php echo base_url().'admin' ?>">Gian hàng</a>
					<ul>
						<li><a href="<?php echo base_url().'admin/home/home/account' ?>">Danh sách gian hàng</a></li>
						<li><a href="<?php echo base_url().'admin/home/tinhthanh/' ?>">Danh sách tỉnh thành</a></li>
					</ul>
				</li>
			</ul>
			<a href='<?php echo base_url() ?>admin/logout' class='logout'>Logout</a>
		</div>
        <?php echo $content; ?>
    </body>
</html>
