
        <div class="jumbotron masthead">
            <a href="https://github.com/chrisvogt/cakephp-devsite" style="z-index: 77;position:absolute;top: 0; right: 0;"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_white_ffffff.png" alt="Fork me on GitHub"></a>
            <div class="container">
                <h1><?php echo Configure::read('Site.site_name'); ?> </h1>
                <p><?php echo Configure::read('Site.headline'); ?> </p>
                <p>
                    <?php echo $this->Html->link('<i class="icon-info-sign">&nbsp;</i> Learn More &raquo;', array('controller' => 'pages', 'action' => 'display', 'about'), array('escape' => false, 'class' => 'btn btn-success')); ?> 
                    <?php echo $this->Html->link('<i class="icon-warning-sign">&nbsp;</i> Site Status &raquo;', '#statusModal', array('role' => 'btn', 'data-toggle' => 'modal', 'class' => 'btn btn-warning', 'escape' => false)); ?> 
                </p>
            </div><!-- /.container -->
        </div><!-- /.jumbotron.masthead -->
        