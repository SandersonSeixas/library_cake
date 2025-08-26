<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Responsibilities Controller
 *
 * @property \App\Model\Table\ResponsibilitiesTable $Responsibilities
 */
class ResponsibilitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Responsibilities->find()
            ->contain(['Books', 'Users']);
        $responsibilities = $this->paginate($query);

        $this->set(compact('responsibilities'));
    }

    /**
     * View method
     *
     * @param string|null $id Responsibility id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $responsibility = $this->Responsibilities->get($id, contain: ['Books', 'Users']);
        $this->set(compact('responsibility'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $responsibility = $this->Responsibilities->newEmptyEntity();
        if ($this->request->is('post')) {
            $responsibility = $this->Responsibilities->patchEntity($responsibility, $this->request->getData());
            if ($this->Responsibilities->save($responsibility)) {
                $this->Flash->success(__('The responsibility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The responsibility could not be saved. Please, try again.'));
        }
        $books = $this->Responsibilities->Books->find('list', limit: 200)->all();
        $users = $this->Responsibilities->Users->find('list', limit: 200)->all();
        $this->set(compact('responsibility', 'books', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Responsibility id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $responsibility = $this->Responsibilities->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $responsibility = $this->Responsibilities->patchEntity($responsibility, $this->request->getData());
            if ($this->Responsibilities->save($responsibility)) {
                $this->Flash->success(__('The responsibility has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The responsibility could not be saved. Please, try again.'));
        }
        $books = $this->Responsibilities->Books->find('list', limit: 200)->all();
        $users = $this->Responsibilities->Users->find('list', limit: 200)->all();
        $this->set(compact('responsibility', 'books', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Responsibility id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $responsibility = $this->Responsibilities->get($id);
        if ($this->Responsibilities->delete($responsibility)) {
            $this->Flash->success(__('The responsibility has been deleted.'));
        } else {
            $this->Flash->error(__('The responsibility could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
