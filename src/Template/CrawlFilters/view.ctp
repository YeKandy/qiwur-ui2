<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Crawl Filter'), ['action' => 'edit', $crawlFilter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Crawl Filter'), ['action' => 'delete', $crawlFilter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crawlFilter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Crawl Filters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crawl Filter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Crawls'), ['controller' => 'Crawls', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crawl'), ['controller' => 'Crawls', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="crawlFilters view ten columns content">
    <h3><?= h($crawlFilter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Page Type') ?></th>
            <td><?= h($crawlFilter->page_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Crawl') ?></th>
            <td><?= $crawlFilter->has('crawl') ? $this->Html->link($crawlFilter->crawl->name, ['controller' => 'Crawls', 'action' => 'view', $crawlFilter->crawl->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $crawlFilter->has('user') ? $this->Html->link($crawlFilter->user->name, ['controller' => 'Users', 'action' => 'view', $crawlFilter->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($crawlFilter->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Url Filter') ?></h4>
        <?= $this->Text->autoParagraph(h($crawlFilter->url_filter)); ?>
    </div>
    <div class="row">
        <h4><?= __('Text Filter') ?></h4>
        <?= $this->Text->autoParagraph(h($crawlFilter->text_filter)); ?>
    </div>
    <div class="row">
        <h4><?= __('Block Filter') ?></h4>
        <?= $this->Text->autoParagraph(h($crawlFilter->block_filter)); ?>
    </div>
</div>
