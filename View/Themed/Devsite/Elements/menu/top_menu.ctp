         
        <!-- Navbar
        ================================================== -->
        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            <div class="container-fluid">
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <?php echo $this->Html->link('<i class="icon-code icon-white">&nbsp;</i> ' . Configure::read('Site.name'), '/', array('class' => 'brand', 'escape' => false)); ?> 
              <div class="nav-collapse collapse">
                <?php echo $this->element('menu/login_logout'); ?> 
                <ul class="nav">
                  <li><?php echo $this->Html->link(__('Home'), '/'); ?> </li>
                  <li><?php echo $this->Html->link(__('Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
                  <li><?php echo $this->Html->link(__('About'), array('controller' => 'pages', 'action' => 'display', 'about')); ?> </li>
                  <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'pages', 'action' => 'display', 'contact')); ?> </li>
                </ul>
              </div><!--/.nav-collapse -->
            </div><!-- /.container-fluid -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar.navbar-inverse -->
        