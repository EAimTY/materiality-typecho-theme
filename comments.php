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
<div class="card-spacer"></div>
<div id="<?php $comments->theId(); ?>" class="mdui-card mdui-shadow-3<?php if ($comments->levels > 0) { echo ' comment-child'; $comments->levelsAlt(' comment-level-odd', ' comment-level-even'); } else { echo ' comment-parent'; } $comments->alt(' comment-odd', ' comment-even'); echo $commentClass; ?>">
  <div class="mdui-card-header">
    <div class="mdui-card-header-avatar"><?php $comments->gravatar('40', ''); ?></div>
    <div class="mdui-card-header-title"><?php $comments->author(); ?></div>
    <div class="mdui-card-header-subtitle"><?php $comments->date('Y-m-d H:i'); ?></div>
  </div>
  <div class="mdui-card-content"><?php $comments->content(); ?></div>
  <?php $comments->reply('<div class="mdui-card-actions"><button class="mdui-btn mdui-ripple">回复</button></div>'); ?>
  <?php if ($comments->children) { ?>
    <div class="mdui-container">
      <?php $comments->threadedComments($options); ?>
    </div>
  <?php } ?>
</div>
<div class="card-spacer"></div>
<?php } ?>
<div class="mdui-container">
  <div id="comments">
    <?php $this->comments()->to($comments); ?>
    <div class="mdui-chip">
      <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe904;</i></span>
      <span class="mdui-chip-title"><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), _t('已有 %d 条评论')); ?></span>
    </div>
    <?php if ($comments->have()): ?>
      <?php $comments->listComments(); ?>
    <?php endif; ?>
    <?php if($this->allow('comment')): ?>
      <div class="card-spacer"></div>
      <div id="<?php $this->respondId(); ?>" class="mdui-card mdui-shadow-3">
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
          <div class="mdui-card-header"><h2>添加新评论</h2></div>
          <div class="mdui-card-content">
            <?php if($this->user->hasLogin()): ?>
              <div class="mdui-chip">
                <span class="mdui-chip-title">登录身份: <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>&nbsp;&nbsp;<a href="<?php $this->options->logoutUrl(); ?>" title="Logout">退出</a></span>
              </div>
            <?php else: ?>
              <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">称呼</label>
                <input name="author" class="mdui-textfield-input" type="text" value="<?php $this->remember('author'); ?>" />
              </div>
              <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">Email</label>
                <input name="mail" class="mdui-textfield-input" type="email" value="<?php $this->remember('mail'); ?>" />
              </div>
              <div class="mdui-textfield mdui-textfield-floating-label">
                <label class="mdui-textfield-label">网站</label>
                <input name="url" class="mdui-textfield-input" type="url" value="<?php $this->remember('url'); ?>" />
              </div>
            <?php endif; ?>
            <?php $comments->cancelReply('<div class="mdui-chip"><span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90b;</i></span><span class="mdui-chip-title">取消回复</span></div>'); ?>
            <div class="mdui-textfield mdui-textfield-floating-label">
              <label class="mdui-textfield-label">内容</label>
              <textarea name="text" class="mdui-textfield-input" type="text" rows="8"><?php $this->remember('text'); ?></textarea>
            </div>
          </div>
          <div class="mdui-card-actions">
            <button class="mdui-btn mdui-ripple mdui-text-color-pink-accent" type="submit">发表评论</button>
          </div>
        </form>
      </div>
      <div class="card-spacer"></div>
    <?php else: ?>
      <div class="mdui-chip">
        <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90a;</i></span>
        <span class="mdui-chip-title">评论已关闭</span>
      </div>
    <?php endif; ?>
  </div>
</div>
