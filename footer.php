<div class="card-spacer"></div>
<?php if('atbottom'==Typecho_Widget::widget('Widget_Options')->footerlayout): ?>
  <footer id="footer" class="footer-area mdui-color-theme">
    <div class="footer-icons mdui-col-xs-4">
      <?php if ($this->options->email): ?>
        <a href="mailto:<?php $this->options->email(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '邮箱'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe912;</i></a>
      <?php endif; ?>
      <?php if ($this->options->github): ?>
        <a href="https://github.com/<?php $this->options->github(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'GitHub'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe913;</i></a>
      <?php endif; ?>
      <?php if ($this->options->twitter): ?>
        <a href="https://twitter.com/<?php $this->options->twitter(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'Twitter'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe914;</i></a>
      <?php endif; ?>
      <?php if ($this->options->facebook): ?>
        <a href="https://www.facebook.com/<?php $this->options->facebook(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'Facebook'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe915;</i></a>
      <?php endif; ?>
      <?php if ($this->options->weibo): ?>
        <a href="<?php $this->options->weibo(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '微博'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe916;</i></a>
      <?php endif; ?>
      <?php if ($this->options->netease_music): ?>
        <a href="<?php $this->options->netease_music(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '网易云音乐'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe917;</i></a>
      <?php endif; ?>
    </div>
    <div class="footer-copyright mdui-col-xs-4">
      Copyright &copy; <?php echo date("Y"); ?> <a class="footer-info" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
    </div>
    <div class="footer-credit mdui-col-xs-4">
      <div>Powered by <a class="footer-info" href="http://typecho.org/" target="_blank">Typecho)))</a></div>
      <div>Optimized by <a class="footer-info" href="https://www.eaimty.com/theme.html" target="_blank">EAimTY</a></div>
      <?php if ($this->options->miibeian): ?>
        <div><a class="footer-info" href="http://www.beian.miit.gov.cn/" target="_blank"><?php $this->options->miibeian(); ?></a></div>
      <?php endif; ?>
    </div>
  </footer>
<?php endif; ?>
<?php if ($this->options->footer && in_array('showscrolltop', $this->options->footer)): ?>
  <button class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent mdui-fab-hide" id="scrolltop"><i class="mdui-icon materiality-icons">&#xe918;</i></button>
<?php endif; ?>
</body>
<?php $this->footer(); ?>
</html>
