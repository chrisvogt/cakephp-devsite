
<div id="page-container" class="row-fluid">

    <div id="sidebar" class="span3">

        <div class="actions">

            <ul class="nav nav-list bs-docs-sidenav">
                <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
                <li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List User Meta'), array('controller' => 'user_meta', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New User Metum'), array('controller' => 'user_meta', 'action' => 'add')); ?> </li>
                <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
            </ul><!-- .nav nav-list bs-docs-sidenav -->

        </div><!-- .actions -->

    </div><!-- #sidebar .span3 -->

    <div id="page-content" class="span9">

        <div class="users form">

            <?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
            <fieldset>
                <h2><?php echo __('Admin Add User'); ?></h2>
                <div class="control-group">
                    <?php echo $this->Form->label('group_id', 'Group', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('group_id', array('class' => 'span12')); ?>
                    </div><!-- .controls -->
                </div><!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('client_id', 'Client', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('client_id', array('class' => 'span12')); ?>
                    </div><!-- .controls -->
                </div><!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('email', 'Email', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('email', array('class' => 'span12')); ?>
                    </div><!-- .controls -->
                </div><!-- .control-group -->

                <div class="control-group">
                    <?php echo $this->Form->label('name', 'Full Name', array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php echo $this->Form->input('name', array('class' => 'span12')); ?>
                    </div><!-- .controls -->
                </div><!-- .control-group -->

            </fieldset>
            <?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
            <?php echo $this->Form->end(); ?>

        </div>

    </div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
