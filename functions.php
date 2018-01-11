<?php
function themeConfig($form) {
  $avatar = new Typecho_Widget_Helper_Form_Element_Text('avatar', NULL, NULL, _t('头像及站点LOGO'), _t('输入侧边栏头像及站点LOGO图片链接，不显示则留空'));
  $form->addInput($avatar);
  $description = new Typecho_Widget_Helper_Form_Element_Text('description', NULL, NULL, _t('侧边栏展示文字'), _t('输入侧边栏展示文字，最多显示56字符，不显示则留空'));
  $form->addInput($description);
  $email = new Typecho_Widget_Helper_Form_Element_Text('email', NULL, NULL, _t('邮箱'), _t('输入联系邮箱，不显示则留空'));
  $form->addInput($email);
  $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('GitHub'), _t('输入GitHub用户名，不显示则留空'));
  $form->addInput($github);
  $twitter = new Typecho_Widget_Helper_Form_Element_Text('twitter', NULL, NULL, _t('Twitter'), _t('输入Twitter用户名，不显示则留空'));
  $form->addInput($twitter);
  $facebook = new Typecho_Widget_Helper_Form_Element_Text('facebook', NULL, NULL, _t('FaceBook'), _t('输入FaceBook用户名，不显示则留空'));
  $form->addInput($facebook);
  $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, NULL, _t('微博'), _t('输入微博用户页链接地址，不显示则留空'));
  $form->addInput($weibo);
  $netease_music = new Typecho_Widget_Helper_Form_Element_Text('netease_music', NULL, NULL, _t('网易云音乐'), _t('输入网易云音乐用户链接地址，不显示则留空'));
  $form->addInput($netease_music);
  $miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, NULL, _t('备案号'), _t('输入备案号，不显示则留空'));
  $form->addInput($miibeian);
  $links = new Typecho_Widget_Helper_Form_Element_Textarea('links', NULL, NULL, _t('友情链接代码'), _t('按照 <i>&lt;a href="友情链接URL" class="mdui-list-item mdui-ripple drawer-list-item" target="_blank"&gt;友情链接名称&lt;/a&gt;</i> 的格式输入友情链接，一条一行'));
  $form->addInput($links);
  $appbar = new Typecho_Widget_Helper_Form_Element_Checkbox('appbar', array(
    'showrss' => _t('显示RSS'),
    'showadmin' => _t('显示管理后台按钮'),
  ),
  array('showrss', 'showadmin'), _t('应用栏选项'));
  $form->addInput($appbar->multiMode());
  $drawer = new Typecho_Widget_Helper_Form_Element_Checkbox('drawer', array(
    'hidedrawer' => _t('默认隐藏侧边栏'),
    'borderradius' => _t('显示侧边栏Logo为圆形'),
    'showsearch' => _t('显示搜索框'),
    'showcategory' => _t('显示文章分类'),
    'showposts' => _t('显示最新文章'),
    'showcomments' => _t('显示最新评论'),
    'showarchives' => _t('显示按月归档'),
    'showtags' => _t('显示常用标签'),
  ),
  array('hidedrawer', 'borderradius', 'showsearch', 'showcategory', 'showposts', 'showcomments', 'showarchives', 'showtags', 'showlinks'), _t('侧边栏选项'));
  $form->addInput($drawer->multiMode());
  $footer = new Typecho_Widget_Helper_Form_Element_Checkbox('footer', array(
    'showscrolltop' => _t('显示返回顶部按钮'),
  ),
  array('showscrolltop'), _t('页脚选项'));
  $form->addInput($footer->multiMode());
}
