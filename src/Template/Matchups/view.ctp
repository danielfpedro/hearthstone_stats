<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Matchup'), ['action' => 'edit', $matchup->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Matchup'), ['action' => 'delete', $matchup->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchup->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Matchups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Matchup'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="matchups view large-9 medium-8 columns content">
    <h3><?= h($matchup->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Deck') ?></th>
            <td><?= $matchup->has('deck') ? $this->Html->link($matchup->deck->name, ['controller' => 'Decks', 'action' => 'view', $matchup->deck->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($matchup->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Deck Id1') ?></th>
            <td><?= $this->Number->format($matchup->deck_id1) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($matchup->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($matchup->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Victorious') ?></th>
            <td><?= $matchup->victorious ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Observation') ?></h4>
        <?= $this->Text->autoParagraph(h($matchup->observation)); ?>
    </div>
</div>
