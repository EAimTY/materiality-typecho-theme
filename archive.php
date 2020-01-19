<?php $this->need('header.php'); ?>
<div class="mdui-container">

  <!-- 页面面包屑 -->
  <div class="mdui-chip mdui-typo mdui-m-t-3">
    <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90d;</i></span>
    <span class="mdui-chip-title">您正在查看：<?php $this->archiveTitle(array(
      'category'  =>  _t(' %s 分类下的文章'),
      'search'    =>  _t('包含关键字 %s 的文章'),
      'tag'       =>  _t('标签 %s 下的文章'),
      'author'    =>  _t('%s 发布的文章')
    ), '', ''); ?></span>
  </div>

  <!-- 文章列表 -->
  <?php while ($this->next()): ?>
    <div class="mdui-card mdui-shadow-3 mdui-hoverable mdui-m-y-3">
      <div class="mdui-card-primary">
        <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
        <div class="mdui-card-primary-subtitle"><?php $this->date(); ?></div>
      </div>
      <div class="mdui-card-content mdui-typo"><?php $this->content(); ?></div>
      <div class="mdui-card-actions">
        <a class="mdui-btn mdui-ripple mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>">继续阅读</a>
      </div>
    </div>
  <?php endwhile; ?>

  <!-- 跳页按钮 -->
  <div class="page-nav mdui-m-y-3">
    <div class="total-pages"><?php echo ceil($this->getTotal()); ?></div>
    <?php $this->pageNav('&#xe912;', '&#xe913;', 2, '...', array('itemTag' => '', 'textTag' => 'div', 'currentClass' => 'mdui-btn-active', 'wrapTag' => 'div', 'wrapClass' => 'mdui-btn-group')); ?>
  </div>

</div>
<?php $this->need('footer.php'); ?>
