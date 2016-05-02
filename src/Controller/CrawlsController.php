<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Crawls Controller
 *
 * @property \App\Model\Table\CrawlsTable $Crawls
 */
class CrawlsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        	'order' => ['Crawls.id' => 'desc']
        ];
        $crawls = $this->paginate($this->Crawls);

        $this->set(compact('crawls'));
        $this->set('_serialize', ['crawls']);
    }

    /**
     * View method
     *
     * @param string|null $id Crawl id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crawl = $this->Crawls->get($id, [
            'contain' => ['Users', 'CrawlFilters', 'HumanActions', 'NutchConfigs', 'NutchJobs', 'NutchMessages', 'PageEntities', 'Seeds', 'SparkJobs', 'StopUrls', 'WebAuthorizations']
        ]);

        $this->set('crawl', $crawl);
        $this->set('_serialize', ['crawl']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
    	$crawl = $this->Crawls->newEntity();

    	if ($this->request->is('post')) {
    		if (!$this->_validateAdd($this->data)) {
    			$message = 'The Crawl could not be saved, please check if any required field is empty.';
                $this->Flash->error($message);
    			return;
    		}
    
    		$success = true;
    		$message = "";
    
    		$this->data['Crawl']['state'] = 'CREATED';
    		$this->data['Crawl']['rounds'] = 50;
    		$this->data['Crawl']['limit'] = 5000;
    		$this->data['Crawl']['user_id'] = $this->currentUser['id'];
    
    		$crawlId = 0;
    		// $this->Crawl->create();
    		$crawl = $this->Crawls->patchEntity($crawl, $this->request->data);
    		if ($success && !$this->Crawl->save($this->data['Crawl'])) {
    			$success = false;
    			$message .= 'The Crawl could not be saved.';
    		}
    		else {
    			$crawlId = $this->Crawl->id;

    			$message .= "The Crawl has been saved as #$crawlId.<br />";
    		}

    		$this->Crawl->recursive = -1;
    		$crawl = $this->Crawl->read(null, $crawlId);

    		$this->data['CrawlFilter'] = $this->_tidyCrawlFilter($this->data['CrawlFilter']);

    		// Save relative models
    		foreach (array('Seed', 'CrawlFilter', 'WebAuthorization', 'HumanAction') as $relatedModel) {
    			if (!$success) break;
    			$message .= $this->_saveRelated($relatedModel, $crawl, $success);
    		}

    		$this->Flash->success($message);

    		if ($success) $this->redirect(array('action' => 'view', $crawlId));
    	}
    }

    /**
     * Edit method
     *
     * @param string|null $id Crawl id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crawl = $this->Crawls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crawl = $this->Crawls->patchEntity($crawl, $this->request->data);
            if ($this->Crawls->save($crawl)) {
                $this->Flash->success(__('The crawl has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The crawl could not be saved. Please, try again.'));
            }
        }
        $users = $this->Crawls->Users->find('list', ['limit' => 200]);
        $this->set(compact('crawl', 'users'));
        $this->set('_serialize', ['crawl']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Crawl id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crawl = $this->Crawls->get($id);
        if ($this->Crawls->delete($crawl)) {
            $this->Flash->success(__('The crawl has been deleted.'));
        } else {
            $this->Flash->error(__('The crawl could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    private function _validateAdd($data) {
    	if (!isset($data['Crawl']['name'])
    			|| !isset($data['Seed'][0]['url'])
    			|| !isset($data['CrawlFilter'][0]['url_filter']))
    	{
    		return false;
    	}
    
    	// basic validation
    	$notEmptyRequirement = array(
    			$data['Crawl']['name'],
    			$data['Seed'][0]['url'],
    			$data['CrawlFilter'][0]['url_filter']
    	);
    
    	foreach ($notEmptyRequirement as $field) {
    		if (empty($field)) {
    			return false;
    		}
    	}
    
    	return true;
    }


    /**
     * Step :
     * 1. seed
     * 2. add wes
     * 3.
     * 4.
     * 5.
     * */
    function analysis() {
    	$stepNo = 1;
    	if (!empty($this->params['named']['stepNo'])) {
    		$stepNo = $this->params['named']['stepNo'];
    	}
    	else if (!empty($this->data['Crawl']['stepNo'])) {
    		$stepNo = $this->data['Crawl']['stepNo'];
    	}
    
    	if ($stepNo == 1) {
    		$this->_wizardStep1();
    	}
    	else if ($stepNo == 2) {
    		$this->_wizardStep2();
    	}
    	else if ($stepNo == 3) {
    		$this->_wizardStep3();
    	}
    	else if ($stepNo == 4) {
    		$this->_wizardStep4();
    	}
    	else if ($stepNo == 5) {
    		$this->_wizardStep5();
    	}
    }
    
    private function _wizardStep1() {
    	if (empty($this->data)) {
    		$stepNo = 1;
    		$this->set(compact('stepNo'));
    		return;
    	}
    
    	$seed = $this->data['Crawl']['url'];
    	// $forceTld = $this->data['Crawl']['forceTld'];
    	$forceTld = false;
    
    	App::import('Lib', array('simple_crawler'));
    	$crawler = new SimpleCrawler();
    	$crawler->crawl($seed, 2, $forceTld);
    
    	$outlinks = $crawler->getOutlinks();
    	// $outlinks = json_encode($outlinks);
    
    	$outlinks = groupUrls($outlinks);
    
    	$stepNo = 2;
    	$this->set(compact('stepNo', 'seed', 'outlinks'));
    }
    
    // New WES
    private function _wizardStep2() {
    	// Nothing to do here, the client submit to addWes directly
    	//     $this->addWes();
    }
    
    // View Crawl & Start Crawl
    private function _wizardStep3() {
    	if (!empty($this->data['Crawl']['id'])) {
    		$this->startCrawl();
    
    		$stepNo = 4;
    		$this->set(compact('stepNo'));
    	}
    
    	if (empty($this->data['Crawl']['id'])) {
    		$crawl_id = null;
    		if (isset($this->params['named']['crawl_id'])) {
    			$crawl_id = $this->params['named']['crawl_id'];
    		}
    
    		$this->Crawl->contain(array('Seed', 'CrawlFilter', 'PageEntity'));
    		$crawl = $this->Crawl->read(null, $crawl_id);
    
    		$stepNo = 3;
    		$this->set(compact('stepNo', 'crawl'));
    	}
    }
    
    // View Page Entity & Add Fields
    private function _wizardStep4() {
    	$crawl_id = null;
    	if (isset($this->params['named']['crawl_id'])) {
    		$crawl_id = $this->params['named']['crawl_id'];
    	}
    
    	$this->Crawl->contain(['PageEntity' => ['PageEntityField']]);
    	$crawl = $this->Crawl->read(null, $crawl_id);
    
    	$stepNo = 4;
    	$this->set(compact('stepNo', 'crawl'));
    }
    
    // View Page Entity & Add Fields
    private function _wizardStep5() {
    	$page_entity_id = null;
    	if (isset($this->params['named']['page_entity_id'])) {
    		$page_entity_id = $this->params['named']['page_entity_id'];
    	}
    
    	$this->loadModel('PageEntity');
    	$this->PageEntity->contain(array(
    			'PageEntityField',
    			'ScentJob' => array(
    			//          'conditions' => array('ScentJob.type' => 'RULEDEXTRACT'),
    					'limit' => 1,
    					'order' => 'ScentJob.id DESC'
    			)
    	));
    	$pageEntity = $this->PageEntity->read(null, $page_entity_id);
    
    	$stepNo = 5;
    	$this->set(compact('stepNo', 'pageEntity'));
    }
    
    /**
     * TODO : move to model
     * */
    private function _saveRelated($model, $crawl, &$success) {
    	if (!$success || !isset($this->data[$model]) || !is_array($this->data[$model])
    			|| empty($this->data[$model]) || empty($this->data[$model][0])) {
    				$this->log("We can not save $model, please check the data again.");
    				return;
    			}
    
    			// calculated requried fields
    			// TODO : use beforeSave?
    			foreach($this->data[$model] as &$instance) {
    				$instance['crawl_id'] = $crawl['Crawl']['id'];
    				$instance['user_id'] = $this->currentUser['id'];
    			}
    
    			$id = 0;
    			$message = '';
    
    			$this->Crawl->{$model}->create();
    			if ($success && !$this->Crawl->{$model}->saveAll($this->data[$model])) {
    				$success = false;
    				$message = "$model(s) can not be saved.<br />";
    			}
    			else {
    				$id = $this->Crawl->{$model}->id;
    
    				$message = "Last $model have been saved as #$id.<br />";
    			}
    
    			return $message;
    }
}
