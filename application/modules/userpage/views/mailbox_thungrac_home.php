<?php $this->load->view("mailbox_topmenu"); ?>
<div class="userpage mailbox">
	<div class="left_mailbox">
		<?php 
		$this->load->view("mailbox_leftmenu");
		?>
	</div>
	<div class="right_mailbox">
		<iframe src="<?php echo base_url().'userpage/thungrac_hopthuchung' ?>"></iframe>
	</div>
</div>