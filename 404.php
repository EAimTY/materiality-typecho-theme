<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-card mdui-m-y-3">
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent">页面没找到</a></div>
  </div>
  <div class="mdui-card-content mdui-typo">
    <div class="mdui-typo-title mdui-m-y-2">这些文章可能也很有趣？</div>
    <?php getRandomPosts(5);?>
  </div>
</div>
<?php $this->need('footer.php'); ?>
