
        <!-- Status Modal -->
        <div id="statusModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="statusModalLabel">About this software</h3>
          </div>
          <div class="modal-body">
              <?php echo $this->Html->image('/theme/Devsite/img/icon/touch144.png', array('class' => 'pull-right img-rounded')); ?> 
              
              <p>
                  <small>
                      App Version: 0.1.1<br />
                      Author: Chris Vogt (<?php echo $this->Html->link(__('@c1v0'), 'http://twitter.com/c1v0'); ?>) 
                  </small>
              </p>

            <p>This project is in development, and should be considered <span class="label label-warning">unstable</span>. In the future, this modal will display status information on components and upcoming features for this project. For now, you may wish to <?php echo $this->Html->link(__('review the project on Github'), 'http://github.com/chrisvogt/cakephp-devsite'); ?>. </p>
          </div>
          <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
          </div>
        </div>