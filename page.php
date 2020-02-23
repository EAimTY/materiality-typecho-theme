<?php $this->need('header.php'); ?>
<div class="mdui-container">

  <!-- 页面内容 -->
  <div class="mdui-card mdui-shadow-3 mdui-m-y-3">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-title mdui-text-color-theme-accent"><?php $this->title(); ?></div>
      <div class="mdui-card-primary-subtitle mdui-text-color-theme-text">
        <?php $this->date(); ?>
        <?php if ($this->options->articleinfo && in_array('showauthor', $this->options->articleinfo)): ?>
          <span> |</span><i class="mdui-icon materiality-icons">&#xe904;</i><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
        <?php endif; ?>
      </div>
    </div>
    <div class="mdui-card-content mdui-typo"><?php $this->content(); ?></div>
  </div>

  <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
