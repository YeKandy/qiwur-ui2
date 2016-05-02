<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Areas'), ['controller' => 'Areas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Area'), ['controller' => 'Areas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cities view ten columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Name Zh') ?></th>
            <td><?= h($city->name_zh) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Root') ?></th>
            <td><?= $this->Number->format($city->root) ?></td>
        </tr>
        <tr>
            <th><?= __('Children') ?></th>
            <td><?= $this->Number->format($city->children) ?></td>
        </tr>
        <tr>
            <th><?= __('Layer') ?></th>
            <td><?= $this->Number->format($city->layer) ?></td>
        </tr>
        <tr>
            <th><?= __('Order') ?></th>
            <td><?= $this->Number->format($city->order) ?></td>
        </tr>
        <tr>
            <th><?= __('Code') ?></th>
            <td><?= $this->Number->format($city->code) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Open') ?></th>
            <td><?= $this->Number->format($city->is_open) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Areas') ?></h4>
        <?php if (!empty($city->areas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Name Full') ?></th>
                <th><?= __('City Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->areas as $areas): ?>
            <tr>
                <td><?= h($areas->id) ?></td>
                <td><?= h($areas->city) ?></td>
                <td><?= h($areas->name) ?></td>
                <td><?= h($areas->name_full) ?></td>
                <td><?= h($areas->city_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Areas', 'action' => 'view', $areas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Areas', 'action' => 'edit', $areas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Areas', 'action' => 'delete', $areas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $areas->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
