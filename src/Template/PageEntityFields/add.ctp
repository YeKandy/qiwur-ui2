<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Page Entity Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Page Entities'), ['controller' => 'PageEntities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page Entity'), ['controller' => 'PageEntities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pageEntityFields form ten columns content">
    <?= $this->Form->create($pageEntityField) ?>
    <fieldset>
        <legend><?= __('Add Page Entity Field') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('css_path');
            echo $this->Form->input('text_extract_regex');
            echo $this->Form->input('text_validate_regex');
            echo $this->Form->input('extractor_class');
            echo $this->Form->input('sql_data_type');
            echo $this->Form->input('description');
            echo $this->Form->input('page_entity_id', ['options' => $pageEntities]);
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
