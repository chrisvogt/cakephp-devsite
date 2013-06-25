
<div id="page-container" class="row-fluid">

    <div id="page-content" class="span9">

        <div class="projects view">
            
            <?php echo Markdown($project['Project']['content']); ?>

        </div><!-- .view -->

        <div class="commit-history">
            <?php # debug($events); ?> 
            <?php # debug($details); ?> 
        </div>


    </div><!-- #page-content .span9 -->

    <div id="sidebar" class="span3">

        <div class="box">
            
            <div class="box-header navbar-inverse">
                <h2><i class="icon-list-alt"></i><span class="break"></span>Overview</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div><!-- /.box-icon -->
            </div><!-- /.box-header.navbar-inverse -->
            <div class="box-content">
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
                        <td><i class="icon-calendar">&nbsp;</i> Created: <?php echo h($this->Time->nice($details['created_at'])); ?></td>
                    </tr>
                    <tr>
                        <td><i class="icon-calendar-empty">&nbsp;</i> Last commit: <?php echo h($this->Time->timeAgoInWords($details['pushed_at'])); ?></td>
                    </tr>
                    <tr>
                        <td><i class="icon-github-sign">&nbsp;</i> Repository: <?php echo $this->Html->link($details['name'], $details['html_url']); ?> </td>
                    </tr>
                </table>

            </div>

        </div><!-- .box -->
        
<?php if (!empty($project['Tag'])): ?>
        <div class="box">

            <div class="box-header navbar-inverse">
                <h2><i class="icon-tags"></i><span class="break"></span>Tags</h2>
                <div class="box-icon">
                    <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                </div><!-- /.box-icon -->
            </div><!-- /.box-header.navbar-inverse -->
            <div class="box-content">
                <h4><?php echo __('Tags'); ?></h4>

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
            </div>

        </div><!-- .box -->
<?php endif; ?>

    </div><!-- #sidebar .span3 -->

</div><!-- #page-container .row-fluid -->
