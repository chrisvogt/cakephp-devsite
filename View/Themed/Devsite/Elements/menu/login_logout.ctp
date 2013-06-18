<?php if (isset($authUser) && !empty($authUser)): ?>
<p class="navbar-text pull-right">
    Logged in as <a href="#" class="navbar-link">Username</a>
</p>
<?php else: ?>
<a href="#" title="Login" class="btn btn-small pull-right"><i class="icon-lock">&nbsp;</i> Login</a>
<?php endif; ?>
