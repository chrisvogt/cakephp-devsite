<div id="page-container" class="row-fluid">
    <div id="sidebar" class="span3">
        <div class="actions">
            <ul class="nav nav-list bs-docs-sidenav">			
                <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']), array('class' => '')); ?> </li>
                <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('New User'), array('action' => 'add'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('List User Meta'), array('controller' => 'user_meta', 'action' => 'index'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('New User Metum'), array('controller' => 'user_meta', 'action' => 'add'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index'), array('class' => '')); ?> </li>
                <li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class' => '')); ?> </li>
            </ul><!-- .nav nav-list bs-docs-sidenav -->
        </div><!-- .actions -->
    </div><!-- #sidebar .span3 -->
    <div id="page-content" class="span9">
        <div class="users view">
            <h2><?php echo __('User'); ?></h2>
            <table class="table table-striped table-bordered">
                <tr>		<td><strong><?php echo __('Id'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['id']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Group'); ?></strong></td>
                    <td>
                        <?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id']), array('class' => '')); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Client'); ?></strong></td>
                    <td>
                        <?php echo $this->Html->link($user['Client']['name'], array('controller' => 'clients', 'action' => 'view', $user['Client']['id']), array('class' => '')); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Email'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['email']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Pass'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['pass']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['name']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Gravatar Email'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['gravatar_email']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Is Active'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['is_active']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Activation Key'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['activation_key']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Last Seen'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['last_seen']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['created']); ?>
                        &nbsp;
                    </td>
                </tr><tr>		<td><strong><?php echo __('Modified'); ?></strong></td>
                    <td>
                        <?php echo h($user['User']['modified']); ?>
                        &nbsp;
                    </td>
                </tr>			</table><!-- .table table-striped table-bordered -->

        </div><!-- .view -->


        <div class="related">

            <h3><?php echo __('Related User Meta'); ?></h3>

            <?php if (!empty($user['UserMetum'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('User Id'); ?></th>
                        <th><?php echo __('Key'); ?></th>
                        <th><?php echo __('Value'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($user['UserMetum'] as $userMetum):
                        ?>
                        <tr>
                            <td><?php echo $userMetum['id']; ?></td>
                            <td><?php echo $userMetum['user_id']; ?></td>
                            <td><?php echo $userMetum['key']; ?></td>
                            <td><?php echo $userMetum['value']; ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('controller' => 'user_meta', 'action' => 'view', $userMetum['id']), array('class' => 'btn btn-mini')); ?>
                                <?php echo $this->Html->link(__('Edit'), array('controller' => 'user_meta', 'action' => 'edit', $userMetum['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_meta', 'action' => 'delete', $userMetum['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $userMetum['id'])); ?>
                            </td>
                        </tr>
    <?php endforeach; ?>
                </table><!-- .table table-striped table-bordered -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New User Metum'), array('controller' => 'user_meta', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->

        </div><!-- .related -->


        <div class="related">

            <h3><?php echo __('Related Projects'); ?></h3>

<?php if (!empty($user['Project'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Client Id'); ?></th>
                        <th><?php echo __('Name'); ?></th>
                        <th><?php echo __('Content'); ?></th>
                        <th><?php echo __('Is Active'); ?></th>
                        <th><?php echo __('Is Private'); ?></th>
                        <th><?php echo __('Created'); ?></th>
                        <th><?php echo __('Modified'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($user['Project'] as $project):
                        ?>
                        <tr>
                            <td><?php echo $project['id']; ?></td>
                            <td><?php echo $project['client_id']; ?></td>
                            <td><?php echo $project['name']; ?></td>
                            <td><?php echo $this->Text->excerpt($project['content'], null); ?></td>
                            <td><?php echo $project['is_active']; ?></td>
                            <td><?php echo $project['is_private']; ?></td>
                            <td><?php echo $this->Time->format($project['created']); ?></td>
                            <td><?php echo $this->Time->format($project['modified']); ?></td>
                            <td class="actions">
                                <?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id']), array('class' => 'btn btn-mini')); ?>
        <?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id']), array('class' => 'btn btn-mini')); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $project['id'])); ?>
                            </td>
                        </tr>
                <?php endforeach; ?>
                </table><!-- .table table-striped table-bordered -->

<?php endif; ?>


            <div class="actions">
<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> ' . __('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->

        </div><!-- .related -->


    </div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
