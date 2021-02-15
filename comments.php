<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
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
<div id="<?php $comments->theId(); ?>" class="mdui-card mdui-m-y-3<?php if ($comments->levels > 0) { echo ' comment-child'; $comments->levelsAlt(' comment-level-odd', ' comment-level-even'); } else { echo ' comment-parent'; } $comments->alt(' comment-odd', ' comment-even'); echo $commentClass; ?>">
  <div id="<?php $comments->theId(); ?>-anchor" class="anchor"></div>
  <div class="mdui-card-header">
    <div class="mdui-card-header-avatar"><img class="avatar" src="https://gravatar.loli.net/avatar/<?php echo md5($comments->mail); ?>?s=40&d=__DEFAULT__GRAVATAR__"></div>
    <div name="comment-author" class="mdui-card-header-title mdui-text-color-theme-accent"><?php $comments->author(); ?></div>
    <div class="mdui-card-header-subtitle"><?php $comments->date(); ?></div>
  </div>
  <div class="mdui-card-content mdui-typo"><?php $comments->content(); ?></div>
  <?php $comments->reply('<div class="mdui-card-actions" id="reply-' . $comments->theId . '"><button class="mdui-btn mdui-ripple mdui-text-color-theme-accent" onclick="replyComment(\'' . $comments->theId . '\')">回复</button></div>'); ?>
  <?php if ($comments->children): ?>
    <div class="mdui-container">
      <?php $comments->threadedComments($options); ?>
    </div>
  <?php endif; ?>
</div>
<?php } ?>
<div id="comments">
  <div class="mdui-hidden" id="respondid"><?php $this->respondId(); ?></div>
  <?php $this->comments()->to($comments); ?>
  <?php if ($comments->have()): ?>
    <?php ob_start(); ?>
    <?php $comments->listComments(['before' => '', 'after' => '']); ?>
    <?php $commentsHTML = ob_get_contents(); ?>
    <?php ob_end_clean(); ?>
    <?php echo str_replace('__DEFAULT__GRAVATAR__', $this->options->defaultGravatar, $commentsHTML); ?>
  <?php endif; ?>
  <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>">
      <div class="mdui-card mdui-m-y-3">
        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
          <div class="mdui-card-header"><h2>添加新评论</h2></div>
          <div class="mdui-card-content">
            <?php $comments->cancelReply('<button class="mdui-btn mdui-ripple mdui-text-color-theme-accent" onclick="cancelReply()">取消回复</button>'); ?>
            <?php if($this->user->hasLogin()): ?>
              <div class="mdui-chip">
                <span class="mdui-chip-title">登录身份: <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>&nbsp;&nbsp;<a href="<?php $this->options->logoutUrl(); ?>" class="mdui-text-color-theme-accent">退出</a></span>
              </div>
            <?php else: ?>
              <div class="mdui-textfield mdui-textfield-floating-label">
                <i class="mdui-icon materiality-icons">&#xe910;</i>
                <label class="mdui-textfield-label">称呼</label>
                <input name="author" class="mdui-textfield-input" type="text" autocomplete="new-password" value="<?php $this->remember('author'); ?>" required />
                <div class="mdui-textfield-error">请填写称呼</div>
              </div>
              <div class="mdui-textfield mdui-textfield-floating-label">
                <i class="mdui-icon materiality-icons">&#xe911;</i>
                <label class="mdui-textfield-label">E-mail</label>
                <input name="mail" class="mdui-textfield-input" type="email" autocomplete="new-password" value="<?php $this->remember('mail'); ?>" required />
                <div class="mdui-textfield-error">请填写合法的电子邮箱地址</div>
              </div>
              <div class="mdui-textfield mdui-textfield-floating-label">
                <i class="mdui-icon materiality-icons">&#xe90c;</i>
                <label class="mdui-textfield-label">网站</label>
                <input name="url" class="mdui-textfield-input" type="url" autocomplete="new-password" value="<?php $this->remember('url'); ?>" />
                <div class="mdui-textfield-error">请填写合法的网站地址</div>
              </div>
            <?php endif; ?>
            <div class="mdui-textfield mdui-textfield-floating-label">
              <i class="mdui-icon materiality-icons">&#xe912;</i>
              <label class="mdui-textfield-label">内容</label>
              <textarea name="text" class="mdui-textfield-input" type="text" required><?php $this->remember('text'); ?></textarea>
              <div class="mdui-textfield-error">请填写内容</div>
            </div>
          </div>
          <div class="mdui-card-actions">
            <button class="mdui-btn mdui-ripple mdui-text-color-theme-accent" type="submit">发表评论</button>
          </div>
        </form>
      </div>
    </div>
  <?php elseif (!$this->allow('comment') && !empty($this->options->article) && in_array('comment_disabled', $this->options->article)): ?>
    <div class="mdui-chip mdui-m-b-2">
      <span class="mdui-chip-icon"><i class="mdui-icon materiality-icons">&#xe90f;</i></span>
      <span class="mdui-chip-title">评论已关闭</span>
    </div>
  <?php endif; ?>
</div>
