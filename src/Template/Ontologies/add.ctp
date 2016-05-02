<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ontologies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ontologies form ten columns content">
    <?= $this->Form->create($ontology) ?>
    <fieldset>
        <legend><?= __('Add Ontology') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
