<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>齐物数据引擎 - 格物，齐物，用物</title>

	<?php use Cake\Routing\Router; ?>
    <?= $this->Html->charset() ?>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('wufoo.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body id="<?=$this->request->params['controller'].'-'.$this->request->params['action'] ?>">
  <div id="container">

  <div id="nav">
    <h1 class="logo">
      <a href="<?php echo Router::url('/') ?>" title="Nutch UI">Nutch UI</a>
    </h1>
    <div class="user"><?php echo $currentUser['name'] ?></div>
    <ul id="menu" class="clearfix">
      <li class="item">
        <a href="<?php echo Router::url('/') ?>">Dashboard</a>
      </li>
      <li class="item3">
        <a href="<?php echo Router::url('/crawls') ?>">Crawls</a>
      </li>
      <li class="item2">
        <a href="<?php echo Router::url('/page_entities') ?>">Page Entities</a>
      </li>
      <li class="item2">
        <a href="<?php echo Router::url('/ontologies') ?>">Ontologies</a>
      </li>
      <li class="item2">
        <a href="<?php echo Router::url('/products') ?>">Products</a>
      </li>
      <li class="item2">
        <a href="<?php echo Router::url('/jobs') ?>">Jobs</a>
      </li>
      <li class="lgo">
        <a href="<?php echo Router::url('/users/logout') ?>">Logout</a>
      </li>
    </ul>
  </div><!-- nav -->

  <div id="stage">
    <?php // echo $this->request->session->flash(); ?>
    <?= $this->fetch('content') ?>
  </div><!--stage-->

  </div><!--container-->

  <img id="bottom" src="/img/bottom.png" alt="" />
  <div id="footer">
    <h1 class="logo"><a href="<?php echo Router::url('/') ?>">奇点驱动</a></h1>
    <p> &middot; <strong>奇点驱动</strong> &middot; 上海奇点驱动网络科技有限公司 &middot;</p>
  </div><!--footer-->

<!-- JavaScript -->
<?php 
  // echo $this->element('sql_dump');
  // if(isset($js)) echo $this->element('js', array('scripts_for_layout' => $scripts_for_layout));
?>

</body>
</html>
