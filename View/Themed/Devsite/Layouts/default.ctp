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

$siteDescription = __d('dev_site', 'devsite: rapid dev team site builder.');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
            <?php echo $this->Html->charset(); ?> 
            <title><?php echo $title_for_layout; ?> | <?php echo $siteDescription; ?> </title>
            <?php echo $this->Html->meta('icon'); ?> 
            <?php echo $this->fetch('meta'); ?> 
            <?php echo $this->Html->css('//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css'); ?> 
            <?php echo $this->Html->css('bootstrap-responsive.min'); ?> 
            <?php echo $this->Html->css('//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css'); ?>  
            <?php echo $this->Html->css('http://fonts.googleapis.com/css?family=Titillium+Web:400,300,400italic,700'); ?> 
            <?php echo $this->Html->css('core'); ?> 
            <?php echo $this->Html->css('devsite'); ?> 
            <?php echo $this->fetch('css'); ?> 

            <style type="text/css">
              .sidebar-nav {
                padding: 9px 0;
              }

              @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                  float: none;
                  padding-left: 5px;
                  padding-right: 5px;
                }
              }
            </style>
            
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
            
            <?php if ($this->params->here === '/') echo $this->element('header/jumbotron'); ?>
            <?php if ($this->params->here === '/') echo $this->element('pane/social'); ?>
            
                    <div id="content" class="container-fluid">
                        <?php echo $this->Session->flash(); ?>
                        
                        <?php echo $this->fetch('content'); ?> 
                        
                        <hr>

                        <footer>
                          <p>&copy; 2013 C1V0</p>
                        </footer>
                    </div><!-- #header .container -->
		
                <!--
		<div class="container-fluid">
                    <div class="well">
                        <small>
                            <?php # echo $this->element('sql_dump'); ?>
                        </small>
                    </div>
		</div><!-- .container -->
		
                <?php echo $this->fetch('script'); ?> 
	</body>
</html>