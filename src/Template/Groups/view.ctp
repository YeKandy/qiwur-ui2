<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Group'), ['action' => 'edit', $group->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Group'), ['action' => 'delete', $group->id], ['confirm' => __('Are you sure you want to delete # {0}?', $group->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Groups'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Group'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Groups'), ['controller' => 'Groups', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Group'), ['controller' => 'Groups', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="groups view ten columns content">
    <h3><?= h($group->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($group->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Group') ?></th>
            <td><?= $group->has('parent_group') ? $this->Html->link($group->parent_group->name, ['controller' => 'Groups', 'action' => 'view', $group->parent_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($group->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Lft') ?></th>
            <td><?= $this->Number->format($group->lft) ?></td>
        </tr>
        <tr>
            <th><?= __('Rght') ?></th>
            <td><?= $this->Number->format($group->rght) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($group->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($group->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Desc') ?></h4>
        <?= $this->Text->autoParagraph(h($group->desc)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Groups') ?></h4>
        <?php if (!empty($group->child_groups)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Desc') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->child_groups as $childGroups): ?>
            <tr>
                <td><?= h($childGroups->id) ?></td>
                <td><?= h($childGroups->name) ?></td>
                <td><?= h($childGroups->desc) ?></td>
                <td><?= h($childGroups->created) ?></td>
                <td><?= h($childGroups->modified) ?></td>
                <td><?= h($childGroups->parent_id) ?></td>
                <td><?= h($childGroups->lft) ?></td>
                <td><?= h($childGroups->rght) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Groups', 'action' => 'view', $childGroups->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Groups', 'action' => 'edit', $childGroups->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Groups', 'action' => 'delete', $childGroups->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childGroups->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($group->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Group Id') ?></th>
                <th><?= __('Referrer') ?></th>
                <th><?= __('Ip') ?></th>
                <th><?= __('Statusflag') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($group->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->name) ?></td>
                <td><?= h($users->group_id) ?></td>
                <td><?= h($users->referrer) ?></td>
                <td><?= h($users->ip) ?></td>
                <td><?= h($users->statusflag) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
