<?php if (isset($authUser) && !empty($authUser)): ?>
<p class="navbar-text pull-right">
    Logged in as <a href="#" class="navbar-link">Username</a>
</p>
<?php else: ?>
<?php echo $this->Html->link('<i class="icon-lock">&nbsp;</i> Login</a>', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-small pull-right', 'escape' => false)); ?> 
<?php endif; ?>
