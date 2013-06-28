<?php
/**
 * Project Meta model
 *
 * Project metadata model for
 * CakePHP 2.x.
 *
 * @author chrisvogt <@c1v0>
 */
App::uses('AppModel', 'Model');

/**
 * Project meta model for Cake.
 *
 * @package     CakePHP-devSite
 * @subpackage  app.Model
 */
class ProjectMetum extends AppModel {
    
    /**
     * belongsTo property
     *
     * @var array
     * @link http://book.cakephp.org/2.0/en/models/associations-linking-models-together.html
     */
    public $belongsTo = array('Project');
    
    
    public function extractMetadataFromProjectSet($projects) {
        foreach ($projects as &$project) {
            $project['ProjectMetum'] = $this->_extractMetadata($project);
        }
        return $projects;
    }
    
    protected function _extractMetadata(&$project) {
        $validFields = array('repo', 'no_commits', 'last_commit');
        $meta = array();
        foreach ($project['ProjectMetum'] as $metum) {
            if (in_array($metum['key'], $validFields)) {
                $meta[$metum['key']] = $metum['value'];
            }
        }
        return $meta;
    }
    
}
