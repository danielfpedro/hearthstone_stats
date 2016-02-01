<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Matchups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matchups form large-9 medium-8 columns content">
    <?= $this->Form->create($matchup) ?>
    <fieldset>
        <legend><?= __('Add Matchup') ?></legend>
        <?php
            echo $this->Form->input('deck_id', ['options' => $decks]);
            echo $this->Form->input('deck_id1', ['options' => $decks]);
            echo $this->Form->input('victorious');
            echo $this->Form->input('observation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
