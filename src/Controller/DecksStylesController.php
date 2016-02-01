<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DecksStyles Controller
 *
 * @property \App\Model\Table\DecksStylesTable $DecksStyles
 */
class DecksStylesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('decksStyles', $this->paginate($this->DecksStyles));
        $this->set('_serialize', ['decksStyles']);
    }

    /**
     * View method
     *
     * @param string|null $id Decks Style id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $decksStyle = $this->DecksStyles->get($id, [
            'contain' => ['Decks']
        ]);
        $this->set('decksStyle', $decksStyle);
        $this->set('_serialize', ['decksStyle']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $decksStyle = $this->DecksStyles->newEntity();
        if ($this->request->is('post')) {
            $decksStyle = $this->DecksStyles->patchEntity($decksStyle, $this->request->data);
            if ($this->DecksStyles->save($decksStyle)) {
                $this->Flash->success(__('The decks style has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The decks style could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('decksStyle'));
        $this->set('_serialize', ['decksStyle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Decks Style id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $decksStyle = $this->DecksStyles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $decksStyle = $this->DecksStyles->patchEntity($decksStyle, $this->request->data);
            if ($this->DecksStyles->save($decksStyle)) {
                $this->Flash->success(__('The decks style has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The decks style could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('decksStyle'));
        $this->set('_serialize', ['decksStyle']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Decks Style id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $decksStyle = $this->DecksStyles->get($id);
        if ($this->DecksStyles->delete($decksStyle)) {
            $this->Flash->success(__('The decks style has been deleted.'));
        } else {
            $this->Flash->error(__('The decks style could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
