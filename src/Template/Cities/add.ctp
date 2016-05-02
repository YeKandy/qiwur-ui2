<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cities form ten columns content">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Add City') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('name_zh');
            echo $this->Form->input('root');
            echo $this->Form->input('children');
            echo $this->Form->input('layer');
            echo $this->Form->input('order');
            echo $this->Form->input('code');
            echo $this->Form->input('is_open');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
