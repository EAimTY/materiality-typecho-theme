<?php $this->need('header.php'); ?>
<div class="mdui-container">

  <!-- 文章内容 -->
  <div class="mdui-card mdui-shadow-3 mdui-m-y-3">
    <div class="mdui-card-primary">
      <div class="mdui-card-primary-title mdui-text-color-theme-accent"><?php $this->title(); ?></div>
      <div class="mdui-card-primary-subtitle mdui-text-color-theme-text">
        <?php $this->date(); ?>
        <?php if (in_array('showauthor', $this->options->articleinfo)): ?>
          <span> |</span><i class="mdui-icon materiality-icons">&#xe904;</i><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
        <?php endif; ?>
        <?php if ($this->category && in_array('showcategory', $this->options->articleinfo)): ?>
          <span> | </span><i class="mdui-icon materiality-icons">&#xe906;</i><?php $this->category(', '); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="mdui-card-content">
      <div class="mdui-typo"><?php $this->content(); ?></div>
      <?php if ($this->tags): ?>
        <div class="mdui-typo"><hr /></div>
        <div class="mdui-chip">
          <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90a;</i></span>
          <span class="mdui-chip-title"><?php $this->tags('</span></div>
        <div class="mdui-chip mdui-m-t-3">
          <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90a;</i></span>
          <span class="mdui-chip-title">', true, ''); ?></span>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <?php $this->need('comments.php'); ?>
</div>
<?php $this->need('footer.php'); ?>
