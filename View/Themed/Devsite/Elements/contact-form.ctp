<?php echo $this->Form->create(null, array('url' => '/contacts/sendEmail')); ?> 

<div class="row-fluid">
    <div class="span6">
      <?php echo $this->Form->input('name', array('type' => 'text', 'class' => 'input-block-level')); ?> 
    </div><!-- /.span6 -->
    <div class="span6">
        <?php echo $this->Form->input('email', array('type' => 'email', 'class' => 'input-block-level')); ?> 
    </div><!-- /.span6 -->
</div><!-- /.row-fluid -->
    
<?php echo $this->Form->input('message', array('type' => 'textarea', 'class' => 'input-block-level')); ?> 

<?php echo $this->Recaptcha->display(array('recaptchaOptions' => array('theme' => 'clean'), 'div' => array('class' => 'pull-right'))); ?> 

<?php echo $this->Form->button('<i class="icon-envelope icon-white">&nbsp;</i> Send Message', array('class' => 'btn btn-large btn-success', 'escape' => false, 'type' => 'submit')); ?> 

<?php echo $this->Form->end(); ?> 