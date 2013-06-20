<?php
/**
 * -- Github API v3 Component --
 * Github: http://developer.github.com/v3/
 * 
 * @author Chris Vogt <@c1v0>
 * 
 */
App::uses('HttpSocket', 'Network/Http');
App::uses('Sanitize', 'Utility');

/**
 * Github API Component
 * @author chrisvogt
 */
class GithubApiComponent extends Component {
    
/**
 * API path
 * 
 * @var string
 * @access private
 */
    private $apiPath = 'https://api.github.com/';
    
/**
 * Components
 * 
 * @var array $components
 */
    var $components = array('Session');

/*
 * ------ EXPOSED FUNCTIONS ------
 */
    
    /**
     * Get a user or repo's commits.
     * 
     * @param array $subject [('type' => 'users|repos', 'target' => 'username|full-reponame:chrisvogt/cakephp-devsite')]
     * @param integer $limit 
     * @return string $fields
     */
    public function recentEvents($subject = array(), $limit = 9999) {
        $accepts = array('users', 'repos');
        if (is_array($subject) && array_key_exists('type', $subject) && array_key_exists('target', $subject)) {
            $path = $this->_setSubject($subject);
        } else throw new Exception('$subject must be an array, and must contain string values for `type` and `target`.');
        
        $result = $this->_call($path);
        
        $results = array();
        $i = 0;
        foreach ( $result as $key => $item) {
            $acceptTypes = array('WatchEvent', 'PushEvent');
            if ($i < $limit) {
                if (in_array($item['type'], $acceptTypes)) {
                    $results[] = $item;
                    $i++;
                }
            }
        }
        if (!empty($results)) {
            return $results;
        } else return false;
    }
    
    public function repoInfo($fullname) {
        $result = $this->_call('repos/' . $fullname);
        $result['stats'] = $this->_call('repos/' . $fullname . '/stats/contributors');
        return $result;
    }
    
/*
 * ------ INTERNAL METHODS & FUNCTIONS ------
 */
    
    /**
     * Build the query action/subject
     * 
     * @param array $subject
     * @return string
     * @throws Exception
     */
    private function _setSubject($subject = null) {
        if ($subject['type'] == 'users' || $subject['type'] == 'repos') {
            return $subject['type'] . DS . $subject['target'];
        } else throw new Exception('Unrecognized subject type. Must be `users` or `repos`.');
    }
    
    /**
     * Add pagination settings to query
     * 
     * @param array $fields ['page' => (int), 'per_page' => (int>100)]
     * @link http://developer.github.com/v3/#pagination
     * @return string $path
     */
    private function _setPagination($fields = array()) {
        if (!is_array($fields)) {
            throw new Exception('Invalid parameter type passed to _setPagination. Only accepts arrays.');
        }
        if (is_int($fields['page'] && is_int($fields['per_page']))) {
            $path = http_build_query($fields);
        } else throw new Exception('One or more of the values passed to _setPagination is an invalid type. Must be integers.');
        return $path;
    }
    
    
    
/**
 * API call to GET Github data.
 * 
 * @param string $path
 * $param string $args
 * @return array $response
 */
    private function _call($path, $pagination = null) {
        $request = array(
            'header' => array(
                'User-Agent' => Configure::read('social.github')
            )
        );
#        $path .= $this->_paginationSettings($args);
        
        $sanitizedPath = str_replace('/', '-', strtolower($path));
        $result = Cache::read($sanitizedPath, 'gh');
        if(!$result) {
            $consumer = $this->_createConsumer();
            $result = $consumer->get($this->apiPath . $path, '', $request);
            if (isset($result['error'])) {
                throw new Exception('Github: ' . $result['error']['message']);
            }
            Cache::write($sanitizedPath, $result->body, 'gh');
            return json_decode($result->body, true);
        }
        return json_decode($result, true);
    }
    
/**
 * Create an API consumer using HttpSocket
 * 
 * @uses HttpSocket
 * @return HttpSocket
 */
    private function _createConsumer() {
        return new HttpSocket();
    }
    
/*
 * ------ FIRST PASS, throwaway code ------
 */
    
    /*
    public function getRepoByFullName($fullName = null) {
        if (!isset($fullName)) {
            return false;
        }
        $cleanName = Sanitize::paranoid($fullName);
        $sock = new HttpSocket();
        $result = Cache::read($cleanName, 'gh');
        if (!$result) {
            $response = $sock->get($this->apiPath . 'repos/' . $fullName);
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
            $response = $sock->get($this->apiPath . 'repos/' . $fullName . '/commits');
            Cache::write($cleanName, $response->body, 'gh');
            $result = $response->body;
        }
        $decode = json_decode($result, true);
        
        return $decode;
    }
    
    public function getUserInfo($username = null) {
        if (!isset($username)) {
            throw new Exception('A valid Github username is required. You tried: ' . $username, $code, $previous);
        }
        $sock = new HttpSocket();
        $result = Cache::read($username, 'gh');
        if (!$result) {
            $response = $sock->get($this->apiPath . 'users/' . $username);
            Cache::write($username, $response->body, 'gh');
            $result = $response->body;
        }
        $decode = json_decode($result, true);
        
        return $decode;
    }
    
    
    public function getUserEvents($username = null) {
        if (!isset($username)) {
            throw new Exception('A valid Github username is required. You tried: ' . $username, $code, $previous);
        }
        $sock = new HttpSocket();
        $result = Cache::read($username . '-events', 'gh');
        if (!$result) {
            $response = $sock->get($this->apiPath . 'users/' . $username . '/events');
            Cache::write($username . '-events', $response->body, 'gh');
            $result = $response->body;
        }
        $decode = json_decode($result, true);
        
        return $decode;
    }
    
    public function filterEvents($events = array(), $type = 'PushEvent') {
        if (!is_array($events)) {
            throw new Exception('Invalid Github event data passed to function.', $code, $previous);
        }
        $array = array();
        foreach ($events as $key => $event) {
            if ($event['type'] == $type) {
                $array[] = $event;
            }
            return $array;
        }
    }
     * 
     */
    
}
