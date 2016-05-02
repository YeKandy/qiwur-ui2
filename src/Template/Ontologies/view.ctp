<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ontology'), ['action' => 'edit', $ontology->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ontology'), ['action' => 'delete', $ontology->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ontology->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ontologies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ontology'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="ontologies view ten columns content">
    <h3><?= h($ontology->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($ontology->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ontology->id) ?></td>
        </tr>
    </table>
</div>
