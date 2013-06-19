<?php
/**
 * Load HttpSocket class from CakePHP core
 */
App::uses('HttpSocket', 'Network/Http');
App::uses('Sanitize', 'Utility');

/**
 * Github API Component
 * @author chrisvogt
 */
class GithubApiComponent extends Component {
    
/**
 * The API location
 * 
 * @var string
 * @access public
 * @return object
 */
    public $uri = 'https://api.github.com/';
    
    public function getRepoByFullName($fullName = null) {
        if (!isset($fullName)) {
            return false;
        }
        $cleanName = Sanitize::paranoid($fullName);
        $sock = new HttpSocket();
        $result = Cache::read($cleanName, 'gh');
        if (!$result) {
            $response = $sock->get($this->uri . 'repos/' . $fullName);
            Cache::write($cleanName, $response->body, 'gh');
            $result = $response->body;
        }
        $decode = json_decode($result, true);
        
        return $decode;
    }

    public function getCommitsByFullName($fullName = null) {
        if (!isset($fullName)) {
            return false;
        }
        $cleanName = Sanitize::paranoid($fullName) . '-commits';
        $sock = new HttpSocket();
        $result = Cache::read($cleanName, 'gh');
        if (!$result) {
            $response = $sock->get($this->uri . 'repos/' . $fullName . '/commits');
            Cache::write($cleanName, $response->body, 'gh');
            $result = $response->body;
        }
        $decode = json_decode($result, true);
        
        return $decode;
    }
    
}
