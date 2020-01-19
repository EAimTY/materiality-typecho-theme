  <footer class="mdui-color-theme">

    <!-- 页脚个人信息 -->
    <div class="footer-icons mdui-col-xs-3 mdui-valign">
      <div class="mdui-center">
        <?php if ($this->options->email): ?>
          <a href="mailto:<?php $this->options->email(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '邮箱'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe910;</i></a>
        <?php endif; ?>
        <?php if ($this->options->github): ?>
          <a href="https://github.com/<?php $this->options->github(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'GitHub'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe914;</i></a>
        <?php endif; ?>
        <?php if ($this->options->twitter): ?>
          <a href="https://twitter.com/<?php $this->options->twitter(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'Twitter'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe915;</i></a>
        <?php endif; ?>
        <?php if ($this->options->facebook): ?>
          <a href="https://www.facebook.com/<?php $this->options->facebook(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: 'Facebook'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe916;</i></a>
        <?php endif; ?>
        <?php if ($this->options->weibo): ?>
          <a href="<?php $this->options->weibo(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '微博'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe917;</i></a>
        <?php endif; ?>
        <?php if ($this->options->netease_music): ?>
          <a href="<?php $this->options->netease_music(); ?>" class="mdui-btn mdui-btn-icon mdui-ripple" mdui-tooltip="{content: '网易云音乐'}" target="_blank"><i class="mdui-icon materiality-icons">&#xe918;</i></a>
        <?php endif; ?>
      </div>
    </div>

    <!-- 页脚Copyright -->
    <div class="footer-copyright mdui-col-xs-6 mdui-valign">
      <div class="mdui-center">Copyright &copy; <?php echo date("Y"); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></div>
    </div>

    <!-- 页脚网站信息 -->
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

<!-- 返回顶部按钮 -->
<button class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-theme-accent mdui-fab-hide" id="scrolltop" onclick="window.scroll({ top: 0, left: 0, behavior: 'smooth' })"><i class="mdui-icon materiality-icons">&#xe919;</i></button>

</body>
<?php $this->footer(); ?>
</html>
