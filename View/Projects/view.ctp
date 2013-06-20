
<div id="page-container" class="row-fluid">

    <div id="page-content" class="span9">

        <div class="projects view">

            <h3><?php echo __('Project Details'); ?></h3>
            
            <?php echo Markdown($project['Project']['content']); ?>
            
            <hr />

        </div><!-- .view -->

        <div class="related">

            <h3><?php echo __('Tags'); ?></h3>

            <?php if (!empty($project['Tag'])): ?>

                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?php echo __('Name'); ?></th>
                    </tr>
                    <?php
                    $i = 0;
                    foreach ($project['Tag'] as $tag):
                        ?>
                        <tr>
                            <td><?php echo $tag['name']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table><!-- .table table-striped table-bordered -->

            <?php endif; ?>

        </div><!-- .related -->

        <div class="commit-history">
            <?php # debug($events); ?> 
            <?php # debug($details); ?> 
        </div>


    </div><!-- #page-content .span9 -->

    <div id="sidebar" class="span3">

        <div class="actions">

            <table class="table table-bordered">
                <tr>
                    <td>
                        <?php echo $this->Html->link('<i class="icon-code-fork">&nbsp;</i> ' . __('Fork on Github'), $details['html_url'] . '/fork', array('escape' => false, 'class' => 'btn btn-block')); ?> 
                    </td>
                </tr>
                <?php if (!empty($details['stats'])) { ?>
                <tr>
                    <td><i class="icon-retweet">&nbsp;</i> <?php echo $details['stats'][0]['total']; ?> commit<?php echo ($details['stats'][0]['total'] > 1 ? 's' : ''); ?>.</td>
                </tr>
                <?php } ?>
                <tr>
                    <td><i class="icon-calendar">&nbsp;</i> Created <?php echo h($this->Time->nice($details['created_at'])); ?></td>
                </tr>
                <tr>
                    <td><i class="icon-calendar-empty">&nbsp;</i> Last updated <?php echo h($this->Time->niceShort($details['pushed_at'], 'America/Phoenix')); ?></td>
                </tr>
                <tr>
                    <td><i class="icon-github-sign">&nbsp;</i> Repository: <?php echo $this->Html->link($details['name'], $details['html_url']); ?> </td>
                </tr>
            </table>

        </div><!-- .actions -->

    </div><!-- #sidebar .span3 -->

</div><!-- #page-container .row-fluid -->
