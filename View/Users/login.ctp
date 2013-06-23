<div class="row-fluid">
    <div class="span6 offset3">
        <div class="well well-login">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                <li><a href="#create" data-toggle="tab">Create Account</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="login">
                    <?php echo $this->Form->create('User', array('action' => 'login', 'class' => 'form-horizontal', 'method' => 'POST')); ?> 
                    <fieldset>
                        <div id="legend">
                            <h3>Login</h3>
                        </div> 
                        <?php echo $this->Session->flash('auth'); ?> 
                        <div class="control-group">
                            <!-- Username -->
                            <label class="control-label" for="UserEmail">Email</label>
                            <div class="controls">
                                <?php echo $this->Form->input('email', array('class' => 'input-xlarge', 'placeholder' => 'you@example.com', 'label' => false, 'div' => false)); ?> 
                            </div>
                        </div>

                        <div class="control-group">
                            <!-- Password-->
                            <label class="control-label" for="UserPassword">Password</label>
                            <div class="controls">
                                <?php echo $this->Form->input('password', array('class' => 'input-xlarge', 'label' => false, 'div' => false)); ?> 
                            </div>
                        </div>


                        <div class="control-group">
                            <!-- Button -->
                            <div class="controls">
                                <?php echo $this->Form->button('Login', array('type' => 'submit', 'class' => 'btn btn-success')); ?> 
                            </div>
                        </div>
                    </fieldset>
                    <?php echo $this->Form->end(); ?> 

                    <p><?php echo $this->Html->link('Can\'t access your account?', '#'); ?> </p>
                </div>
                <div class="tab-pane fade" id="create">
                    <h3>Register</h3>
                    <p>
                        By creating an account, you agree to the <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.
                    </p>
                    <form id="tab">
                        <label>Full Name</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Email</label>
                        <input type="text" value="" class="input-xlarge">
                        <label>Confirm Email</label>
                        <input type="text" value="" class="input-xlarge">

                        <div>
                            <button class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
                </div><!-- /#create -->
            </div><!-- /.tab-content -->
        </div><!-- /.well -->
    </div><!-- /.span8 offset2 -->
</div><!-- /.row-fluid -->