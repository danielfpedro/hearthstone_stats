<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Al Controller
 *
 * @property \App\Model\Table\AlTable $Al
 */
class AlController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('al', $this->paginate($this->Al));
        $this->set('_serialize', ['al']);
    }

    /**
     * View method
     *
     * @param string|null $id Al id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $al = $this->Al->get($id, [
            'contain' => []
        ]);
        $this->set('al', $al);
        $this->set('_serialize', ['al']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $al = $this->Al->newEntity();
        if ($this->request->is('post')) {
            $al = $this->Al->patchEntity($al, $this->request->data);
            if ($this->Al->save($al)) {
                $this->Flash->success(__('The al has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The al could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('al'));
        $this->set('_serialize', ['al']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Al id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $al = $this->Al->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $al = $this->Al->patchEntity($al, $this->request->data);
            if ($this->Al->save($al)) {
                $this->Flash->success(__('The al has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The al could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('al'));
        $this->set('_serialize', ['al']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Al id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $al = $this->Al->get($id);
        if ($this->Al->delete($al)) {
            $this->Flash->success(__('The al has been deleted.'));
        } else {
            $this->Flash->error(__('The al could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
