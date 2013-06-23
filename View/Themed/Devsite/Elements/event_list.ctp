                        <div class="container-fluid">
                            <div class="row-fluid" style="margin-bottom: 8px;">
                                <?php # echo $this->Html->image($event['actor']['avatar_url'], array('alt' => $event['actor']['login'], 'class' => 'img-polaroid')); ?> 
                                <ul class="list-events">
                            <?php foreach ($events as $key => $event) : ?> 
                                    <li>
                                        <?php echo ($event['type'] == 'PushEvent' ? '<i class="icon-share-alt">&nbsp;</i> ' : '<i class="icon-star">&nbsp;</i> '); ?>
                                        <?php echo $event['actor']['login']; ?> <?php echo ($event['type'] == 'PushEvent' ? 'pushed' : 'started watching'); ?> <?php echo ($event['type'] == 'WatchEvent' ? $this->Html->link($event['repo']['name'], 'http://github.com/' . $event['repo']['name']) . '.' : '' ); ?> 
                                        <?php echo ($event['type'] == 'PushEvent' ? $event['payload']['size'] : '' ); ?> <?php
                                        if ($event['type'] == 'PushEvent') {
                                            if ($event['payload']['size'] == '1') {
                                                echo 'commit';
                                            } else {
                                                echo Inflector::pluralize('commit');
                                            }
                                        } ?>
                                        <?php echo ($event['type'] == 'PushEvent' ? 'to ' . $this->Html->link($event['repo']['name'], 'http://github.com/' . $event['repo']['name']) : ''); ?> 
                                        <span><?php echo $this->Time->timeAgoInWords($event['created_at']); ?></span> 
                                    </li>
                            <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php echo $this->Html->link('<i class="icon-github">&nbsp;</i> View all on Github', 'https://github.com/' . Configure::read('social.github') . '?tab=activity', array('class' => 'btn btn-small pull-right', 'escape' => false)); ?> 
                        </div>  