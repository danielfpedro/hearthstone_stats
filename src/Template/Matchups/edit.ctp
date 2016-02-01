<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $matchup->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $matchup->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Matchups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['controller' => 'Decks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Deck'), ['controller' => 'Decks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="matchups form large-9 medium-8 columns content">
    <?= $this->Form->create($matchup) ?>
    <fieldset>
        <legend><?= __('Edit Matchup') ?></legend>
        <?php
            echo $this->Form->input('deck_id', ['options' => $decks]);
            echo $this->Form->input('deck_id1');
            echo $this->Form->input('victorious');
            echo $this->Form->input('observation');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
