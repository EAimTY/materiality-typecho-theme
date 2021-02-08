<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function getColor($color) {
  $code = [
    'indigo'      => '3F51B5',
    'red'         => 'F44336',
    'pink'        => 'E91E63',
    'purple'      => '9C27B0',
    'deep-purple' => '673AB7',
    'blue'        => '2196F3',
    'light-blue'  => '03A9F4',
    'cyan'        => '00BCD4',
    'teal'        => '009688',
    'green'       => '4CAF50',
    'light-green' => '8BC34A',
    'lime'        => 'CDDC39',
    'yellow'      => 'FFEB3B',
    'amber'       => 'FFC107',
    'orange'      => 'FF9800',
    'deep-orange' => 'FF5722',
    'brown'       => '795548',
    'grey'        => '9E9E9E',
    'blue-grey'   => '607D8B'
  ];
  return $code[$color];
}

function darkInit($autoDark, $color) {
  setcookie("THEME_COLOR", $color, time() + 604800, "/");
  if ($autoDark) {
    setcookie("AUTO_DARK", "1", time() + 604800, "/");
  } else {
    setcookie("AUTO_DARK", "", time() - 604800, "/");
  }
  if (!isset($_COOKIE["DARK_EXPIRE"])) {
    setcookie("DARK_EXPIRE", "0", time() + 604800, "/");
  }
  if ($_COOKIE["DARK_STATUS"] ?? 0) {
    $GLOBALS["dark"] = 1;
  }
}

function createIndex($obj) {
  $GLOBALS["indexCount"] = 0;
  $obj = preg_replace_callback('/<h([1-6])(.*?)>(.*?)<\/h\1>/i', function($obj) {
    $GLOBALS["indexCount"]++;
    $GLOBALS["index"][] = ["text" => trim(strip_tags($obj[3])), "depth" => $obj[1], "count" => $GLOBALS["indexCount"]];
    return '<h' . $obj[1] . $obj[2] . '><div class="anchor" id="' . $GLOBALS["indexCount"] . '-anchor"></div>' . $obj[3] . '</h' . $obj[1] . '>';
  }, $obj);
  return $obj;
}

function getIndex() {
  if ($GLOBALS["index"]) {
    $index = '<ul class="index mdui-text-color-theme-accent">' . "\n";
    $current = 0;
    foreach ($GLOBALS["index"] as $item) {
      $indexDepth = $item["depth"];
      if (isset($parent)) {
        if ($indexDepth == $parent) {
          $index .= '</li>' . "\n";
        } elseif ($indexDepth > $parent) {
          $current++;
          $index .= '<ul>' . "\n";
        } else {
          $child = ($current > ($parent - $indexDepth)) ? ($parent - $indexDepth) : $current;
          if ($child) {
            for ($i = 0; $i < $child; $i++) {
              $index .= '</li>' . "\n" . '</ul>' . "\n";
              $current--;
            }
          }
          $index .= '</li>';
        }
      }
      $index .= '<li><a href="#' . $item["count"] . '-anchor">' . $item["text"] . '</a>';
      $parent = $item["depth"];
    }
    for ($i = 0; $i <= $current; $i++) {
      $index .= '</li>' . "\n" . '</ul>' . "\n";
    }
    echo $index;
  }
}

function getRandomPosts($num) {
  $db = Typecho_Db::get();
  $adapterName = $db->getAdapterName();
  if ($adapterName == 'pgsql' || $adapterName == 'Pdo_Pgsql' || $adapterName == 'Pdo_SQLite' || $adapterName == 'SQLite') {
    $orderBy = 'RANDOM()';
  } else {
    $orderBy = 'RAND()';
  }
  $sql = $db->select()->from('table.contents')->where('status = ?', 'publish')->where('table.contents.created <= ?', time())->where('type = ?', 'post')->limit($num)->order($orderBy);
  $result = $db->fetchAll($sql);
  if ($result) {
    foreach ($result as $val) {
      $obj = Typecho_Widget::widget('Widget_Abstract_Contents');
      $val = $obj->push($val);
      $title = htmlspecialchars($val['title']);
      $permalink = $val['permalink'];
      echo '<a class="mdui-typo-body-1 mdui-m-y-1" href="' . $permalink . '">' . $title . '</a><br />';
    }
  }
}

