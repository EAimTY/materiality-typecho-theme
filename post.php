<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="mdui-card mdui-m-y-3">
  <div class="mdui-card-primary">
    <div class="mdui-card-primary-title mdui-text-color-theme-accent"><?php $this->title(); ?></div>
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
  <div class="mdui-card-content">
    <div class="mdui-typo">
      <?php if (!empty($this->options->feature) && in_array('pangu', $this->options->feature)) echo "<pangu>"; ?>
      <?php if ($this->fields->index == "show"): ?>
        <?php getIndex(); ?>
      <?php endif; ?>
      <?php $this->content(); ?>
      <?php if (!empty($this->options->feature) && in_array('pangu', $this->options->feature)) echo "</pangu>"; ?>
    </div>
    <?php if ($this->fields->tags == "show" && $this->tags): ?>
      <div class="mdui-divider"></div>
      <div class="mdui-chip">
        <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90b;</i></span>
        <span class="mdui-chip-title"><?php $this->tags('</span></div>
      <div class="mdui-chip mdui-m-t-3">
        <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90b;</i></span>
        <span class="mdui-chip-title">', true, ''); ?></span>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php $this->need('comments.php'); ?>
<?php $this->need('footer.php'); ?>
