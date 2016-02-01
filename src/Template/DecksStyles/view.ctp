<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Decks Style'), ['action' => 'edit', $decksStyle->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Decks Style'), ['action' => 'delete', $decksStyle->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decksStyle->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Decks Styles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Decks Style'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="decksStyles view large-9 medium-8 columns content">
    <h3><?= h($decksStyle->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($decksStyle->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($decksStyle->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($decksStyle->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($decksStyle->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Decks') ?></h4>
        <?php if (!empty($decksStyle->decks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Decks Style Id') ?></th>
                <th><?= __('Hero Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($decksStyle->decks as $decks): ?>
            <tr>
                <td><?= h($decks->id) ?></td>
                <td><?= h($decks->name) ?></td>
                <td><?= h($decks->created) ?></td>
                <td><?= h($decks->modified) ?></td>
                <td><?= h($decks->decks_style_id) ?></td>
                <td><?= h($decks->hero_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Decks', 'action' => 'view', $decks->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Decks', 'action' => 'edit', $decks->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Decks', 'action' => 'delete', $decks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $decks->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
