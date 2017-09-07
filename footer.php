<div class="card-spacer"></div>
<footer class="mdui-container-fluid footer-nav mdui-color-theme">
  <div class="footer-area footer-left mdui-col-sm-4">
    <div class="footer-icons">
      <?php if ($this->options->footer && in_array('showrss', $this->options->footer)): ?>
        <button class="mdui-text-color-white mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'RSS'}" mdui-menu="{target: '#rss'}"><i class="mdui-icon materiality-icons">&#xe90e;</i></button>
        <ul class="mdui-menu" id="rss">
          <li class="mdui-menu-item">
            <a href="<?php $this->options->feedUrl(); ?>" class="mdui-ripple footer-menu-item">文章RSS</a>
          </li>
          <li class="mdui-menu-item">
            <a href="<?php $this->options->commentsFeedUrl(); ?>" class="mdui-ripple footer-menu-item">评论RSS</a>
          </li>
        </ul>
      <?php endif; ?>
      <?php if ($this->options->email): ?>
        <a href="mailto:<?php $this->options->email(); ?>" target="_blank">
          <button class="mdui-text-color-white mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '邮箱'}"><i class="mdui-icon materiality-icons">&#xe90f;</i></button>
        </a>
      <?php endif; ?>
      <?php if ($this->options->github): ?>
        <a href="https://github.com/<?php $this->options->github(); ?>" target="_blank">
          <button class="mdui-text-color-white mdui-btn mdui-btn-icon mdui-ripple icons" mdui-tooltip="{content: 'GitHub'}"><i class="mdui-icon materiality-icons">&#xe910;</i></button>
        </a>
      <?php endif; ?>
      <?php if ($this->options->twitter): ?>
        <a href="https://twitter.com/<?php $this->options->twitter(); ?>" target="_blank">
          <button class="mdui-text-color-white mdui-btn mdui-btn-icon mdui-ripple icons" mdui-tooltip="{content: 'Twitter'}"><i class="mdui-icon materiality-icons">&#xe911;</i></button>
        </a>
      <?php endif; ?>
      <?php if ($this->options->facebook): ?>
        <a href="https://www.facebook.com/<?php $this->options->facebook(); ?>" target="_blank">
          <button class="mdui-text-color-white mdui-btn mdui-btn-icon mdui-ripple icons" mdui-tooltip="{content: 'Facebook'}"><i class="mdui-icon materiality-icons">&#xe912;</i></button>
        </a>
      <?php endif; ?>
      <?php if ($this->options->weibo): ?>
        <a href="<?php $this->options->weibo(); ?>" target="_blank">
          <button class="mdui-text-color-white mdui-btn mdui-btn-icon mdui-ripple icons" mdui-tooltip="{content: '微博'}"><i class="mdui-icon materiality-icons">&#xe913;</i></button>
        </a>
      <?php endif; ?>
      <?php if ($this->options->netease_music): ?>
        <a href="<?php $this->options->netease_music(); ?>" target="_blank">
          <button class="mdui-text-color-white mdui-btn mdui-btn-icon mdui-ripple icons" mdui-tooltip="{content: '网易云音乐'}"><i class="mdui-icon materiality-icons">&#xe914;</i></button>
        </a>
      <?php endif; ?>
    </div>
  </div>
  <div class="footer-area footer-center mdui-col-sm-4">
    <div class="footer-copyright">
      Copyright &copy; <?php echo date("Y"); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
    </div>
  </div>
  <div class="footer-area footer-right mdui-col-sm-4">
    <div class="footer-credit">
      <div>Powered by <a href="http://typecho.org/" target="_blank">Typecho)))</a></div>
      <div>Optimized by <a href="https://www.eaimty.com/" target="_blank">EAimTY</a></div>
      <?php if ($this->options->miibeian): ?>
        <div><a href="http://www.miibeian.gov.cn/" target="_blank"><?php $this->options->miibeian(); ?></a></div>
      <?php endif; ?>
    </div>
  </div>
</footer>
<?php if ($this->options->footer && in_array('showscrolltop', $this->options->footer)): ?>
  <button class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-pink-accent mdui-fab-hide" id="scrolltop"><i class="mdui-icon materiality-icons">&#xe915;</i></button>
<?php endif; ?>
</body>
<?php $this->footer(); ?>
</html>
