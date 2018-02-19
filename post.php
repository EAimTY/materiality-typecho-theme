<?php $this->need('header.php'); ?>
<div class="mdui-container">
  <div class="card-spacer"></div>
  <div class="mdui-card mdui-shadow-3">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-title"><a class="mdui-text-color-theme-accent" href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
      <div class="mdui-card-primary-subtitle"><?php $this->date('F j, Y'); ?></div>
    </div>
    <div class="mdui-card-content mdui-typo"><?php $this->content(); ?></div>
  </div>
  <div class="card-spacer"></div>
</div>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>
