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
                            <tr>
                                <td><?php echo $this->Html->link(__($project['Project']['name']), array('controller' => 'projects', 'action' => 'view', $project['Project']['id'])); ?> </td>
                                <td>01/01/01</td>
                            </tr>
                            <?php } ?> 
                        </tbody>
                    </table>
                    <div class="pull-right" style="margin-top:-10px;">
                        <?php echo $this->Html->link(__('View All'), array('controller' => 'projects', 'action' => 'index'), array('class' => 'btn btn-small')); ?> 
                    </div>
                    <br class="clearfix" />
                </div>
            </div><!--/span-->
            <div class="box span4">
                <div class="box-header navbar-inverse">
                    <h2><i class="icon-dashboard"></i><span class="break"></span>Status</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod auctor augue et cursus. Aliquam sed feugiat ipsum, id viverra urna. Fusce ut turpis rutrum, hendrerit mi sit amet, vestibulum orci. Suspendisse sit amet molestie elit. Pellentesque ut risus viverra, imperdiet nunc sit amet, consequat augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin adipiscing tortor nec malesuada malesuada.
                    <br class="clearfix" />
                </div>
            </div><!--/span-->
            <div class="box span4">
                <div class="box-header">
                    <h2><i class="icon-github"></i><span class="break"></span>Public Activity</h2>
                    <div class="box-icon">
                        <a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
                        <a href="#" class="btn-close"><i class="icon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod auctor augue et cursus. Aliquam sed feugiat ipsum, id viverra urna. Fusce ut turpis rutrum, hendrerit mi sit amet, vestibulum orci. Suspendisse sit amet molestie elit. Pellentesque ut risus viverra, imperdiet nunc sit amet, consequat augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin adipiscing tortor nec malesuada malesuada.
                    <br class="clearfix" />
                </div>
            </div><!--/span-->
          </div><!--/row-->
        </div><!--/span-->
      </div><!--/row-->