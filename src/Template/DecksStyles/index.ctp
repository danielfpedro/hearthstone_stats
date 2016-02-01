<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Decks Style'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="decksStyles index large-9 medium-8 columns content">
    <h3><?= __('Decks Styles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($decksStyles as $decksStyle): ?>
            <tr>
                <td><?= $this->Number->format($decksStyle->id) ?></td>
                <td><?= h($decksStyle->name) ?></td>
                <td><?= h($decksStyle->created) ?></td>
                <td><?= h($decksStyle->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $decksStyle->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $decksStyle->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $decksStyle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decksStyle->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
