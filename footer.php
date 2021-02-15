<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
  </div>
  <footer<?php if (isset($GLOBALS["dark"])): ?> class="mdui-color-theme"<?php endif; ?>>
    <div class="footer-icons mdui-col-xs-3 mdui-valign">
      <div class="mdui-center">
        <?php if ($this->options->email): ?>
          <a href="mailto:<?php $this->options->email(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '邮箱'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe911;</i></a>
        <?php endif; ?>
        <?php if ($this->options->github): ?>
          <a href="https://github.com/<?php $this->options->github(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'GitHub'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe915;</i></a>
        <?php endif; ?>
        <?php if ($this->options->twitter): ?>
          <a href="https://twitter.com/<?php $this->options->twitter(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'Twitter'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe916;</i></a>
        <?php endif; ?>
        <?php if ($this->options->facebook): ?>
          <a href="https://www.facebook.com/<?php $this->options->facebook(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'Facebook'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe917;</i></a>
        <?php endif; ?>
        <?php if ($this->options->weibo): ?>
          <a href="<?php $this->options->weibo(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '微博'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe918;</i></a>
        <?php endif; ?>
        <?php if ($this->options->netease_music): ?>
          <a href="<?php $this->options->netease_music(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '网易云音乐'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe919;</i></a>
        <?php endif; ?>
      </div>
    </div>
    <div class="footer-copyright mdui-col-xs-6 mdui-valign">
      <div class="mdui-center">Copyright &copy; <?php echo date("Y"); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></div>
    </div>
    <div class="footer-credit mdui-col-xs-3 mdui-valign">
      <div class="mdui-center">
        <div>Powered by <a href="http://typecho.org/" target="_blank">Typecho)))</a></div>
        <div>and Theme <a href="https://www.eaimty.com/theme.html" target="_blank">materiality</a></div>
        <?php if ($this->options->miibeian): ?>
          <div><a href="http://www.beian.miit.gov.cn/" target="_blank"><?php $this->options->miibeian(); ?></a></div>
        <?php endif; ?>
      </div>
    </div>
  </footer>
</div>
<a class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent mdui-fab-hide" id="scrolltop" href="#top"><i class="mdui-icon materiality-icons">&#xe91a;</i></a>
</body>
<?php $this->footer(); ?>
</html>
<?php outputEnd(!empty($this->options->feature) && in_array('pangu', $this->options->feature), !empty($this->options->feature) && in_array('lazyLoad', $this->options->feature)); ?>
