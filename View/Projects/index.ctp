
<div id="page-container" class="row-fluid">

    <div id="page-content" class="span12">
        <div class="projects index">
            <h3><?php echo __('Public Projects'); ?></h3>

            <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
                <tr>
                    <th><?php echo $this->Paginator->sort('client_id'); ?></th>
                    <th><?php echo $this->Paginator->sort('name'); ?></th>
                    <th><?php echo $this->Paginator->sort('content'); ?></th>
                    <th><?php echo $this->Paginator->sort('created'); ?></th>
                </tr>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <td>
                            <?php echo $this->Html->link($project['Client']['name'], array('controller' => 'clients', 'action' => 'view', $project['Client']['id'])); ?>
                        </td>
                        <td><?php echo $this->Html->link(h($project['Project']['name']), array('action' => 'view', $project['Project']['id'])); ?>&nbsp;</td>
                        <td><?php echo $this->Text->excerpt(h($project['Project']['content']), null); ?>&nbsp;</td>
                        <td><?php echo $this->Time->format(h($project['Project']['created'])); ?>&nbsp;</td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <p>
                <small>
                    <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
                    ));
                    ?> 
                </small>
            </p>
            <div class="pagination">
                <ul>
                    <?php
                    echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                    echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
                    echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                    ?>
                </ul>
            </div><!-- .pagination -->
        </div><!-- .index -->
    </div><!-- #page-content .span9 -->
</div><!-- #page-container .row-fluid -->
