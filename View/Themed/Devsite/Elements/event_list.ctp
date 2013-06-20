<div class="container-fluid">
<?php foreach ($events as $key => $event) : ?>
<div class="row-fluid" style="margin-bottom: 8px;">
    <div class="span1">
        <?php echo $this->Html->image($event['actor']['avatar_url'], array('alt' => $event['actor']['login'], 'class' => 'img-polaroid')); ?> 
    </div>
    <div class="span11">
        <p style="padding: 6px 0; margin-left: 4px; font-size: .74em;">
            <?php echo $event['actor']['login']; ?>
            <?php echo ($event['type'] == 'PushEvent' ? 'pushed' : 'started watching'); ?> 
            <?php echo ($event['type'] == 'WatchEvent' ? $this->Html->link($event['repo']['name'], $event['repo']['url']) . '.' : '' ); ?> 
            <?php echo ($event['type'] == 'PushEvent' ? count($event['payload']['size']) : '' ); ?>
            <?php
            if ($event['type'] == 'PushEvent' && $event['payload']['size'] = 1) {
                echo 'commit';
            } elseif ($event['type'] == 'PushEvent' && $event['payload']['size'] < 1) echo Inflector::pluralize('commit');
            ?>
            <?php echo ($event['type'] == 'PushEvent' ? 'to ' . $this->Html->link($event['repo']['name'], $event['repo']['url']) : ''); ?> 
        </p>
    </div>
</div>
<?php endforeach; ?>
</div>