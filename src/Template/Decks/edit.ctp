<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $deck->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $deck->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Decks'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Decks Styles'), ['controller' => 'DecksStyles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Decks Style'), ['controller' => 'DecksStyles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Heroes'), ['controller' => 'Heroes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Hero'), ['controller' => 'Heroes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Matchups'), ['controller' => 'Matchups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Matchup'), ['controller' => 'Matchups', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="decks form large-9 medium-8 columns content">
    <?= $this->Form->create($deck) ?>
    <fieldset>
        <legend><?= __('Edit Deck') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('decks_style_id', ['options' => $decksStyles]);
            echo $this->Form->input('hero_id', ['options' => $heroes]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
