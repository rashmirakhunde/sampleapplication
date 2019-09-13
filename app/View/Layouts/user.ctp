<?php
/**
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 */
?>

<!DOCTYPE html>
<html>
  <head>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
		<?php 
		echo $this->Html->css('style');
		echo $this->fetch('css');
		?>
  </head>
  <body>
	<div id="container">


		<div class="wrapper fadeInDown">
            <div id="formContent">
                <?php echo $this->Flash->render(); ?>
			    <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <?php //echo $this->element('sql_dump'); ?> 
	</div>
  </body>		
