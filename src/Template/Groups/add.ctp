<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Parent Groups'), ['controller' => 'Groups', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Parent Group'), ['controller' => 'Groups', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="groups form ten columns content">
    <?= $this->Form->create($group) ?>
    <fieldset>
        <legend><?= __('Add Group') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('desc');
            echo $this->Form->input('parent_id', ['options' => $parentGroups]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
