<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Area'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="areas index large-9 medium-8 columns content">
    <h3><?= __('Areas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('name_full') ?></th>
                <th><?= $this->Paginator->sort('city_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($areas as $area): ?>
            <tr>
                <td><?= $this->Number->format($area->id) ?></td>
                <td><?= h($area->city) ?></td>
                <td><?= h($area->name) ?></td>
                <td><?= h($area->name_full) ?></td>
                <td><?= $area->has('city') ? $this->Html->link($area->city->name, ['controller' => 'Cities', 'action' => 'view', $area->city->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $area->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $area->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $area->id], ['confirm' => __('Are you sure you want to delete # {0}?', $area->id)]) ?>
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
