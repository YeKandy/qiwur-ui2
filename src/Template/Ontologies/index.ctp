<div class="ontologies index content">
    <h3><?= __('Ontologies') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ontologies as $ontology): ?>
            <tr>
                <td><?= $this->Number->format($ontology->id) ?></td>
                <td><?= h($ontology->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ontology->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ontology->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ontology->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ontology->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

<div class="actions">
    <ul>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ontology'), ['action' => 'add']) ?></li>
    </ul>
</div>
