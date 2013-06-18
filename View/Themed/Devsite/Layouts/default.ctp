<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo $this->Html->charset(); ?> 
		<title><?php echo $title_for_layout; ?> | <?php echo $cakeDescription; ?> </title>
                <?php echo $this->Html->meta('icon'); ?> 
		<?php echo $this->fetch('meta'); ?> 
                <?php echo $this->Html->css('bootstrap.min'); ?> 
		<?php echo $this->Html->css('bootstrap-responsive.min'); ?> 
                <?php echo $this->Html->css('//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css'); ?> 
                <?php echo $this->Html->css('core'); ?> 
                <?php echo $this->fetch('css'); ?> 

                <?php echo $this->Html->script('libs/jquery'); ?> 
                <?php echo $this->Html->script('libs/bootstrap.min'); ?> 
                
                <!-- Fav and touch icons -->
                <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
                <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
                <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
                <link rel="apple-touch-icon-precomposed" href="#">
                <link rel="shortcut icon" href="#">
	</head>

	<body>

            <?php echo $this->element('menu/top_menu'); ?>
            
		<div id="main-container">
		
			<div id="header" class="container">
				[Inner Header] 
			</div><!-- #header .container -->
			
			<div id="content" class="container">

				<?php echo $this->Session->flash(); ?> 

				<?php echo $this->fetch('content'); ?> 
			</div><!-- #header .container -->
			
			<div id="footer" class="container">
				<?php //Silence is golden ?> 
			</div><!-- #footer .container -->
			
		</div><!-- #main-container -->
		
		<div class="container">
			<div class="well">
				<small>
					<?php echo $this->element('sql_dump'); ?>
				</small>
			</div>
		</div><!-- .container -->
		
                <?php echo $this->fetch('script'); ?> 
	</body>

</html>