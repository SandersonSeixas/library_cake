<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item">Books</li>
    <li class="breadcrumb-item active" aria-current="page">Editing</li>
  </ol>
</nav>

<div class="row text-bg-warning">
  <div class="card border-success mb-3" style="max-width: 1024px;">
    <div class="row g-0">
       <div class="col-md-4">
         <?= $this->Html->image($book->cover,["class"=>"card-img","alt"=>$book->original_title]);?>
       </div>
       <div class="col-md-8">
         <div class="card-body">
           <aside class="column">
             <div class="side-nav">
               <h4 class="heading"><?= __('Actions') ?></h4>
               <?= $this->Html->link(__('Edit Book'), ['action' => 'edit', $book->id], ['class' => 'side-nav-item']) ?>
               <?= $this->Form->postLink(__('Delete Book'), ['action' => 'delete', $book->id], ['confirm' => __('Are you sure you want to delete # {0}?', $book->id), 'class' => 'side-nav-item']) ?>
               <?= $this->Html->link(__('List Books'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
               <?= $this->Html->link(__('New Book'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
             </div>
           </aside>
           <h5 class="card-title"><?= h($book->original_title) ?></h5>
           <?php
            echo $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search']]);
	    echo $this->Form->control('q', ['label' => 'Search:']);
	    echo $this->Form->submit('Search');
	    echo $this->Form->end();
	    ?>
            <table>
                <tr>
                    <th><?= __('Original Title') ?></th>
                    <td><?= h($book->original_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Portuguese Title') ?></th>
                    <td><?= h($book->portuguese_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Authors') ?></th>
                    <td><?= h($book->authors) ?></td>
                </tr>
                <tr>
                    <th><?= __('Link') ?></th>
                    <td><?= h($book->link) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cover') ?></th>
                    <td><?= h($book->cover) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $book->hasValue('user') ? $this->Html->link($book->user->name, ['controller' => 'Users', 'action' => 'view', $book->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($book->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Year') ?></th>
                    <td><?= $this->Number->format($book->year) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($book->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($book->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Synopsis') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($book->synopsis)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Responsibilities') ?></h4>
                <?php if (!empty($book->responsibilities)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Book Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Action') ?></th>
                            <th><?= __('Changes') ?></th>
                            <th><?= __('Created') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($book->responsibilities as $responsibility) : ?>
                        <tr>
                            <td><?= h($responsibility->id) ?></td>
                            <td><?= h($responsibility->book_id) ?></td>
                            <td><?= h($responsibility->user_id) ?></td>
                            <td><?= h($responsibility->action) ?></td>
                            <td><?= h($responsibility->changes) ?></td>
                            <td><?= h($responsibility->created) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Responsibilities', 'action' => 'view', $responsibility->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Responsibilities', 'action' => 'edit', $responsibility->id]) ?>
                                <?= $this->Form->postLink(
                                    __('Delete'),
                                    ['controller' => 'Responsibilities', 'action' => 'delete', $responsibility->id],
                                    [
                                        'method' => 'delete',
                                        'confirm' => __('Are you sure you want to delete # {0}?', $responsibility->id),
                                    ]
                                ) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
  </div>
</div>
