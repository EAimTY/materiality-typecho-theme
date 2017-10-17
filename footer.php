<div class="card-spacer"></div>
<?php if ($this->options->footer && in_array('showscrolltop', $this->options->footer)): ?>
  <button class="mdui-fab mdui-fab-fixed mdui-ripple mdui-color-pink-accent mdui-fab-hide" id="scrolltop"><i class="mdui-icon materiality-icons">&#xe915;</i></button>
<?php endif; ?>
</body>
<?php $this->footer(); ?>
</html>
