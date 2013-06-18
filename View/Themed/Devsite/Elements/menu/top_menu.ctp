    <!-- Le Navigation
    ================================================== -->
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link('<i class="icon-code icon-white">&nbsp;</i> ' . __('devsite'), '/', array('class' => 'brand', 'escape' => false)); ?> 
          <div class="nav-collapse collapse">
            <?php echo $this->element('menu/login_logout'); ?> 
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>