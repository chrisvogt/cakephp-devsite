
            <div class="row-fluid">
                <div class="span12">
                    <div class="row-fluid">
                        <div class="box span4">
                            <div class="box-header">
                                <h2><i class="icon-code-fork"></i><span class="break"></span>Projects</h2>
                                <div class="box-icon">
                                    <a href="#" class="btn-minimize" data-toggle="collapse" data-target="#widget-projects"><i class="icon-chevron-up"></i></a>
                                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                                </div><!-- /.box-icon -->
                            </div><!-- /.box-header -->
                            <div id="widget-projects" class="box-content collapse in">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Last Commit</th>
                                        </tr>
                                    </thead>
                                    <tbody> <?php 
                                    foreach ($projects as $key => $project) { /** @todo Move logic to controller */
                                            foreach ($project['ProjectMetum'] as $metum) {
                                                if ($metum['key'] == 'last_commit') {
                                                    $lastCommit = $metum['value'];
                                                }
                                            } ?>  
                                        <tr>
                                            <td><?php echo $this->Html->link(__($project['Project']['name']), array('controller' => 'projects', 'action' => 'view', $project['Project']['id'])); ?> </td>
                                            <td><?php echo $this->Time->timeAgoInWords($lastCommit); ?> </td>
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
                                    <a href="#" class="btn-minimize" data-toggle="collapse" data-target="#widget-twitter"><i class="icon-chevron-up"></i></a>
                                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                                </div><!-- /.box-icon -->
                            </div><!-- /.box-header.navbar-inverse -->
                            <div id="widget-twitter" class="box-content pagination-centered collapse in">
                                <a class="twitter-timeline" href="https://twitter.com/<?php echo Configure::read('social.twitter'); ?>" data-widget-id="347514179604848641">Tweets by @<?php echo Configure::read('social.twitter'); ?></a>
                                <script>!function(d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                                    if (!d.getElementById(id)) {
                                                        js = d.createElement(s);
                                                        js.id = id;
                                                        js.src = p + "://platform.twitter.com/widgets.js";
                                                        fjs.parentNode.insertBefore(js, fjs);
                                                    }
                                                }(document, "script", "twitter-wjs");</script>
                                <br class="clearfix" />
                            </div>
                        </div><!--/span-->
                        <div class="box span4">
                            <div class="box-header">
                                <h2><i class="icon-github"></i><span class="break"></span>Github Activity</h2>
                                <div class="box-icon">
                                    <a href="#" class="btn-minimize" data-toggle="collapse" data-target="#widget-github"><i class="icon-chevron-up"></i></a>
                                    <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                                </div><!-- /.box-icon -->
                            </div><!-- /.box-header -->
                            <div id="widget-github" class="box-content collapse in">
                                <?php echo $this->element('event_list') ?> 
                            </div><!-- /.box-content -->
                        </div><!-- /.box.span4 -->
                    </div><!-- /.row-fluid -->
                </div><!--/span-->
                <div class="row-fluid">
                    <div class="box span12">
                        <div class="box-header">
                            <h2><i class="icon-rss"></i><span class="break"></span>Following & Reading</h2>
                            <div class="box-icon">
                                <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                                <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                            </div><!-- /.box-icon -->
                        </div><!-- /.box-header -->
                        <div class="box-content">
                            <div id="socialTimeline"></div>
                        </div><!-- /.box-content -->
                    </div><!-- /.box.span12 -->
                </div><!--/.row-fluid -->
            </div><!-- /.row-fluid -->

            <!-- Le javascript
            ================================================== -->
            <script type="text/javascript">
                // <![CDATA[
                jQuery(document).ready(function() {

                    jQuery("#socialTimeline").dpSocialTimeline({
                        custom:
                                {
                                    "StumbleUpon": {name: "StumbleUpon", url: "http://www.stumbleupon.com/rss/stumbler/chr1sv0gt/likes", icon: "http://www.mylocally.com/images/stumbleupon16x16.gif", limit: "10"}
                                },
                        layoutMode: "columns",
                        addColorbox: 0,
                        showSocialIcons: 1,
                        showFilter: 0,
                        showLayout: 0,
                        total: 10,
                        itemWidth: "180",
                        skin: "light",
                        lang_week: "week",
                        lang_weeks: "weeks",
                        lang_day: "day",
                        lang_days: "days",
                        lang_hour: "hour",
                        lang_hours: "hours",
                        lang_minute: "minute",
                        lang_minutes: "minutes",
                        lang_about: "about",
                        lang_ago: "ago",
                        lang_less: "Less than a minute ago",
                        nonce: "dp_timeline_id568482929"
                    });

                });

                //]]>
            </script>
            <?php echo $this->Html->script('/DpSocialTimeline/js/jquery.colorbox.min.js'); ?> 
            <?php echo $this->Html->script('/DpSocialTimeline/js/jquery.isotope.min.js'); ?> 
            <?php echo $this->Html->script('/DpSocialTimeline/js/jquery.dpSocialTimeline.min.js'); ?> 