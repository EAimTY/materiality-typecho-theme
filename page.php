<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-card mdui-m-y-3">
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title mdui-text-color-theme-accent"><?php $this->title(); ?></div>
    <?php if ($this->fields->date == "show" || (!empty($this->options->article) && in_array('author', $this->options->article))): ?>
      <div class="mdui-card-primary-subtitle mdui-text-color-theme-text">
        <?php if ($this->fields->date == "show"): ?>
          <?php $this->date(); ?>
        <?php endif; ?>
        <?php if (!empty($this->options->article) && in_array('author', $this->options->article)): ?>
          <?php if ($this->fields->date == "show"): ?><span> |</span><?php endif; ?>
          <i class="mdui-icon materiality-icons">&#xe904;</i><a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </div>
  <div class="mdui-card-content mdui-typo">
    <?php if (!empty($this->options->feature) && in_array('pangu', $this->options->feature)) echo "<pangu>"; ?>
    <?php if ($this->fields->index == "show"): ?>
      <?php getIndex(); ?>
    <?php endif; ?>
    <?php $this->content(); ?>
    <?php if (!empty($this->options->feature) && in_array('pangu', $this->options->feature)) echo "</pangu>"; ?>
  </div>
</div>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>
