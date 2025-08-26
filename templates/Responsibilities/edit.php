<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Responsibility $responsibility
 * @var string[]|\Cake\Collection\CollectionInterface $books
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $responsibility->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $responsibility->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Responsibilities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="responsibilities form content">
            <?= $this->Form->create($responsibility) ?>
            <fieldset>
                <legend><?= __('Edit Responsibility') ?></legend>
                <?php
                    echo $this->Form->control('book_id', ['options' => $books]);
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('action');
                    echo $this->Form->control('changes');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
