
<div id="page-container" class="row-fluid">

    <div id="page-content" class="span8 offset2">
        <div class="projects index">
            
            <ul class="pager">
                <li>Sort by...</li>
                <li><?php echo $this->Paginator->sort('name', 'Name'); ?></li>
                <li><?php echo $this->Paginator->sort('created', 'Created'); ?></li>
            </ul>

            <?php foreach ($projects as $project): ?>
             <?php echo $this->GithubRepo->widget($project); ?> 
            <?php endforeach; ?>

            <p>
                <small style="color: #555;">
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                    ?> 
                </small>
            </p>
            <ul class="pager">
                <?php
                echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled previous', 'tag' => 'li', 'disabledTag' => 'a'));
                echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'), array('class' => 'pagination'));
                echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled next', 'tag' => 'li', 'disabledTag' => 'a'));
                ?>
            </ul><!-- /.pager -->
        </div><!-- .index -->
    </div><!-- #page-content .span9 -->
</div><!-- #page-container .row-fluid -->
<?php echo $this->Html->script('/GithubRepoWidget/js/jquery.githubRepoWidget.min.js', array('inline' => false, 'block' => 'scriptBottom')); ?> 