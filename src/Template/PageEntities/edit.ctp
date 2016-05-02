<nav class="two columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $pageEntity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $pageEntity->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Page Entities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Crawls'), ['controller' => 'Crawls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Crawl'), ['controller' => 'Crawls', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Page Entity Fields'), ['controller' => 'PageEntityFields', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Page Entity Field'), ['controller' => 'PageEntityFields', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Scent Jobs'), ['controller' => 'ScentJobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Scent Job'), ['controller' => 'ScentJobs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pageEntities form ten columns content">
    <?= $this->Form->create($pageEntity) ?>
    <fieldset>
        <legend><?= __('Edit Page Entity') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('domain');
            echo $this->Form->input('block_path');
            echo $this->Form->input('url_filter');
            echo $this->Form->input('text_filter');
            echo $this->Form->input('status');
            echo $this->Form->input('description');
            echo $this->Form->input('finished', ['empty' => true]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('crawl_id', ['options' => $crawls, 'empty' => true]);
            echo $this->Form->input('crawlId');
            echo $this->Form->input('configId');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
