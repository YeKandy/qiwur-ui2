<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */

class AppController extends Controller
{

	// Default current user is anonymous user
	public $currentUser = array(
		'id' => 0,
		'email' => USER_ANONYMOUS_EMAIL,
		'name' => USER_ANONYMOUS_NAME,
		'password' => '',
		'avatar' => AVATAR_DEFAULT,
		'avatar_big' => AVATAR_DEFAULT,
		'group_id' => USER_GROUP_ID,
		'point' => 0, 'level' => 0, 'exp' => 0,
		'created' => '1970-01-01 00:00:00', 'modified' => '1970-01-01 00:00:00',
		'status' => 'ACTIVATED', 'gender' => '', 'birth' => '', 'referrer' => 0,
		'salary' => '', 'ip' => '');

	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
	}

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash');
//         $this->loadComponent('Auth', [
//         		'authError' => 'Did you really think you are allowed to see that?',
//         		'authenticate' => [
//         				'Form' => [
//         						'fields' => ['username' => 'email']
//         				]
//         		],
//         		'loginAction' => [
//         				'controller' => 'Users',
//         				'action' => 'login',
//         		],
//         		'loginRedirect' => [
//         				'controller' => 'Articles',
//         				'action' => 'index'
//         		],
//         		'logoutRedirect' => [
//         				'controller' => 'Pages',
//         				'action' => 'display',
//         				'home'
//         		]
//         ]);

//         $this->settings = $this->_loadSettings();

        // Session accross all domain
        ini_set('session.cookie_domain', env('HTTP_BASE'));

//         $this->Auth->allow('*');

        // Current user
//         if ($this->Session->check('Auth.User')) {
//         	$this->_updateUser($this->Session->read('Auth.User'));
//         }

//         $this->_setAuth();
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        // Current user
        $this->set('currentUser', $this->currentUser);
        $this->set('settings', $this->settings);

        $title = DEFAULT_TITLE;
        $keywords = DEFAULT_KEYWORDS;
        $description = DEFAULT_DESCRIPTION;

        $this->set('title_for_layout', $title);
        $this->set('meta_keywords', $keywords);
        $this->set('meta_description', $description);

        $this->viewBuilder()->layout(DEFAULT_LAYOUT);

        if (isset($this->params['named']['preview']) && $this->params['named']['preview']) {
        	$this->viewBuilder()->layout('preview');
        }

        if ($this->isAdmin()) {
        	$this->viewBuilder()->layout('admin');
        }

        if ($this->isAjax()) {
        	$this->viewBuilder()->layout('anonymous');
        }

        if ($this->isAnonymous()) {
        	// $this->viewBuilder()->layout('anonymous');
        }
    }

    /**
     * Serialization. The result is depend on the type
     *
     * @param string $id Id of the user to be serialized, if $id is null, return current user
     * @param string $type How to serialize the object, the possible type can be 'json', 'xml', 'string', 'variables', etc
     * 'json' and 'string' has been implemented currently
     * @access public
     */
    public function serialize($id = null, $type = 'json') {
    	if ($type == 'json') {
    		echo $this->jsonify($id);
    	}
    	else if ($type == 'xml'){
    		// TODO
    		echo 'not implemented';
    	}
    	else if ($type == 'printify') {
    		$this->printify($id);
    	}
    	else {
    		echo $this->toString();
    	}
    
    	Configure::Write('debug', 0);
    	$this->autoRender = false;
    }
    
    public function isAdmin(){
    	return isset($this->params['prefix']) && ($this->params['prefix'] === 'admin');
    }
    
    /**
     * TODO : use RequestHandler
     * */
    public function isAjax(){
    	return isset($this->params['prefix']) && ($this->params['prefix'] === 'ajax');
    }
    
    /**
     * TODO : use RequestHandler
     * */
    public function isAnonymous() {
    	return $this->currentUser['id'] == 0;
    	// return isset($this->params['prefix']) && ($this->params['prefix'] === 'anonymous');
    }

    public function isAuthorized($user)
    {

pr($user);

    	// Admin can access every action
    	if (isset($user['group']) && $user['group'] == 3) {
    		return true;
    	}
    
    	// Default deny
    	return false;
    }

    protected function _loadSettings() {
    	return [];

    	if (($settings = Cache::read("settings", 'hourly')) === false) {
    		$db =& ConnectionManager::getDataSource('default');
    		$sql = 'SELECT * FROM `settings` AS `Setting`';
    		$settings = $db->query($sql);
    
    		$settings2 = array();
    		foreach ($settings as $setting) {
    			$settings2[$setting['Setting']['skey']] = $setting['Setting']['svalue'];
    		}
    
    		$settings = $settings2;
    		Cache::write("settings", $settings, 'hourly');
    	}

    	return $settings;
    }

