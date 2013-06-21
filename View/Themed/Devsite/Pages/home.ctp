<div class="row-fluid">
        <div class="span12">
          <div class="row-fluid">
            <div class="box span4">
                <div class="box-header">
                    <h2><i class="icon-code-fork"></i><span class="break"></span>Projects</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Last Commit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($projects as $key => $project) { ?> 
                            <?php
                            /**
                             * @todo move this to the controller, please and thank you.
                             */
                            foreach ($project['ProjectMetum'] as $metum) {
                                if ($metum['key'] == 'last_commit') {
                                    $lastCommit = $metum['value'];
                                }
                            } ?>
                            <tr>
                                <td><?php echo $this->Html->link(__($project['Project']['name']), array('controller' => 'projects', 'action' => 'view', $project['Project']['id'])); ?> </td>
                                <td><?php echo $this->Time->niceShort($lastCommit); ?> </td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                    <div class="pull-right" style="margin-top:-10px;">
                        <?php echo $this->Html->link(__('View all'), array('controller' => 'projects', 'action' => 'index'), array('class' => 'btn btn-small')); ?> 
                    </div>
                    <br class="clearfix" />
                </div>
            </div><!--/span-->
            <div class="box span4">
                <div class="box-header navbar-inverse">
                    <h2><i class="icon-twitter"></i><span class="break"></span>Twitter Status</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content pagination-centered">
                    <a class="twitter-timeline" href="https://twitter.com/<?php echo Configure::read('social.twitter'); ?>" data-widget-id="347514179604848641">Tweets by @<?php echo Configure::read('social.twitter'); ?></a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    <br class="clearfix" />
                </div>
            </div><!--/span-->
            <div class="box span4">
                <div class="box-header">
                    <h2><i class="icon-github"></i><span class="break"></span>Github Activity</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <?php echo $this->element('event_list') ?> 
                </div>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
        <div class="row-fluid">
            <div class="box span12">
                <div class="box-header">
                    <h2><i class="icon-github"></i><span class="break"></span>Recent Activity</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div id="socialTimeline" style="width:100%;"></div>
                </div>
            </div><!--/.box.span12-->
        </div>
      </div><!--/row-->