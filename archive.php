<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-chip mdui-typo mdui-m-t-3">
  <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90e;</i></span>
  <span class="mdui-chip-title">您正在查看：<?php $this->archiveTitle([
    'category'  =>  _t(' %s 分类下的文章'),
    'search'    =>  _t('包含关键字 %s 的文章'),
    'tag'       =>  _t('标签 %s 下的文章'),
    'author'    =>  _t('%s 发布的文章')
  ], '', ''); ?></span>
</div>
<?php if ($this->have()): ?>
  <?php while ($this->next()): ?>
    <div class="mdui-card mdui-hoverable mdui-m-y-3">
      <div class="mdui-card-primary">
        <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
        <div class="mdui-card-primary-subtitle mdui-text-color-theme-text">
          <?php $this->date(); ?>
          <?php if (in_array('author', $this->options->article)): ?>
            <span> |</span><i class="mdui-icon materiality-icons">&#xe904;</i><a href="<?php $this->author->permalink(); ?>"><?php if (in_array('pangu', $this->options->feature)) echo "<nopangu>"; ?><?php $this->author(); ?><?php if (in_array('pangu', $this->options->feature)) echo "</nopangu>"; ?></a>
          <?php endif; ?>
          <?php if ($this->category && in_array('categories', $this->options->article)): ?>
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
  <div class="mdui-card mdui-m-y-3">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent">没有找到内容</a></div>
    </div>
    <div class="mdui-card-content mdui-typo">
      <div class="mdui-typo-title mdui-m-y-2">这些文章可能也很有趣？</div>
      <?php getRandomPosts(5);?>
    </div>
  </div>
<?php endif; ?>
<div class="mdui-m-y-3" id="page-nav">
  <?php $this->pageNav('&#xe913;', '&#xe914;', 2, '...', [
    'itemTag'      => '',
    'textTag'      => 'div class="mdui-btn mdui-ripple mdui-text-color-theme-accent" mdui-tooltip="{content: \'共有' . ceil($this->getTotal()) . '篇文章\'}"',
    'currentClass' => 'mdui-btn-active',
    'prevClass'    => 'mdui-icon materiality-icons',
    'nextClass'    => 'mdui-icon materiality-icons',
    'wrapTag'      => 'div',
    'wrapClass'    => 'mdui-btn-group'
  ]); ?>
</div>
<?php $this->need('footer.php'); ?>