function getLinks($obj) {
  $links_arr = explode("\n", trim($obj));
  foreach ($links_arr as $link) {
    $link = explode("\", \"", substr(trim($link), 1, -1));
    $link[1] = str_replace("\"", "&quot;", str_replace("'", "\\'", $link[1]));
    echo '<a class="mdui-list-item mdui-ripple" target="_blank" rel="external friend noopener" href="' . $link[2] . (($link[1]) ? '" mdui-tooltip="{content: \'' . $link[1] . '\'}">' : '">') . $link[0] . '</a>' . "\n";
  }
}

function pangu($text) {
  $cjk = '' .
         '\x{2e80}-\x{2eff}' .
         '\x{2f00}-\x{2fdf}' .
         '\x{3040}-\x{309f}' .
         '\x{30a0}-\x{30ff}' .
         '\x{3100}-\x{312f}' .
         '\x{3200}-\x{32ff}' .
         '\x{3400}-\x{4dbf}' .
         '\x{4e00}-\x{9fff}' .
         '\x{f900}-\x{faff}';
  $patterns = array(
    'cjk_quote' => array(
      '([' . $cjk . '])(["\'])',
      '$1 $2'
    ),
    'quote_cjk' => array(
      '(["\'])([' . $cjk . '])',
      '$1 $2'
    ),
    'fix_quote' => array(
      '(["\']+)(\s*)(.+?)(\s*)(["\']+)',
      '$1$3$5'
    ),
    'cjk_hash' => array(
      '([' . $cjk . '])(#(\S+))',
      '$1 $2'
    ),
    'hash_cjk' => array(
      '((\S+)#)([' . $cjk . '])',
      '$1 $3'
    ),
    'cjk_operator_ans' => array(
      '([' . $cjk . '])([A-Za-zΑ-Ωα-ω0-9])([\+\-\*\/=&\\|<>])',
      '$1 $2 $3'
    ),
    'ans_operator_cjk' => array(
      '([\+\-\*\/=&\\|<>])([A-Za-zΑ-Ωα-ω0-9])([' . $cjk . '])',
      '$1 $2 $3'
    ),
    'bracket' => array(
      array(
        '([' . $cjk . '])([<\[\{\(]+(.*?)[>\]\}\)]+)([' . $cjk . '])',
        '$1 $2 $4'
      ),
      array(
        'cjk_bracket' => array(
          '([' . $cjk . '])([<>\[\]\{\}\(\)])',
          '$1 $2'
        ),
        'bracket_cjk' => array(
          '([<>\[\]\{\}\(\)])([' . $cjk . '])',
          '$1 $2'
        )
      )
    ),
    'fix_bracket' => array(
      '([<\[\{\(]+)(\s*)(.+?)(\s*)([>\]\}\)]+)',
      '$1$3$5'
    ),
    'cjk_ans' => array(
      '([' . $cjk . '])([A-Za-zΑ-Ωα-ω0-9`@&%\=\$\^\*\-\+\\/|\\\])',
      '$1 $2'
    ),
    'ans_cjk' => array(
      '([A-Za-zΑ-Ωα-ω0-9`~!%&=;\|\,\.\:\?\$\^\*\-\+\/\\\])([' . $cjk . '])',
      '$1 $2'
    )
  );
  foreach ($patterns as $key => $value) {
    if ($key === 'bracket') {
      $old = $text;
      $new = preg_replace('/' . $value[0][0] . '/iu', $value[0][1], $text);
      $text = $new;
      if ($old === $new) {
        foreach ($value[1] as $val) {
          $text = preg_replace('/' . $val[0] . '/iu', $val[1], $text);
        }
      }
      continue;
    }
    $text = preg_replace('/' . $value[0] . '/iu', $value[1], $text);
  }
  return $text;
}

function getPageNav($pageNavHTML, $total) {
  $pageNavDOM = new DOMDocument();
  @$pageNavDOM->loadHTML($pageNavHTML);
  foreach ($pageNavDOM->getElementsByTagName('a') as $node) {
    $node->setAttribute("class", ($node->getAttribute('class') ? ($node->getAttribute('class') . " ") : "") . "mdui-btn mdui-ripple mdui-text-color-theme-accent");
  }
  foreach ($pageNavDOM->getElementsByTagName('span') as $node) {
    $node->setAttribute("class", "mdui-btn mdui-ripple mdui-text-color-theme-accent");
    $node->setAttribute("mdui-tooltip", "{content: '共有 " . $total . " 篇文章'}");
  }
  echo $pageNavDOM->saveHtml();
}

