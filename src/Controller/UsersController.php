<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

	// public $components = array('RequestHandler', 'Session', 'Captcha', 'Email');

	public function beforeFilter(Event $event) {

		parent::beforeFilter($event);

// 		$this->Auth->allow(
// 				'index', 
// 				'nominate', 'register',
// 				'checkEmail', 'checkNickname', 'checkLogin',
// 				'login', 'autoLogin', 'logout', 'autoLogout',
// 				'activate', 'resetPassword','retrievePassword',
// 				'admin_login',
// 				'admin_logout',
// 				'securimage', 'serialize',
// 				'register_ok', 'ajaxRegister', 'testRegister');
	}

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups']
        ];
        $users = $this->paginate($this->Users);

        $this->request->session()->write("a", "1");

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
//         $user = $this->Users->get($id, [
//             'contain' => ['Groups', 'CrawlFilters', 'Crawls', 'HumanActions', 'NutchConfigs', 'NutchJobs', 'NutchMessages', 'PageEntities', 'PageEntityFields', 'ScentJobs', 'SparkJobs', 'StatAccesses', 'StopUrls', 'WebAuthorizations']
//         ]);
  	    $user = $this->Users->get($id, ['contain' => ['Groups']]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $groups = $this->Users->Groups->find('list', ['limit' => 200]);
        $this->set(compact('user', 'groups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function testRegister($password = null) {
    	Configure::Write('debug', 1);

    	$email = genRandomString(5).'-'.rand(10000, 100000).'@logoloto.com';
    	$name = genRandomString(5).'-'.rand(10000, 100000);

    	if ($password == null) $password = 'abc123';

    	$response = $this->__doSimpleRegister($email, $name, $password);

    	die();
    }

    /**
     * Login method
     *
     */
    public function login()
    {
    	if ($this->request->is('post')) {
    		$user = $this->Auth->identify();
    		if ($user) {
    			$this->Auth->setUser($user);
//    			return $this->redirect($this->Auth->redirectUrl());
    		}
    		$this->Flash->error(__('Invalid username or password, try again'));
    	}
    }

    /**
     * Logout method
     *
     */
    public function logout()
    {
    	return $this->redirect($this->Auth->logout());
    }

    private function __doSimpleRegister($email, $name, $password) {
    	$response = array('validate' => true, 'message' => '');

    	$this->User->recursive = -1;

    	// Ipv6
    	$ip = '127.0.0.1';

    	// Create a new user
    	$user['User']['email'] = $email;
    	$user['User']['name'] = $name;
    	$user['User']['password'] = $this->Auth->password($password);
    	$user['User']['point'] = 0;
    	$user['User']['level'] = 0;
    	$user['User']['exp'] = 0;
    	$user['User']['status'] = 'CREATED';
    	$user['User']['group_id'] = 4;
    	$user['User']['avatar'] = AVATAR_DEFAULT;
    	$user['User']['referrer'] = 4;
    	$user['User']['ip'] = $ip;

    	if ($this->User->save($user)){
    	}
    	else {
    		$this->log('Failed to save user, registration failure', LOG_ERR);
    		$response['validate'] = false;
    		$response['message'] = '注册失败！可能是网络连接有问题，请稍后再试！';
    	}
    
    	return $response;
    }
}
