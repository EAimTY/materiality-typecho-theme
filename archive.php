<?php $this->need('header.php'); ?>
<div class="mdui-container">
  <div class="card-spacer"></div>
  <div class="mdui-chip">
    <span class="mdui-chip-icon"><i class="mdui-icon typecho-material-theme-icons">&#xe909;</i></span>
    <span class="mdui-chip-title">您正在查看:<?php $this->archiveTitle(array(
      'category'  =>  _t(' %s 分类下的文章'),
      'search'    =>  _t('包含关键字 %s 的文章'),
      'tag'       =>  _t('标签 %s 下的文章'),
      'author'    =>  _t('%s 发布的文章')
    ), '', ''); ?></span>
  </div>
  <?php while($this->next()): ?>
    <div class="card-spacer"></div>
    <div class="mdui-card">
      <div class="mdui-card-primary">
        <div class="mdui-card-primary-title"><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></div>
        <div class="mdui-card-primary-subtitle"><?php $this->date('F j, Y'); ?></div>
      </div>
      <div class="mdui-card-content"><?php $this->content(); ?></div>
      <div class="mdui-card-actions">
        <button class="mdui-btn mdui-ripple mdui-text-color-pink-accent"><a href="<?php $this->permalink(); ?>">继续阅读</a></button>
      </div>
    </div>
    <div class="card-spacer"></div>
  <?php endwhile; ?>
  <div class="page-nav">
    <div class="prev-page mdui-col-xs-6"><?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: \'上一页\'}"><i class="mdui-icon typecho-material-theme-icons mdui-text-color-pink-accent">&#xe90c;</i></button>'); ?></div>
    <div class="next-page mdui-col-xs-6"><?php $this->pageLink('<button class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: \'下一页\'}"><i class="mdui-icon typecho-material-theme-icons mdui-text-color-pink-accent">&#xe90d;</i></button>', 'next'); ?></div>
  </div>
</div>
<?php $this->need('footer.php'); ?>
