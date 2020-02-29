<?php
function themeInit($archive) {
  // 关闭评论反垃圾保护以兼容Pjax
  Helper::options()->commentsAntiSpam = false;

  // 关闭评论分页
  Helper::options()->commentsPageBreak = false;
}

// 获取随机文章
function getRandomPosts($random = 5) {
  $db = Typecho_Db::get();
  $adapterName = $db->getAdapterName();
  if ($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite') $order_by = 'RANDOM()';
  else $order_by = 'RAND()';
  $sql = $db->select()->from('table.contents')->where('status = ?', 'publish')->where('table.contents.created <= ?', time())->where('type = ?', 'post')->limit($random)->order($order_by);
  $result = $db->fetchAll($sql);
  if ($result) foreach ($result as $val){
    $obj = Typecho_Widget::widget('Widget_Abstract_Contents');
    $val = $obj->push($val);
    $post_title = htmlspecialchars($val['title']);
    $permalink = $val['permalink'];
    echo '<a class="mdui-typo-body-1 mdui-m-y-1" href="' . $permalink . '">' . $post_title . '</a><br />';
  }
}

// 解析友情链接数据
function getLinks($obj) {
  $links_arr = explode("\n", trim($obj));
  foreach ($links_arr as $link) {
    $link = explode(",", $link);
    foreach ($link as $seq => $val) $link[$seq] = substr(trim($val), 1, -1);
    $link[1] = str_replace("'", "\\'", $link[1]);
    $link[1] = str_replace("\"", "&quot;", $link[1]);
    echo '<a class="mdui-list-item mdui-ripple" target="_blank" rel="external friend noopener" href="' . $link[2] . (($link[1]) ? '" mdui-tooltip="{content: \'' . $link[1] . '\'}">' : '">') . $link[0] . '</a>';
  }
}

// 设置外观
function themeConfig($form) {
  $avatar = new Typecho_Widget_Helper_Form_Element_Text('avatar', NULL, NULL, _t('头像及站点LOGO'), _t('输入侧边栏头像及站点LOGO图片链接，不显示则留空'));
  $form->addInput($avatar);
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
  $links = new Typecho_Widget_Helper_Form_Element_Textarea('links', NULL, NULL, _t('友情链接'), _t('按照 <i>"友情链接名称", "站点描述", "友情链接URL"</i> 的格式输入友情链接，一条一行，例如：<br /><i>"EAimTY的博客", "一个没什么技术的开源爱好者，一个苦逼的学生狗。", "https://www.eaimty.com/"</i>'));
  $form->addInput($links);

  $appbar = new Typecho_Widget_Helper_Form_Element_Checkbox('appbar', array(
    'toggledark' => _t('显示暗色模式切换按钮'),
    'autodark' => _t('自动切换暗色模式（20:00~7:00）'),
    'showrss' => _t('显示RSS按钮'),
    'showadmin' => _t('显示管理后台按钮')
  ),
  array('toggledark', 'autodark', 'showrss', 'showadmin'), _t('应用栏选项'));
  $form->addInput($appbar->multiMode());

  $drawer = new Typecho_Widget_Helper_Form_Element_Checkbox('drawer', array(
    'hidedrawer' => _t('默认隐藏侧边栏'),
    'showsearch' => _t('显示搜索框'),
    'showcategory' => _t('显示文章分类'),
    'showposts' => _t('显示最新文章'),
    'showcomments' => _t('显示最新评论'),
    'showarchives' => _t('显示按月归档'),
    'showtags' => _t('显示常用标签')
  ),
  array('hidedrawer', 'showsearch', 'showcategory', 'showposts', 'showcomments', 'showarchives', 'showtags'), _t('侧边栏选项'));
  $form->addInput($drawer->multiMode());

  $articleinfo = new Typecho_Widget_Helper_Form_Element_Checkbox('articleinfo', array(
    'showauthor' => _t('显示作者'),
    'showcategory' => _t('显示分类'),
    'commentdisabed' => _t('显示“评论已关闭”')
  ),
  array('showauthor', 'showcategory', 'commentdisabed'), _t('文章信息选项'));
  $form->addInput($articleinfo->multiMode());

  $primarycolor = new Typecho_Widget_Helper_Form_Element_Select('primarycolor',array(
    'indigo' => 'Indigo',
    'red' => 'Red',
    'pink' => 'Pink',
    'purple' => 'Purple',
    'deep-purple' => 'Deep Purple',
    'blue' => 'Blue',
    'light-blue' => 'Light Blue',
    'cyan' => 'Cyan',
    'teal' => 'Teal',
    'green' => 'Green',
    'light-green' => 'Light Green',
    'lime' => 'Lime',
    'yellow' => 'Yellow',
    'amber' => 'Amber',
    'orange' => 'Orange',
    'deep-orange' => 'Deep Orange',
    'brown' => 'Brown',
    'grey' => 'Grey',
    'blue-grey' => 'Blue Grey'
  ),
  'indigo',
  _t('主题主色调'),
  _t('选择主题主色调'));
  $form->addInput($primarycolor->multiMode());
  $accentcolor = new Typecho_Widget_Helper_Form_Element_Select('accentcolor',array(
    'pink' => 'Pink',
    'red' => 'Red',
    'purple' => 'Purple',
    'deep-purple' => 'Deep Purple',
    'indigo' => 'Indigo',
    'blue' => 'Blue',
    'light-blue' => 'Light Blue',
    'cyan' => 'Cyan',
    'teal' => 'Teal',
    'green' => 'Green',
    'light-green' => 'Light Green',
    'lime' => 'Lime',
    'yellow' => 'Yellow',
    'amber' => 'Amber',
    'orange' => 'Orange',
    'deep-orange' => 'Deep Orange'
  ),
  'pink',
  _t('主题强调色'),
  _t('选择主题强调色'));
  $form->addInput($accentcolor->multiMode());
}
