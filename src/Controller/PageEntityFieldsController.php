<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PageEntityFields Controller
 *
 * @property \App\Model\Table\PageEntityFieldsTable $PageEntityFields
 */
class PageEntityFieldsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PageEntities', 'Users']
        ];
        $pageEntityFields = $this->paginate($this->PageEntityFields);

        $this->set(compact('pageEntityFields'));
        $this->set('_serialize', ['pageEntityFields']);
    }

    /**
     * View method
     *
     * @param string|null $id Page Entity Field id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pageEntityField = $this->PageEntityFields->get($id, [
            'contain' => ['PageEntities', 'Users']
        ]);

        $this->set('pageEntityField', $pageEntityField);
        $this->set('_serialize', ['pageEntityField']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageEntityField = $this->PageEntityFields->newEntity();
        if ($this->request->is('post')) {
            $pageEntityField = $this->PageEntityFields->patchEntity($pageEntityField, $this->request->data);
            if ($this->PageEntityFields->save($pageEntityField)) {
                $this->Flash->success(__('The page entity field has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page entity field could not be saved. Please, try again.'));
            }
        }
        $pageEntities = $this->PageEntityFields->PageEntities->find('list', ['limit' => 200]);
        $users = $this->PageEntityFields->Users->find('list', ['limit' => 200]);
        $this->set(compact('pageEntityField', 'pageEntities', 'users'));
        $this->set('_serialize', ['pageEntityField']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Page Entity Field id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageEntityField = $this->PageEntityFields->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pageEntityField = $this->PageEntityFields->patchEntity($pageEntityField, $this->request->data);
            if ($this->PageEntityFields->save($pageEntityField)) {
                $this->Flash->success(__('The page entity field has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page entity field could not be saved. Please, try again.'));
            }
        }
        $pageEntities = $this->PageEntityFields->PageEntities->find('list', ['limit' => 200]);
        $users = $this->PageEntityFields->Users->find('list', ['limit' => 200]);
        $this->set(compact('pageEntityField', 'pageEntities', 'users'));
        $this->set('_serialize', ['pageEntityField']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Page Entity Field id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pageEntityField = $this->PageEntityFields->get($id);
        if ($this->PageEntityFields->delete($pageEntityField)) {
            $this->Flash->success(__('The page entity field has been deleted.'));
        } else {
            $this->Flash->error(__('The page entity field could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
