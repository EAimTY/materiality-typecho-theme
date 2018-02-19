<?php
/**
 * A Pretty, Powerful Typecho Material Design Theme Based on <a href="https://www.mdui.org/">MDUI</a>
 *
 * @package Materiality
 * @author EAimTY
 * @version 2.4.2
 * @link https://www.eaimty.com/
 */
$this->need('header.php');
?>
<div class="mdui-container">
  <?php while($this->next()): ?>
    <div class="card-spacer"></div>
    <div class="mdui-card mdui-shadow-3 mdui-hoverable">
      <div class="mdui-card-primary">
        <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
        <div class="mdui-card-primary-subtitle"><?php $this->date('F j, Y'); ?></div>
      </div>
      <div class="mdui-card-content mdui-typo"><?php $this->content(); ?></div>
      <div class="mdui-card-actions">
        <a class="mdui-btn mdui-ripple mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>">继续阅读</a>
      </div>
    </div>
    <div class="card-spacer"></div>
  <?php endwhile; ?>
  <div class="page-nav">
    <div class="prev-page mdui-col-xs-6"><?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: \'上一页\'}"><i class="mdui-icon materiality-icons mdui-text-color-' . Typecho_Widget::widget('Widget_Options')->accentcolor . '-accent">&#xe90c;</i></button>'); ?></div>
    <div class="next-page mdui-col-xs-6"><?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: \'下一页\'}"><i class="mdui-icon materiality-icons mdui-text-color-' . Typecho_Widget::widget('Widget_Options')->accentcolor . '-accent">&#xe90d;</i></button>', 'next'); ?></div>
  </div>
</div>
<?php $this->need('footer.php'); ?>
