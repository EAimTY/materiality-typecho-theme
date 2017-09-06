<?php
/**
 * A Pretty, Powerful Typecho Material Design Theme
 *
 * @package Materiality
 * @author EAimTY
 * @version 1.0.3
 * @link https://www.eaimty.com/
 */
$this->need('header.php');
?>
<div class="mdui-container">
  <?php while($this->next()): ?>
    <div class="card-spacer"></div>
    <div class="mdui-card">
      <div class="mdui-card-primary">
        <div class="mdui-card-primary-title mdui-text-color-pink-accent"><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
        <div class="mdui-card-primary-subtitle"><?php $this->date('F j, Y'); ?></div>
      </div>
      <div class="mdui-card-content"><?php $this->content(); ?></div>
      <div class="mdui-card-actions">
        <button class="mdui-btn mdui-text-color-pink-accent mdui-ripple"><a href="<?php $this->permalink(); ?>">继续阅读</a></button>
      </div>
    </div>
    <div class="card-spacer"></div>
  <?php endwhile; ?>
  <div class="page-nav">
    <div class="prev-page mdui-col-xs-6"><?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: \'上一页\'}"><i class="mdui-icon materiality-icons mdui-text-color-pink-accent">&#xe90c;</i></button>'); ?></div>
    <div class="next-page mdui-col-xs-6"><?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: \'下一页\'}"><i class="mdui-icon materiality-icons mdui-text-color-pink-accent">&#xe90d;</i></button>', 'next'); ?></div>
  </div>
</div>
<?php $this->need('footer.php'); ?>
