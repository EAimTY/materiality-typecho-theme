<?php function threadedComments($comments, $options) {
  $commentClass = '';
  if ($comments->authorId) {
    if ($comments->authorId == $comments->ownerId) {
      $commentClass .= ' comment-by-author';
    } else {
      $commentClass .= ' comment-by-user';
    }
  }
  $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<!-- 评论 -->
<div id="<?php $comments->theId(); ?>" class="mdui-card mdui-shadow-3 mdui-m-y-3<?php if ($comments->levels > 0) { echo ' comment-child'; $comments->levelsAlt(' comment-level-odd', ' comment-level-even'); } else { echo ' comment-parent'; } $comments->alt(' comment-odd', ' comment-even'); echo $commentClass; ?>">
  <div class="mdui-card-header">
    <div class="mdui-card-header-avatar"><?php $comments->gravatar('40', ''); ?></div>
    <div class="mdui-card-header-title mdui-text-color-theme-accent"><?php $comments->author(); ?></div>
    <div class="mdui-card-header-subtitle"><?php $comments->date(); ?></div>
  </div>
  <div class="mdui-card-content mdui-typo"><?php $comments->content(); ?></div>
  <?php $comments->reply('<div class="mdui-card-actions"><button class="mdui-btn mdui-ripple mdui-text-color-theme-accent">回复</button></div>'); ?>
  <?php if ($comments->children) { ?>
    <div class="mdui-container">
      <?php $comments->threadedComments($options); ?>
    </div>
  <?php } ?>
</div>
<?php } ?>

<div id="comments">
  <?php $this->comments()->to($comments); ?>
  <?php if ($comments->have()): ?>
    <?php $comments->listComments(); ?>
  <?php endif; ?>

  <!-- 添加评论 -->
  <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="mdui-card mdui-shadow-3 mdui-m-y-3">
      <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
        <div class="mdui-card-header"><h2>添加新评论</h2></div>
        <div class="mdui-card-content">
          <?php if($this->user->hasLogin()): ?>
            <div class="mdui-chip mdui-typo">
              <span class="mdui-chip-title">登录身份: <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>&nbsp;&nbsp;<a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出</a></span>
            </div>
          <?php else: ?>
            <div class="mdui-textfield mdui-textfield-floating-label">
              <i class="mdui-icon materiality-icons">&#xe90f;</i>
              <label class="mdui-textfield-label">称呼</label>
              <input name="author" class="mdui-textfield-input" type="text" autocomplete="new-password" value="<?php $this->remember('author'); ?>" />
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
              <i class="mdui-icon materiality-icons">&#xe910;</i>
              <label class="mdui-textfield-label">Email</label>
              <input name="mail" class="mdui-textfield-input" type="email" autocomplete="new-password" value="<?php $this->remember('mail'); ?>" />
            </div>
            <div class="mdui-textfield mdui-textfield-floating-label">
              <i class="mdui-icon materiality-icons">&#xe90b;</i>
              <label class="mdui-textfield-label">网站</label>
              <input name="url" class="mdui-textfield-input" type="url" autocomplete="new-password" value="<?php $this->remember('url'); ?>" />
            </div>
          <?php endif; ?>
          <?php $comments->cancelReply('<div class="mdui-chip mdui-typo"><span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90e;</i></span><span class="mdui-chip-title mdui-text-color-theme-accent">取消回复</span></div>'); ?>
          <div class="mdui-textfield mdui-textfield-floating-label">
            <i class="mdui-icon materiality-icons">&#xe911;</i>
            <label class="mdui-textfield-label">内容</label>
            <textarea name="text" class="mdui-textfield-input" type="text"><?php $this->remember('text'); ?></textarea>
          </div>
        </div>
        <div class="mdui-card-actions">
          <button class="mdui-btn mdui-ripple mdui-text-color-theme-accent" type="submit">发表评论</button>
        </div>
      </form>
    </div>
  <?php endif; ?>

</div>
