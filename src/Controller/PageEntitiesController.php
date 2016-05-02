<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PageEntities Controller
 *
 * @property \App\Model\Table\PageEntitiesTable $PageEntities
 */
class PageEntitiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Crawls']
        ];
        $pageEntities = $this->paginate($this->PageEntities);

        $this->set(compact('pageEntities'));
        $this->set('_serialize', ['pageEntities']);
    }

    /**
     * View method
     *
     * @param string|null $id Page Entity id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pageEntity = $this->PageEntities->get($id, [
            'contain' => ['Users', 'Crawls', 'PageEntityFields', 'ScentJobs']
        ]);

        $this->set('pageEntity', $pageEntity);
        $this->set('_serialize', ['pageEntity']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageEntity = $this->PageEntities->newEntity();
        if ($this->request->is('post')) {
            $pageEntity = $this->PageEntities->patchEntity($pageEntity, $this->request->data);
            if ($this->PageEntities->save($pageEntity)) {
                $this->Flash->success(__('The page entity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page entity could not be saved. Please, try again.'));
            }
        }
        $users = $this->PageEntities->Users->find('list', ['limit' => 200]);
        $crawls = $this->PageEntities->Crawls->find('list', ['limit' => 200]);
        $this->set(compact('pageEntity', 'users', 'crawls'));
        $this->set('_serialize', ['pageEntity']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page Entity id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageEntity = $this->PageEntities->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pageEntity = $this->PageEntities->patchEntity($pageEntity, $this->request->data);
            if ($this->PageEntities->save($pageEntity)) {
                $this->Flash->success(__('The page entity has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page entity could not be saved. Please, try again.'));
            }
        }
        $users = $this->PageEntities->Users->find('list', ['limit' => 200]);
        $crawls = $this->PageEntities->Crawls->find('list', ['limit' => 200]);
        $this->set(compact('pageEntity', 'users', 'crawls'));
        $this->set('_serialize', ['pageEntity']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Page Entity id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pageEntity = $this->PageEntities->get($id);
        if ($this->PageEntities->delete($pageEntity)) {
            $this->Flash->success(__('The page entity has been deleted.'));
        } else {
            $this->Flash->error(__('The page entity could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
