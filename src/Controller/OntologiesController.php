<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ontologies Controller
 *
 * @property \App\Model\Table\OntologiesTable $Ontologies
 */
class OntologiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $ontologies = $this->paginate($this->Ontologies);

        $this->set(compact('ontologies'));
        $this->set('_serialize', ['ontologies']);
    }

    /**
     * View method
     *
     * @param string|null $id Ontology id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ontology = $this->Ontologies->get($id, [
            'contain' => []
        ]);

        $this->set('ontology', $ontology);
        $this->set('_serialize', ['ontology']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ontology = $this->Ontologies->newEntity();
        if ($this->request->is('post')) {
            $ontology = $this->Ontologies->patchEntity($ontology, $this->request->data);
            if ($this->Ontologies->save($ontology)) {
                $this->Flash->success(__('The ontology has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ontology could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ontology'));
        $this->set('_serialize', ['ontology']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ontology id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ontology = $this->Ontologies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ontology = $this->Ontologies->patchEntity($ontology, $this->request->data);
            if ($this->Ontologies->save($ontology)) {
                $this->Flash->success(__('The ontology has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ontology could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('ontology'));
        $this->set('_serialize', ['ontology']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ontology id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ontology = $this->Ontologies->get($id);
        if ($this->Ontologies->delete($ontology)) {
            $this->Flash->success(__('The ontology has been deleted.'));
        } else {
            $this->Flash->error(__('The ontology could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
