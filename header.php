<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="renderer" content="webkit" />

    <!-- Chrome 地址栏背景色 -->
    <meta id="theme-color" name="theme-color" content="#<?php
    $colorcode = array(
      'indigo'      => '3F51B5',
      'red'         => 'F44336',
      'pink'        => 'E91E63',
      'purple'      => '9C27B0',
      'deep-purple' => '673AB7',
      'blue'        => '2196F3',
      'light-blue'  => '03A9F4',
      'cyan'        => '00BCD4',
      'teal'        => '009688',
      'green'       => '4CAF50',
      'light-green' => '8BC34A',
      'lime'        => 'CDDC39',
      'yellow'      => 'FFEB3B',
      'amber'       => 'FFC107',
      'orange'      => 'FF9800',
      'deep-orange' => 'FF5722',
      'brown'       => '795548',
      'grey'        => '9E9E9E',
      'blue-grey'   => '607D8B'
    );
    $themecolor = $colorcode[Typecho_Widget::widget('Widget_Options')->primarycolor];
    echo $themecolor; ?>" />

    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('resources/mdui.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('resources/materiality.min.css'); ?>" />
    <script type="text/javascript" src="<?php $this->options->themeUrl('resources/mdui.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('resources/smoothscrolltop.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('resources/smoothscroll.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('resources/lazysizes.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php $this->options->themeUrl('resources/materiality.min.js'); ?>"></script>
    <?php if ($this->options->appbar && in_array('darkmode', $this->options->appbar)): ?>
      <script type="text/javascript" src="<?php $this->options->themeUrl('resources/darkmode.min.js'); ?>"></script>
    <?php endif; ?>
    <?php if ($this->options->avatar): ?>
      <link rel="Shortcut Icon" href="<?php $this->options->avatar(); ?>" />
      <link rel="Bootmark" href="<?php $this->options->avatar(); ?>" />
    <?php endif; ?>
    <?php $this->header(); ?>

    <title><?php $this->archiveTitle(array('category' => _t('分类 %s 下的文章'), 'search' => _t('包含关键字 %s 的文章'), 'tag' => _t('标签 %s 下的文章'), 'author' => _t('%s 发布的文章')), '', ' - '); ?><?php $this->options->title(); ?></title>
  </head>

  <body class="<?php if ($this->options->drawer && !in_array('hidedrawer', $this->options->drawer)): ?>mdui-drawer-body-left <?php endif; ?> mdui-appbar-with-toolbar mdui-theme-primary-<?php echo Typecho_Widget::widget('Widget_Options')->primarycolor; ?> mdui-theme-accent-<?php echo Typecho_Widget::widget('Widget_Options')->accentcolor; ?>">

    <!-- 应用栏 -->
    <header class="mdui-appbar mdui-appbar-fixed">
      <div class="mdui-toolbar mdui-color-theme">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon materiality-icons">&#xe900;</i></span>
        <a href="<?php $this->options->siteUrl(); ?>" class="mdui-typo-headline"><?php $this->options->title(); ?></a>
        <div class="mdui-toolbar-spacer"></div>

        <!-- 暗色模式切换 -->
        <?php if ($this->options->appbar && in_array('darkmode', $this->options->appbar)): ?>
          <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" onclick="toggletheme()"><i class="mdui-icon materiality-icons" id="theme-btn">&#xe901;</i></span>
        <?php endif; ?>

        <!-- RSS 按钮 -->
        <?php if ($this->options->appbar && in_array('showrss', $this->options->appbar)): ?>
          <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-tooltip="{content: 'RSS'}" mdui-menu="{target: '#rss'}"><i class="mdui-icon materiality-icons">&#xe903;</i></span>
          <ul class="mdui-menu" id="rss">
            <li class="mdui-menu-item">
              <a href="<?php $this->options->feedUrl(); ?>" class="mdui-ripple footer-menu-item">文章RSS</a>
            </li>
            <li class="mdui-menu-item">
              <a href="<?php $this->options->commentsFeedUrl(); ?>" class="mdui-ripple footer-menu-item">评论RSS</a>
            </li>
          </ul>
        <?php endif; ?>

        <!-- 管理菜单 -->
        <?php if ($this->options->appbar && in_array('showadmin', $this->options->appbar)): ?>
          <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-tooltip="{content: '管理后台'}" mdui-menu="{target: '#admin-menu'}"><i class="mdui-icon materiality-icons">&#xe904;</i></span>
          <ul class="mdui-menu" id="admin-menu">
            <?php if ($this->user->hasLogin()): ?>
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

    <!-- 抽屉式导航 -->
    <div class="mdui-drawer<?php if ($this->options->drawer && in_array('hidedrawer', $this->options->drawer)): ?> mdui-drawer-close<?php endif; ?>" id="drawer">

      <!-- 头像与简介 -->
      <div class="billboard">
        <a href="<?php $this->options->siteUrl(); ?>" class="logo mdui-m-y-2 mdui-m-l-2" style="background:url('<?php $this->options->avatar(); ?>');background-size:contain"></a>
        <div class="description mdui-m-x-2 mdui-text-color-white-text"><?php $this->options->description(); ?></div>
      </div>

      <div class="mdui-list" mdui-collapse="{accordion: true}">

        <!-- 搜索 -->
        <?php if ($this->options->drawer && in_array('showsearch', $this->options->drawer)): ?>
          <form class="mdui-p-t-0 mdui-m-x-2 mdui-textfield mdui-textfield-floating-label" method="post">
            <label class="mdui-textfield-label">搜索</label>
            <input class="mdui-textfield-input" type="text" autocomplete="new-password" name="s" />
          </form>
          <div class="mdui-divider"></div>
        <?php endif; ?>

        <!-- 独立页面 -->
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while ($pages->next()): ?>
          <a href="<?php $pages->permalink(); ?>" class="mdui-list-item mdui-ripple">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe905;</i>
            <div class="mdui-list-item-content mdui-m-r-4"><?php $pages->title(); ?></div>
          </a>
        <?php endwhile; ?>
        <div class="mdui-divider"></div>

        <!-- 菜单列表 -->
        <?php if ($this->options->drawer && in_array('showcategory', $this->options->drawer)): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe906;</i>
              <div class="mdui-list-item-content">文章分类</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90c;</i>
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
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe907;</i>
              <div class="mdui-list-item-content">最新文章</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90c;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php $this->widget('Widget_Contents_Post_Recent')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple">{title}</a>'); ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($this->options->drawer && in_array('showcomments', $this->options->drawer)): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe908;</i>
              <div class="mdui-list-item-content">最新评论</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90c;</i>
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
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe909;</i>
              <div class="mdui-list-item-content">按月归档</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90c;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->parse('<a href="{permalink}" class="mdui-list-item mdui-ripple">{date}</a>'); ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($this->options->drawer && in_array('showtags', $this->options->drawer)): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe90a;</i>
              <div class="mdui-list-item-content">常用标签</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90c;</i>
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
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe90b;</i>
              <div class="mdui-list-item-content">友情链接</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90c;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php getLinks($this->options->links); ?>
            </div>
          </div>
        <?php endif; ?>

      </div>
    </div>
    <div class="page-content">
