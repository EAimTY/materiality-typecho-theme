<!DOCTYPE html>
<html>
<head>
  <title><?php $this->archiveTitle(array(
    'category'  =>  _t('分类 %s 下的文章'),
    'search'    =>  _t('包含关键字 %s 的文章'),
    'tag'       =>  _t('标签 %s 下的文章'),
    'author'    =>  _t('%s 发布的文章')
  ), '', ' - '); ?><?php $this->options->title(); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <meta name="theme-color" content="#3f51b5" />
  <meta name="renderer" content="webkit" />
  <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/mdui.min.css'); ?>" />
  <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/style.min.css'); ?>" />
  <script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php $this->options->themeUrl('js/mdui.min.js'); ?>"></script>
  <?php if ($this->options->footer && in_array('showscrolltop', $this->options->footer)): ?>
    <script type="text/javascript" src="<?php $this->options->themeUrl('js/scrolltop.min.js'); ?>"></script>
  <?php endif; ?>
  <?php if ($this->options->avatar): ?>
    <link rel="Shortcut Icon" href="<?php $this->options->avatar(); ?>" />
    <link rel="Bootmark" href="<?php $this->options->avatar(); ?>" />
  <?php endif; ?>
  <?php $this->header(); ?>
</head>
<body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink">
  <header class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme">
      <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon materiality-icons">&#xe900;</i></span>
      <a href="<?php $this->options->siteUrl(); ?>" class="mdui-typo-headline"><?php $this->options->title(); ?></a>
      <div class="mdui-toolbar-spacer"></div>
    </div>
  </header>
  <div class="mdui-drawer" id="main-drawer">
    <div class="mdui-list" mdui-collapse="{accordion: true}">
      <div class="drawer-billboard">
        <?php if ($this->options->avatar): ?>
          <a href="<?php $this->options->siteUrl(); ?>"><img class="drawer-logo" src="<?php $this->options->avatar(); ?>" /></a>
        <?php endif; ?>
        <?php if ($this->options->description): ?>
          <div class="drawer-description"><?php $this->options->description(); ?></div>
        <?php endif; ?>
      </div>
      <form class="mdui-textfield mdui-textfield-floating-label drawer-search" method="post" action="">
        <label class="mdui-textfield-label drawer-search-content">搜索</label>
        <input class="mdui-textfield-input" type="text" name="s" />
      </form>
      <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
      <?php while ($category->next()): ?>
        <div class="mdui-collapse-item">
          <a href="<?php $category->permalink(); ?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe901;</i>
              <div class="mdui-list-item-content"><?php $category->name(); ?></div>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
      <?php while ($pages->next()): ?>
        <div class="mdui-collapse-item">
          <a href="<?php $pages->permalink(); ?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe902;</i>
              <div class="mdui-list-item-content"><?php $pages->title(); ?></div>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
      <?php if ($this->options->drawer && in_array('showposts', $this->options->drawer)): ?>
        <div class="mdui-collapse-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe903;</i>
            <div class="mdui-list-item-content">最新文章</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Contents_Post_Recent')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple drawer-list-item">{title}</a>'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->drawer && in_array('showcomments', $this->options->drawer)): ?>
        <div class="mdui-collapse-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe904;</i>
            <div class="mdui-list-item-content">最新评论</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while ($comments->next()): ?>
              <a href="<?php $comments->permalink(); ?>" class="mdui-list-item mdui-ripple drawer-list-item"><?php $comments->author(false); ?>: <?php $comments->excerpt(28, '...'); ?></a>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->drawer && in_array('showarchives', $this->options->drawer)): ?>
        <div class="mdui-collapse-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe905;</i>
            <div class="mdui-list-item-content">按月归档</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple drawer-list-item">{date}</a>'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->drawer && in_array('showtags', $this->options->drawer)): ?>
        <div class="mdui-collapse-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe906;</i>
            <div class="mdui-list-item-content">常用标签</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=5')->to($tags); ?>
            <?php if ($tags->have()): ?>
              <?php while ($tags->next()): ?>
                <a href="<?php $tags->permalink(); ?>" class="mdui-list-item mdui-ripple drawer-list-item" mdui-tooltip="{content: '<?php $tags->count(); ?> 个话题'}"><?php $tags->name(); ?></a>
              <?php endwhile; ?>
            <?php else: ?>
              <a class="mdui-list-item mdui-ripple drawer-list-item">没有任何标签</a>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->links): ?>
        <div class="mdui-collapse-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe907;</i>
            <div class="mdui-list-item-content">友情链接</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->options->links(); ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
