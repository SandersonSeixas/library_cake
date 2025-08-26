<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Responsibility $responsibility
 * @var \Cake\Collection\CollectionInterface|string[] $books
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Responsibilities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="responsibilities form content">
            <?= $this->Form->create($responsibility) ?>
            <fieldset>
                <legend><?= __('Add Responsibility') ?></legend>
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
