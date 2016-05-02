<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Page Entity Field'), ['action' => 'edit', $pageEntityField->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Page Entity Field'), ['action' => 'delete', $pageEntityField->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pageEntityField->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Page Entity Fields'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Entity Field'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Page Entities'), ['controller' => 'PageEntities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Page Entity'), ['controller' => 'PageEntities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pageEntityFields view ten columns content">
    <h3><?= h($pageEntityField->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($pageEntityField->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Css Path') ?></th>
            <td><?= h($pageEntityField->css_path) ?></td>
        </tr>
        <tr>
            <th><?= __('Text Extract Regex') ?></th>
            <td><?= h($pageEntityField->text_extract_regex) ?></td>
        </tr>
        <tr>
            <th><?= __('Text Validate Regex') ?></th>
            <td><?= h($pageEntityField->text_validate_regex) ?></td>
        </tr>
        <tr>
            <th><?= __('Extractor Class') ?></th>
            <td><?= h($pageEntityField->extractor_class) ?></td>
        </tr>
        <tr>
            <th><?= __('Sql Data Type') ?></th>
            <td><?= h($pageEntityField->sql_data_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Page Entity') ?></th>
            <td><?= $pageEntityField->has('page_entity') ? $this->Html->link($pageEntityField->page_entity->name, ['controller' => 'PageEntities', 'action' => 'view', $pageEntityField->page_entity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $pageEntityField->has('user') ? $this->Html->link($pageEntityField->user->name, ['controller' => 'Users', 'action' => 'view', $pageEntityField->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($pageEntityField->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($pageEntityField->description)); ?>
    </div>
</div>
