<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Aro'), ['action' => 'edit', $aro->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Aro'), ['action' => 'delete', $aro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $aro->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Aros'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aro'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Aros'), ['controller' => 'Aros', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Aro'), ['controller' => 'Aros', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Acos'), ['controller' => 'Acos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Aco'), ['controller' => 'Acos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="aros view large-9 medium-8 columns content">
    <h3><?= h($aro->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Parent Aro') ?></th>
            <td><?= $aro->has('parent_aro') ? $this->Html->link($aro->parent_aro->id, ['controller' => 'Aros', 'action' => 'view', $aro->parent_aro->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Model') ?></th>
            <td><?= h($aro->model) ?></td>
        </tr>
        <tr>
            <th><?= __('Alias') ?></th>
            <td><?= h($aro->alias) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($aro->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Foreign Key') ?></th>
            <td><?= $this->Number->format($aro->foreign_key) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($aro->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($aro->rght) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Aros') ?></h4>
        <?php if (!empty($aro->child_aros)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Model') ?></th>
                <th><?= __('Foreign Key') ?></th>
                <th><?= __('Alias') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aro->child_aros as $childAros): ?>
            <tr>
                <td><?= h($childAros->id) ?></td>
                <td><?= h($childAros->parent_id) ?></td>
                <td><?= h($childAros->model) ?></td>
                <td><?= h($childAros->foreign_key) ?></td>
                <td><?= h($childAros->alias) ?></td>
                <td><?= h($childAros->lft) ?></td>
                <td><?= h($childAros->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Aros', 'action' => 'view', $childAros->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Aros', 'action' => 'edit', $childAros->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Aros', 'action' => 'delete', $childAros->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childAros->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Acos') ?></h4>
        <?php if (!empty($aro->acos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Model') ?></th>
                <th><?= __('Foreign Key') ?></th>
                <th><?= __('Alias') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($aro->acos as $acos): ?>
            <tr>
                <td><?= h($acos->id) ?></td>
                <td><?= h($acos->parent_id) ?></td>
                <td><?= h($acos->model) ?></td>
                <td><?= h($acos->foreign_key) ?></td>
                <td><?= h($acos->alias) ?></td>
                <td><?= h($acos->lft) ?></td>
                <td><?= h($acos->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Acos', 'action' => 'view', $acos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Acos', 'action' => 'edit', $acos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Acos', 'action' => 'delete', $acos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $acos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
