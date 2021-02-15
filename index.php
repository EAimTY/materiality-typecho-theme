<?php
/**
 * 一款简洁并专注于显示文字内容的Material Design风格Typecho 主题，基于<a href="https://www.mdui.org/">MDUI</a>
 *
 * @package materiality-typecho-theme
 * @author EAimTY
 * @version 4.8.5
 * @link https://www.eaimty.com/
 */
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<?php while ($this->next()): ?>
  <div class="mdui-card mdui-hoverable mdui-m-y-3">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
      <div class="mdui-card-primary-subtitle mdui-text-color-theme-text">
        <?php $this->date(); ?>
        <?php if (!empty($this->options->article) && in_array('author', $this->options->article)): ?>
          <span> |</span><i class="mdui-icon materiality-icons">&#xe904;</i><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
        <?php endif; ?>
        <?php if ($this->category && !empty($this->options->article) && in_array('category', $this->options->article)): ?>
          <span> | </span><i class="mdui-icon materiality-icons">&#xe907;</i><?php $this->category(', '); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="mdui-card-content mdui-typo"><?php if (!empty($this->options->feature) && in_array('pangu', $this->options->feature)) echo "<pangu>"; ?><?php $this->content(); ?><?php if (!empty($this->options->feature) && in_array('pangu', $this->options->feature)) echo "</pangu>"; ?></div>
    <div class="mdui-card-actions">
      <a class="mdui-btn mdui-ripple mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>">继续阅读</a>
    </div>
  </div>
<?php endwhile; ?>
<?php ob_start(); ?>
<div class="mdui-m-y-3 page-nav">
  <?php $this->pageNav('&#xe913;', '&#xe914;', 2, '...', [
    'itemTag'      => '',
    'textTag'      => 'span',
    'currentClass' => 'mdui-btn-active',
    'prevClass'    => 'mdui-icon materiality-icons',
    'nextClass'    => 'mdui-icon materiality-icons',
    'wrapTag'      => 'div',
    'wrapClass'    => 'mdui-btn-group'
  ]); ?>
</div>
<?php $pageNavHTML = ob_get_contents(); ?>
<?php ob_end_clean(); ?>
<?php getPageNav($pageNavHTML, ceil($this->getTotal())); ?>
<?php $this->need('footer.php'); ?>
