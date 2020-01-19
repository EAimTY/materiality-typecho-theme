<?php $this->need('header.php'); ?>
<div class="mdui-container">

  <!-- 页面内容 -->
  <div class="mdui-card mdui-shadow-3 mdui-m-y-3">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
      <div class="mdui-card-primary-subtitle"><?php $this->date('F j, Y'); ?></div>
    </div>
    <div class="mdui-card-content mdui-typo"><?php $this->content(); ?></div>
  </div>

  <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
