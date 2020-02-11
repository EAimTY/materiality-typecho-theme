<?php

/**
 * 一款简洁并专注于显示文字内容的 Material Design 风格 Typecho 主题，基于 <a href="https://www.mdui.org/">MDUI</a>
 *
 * @package materiality-typecho-theme
 * @author EAimTY
 * @version 3.1.1
 * @link https://www.eaimty.com/
 */

$this->need('header.php');
?>
<div class="mdui-container">

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