//     protected function _setAuth() {
//     	$this->Auth->fields = array('username' => 'email', 'password' => 'password');
//     	$this->Auth->authorize = 'actions'; // Every request will be checked using $this->Acl->check($aro, '/controllers/{controller}/{action}')
//     	$this->Auth->actionPath = 'controllers/';
//     	$this->Auth->userScope = array('User.status' => 'ACTIVATED');
//     	$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
//     	// $this->Auth->autoRedirect = false;
//     	$this->Auth->logoutRedirect = array('controller' => 'storage_page_entities', 'action' => 'index', 'anonymous' => true);
    
//     	// Specified Authorization
//     	if ($this->isAdmin()) {
//     		// Allways in debug mode
//     		ini_set("max_execution_time", "180");
//     		if (Configure::read() == 0) {
//     			Configure::write('debug', 1);
//     		}
    
//     		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'admin_login');
//     	}
//     }

    protected function _needLogAction() {
    	// This program need no log
    	return false;
    
    	$blackList = array('image', 'css', 'js');
    	$controller = $this->params['controller'];
    	if (in_array($controller, $blackList) || $this->isAdmin()) {
    		return false;
    	}
    
    	return true;
    }
    
    protected function _updateUser($user) {
    	if (!$user['id']) {
    		return ;
    	}
    
    	$db =& ConnectionManager::getDataSource('default');
    	$sql = "SELECT `User`.* FROM `users` AS `User` WHERE `User`.`id`=$user[id]";
    	$data = $db->query($sql);
    	$this->currentUser = array_merge($user, $data[0]['User']);
    }
    
    protected function redirect2Index($msg = '', $logLevel = false) {
    	if ($logLevel && !empty($msg)) {
    		$this->log($msg, $logLevel);
    	}

    	// $request->session()->setFlash($msg);
    	$this->redirect(array('action' => 'index'));
    }
    
    protected function redirect2View($id, $msg = '', $logLevel = false) {
    	if ($logLevel && !empty($msg)) {
    		$this->log($msg, $logLevel);
    	}

//    	$this->Session->setFlash($msg);
    	$this->redirect(array('action' => 'view', $id));
    }
    
    protected function _validateId($id, $redirect = array('action' => 'index')) {
    	$modelClass = $this->modelClass;
    	if (is_array($id)) {
    		if (!isset($id[$modelClass]['id'])) {
    			$id = false;
    		}
    		else {
    			$id = $id[$modelClass]['id'];
    		}
    	}
    
    	if (!$id) {
//    		$this->Session->setFlash("Invalid ".$model);
    		$this->redirect($redirect);
    	}
    
    	if(!$this->checkTenantPrivilege($id)) {
//    		$this->Session->setFlash(__('Privilege denied', true));
    		$this->redirect($redirect);
    	}
    }

    protected function checkTenantPrivilege($id, $modelClass = null) {
    	if ($modelClass == null) {
    		$modelClass = $this->modelClass;
    	}
    
    	if (empty($id)) {
    		return false;
    	}
    
    	if (is_array($id)) {
    		if (!isset($id[$modelClass]['id'])) {
    			return false;
    		}
    
    		$id = $id[$modelClass]['id'];
    	}
    
    	// it's not a multi-tanent table
    	if (!$this->{$modelClass}->hasField('user_id')) {
    		return true;
    	}

    	$lastRecursive = $this->{$modelClass}->recursive;
    	$this->{$modelClass}->recursive = - 1;
    	$model = $this->{$modelClass}->read(array('user_id'), $id);
    	$this->{$modelClass}->recursive = $lastRecursive;
    
    	if ($model[$modelClass]['user_id'] !== $this->currentUser['id']) {
    		return false;
    	}
    
    	return true;
    }
    
    // TODO : move to a component?
    protected function _tidyCrawlFilter($crawlFilters) {
    	$tidiedCrawlFilters = array();
    
    	foreach ($crawlFilters as $crawlFilter) {
    		$this->loadModel('CrawlFilter');
    		$crawlFilter = $this->CrawlFilter->tidyCrawlFilter($crawlFilter);
    
    		if (!empty($crawlFilter)) {
    			array_push($tidiedCrawlFilters, $crawlFilter);
    		}
    	}
    
    	return $tidiedCrawlFilters;
    }
}
