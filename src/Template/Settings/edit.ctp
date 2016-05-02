<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $setting->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $setting->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Settings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="settings form ten columns content">
    <?= $this->Form->create($setting) ?>
    <fieldset>
        <legend><?= __('Edit Setting') ?></legend>
        <?php
            echo $this->Form->input('skey');
            echo $this->Form->input('svalue');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
