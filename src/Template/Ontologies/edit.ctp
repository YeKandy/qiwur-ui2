<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $ontology->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ontology->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Ontologies'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="ontologies form ten columns content">
    <?= $this->Form->create($ontology) ?>
    <fieldset>
        <legend><?= __('Edit Ontology') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
