<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CrawlFilters Controller
 *
 * @property \App\Model\Table\CrawlFiltersTable $CrawlFilters
 */
class CrawlFiltersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Crawls', 'Users']
        ];
        $crawlFilters = $this->paginate($this->CrawlFilters);

        $this->set(compact('crawlFilters'));
        $this->set('_serialize', ['crawlFilters']);
    }

    /**
     * View method
     *
     * @param string|null $id Crawl Filter id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crawlFilter = $this->CrawlFilters->get($id, [
            'contain' => ['Crawls', 'Users']
        ]);

        $this->set('crawlFilter', $crawlFilter);
        $this->set('_serialize', ['crawlFilter']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crawlFilter = $this->CrawlFilters->newEntity();
        if ($this->request->is('post')) {
            $crawlFilter = $this->CrawlFilters->patchEntity($crawlFilter, $this->request->data);
            if ($this->CrawlFilters->save($crawlFilter)) {
                $this->Flash->success(__('The crawl filter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The crawl filter could not be saved. Please, try again.'));
            }
        }
        $crawls = $this->CrawlFilters->Crawls->find('list', ['limit' => 200]);
        $users = $this->CrawlFilters->Users->find('list', ['limit' => 200]);
        $this->set(compact('crawlFilter', 'crawls', 'users'));
        $this->set('_serialize', ['crawlFilter']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Crawl Filter id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crawlFilter = $this->CrawlFilters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crawlFilter = $this->CrawlFilters->patchEntity($crawlFilter, $this->request->data);
            if ($this->CrawlFilters->save($crawlFilter)) {
                $this->Flash->success(__('The crawl filter has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The crawl filter could not be saved. Please, try again.'));
            }
        }
        $crawls = $this->CrawlFilters->Crawls->find('list', ['limit' => 200]);
        $users = $this->CrawlFilters->Users->find('list', ['limit' => 200]);
        $this->set(compact('crawlFilter', 'crawls', 'users'));
        $this->set('_serialize', ['crawlFilter']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Crawl Filter id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crawlFilter = $this->CrawlFilters->get($id);
        if ($this->CrawlFilters->delete($crawlFilter)) {
            $this->Flash->success(__('The crawl filter has been deleted.'));
        } else {
            $this->Flash->error(__('The crawl filter could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
