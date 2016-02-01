<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Matchups Controller
 *
 * @property \App\Model\Table\MatchupsTable $Matchups
 */
class MatchupsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Decks', 'Opponents']
        ];
        $this->set('matchups', $this->paginate($this->Matchups));
        $this->set('_serialize', ['matchups']);
    }

    /**
     * View method
     *
     * @param string|null $id Matchup id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $matchup = $this->Matchups->get($id, [
            'contain' => ['Decks']
        ]);
        $this->set('matchup', $matchup);
        $this->set('_serialize', ['matchup']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $matchup = $this->Matchups->newEntity();
        if ($this->request->is('post')) {
            $matchup = $this->Matchups->patchEntity($matchup, $this->request->data);
            if ($this->Matchups->save($matchup)) {
                $this->Flash->success(__('The matchup has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The matchup could not be saved. Please, try again.'));
            }
        }
        $decks = $this->Matchups->Decks->find('list', [
            'valueField' => 'full_name',
            'contain' => ['Heroes'],
            'limit' => 200
        ]);
        $this->set(compact('matchup', 'decks'));
        $this->set('_serialize', ['matchup']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Matchup id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $matchup = $this->Matchups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $matchup = $this->Matchups->patchEntity($matchup, $this->request->data);
            if ($this->Matchups->save($matchup)) {
                $this->Flash->success(__('The matchup has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The matchup could not be saved. Please, try again.'));
            }
        }
        $decks = $this->Matchups->Decks->find('list', ['limit' => 200]);
        $this->set(compact('matchup', 'decks'));
        $this->set('_serialize', ['matchup']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Matchup id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $matchup = $this->Matchups->get($id);
        if ($this->Matchups->delete($matchup)) {
            $this->Flash->success(__('The matchup has been deleted.'));
        } else {
            $this->Flash->error(__('The matchup could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
