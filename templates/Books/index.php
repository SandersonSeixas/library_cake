<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Book> $books
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Books</li>
  </ol>
</nav>

<div class="container-fluid">
    <?= $this->Html->link(__('Novo Livro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Lista de Livros') ?></h3>
    <div class="table-responsive">
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <!-- < ?= $this->Paginator->sort('id') ? ></th -->
                    <th><?= $this->Paginator->sort('original_title') ?><br>
                        <?= $this->Paginator->sort('portuguese_title') ?></th>
                    <th><?= $this->Paginator->sort('year') ?><br>
                        <?= $this->Paginator->sort('authors') ?></th>
                    <th><?= $this->Paginator->sort('link') ?></th>
                    <th><?= $this->Paginator->sort('cover') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                <tr>
                    <!-- >< ?= $this->Number->format($book->id) ? >< /td -->
                    <td><?= h($book->original_title) ?><br>
                        <?= h($book->portuguese_title) ?></td>
                    <td><?= $this->Number->format($book->year) ?><br>
                        <?= h($book->authors) ?></td>
                    <td><?= h($book->link) ?></td>
                    <td><?= h($book->cover) ?></td>
                    <td><?= $book->hasValue('user') ? $this->Html->link($book->user->name, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
                    <td><?= h($book->created) ?></td>
                    <td><?= h($book->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $book->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $book->id]) ?>
                        <?= $this->Form->postLink(
                            __('Apagar'),
                            ['action' => 'delete', $book->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $book->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <nav aria-label="Navigation">
        <ul class="pagination">
            <li class="page-item"><?= $this->Paginator->first('<< ' . __('first')) ?></li>
            <li class="page-item"><?= $this->Paginator->prev('< ' . __('previous')) ?></li>
            <li class="page-item"><?= $this->Paginator->numbers() ?></li>
            <li class="page-item"><?= $this->Paginator->next(__('next') . ' >') ?></li>
            <li class="page-item"><?= $this->Paginator->last(__('last') . ' >>') ?></li>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>