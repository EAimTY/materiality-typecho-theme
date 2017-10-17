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
<body class="mdui-appbar-with-toolbar mdui-theme-primary-indigo mdui-theme-accent-pink">
  <header class="mdui-appbar mdui-appbar-fixed">
    <div class="mdui-toolbar mdui-color-theme">
      <span class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon materiality-icons">&#xe900;</i></span>
      <a href="<?php $this->options->siteUrl(); ?>" class="mdui-typo-headline"><?php $this->options->title(); ?></a>
      <div class="mdui-toolbar-spacer"></div>
      <?php if ($this->options->appbar && in_array('showrss', $this->options->appbar)): ?>
        <span class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple mdui-ripple-white" mdui-tooltip="{content: 'RSS'}" mdui-menu="{target: '#rss'}"><i class="mdui-icon materiality-icons">&#xe90e;</i></span>
        <ul class="mdui-menu" id="rss">
          <li class="mdui-menu-item">
            <a href="<?php $this->options->feedUrl(); ?>" class="mdui-ripple footer-menu-item">文章RSS</a>
          </li>
          <li class="mdui-menu-item">
            <a href="<?php $this->options->commentsFeedUrl(); ?>" class="mdui-ripple footer-menu-item">评论RSS</a>
          </li>
        </ul>
      <?php endif; ?>
      <?php if ($this->options->appbar && in_array('showadmin', $this->options->appbar)): ?>
        <span class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple mdui-ripple-white" mdui-tooltip="{content: '管理后台'}" mdui-menu="{target: '#admin-menu'}"><i class="mdui-icon materiality-icons">&#xe916;</i></span>
        <ul class="mdui-menu" id="admin-menu">
          <?php if($this->user->hasLogin()): ?>
            <li class="mdui-menu-item">
              <a href="<?php $this->options->adminUrl(); ?>" class="mdui-ripple"><?php $this->user->screenName(); ?></a>
            </li>
            <li class="mdui-divider"></li>
            <li class="mdui-menu-item">
              <a href="<?php $this->options->logoutUrl(); ?>" class="mdui-ripple">退出</a>
            </li>
          <?php else: ?>
            <li class="mdui-menu-item">
              <a href="<?php $this->options->adminUrl('login.php'); ?>" class="mdui-ripple">登录</a>
            </li>
          <?php endif; ?>
        </ul>
      <?php endif; ?>
    </div>
  </header>
  <div class="mdui-drawer mdui-drawer-close" id="drawer">
    <div class="mdui-list" mdui-collapse="{accordion: true}">
      <div class="drawer-billboard drawer-item">
        <?php if ($this->options->avatar): ?>
          <a href="<?php $this->options->siteUrl(); ?>"><img class="drawer-logo <?php if ($this->options->drawer && in_array('borderradius', $this->options->drawer)): ?>border-radius<?php endif; ?>" src="<?php $this->options->avatar(); ?>" /></a>
        <?php endif; ?>
        <?php if ($this->options->description): ?>
          <div class="drawer-description"><?php $this->options->description(); ?></div>
        <?php endif; ?>
      </div>
      <?php if ($this->options->drawer && in_array('showsearch', $this->options->drawer)): ?>
        <form class="mdui-textfield mdui-textfield-floating-label drawer-search drawer-item" method="post" action="">
          <label class="mdui-textfield-label drawer-search-content">搜索</label>
          <input class="mdui-textfield-input" type="text" name="s" />
        </form>
      <?php endif; ?>
      <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
      <?php while ($pages->next()): ?>
        <div class="mdui-collapse-item drawer-item">
          <a href="<?php $pages->permalink(); ?>">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe902;</i>
              <div class="mdui-list-item-content"><?php $pages->title(); ?></div>
            </div>
          </a>
        </div>
      <?php endwhile; ?>
      <div class="mdui-divider drawer-item"></div>
      <?php if ($this->options->drawer && in_array('showcategory', $this->options->drawer)): ?>
        <div class="mdui-collapse-item drawer-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe901;</i>
            <div class="mdui-list-item-content">文章分类</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
            <?php while ($category->next()): ?>
              <a href="<?php $category->permalink(); ?>" class="mdui-list-item mdui-ripple"><?php $category->name(); ?></a>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->drawer && in_array('showposts', $this->options->drawer)): ?>
        <div class="mdui-collapse-item drawer-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe903;</i>
            <div class="mdui-list-item-content">最新文章</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Contents_Post_Recent')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple">{title}</a>'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->drawer && in_array('showcomments', $this->options->drawer)): ?>
        <div class="mdui-collapse-item drawer-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe904;</i>
            <div class="mdui-list-item-content">最新评论</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while ($comments->next()): ?>
              <a href="<?php $comments->permalink(); ?>" class="mdui-list-item mdui-ripple"><?php $comments->author(false); ?>: <?php $comments->excerpt(28, '...'); ?></a>
            <?php endwhile; ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->drawer && in_array('showarchives', $this->options->drawer)): ?>
        <div class="mdui-collapse-item drawer-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe905;</i>
            <div class="mdui-list-item-content">按月归档</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple">{date}</a>'); ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->drawer && in_array('showtags', $this->options->drawer)): ?>
        <div class="mdui-collapse-item drawer-item">
          <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe906;</i>
            <div class="mdui-list-item-content">常用标签</div>
            <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe908;</i>
          </div>
          <div class="mdui-collapse-item-body mdui-list">
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=5')->to($tags); ?>
            <?php if ($tags->have()): ?>
              <?php while ($tags->next()): ?>
                <a href="<?php $tags->permalink(); ?>" class="mdui-list-item mdui-ripple" mdui-tooltip="{content: '<?php $tags->count(); ?> 个话题'}"><?php $tags->name(); ?></a>
              <?php endwhile; ?>
            <?php else: ?>
              <a class="mdui-list-item mdui-ripple">没有任何标签</a>
            <?php endif; ?>
          </div>
        </div>
      <?php endif; ?>
      <?php if ($this->options->links): ?>
        <div class="mdui-collapse-item drawer-item">
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
    <div class="drawer-spacer drawer-item"></div>
    <div class="drawer-info drawer-item">
      <div class="header-icons">
        <?php if ($this->options->email): ?>
          <a class="site-info" href="mailto:<?php $this->options->email(); ?>" target="_blank">
            <button class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple" mdui-tooltip="{content: '邮箱'}"><i class="mdui-icon materiality-icons">&#xe90f;</i></button>
          </a>
        <?php endif; ?>
        <?php if ($this->options->github): ?>
          <a class="site-info" href="https://github.com/<?php $this->options->github(); ?>" target="_blank">
            <button class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple" mdui-tooltip="{content: 'GitHub'}"><i class="mdui-icon materiality-icons">&#xe910;</i></button>
          </a>
        <?php endif; ?>
        <?php if ($this->options->twitter): ?>
          <a class="site-info" href="https://twitter.com/<?php $this->options->twitter(); ?>" target="_blank">
            <button class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple" mdui-tooltip="{content: 'Twitter'}"><i class="mdui-icon materiality-icons">&#xe911;</i></button>
          </a>
        <?php endif; ?>
        <?php if ($this->options->facebook): ?>
          <a class="site-info" href="https://www.facebook.com/<?php $this->options->facebook(); ?>" target="_blank">
            <button class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple" mdui-tooltip="{content: 'Facebook'}"><i class="mdui-icon materiality-icons">&#xe912;</i></button>
          </a>
        <?php endif; ?>
        <?php if ($this->options->weibo): ?>
          <a class="site-info" href="<?php $this->options->weibo(); ?>" target="_blank">
            <button class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple" mdui-tooltip="{content: '微博'}"><i class="mdui-icon materiality-icons">&#xe913;</i></button>
          </a>
        <?php endif; ?>
        <?php if ($this->options->netease_music): ?>
          <a class="site-info" href="<?php $this->options->netease_music(); ?>" target="_blank">
            <button class="mdui-btn mdui-btn-icon mdui-btn-dense mdui-ripple" mdui-tooltip="{content: '网易云音乐'}"><i class="mdui-icon materiality-icons">&#xe914;</i></button>
          </a>
        <?php endif; ?>
      </div>
      <div class="header-copyright">
        <p class="site-info">Powered by <a class="site-info" href="http://typecho.org/" target="_blank">Typecho)))</a></p>
        <p class="site-info">Optimized by <a class="site-info" href="https://www.eaimty.com/" target="_blank">EAimTY</a></p>
        <?php if ($this->options->miibeian): ?>
          <p class="site-info"><a class="site-info" href="http://www.miibeian.gov.cn/" target="_blank"><?php $this->options->miibeian(); ?></a></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
