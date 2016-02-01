<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Decks Controller
 *
 * @property \App\Model\Table\DecksTable $Decks
 */
class DecksController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DecksStyles', 'Heroes']
        ];
        $this->set('decks', $this->paginate($this->Decks));
        $this->set('_serialize', ['decks']);
    }

    /**
     * View method
     *
     * @param string|null $id Deck id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $deck = $this->Decks->get($id, [
            'contain' => ['DecksStyles', 'Heroes', 'Matchups']
        ]);
        $this->set('deck', $deck);
        $this->set('_serialize', ['deck']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deck = $this->Decks->newEntity();
        if ($this->request->is('post')) {
            $deck = $this->Decks->patchEntity($deck, $this->request->data);
            if ($this->Decks->save($deck)) {
                $this->Flash->success(__('The deck has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deck could not be saved. Please, try again.'));
            }
        }
        $decksStyles = $this->Decks->DecksStyles->find('list', ['limit' => 200]);
        $heroes = $this->Decks->Heroes->find('list', ['limit' => 200]);
        $this->set(compact('deck', 'decksStyles', 'heroes'));
        $this->set('_serialize', ['deck']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Deck id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $deck = $this->Decks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $deck = $this->Decks->patchEntity($deck, $this->request->data);
            if ($this->Decks->save($deck)) {
                $this->Flash->success(__('The deck has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The deck could not be saved. Please, try again.'));
            }
        }
        $decksStyles = $this->Decks->DecksStyles->find('list', ['limit' => 200]);
        $heroes = $this->Decks->Heroes->find('list', ['limit' => 200]);
        $this->set(compact('deck', 'decksStyles', 'heroes'));
        $this->set('_serialize', ['deck']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Deck id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $deck = $this->Decks->get($id);
        if ($this->Decks->delete($deck)) {
            $this->Flash->success(__('The deck has been deleted.'));
        } else {
            $this->Flash->error(__('The deck could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
