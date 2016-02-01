<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Deck'), ['action' => 'edit', $deck->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Deck'), ['action' => 'delete', $deck->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deck->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks Styles'), ['controller' => 'DecksStyles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Decks Style'), ['controller' => 'DecksStyles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Heroes'), ['controller' => 'Heroes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Hero'), ['controller' => 'Heroes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Matchups'), ['controller' => 'Matchups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Matchup'), ['controller' => 'Matchups', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="decks view large-9 medium-8 columns content">
    <h3><?= h($deck->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($deck->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Decks Style') ?></th>
            <td><?= $deck->has('decks_style') ? $this->Html->link($deck->decks_style->name, ['controller' => 'DecksStyles', 'action' => 'view', $deck->decks_style->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Hero') ?></th>
            <td><?= $deck->has('hero') ? $this->Html->link($deck->hero->name, ['controller' => 'Heroes', 'action' => 'view', $deck->hero->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($deck->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($deck->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($deck->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Matchups') ?></h4>
        <?php if (!empty($deck->matchups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Deck Id') ?></th>
                <th><?= __('Deck Id1') ?></th>
                <th><?= __('Victorious') ?></th>
                <th><?= __('Observation') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($deck->matchups as $matchups): ?>
            <tr>
                <td><?= h($matchups->id) ?></td>
                <td><?= h($matchups->deck_id) ?></td>
                <td><?= h($matchups->deck_id1) ?></td>
                <td><?= h($matchups->victorious) ?></td>
                <td><?= h($matchups->observation) ?></td>
                <td><?= h($matchups->created) ?></td>
                <td><?= h($matchups->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Matchups', 'action' => 'view', $matchups->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Matchups', 'action' => 'edit', $matchups->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Matchups', 'action' => 'delete', $matchups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $matchups->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
