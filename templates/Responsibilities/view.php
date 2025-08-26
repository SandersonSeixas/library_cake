<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Responsibility $responsibility
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Responsibility'), ['action' => 'edit', $responsibility->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Responsibility'), ['action' => 'delete', $responsibility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $responsibility->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Responsibilities'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Responsibility'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="responsibilities view content">
            <h3><?= h($responsibility->action) ?></h3>
            <table>
                <tr>
                    <th><?= __('Book') ?></th>
                    <td><?= $responsibility->hasValue('book') ? $this->Html->link($responsibility->book->original_title, ['controller' => 'Books', 'action' => 'view', $responsibility->book->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $responsibility->hasValue('user') ? $this->Html->link($responsibility->user->name, ['controller' => 'Users', 'action' => 'view', $responsibility->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Action') ?></th>
                    <td><?= h($responsibility->action) ?></td>
                </tr>
                <tr>
                    <th><?= __('Changes') ?></th>
                    <td><?= h($responsibility->changes) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($responsibility->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($responsibility->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>