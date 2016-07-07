 

    <script type = "text/javascript" >
function changeHashOnLoad() {
     window.location.href += "#";
     setTimeout("changeHashAgain()", "50"); 
}

function changeHashAgain() {
  window.location.href += "1";
}

var storedHash = window.location.hash;
window.setInterval(function () {
    if (window.location.hash != storedHash) {
         window.location.hash = storedHash;
    }
}, 50);


</script>




<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<?php echo $this -> Session -> flash('auth'); ?>
			<?php echo $this -> Form -> create('User'); ?>
			<fieldset>
				<legend>
					<?php echo __('Please enter your username and password'); ?>
				</legend>
				<?php echo $this -> Form -> input('username');
					echo $this -> Form -> input('password');
				?>
			</fieldset>
			<div class="row">
				<div class="col-lg-4">
					<?php echo $this -> Form -> end(__('Login')); ?>		
					<?php echo $this->Html->link('Register',array('controller'=>'customers','action'=>'add'));?>		
				</div>
			</div>
		</div>
	</div>
</div>