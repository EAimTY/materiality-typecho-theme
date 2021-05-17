<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if ((!empty($this->options->appbar) && in_array('darkToggle', $this->options->appbar)) || (!empty($this->options->feature) && in_array('autoDark', $this->options->feature))): ?>
  <?php darkInit(!empty($this->options->feature) && in_array('autoDark', $this->options->feature), getColor($this->options->primaryColor)); ?>
<?php endif; ?>
<?php outputStart(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="renderer" content="webkit" />
    <meta charset="<?php $this->options->charset(); ?>" />
    <meta id="color_chrome" name="theme-color" content="#<?php echo isset($GLOBALS["dark"]) ? "212121" : getColor($this->options->primaryColor); ?>" />
    <meta id="color_safari" name="apple-mobile-web-app-status-bar-style" content="#<?php echo isset($GLOBALS["dark"]) ? "212121" : getColor($this->options->primaryColor); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/mdui.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/materiality.min.css'); ?>" />
    <?php if (!empty($this->options->feature) && in_array('highlight', $this->options->feature)): ?>
      <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('assets/css/highlight.min.css'); ?>" />
    <?php endif; ?>
    <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/mdui.min.js'); ?>"></script>
    <?php if (!empty($this->options->feature) && in_array('pjax', $this->options->feature)): ?>
      <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/pjax.min.js'); ?>" defer></script>
    <?php endif; ?>
    <?php if (!empty($this->options->feature) && in_array('lazyLoad', $this->options->feature)): ?>
      <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/lazysizes.min.js'); ?>" defer></script>
    <?php endif; ?>
    <?php if (!empty($this->options->feature) && in_array('smoothScroll', $this->options->feature)): ?>
      <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/smoothscroll.min.js'); ?>" defer></script>
    <?php endif; ?>
    <?php if (!empty($this->options->feature) && in_array('highlight', $this->options->feature)): ?>
      <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/highlight.min.js'); ?>" defer></script>
    <?php endif; ?>
    <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/materiality.min.js'); ?>" defer></script>
    <?php if ((!empty($this->options->appbar) && in_array('darkToggle', $this->options->appbar)) || (!empty($this->options->feature) && in_array('autoDark', $this->options->feature))): ?>
      <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/darkmode.min.js'); ?>" defer></script>
    <?php endif; ?>
    <?php if ($this->options->avatar): ?>
      <link rel="Shortcut Icon" href="<?php $this->options->avatar(); ?>" />
      <link rel="Bootmark" href="<?php $this->options->avatar(); ?>" />
    <?php endif; ?>
    <?php $this->header('commentReply=&antiSpam='); ?>
    <title><?php $this->archiveTitle([
        'category' => _t('分类 %s 下的文章'),
        'search'   => _t('包含关键字 %s 的文章'),
        'tag'      => _t('标签 %s 下的文章'),
        'author'   => _t('%s 发布的文章')
      ], '', ' - '); ?><?php $this->options->title(); ?></title>
  </head>
  <body class="<?php if (empty($this->options->drawer) || !in_array('hidden', $this->options->drawer)): ?>mdui-drawer-body-left <?php endif; ?> mdui-appbar-with-toolbar mdui-theme-primary-<?php $this->options->primaryColor(); ?> mdui-theme-accent-<?php $this->options->accentColor(); ?><?php if (isset($GLOBALS["dark"])): ?> mdui-theme-layout-dark<?php endif; ?>">
    <header class="mdui-appbar mdui-appbar-fixed">
      <div class="mdui-toolbar mdui-color-theme">
        <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#drawer', swipe: true}"><i class="mdui-icon materiality-icons">&#xe900;</i></span>
        <a href="<?php $this->options->siteUrl(); ?>" class="mdui-typo-headline"><?php $this->options->title(); ?></a>
        <div class="mdui-toolbar-spacer"></div>
        <?php if (!empty($this->options->appbar) && in_array('darkToggle', $this->options->appbar)): ?>
          <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" id="dark_toggle_btn" mdui-tooltip="{content: '<?php echo isset($GLOBALS["dark"]) ? "切换为亮色模式" : "切换为暗色模式"; ?>'}" onclick="toggle()"><i class="mdui-icon materiality-icons" id="dark_toggle_icon">&#xe901;</i></span>
        <?php endif; ?>
        <?php if (!empty($this->options->appbar) && in_array('rss', $this->options->appbar)): ?>
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
        <?php if (!empty($this->options->appbar) && in_array('admin', $this->options->appbar)): ?>
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
    <div class="mdui-drawer<?php if (!empty($this->options->drawer) && in_array('hidden', $this->options->drawer)): ?> mdui-drawer-close<?php endif; ?>" id="drawer">
      <div class="billboard">
        <a href="<?php $this->options->siteUrl(); ?>" class="logo mdui-m-y-2 mdui-m-l-2" style="background:url('<?php $this->options->avatar(); ?>');background-size:contain"></a>
        <div class="description mdui-m-x-2 mdui-text-color-white-text mdui-valign"><?php $this->options->description(); ?></div>
      </div>
      <div class="mdui-list" mdui-collapse="{accordion: true}">
        <?php if (!empty($this->options->drawer) && in_array('search', $this->options->drawer)): ?>
          <form class="mdui-p-t-0 mdui-m-x-2 mdui-textfield mdui-textfield-floating-label" method="post">
            <label class="mdui-textfield-label">搜索</label>
            <input class="mdui-textfield-input" type="text" autocomplete="new-password" name="s" />
          </form>
          <div class="mdui-divider"></div>
        <?php endif; ?>
        <?php if (!empty($this->options->drawer) && in_array('home', $this->options->drawer)): ?>
          <a href="<?php $this->options->siteUrl(); ?>" class="mdui-list-item mdui-ripple" id="home-url">
            <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe905;</i>
            <div class="mdui-list-item-content mdui-m-r-4">首页</div>
          </a>
        <?php endif; ?>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php if ($pages->have()): ?>
          <?php while ($pages->next()): ?>
            <a href="<?php $pages->permalink(); ?>" class="mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe906;</i>
              <div class="mdui-list-item-content mdui-m-r-4"><?php $pages->title(); ?></div>
            </a>
          <?php endwhile; ?>
          <div class="mdui-divider"></div>
        <?php endif; ?>
        <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
        <?php if ($categories->have() && !empty($this->options->drawer) && in_array('categories', $this->options->drawer)): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe907;</i>
              <div class="mdui-list-item-content">文章分类</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90d;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php while ($categories->next()): ?>
                <a href="<?php $categories->permalink(); ?>" class="mdui-list-item mdui-ripple" mdui-tooltip="{content: '<?php $categories->description(); ?>'}"><?php $categories->name(); ?></a>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php $this->widget('Widget_Contents_Post_Recent')->to($posts); ?>
        <?php if ($posts->have() && !empty($this->options->drawer) && in_array('posts', $this->options->drawer)): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe908;</i>
              <div class="mdui-list-item-content">最新文章</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90d;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php while ($posts->next()): ?>
                <a href="<?php $posts->permalink(); ?>" class="mdui-list-item mdui-ripple"><?php $posts->title(); ?></a>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php if ($comments->have() && !empty($this->options->drawer) && in_array('comments', $this->options->drawer)): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe909;</i>
              <div class="mdui-list-item-content">最新评论</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90d;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php while ($comments->next()): ?>
                <a href="<?php $comments->permalink(); ?>-anchor" class="mdui-list-item mdui-ripple" mdui-tooltip="{content: '发表于：《<?php $comments->title(); ?>》'}"><?php $comments->author(false); ?>: <?php $comments->excerpt(28, '...'); ?></a>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->to($archives); ?>
        <?php if ($archives->have() && !empty($this->options->drawer) && in_array('archives', $this->options->drawer)): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe90a;</i>
              <div class="mdui-list-item-content">按月归档</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90d;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php while ($archives->next()): ?>
                <a href="<?php $archives->permalink(); ?>" class="mdui-list-item mdui-ripple" mdui-tooltip="{content: '<?php $archives->count(); ?>篇文章'}"><?php $archives->date(); ?></a>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=count&ignoreZeroCount=1&desc=1&limit=10')->to($tags); ?>
        <?php if ($tags->have() && !empty($this->options->drawer) && in_array('tags', $this->options->drawer)): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe90b;</i>
              <div class="mdui-list-item-content">常用标签</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90d;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php while ($tags->next()): ?>
                <a href="<?php $tags->permalink(); ?>" class="mdui-list-item mdui-ripple" mdui-tooltip="{content: '<?php $tags->count(); ?>篇文章'}"><?php $tags->name(); ?></a>
              <?php endwhile; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($this->options->links): ?>
          <div class="mdui-collapse-item">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
              <i class="mdui-list-item-icon mdui-icon materiality-icons">&#xe90c;</i>
              <div class="mdui-list-item-content">友情链接</div>
              <i class="mdui-collapse-item-arrow mdui-icon materiality-icons">&#xe90d;</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
              <?php getLinks($this->options->links); ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?php if (!empty($this->options->feature) && in_array('pjax', $this->options->feature)): ?>
      <div class="load-indicator mdui-shadow-2 mdui-valign<?php if (isset($GLOBALS["dark"])): ?> load-indicator-dark<?php endif; ?>">
        <div class="mdui-spinner mdui-spinner-colorful mdui-center"></div>
      </div>
    <?php endif; ?>
    <div class="page-content">
      <div class="translate-box"></div>
      <div class="mdui-container" id="main">
        <div class="anchor" id="top"></div>
