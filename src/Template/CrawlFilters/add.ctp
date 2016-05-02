<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Crawl Filters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crawls'), ['controller' => 'Crawls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crawl'), ['controller' => 'Crawls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="crawlFilters form ten columns content">
    <?= $this->Form->create($crawlFilter) ?>
    <fieldset>
        <legend><?= __('Add Crawl Filter') ?></legend>
        <?php
            echo $this->Form->input('page_type');
            echo $this->Form->input('url_filter');
            echo $this->Form->input('text_filter');
            echo $this->Form->input('block_filter');
            echo $this->Form->input('crawl_id', ['options' => $crawls]);
            echo $this->Form->input('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
