<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Matchup'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matchups index large-9 medium-8 columns content">
    <h3><?= __('Matchups') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('deck_id', 'Eu') ?></th>
                <th><?= $this->Paginator->sort('deck_id1', 'Oponente') ?></th>
                <th><?= $this->Paginator->sort('victorious') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matchups as $matchup): ?>
            <tr>
                <td><?= $this->Number->format($matchup->id) ?></td>
                <td><?= $matchup->has('deck') ? $this->Html->link($matchup->deck->name, ['controller' => 'Decks', 'action' => 'view', $matchup->deck->id]) : '' ?></td>
                <td><?= $matchup->has('deck') ? $this->Html->link($matchup->opponent->name, ['controller' => 'Decks', 'action' => 'view', $matchup->deck->id]) : '' ?></td>
                <td><?= h($matchup->victorious) ?></td>
                <td><?= h($matchup->created) ?></td>
                <td><?= h($matchup->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $matchup->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $matchup->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $matchup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchup->id)]) ?>
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
