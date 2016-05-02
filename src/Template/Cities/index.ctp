<div class="cities index content">
    <h3><?= __('Cities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('name_zh') ?></th>
                <th><?= $this->Paginator->sort('root') ?></th>
                <th><?= $this->Paginator->sort('children') ?></th>
                <th><?= $this->Paginator->sort('layer') ?></th>
                <th><?= $this->Paginator->sort('order') ?></th>
                <th><?= $this->Paginator->sort('code') ?></th>
                <th><?= $this->Paginator->sort('is_open') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cities as $city): ?>
            <tr>
                <td><?= $this->Number->format($city->id) ?></td>
                <td><?= h($city->name) ?></td>
                <td><?= h($city->name_zh) ?></td>
                <td><?= $this->Number->format($city->root) ?></td>
                <td><?= $this->Number->format($city->children) ?></td>
                <td><?= $this->Number->format($city->layer) ?></td>
                <td><?= $this->Number->format($city->order) ?></td>
                <td><?= $this->Number->format($city->code) ?></td>
                <td><?= $this->Number->format($city->is_open) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $city->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $city->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?>
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
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?></li>
    </ul>
</div>