function outputStart() {
  ob_end_clean();
  ob_start();
}

function outputEnd($pangu, $lazyLoad) {
  $output = ob_get_contents();
  ob_end_clean();
  if ($lazyLoad) {
    $dom = new DOMDocument();
    @$dom->loadHTML($output);
    foreach ($dom->getElementsByTagName('img') as $node) {
      $node->setAttribute("class", ($node->getAttribute('class') ? ($node->getAttribute('class') . " ") : "") . "lazyload");
      $node->setAttribute("data-src", $node->getAttribute('src'));
      $node->removeAttribute("src");
    }
    $output = $dom->saveHtml();
  }
  if ($pangu) {
    $output = preg_split('/(<pangu.*?\/pangu>)/msi', $output, NULL, PREG_SPLIT_DELIM_CAPTURE);
    foreach ($output as $splitKey => $splitValue) {
      if (substr_compare($splitValue, '<pangu>', 0, 7) == 0) {
        $splitValue = preg_split('/(<nopangu.*?\/nopangu>|<pre.*?\/pre>|<code.*?\/code>|<textarea.*?\/textarea>)/msi', substr($splitValue, 7, -8), NULL, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($splitValue as $exceptKey => $exceptValue) {
          if (
            substr_compare($exceptValue, '<nopangu', 0, 8) !== 0 &&
            substr_compare($exceptValue, '<pre', 0, 4) !== 0 &&
            substr_compare($exceptValue, '<code', 0, 5) !== 0 &&
            substr_compare($exceptValue, '<textarea', 0, 9) !== 0
          ) {
            $exceptValue = pangu($exceptValue);
          }
          $splitValue[$exceptKey] = $exceptValue;
        }
        $splitValue = implode('', $splitValue);
      }
      $output[$splitKey] = $splitValue;
    }
    $output = implode('', $output);
  }
  echo $output;
}

function themeInit($archive) {
  Helper::options()->commentsAntiSpam = false;
  Helper::options()->commentsPageBreak = false;
  if ($archive->is("single")) {
    $archive->content = createIndex($archive->content);
  }
}

function themeFields($layout) {
  if (strpos($_SERVER["PHP_SELF"], "write-post.php") !== false) {
    $index = new Typecho_Widget_Helper_Form_Element_Select('index', ['show' => '显示', 'hide' => '不显示'], 'show', _t('显示目录'), _t('是否在文章顶部显示目录？'));
    $layout->addItem($index);
    $tags = new Typecho_Widget_Helper_Form_Element_Select('tags', ['show' => '显示', 'hide' => '不显示'], 'show', _t('显示标签'), _t('是否在文章底部显示标签？'));
    $layout->addItem($tags);
  } else {
    $index = new Typecho_Widget_Helper_Form_Element_Select('index', ['show' => '显示', 'hide' => '不显示'], 'show', _t('显示目录'), _t('是否在页面顶部显示目录？'));
    $layout->addItem($index);
  }
}

function themeConfig($cfg) {
  $avatar = new Typecho_Widget_Helper_Form_Element_Text('avatar', NULL, NULL, _t('头像及站点 LOGO'), _t('输入侧边栏头像及站点 LOGO 图片链接，不显示则留空'));
  $cfg->addInput($avatar);

  $email = new Typecho_Widget_Helper_Form_Element_Text('email', NULL, NULL, _t('邮箱'), _t('输入联系邮箱，不显示则留空'));
  $cfg->addInput($email);

  $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('GitHub'), _t('输入 GitHub 用户名，不显示则留空'));
  $cfg->addInput($github);

  $twitter = new Typecho_Widget_Helper_Form_Element_Text('twitter', NULL, NULL, _t('Twitter'), _t('输入 Twitter 用户名，不显示则留空'));
  $cfg->addInput($twitter);

  $facebook = new Typecho_Widget_Helper_Form_Element_Text('facebook', NULL, NULL, _t('FaceBook'), _t('输入 FaceBook 用户名，不显示则留空'));
  $cfg->addInput($facebook);

  $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, NULL, _t('微博'), _t('输入微博用户页链接地址，不显示则留空'));
  $cfg->addInput($weibo);

  $netease_music = new Typecho_Widget_Helper_Form_Element_Text('netease_music', NULL, NULL, _t('网易云音乐'), _t('输入网易云音乐用户链接地址，不显示则留空'));
  $cfg->addInput($netease_music);

  $miibeian = new Typecho_Widget_Helper_Form_Element_Text('miibeian', NULL, NULL, _t('备案号'), _t('输入备案号，不显示则留空'));
  $cfg->addInput($miibeian);

  $links = new Typecho_Widget_Helper_Form_Element_Textarea('links', NULL, NULL, _t('友情链接'), _t('按照 <i>"友情链接名称", "站点描述", "友情链接 URL"</i> 的格式输入友情链接（请注意逗号后的空格），一条一行，例如：<br /><i>"EAimTY 的博客", "一个没什么技术的开源爱好者，一个苦逼的学生狗。", "https://www.eaimty.com/"</i>'));
  $cfg->addInput($links);

  $feature = new Typecho_Widget_Helper_Form_Element_Checkbox('feature', [
    'autoDark' => _t('根据访问者时间（20:00~7:00）与访问者系统全局暗色模式状态自动切换至暗色模式'),
    'pangu' => _t('在文章内容中的中文与西文、中文与数字间自动插入空格'),
    'pjax' => _t('启用 Pjax 无刷新加载页面'),
    'lazyLoad' => _t('延迟加载图片（在页面中其它内容加载完毕后再加载图片，能够优化多图片页面的加载速度）'),
    'highlight' => _t('启用代码高亮着色，请务必参阅 <a href="https://github.com/EAimTY/materiality-typecho-theme#配置代码高亮">配置代码高亮</a>'),
    'smoothScroll' => _t('启用惯性滚动（将改善页面滚动时的体验，但可能会造成页面滚动时轻微掉帧）')
  ], ['autoDark', 'pjax', 'smoothScroll'], _t('主题功能设置'));
  $cfg->addInput($feature->multiMode());

  $appbar = new Typecho_Widget_Helper_Form_Element_Checkbox('appbar', [
    'darkToggle' => _t('显示暗色模式切换按钮'),
    'rss' => _t('显示RSS按钮'),
    'admin' => _t('显示管理后台按钮')
  ], ['darkToggle', 'rss'], _t('顶栏设置'));
  $cfg->addInput($appbar->multiMode());

  $drawer = new Typecho_Widget_Helper_Form_Element_Checkbox('drawer', [
    'hidden' => _t('默认隐藏侧边栏'),
    'search' => _t('显示搜索框'),
    'home' => _t('显示首页'),
    'categories' => _t('显示文章分类'),
    'posts' => _t('显示最新文章'),
    'comments' => _t('显示最新评论'),
    'archives' => _t('显示按月归档'),
    'tags' => _t('显示常用标签')
  ], ['search', 'home', 'categories', 'posts', 'comments', 'archives', 'tags'], _t('侧边栏设置'));
  $cfg->addInput($drawer->multiMode());

  $article = new Typecho_Widget_Helper_Form_Element_Checkbox('article', [
    'author' => _t('显示作者'),
    'category' => _t('显示分类'),
    'comment_disabled' => _t('显示“评论已关闭”')
  ], ['author', 'category', 'comment_disabled'], _t('文章信息设置'));
  $cfg->addInput($article->multiMode());

  $defaultGravatar = new Typecho_Widget_Helper_Form_Element_Select('defaultGravatar', [
    '' => 'Gravatar Logo',
    'mp' => '神秘人',
    'identicon' => '随机的几何图案',
    'monsterid' => '随机的小怪兽',
    'wavatar' => '随机的卡通脸',
    'retro' => '随机的像素图案',
    'robohash' => '随机的小机器人'
  ], '', _t('评论者默认头像'), _t('在评论者没有设置过 Gravatar 时使用的头像'));
  $cfg->addInput($defaultGravatar->multiMode());

  $primaryColor = new Typecho_Widget_Helper_Form_Element_Select('primaryColor', [
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
  ], 'indigo', _t('主题主色调'), _t('选择主题主色调'));
  $cfg->addInput($primaryColor->multiMode());

  $accentColor = new Typecho_Widget_Helper_Form_Element_Select('accentColor', [
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
  ], 'pink', _t('主题强调色'), _t('选择主题强调色'));
  $cfg->addInput($accentColor->multiMode());
}
