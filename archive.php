<?php $this->need('header.php'); ?>
<div class="mdui-container" id="main">

  <!-- 页面面包屑 -->
  <div class="mdui-chip mdui-typo mdui-m-t-3">
    <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90e;</i></span>
    <span class="mdui-chip-title">您正在查看：<?php $this->archiveTitle(array(
      'category'  =>  _t(' %s 分类下的文章'),
      'search'    =>  _t('包含关键字 %s 的文章'),
      'tag'       =>  _t('标签 %s 下的文章'),
      'author'    =>  _t('%s 发布的文章')
    ), '', ''); ?></span>
  </div>

  <!-- 判断是否有输出内容 -->
  <?php if ($this->have()): ?>

    <!-- 输出内容列表 -->
    <?php while ($this->next()): ?>
      <div class="mdui-card mdui-shadow-3 mdui-hoverable mdui-m-y-3">
        <div class="mdui-card-primary">
          <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
          <div class="mdui-card-primary-subtitle mdui-text-color-theme-text">
            <?php $this->date(); ?>
            <?php if (in_array('showauthor', $this->options->articleinfo)): ?>
              <span> |</span><i class="mdui-icon materiality-icons">&#xe904;</i><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
            <?php endif; ?>
            <?php if ($this->category && in_array('showcategory', $this->options->articleinfo)): ?>
              <span> | </span><i class="mdui-icon materiality-icons">&#xe907;</i><?php $this->category(', '); ?>
            <?php endif; ?>
          </div>
        </div>
        <div class="mdui-card-content mdui-typo"><?php $this->content(); ?></div>
        <div class="mdui-card-actions">
          <a class="mdui-btn mdui-ripple mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>">继续阅读</a>
        </div>
      </div>
    <?php endwhile; ?>

  <?php else: ?>

    <!-- 提示未找到内容 -->
    <div class="mdui-card mdui-shadow-3 mdui-m-y-3">
      <div class="mdui-card-primary">
        <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent">没有找到内容</a></div>
      </div>
      <div class="mdui-card-content mdui-typo">
        <div class="mdui-typo-title mdui-m-y-2">这些文章可能也很有趣？</div>
        <?php getRandomPosts(5);?>
      </div>
    </div>

  <?php endif; ?>

  <!-- 跳页按钮 -->
  <div class="mdui-m-y-3" id="page-nav">
    <?php $this->pageNav('&#xe913;', '&#xe914;', 2, '...', array(
      'itemTag'      => '',
      'textTag'      => 'div class="mdui-btn mdui-ripple mdui-text-color-theme-accent" mdui-tooltip="{content: \'共有' . ceil($this->getTotal()) . '篇文章\'}"',
      'currentClass' => 'mdui-btn-active',
      'prevClass'    => 'mdui-icon materiality-icons',
      'nextClass'    => 'mdui-icon materiality-icons',
      'wrapTag'      => 'div',
      'wrapClass'    => 'mdui-btn-group'
    )); ?>
  </div>

</div>
<?php $this->need('footer.php'); ?>
