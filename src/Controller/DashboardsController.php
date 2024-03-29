<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Dashboards Controller
 *
 * @property \App\Model\Table\DashboardsTable $Dashboards
 */
class DashboardsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
		$this->loadModel("Crawls");

		$crawls = $this->Crawls->find('all')
			->where(['Crawls.user_id' => $this->currentUser ['id']])
			->limit(5)
			->order('Crawls.id DESC')
			->all()
			->toArray();

		$this->loadModel("PageEntities");
		$pageEntities = $this->PageEntities->find('all')
			->where(['PageEntities.user_id' => $this->currentUser ['id']])
			->limit(5)
			->order('PageEntities.id DESC')
			->all()
			->toArray();

		$this->set(compact('crawls', 'pageEntities'));
    }

    /**
     * View method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dashboard = $this->Dashboards->get($id, [
            'contain' => []
        ]);

        $this->set('dashboard', $dashboard);
        $this->set('_serialize', ['dashboard']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dashboard = $this->Dashboards->newEntity();
        if ($this->request->is('post')) {
            $dashboard = $this->Dashboards->patchEntity($dashboard, $this->request->data);
            if ($this->Dashboards->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dashboard'));
        $this->set('_serialize', ['dashboard']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dashboard = $this->Dashboards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dashboard = $this->Dashboards->patchEntity($dashboard, $this->request->data);
            if ($this->Dashboards->save($dashboard)) {
                $this->Flash->success(__('The dashboard has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The dashboard could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('dashboard'));
        $this->set('_serialize', ['dashboard']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Dashboard id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dashboard = $this->Dashboards->get($id);
        if ($this->Dashboards->delete($dashboard)) {
            $this->Flash->success(__('The dashboard has been deleted.'));
        } else {
            $this->Flash->error(__('The dashboard could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
