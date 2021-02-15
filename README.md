# materiality-typecho-theme

<img src="https://raw.githubusercontent.com/EAimTY/materiality-typecho-theme/master/materiality-typecho-theme.png" alt="Logo" width="192" />

一款简洁并专注于显示文字内容的 Material Design 风格 Typecho 主题，基于 [MDUI](https://www.mdui.org/)

https://github.com/EAimTY/materiality-typecho-theme

# 特性

- 严格遵循 Material Design
- 样式简洁，专注于显示文字内容
- 支持 Pjax 无刷新加载页面
- 支持图片懒加载
- 可自由切换主题颜色
- 可手动或根据访问者时间（20:00~7:00）与访问者系统全局暗色模式状态自动切换至暗色模式
- 可在文章内容中的中文与西文、中文与数字间自动插入空格
- 自动创建文章目录，并且可为每篇文章与页面分别设置其是否显示
- 可自定义应用栏、侧边栏、文章信息、页脚中显示的内容
- 主题选项中可直接设置友情链接

# Demo

![Demo](https://raw.githubusercontent.com/EAimTY/materiality-typecho-theme/master/screenshot.png)

[https://www.eaimty.com/theme.html](https://www.eaimty.com/theme.html)

# 使用帮助

## 安装与更新主题

**本主题在 Typecho 当前正式稳定版本（1.1）下开发并测试，使用需 PHP 7.0+**

从其它主题更换为本主题，或从本主题较旧版本更新至新版本时，可能会出现显示 bug，这是由于浏览器与 CDN（如果有）的缓存没有更新。所以请在更换或更新主题后清除浏览器与 CDN 缓存以得到最佳显示效果

1. 前往 [Releases页](https://github.com/EAimTY/materiality-typecho-theme/releases) 下载或使用 Git 克隆主题至`usr/themes/`下
2. 进入后台并启用主题
3. 进入设置外观并自定义主题
4. 清除浏览器与 CDN 缓存以免与之前使用的主题发生冲突

## 配置代码高亮

代码高亮通过 [highlight.js](https://github.com/highlightjs/highlight.js) 实现，可以自动识别代码语言并着色，可在后台主题设置页面开启。由于每个博客需要代码高亮的语言都不相同，如果在构建时包含所有语言，脚本体积将会非常大，严重影响用户体验

请进入 [highlight.js 自定义构建下载](https://highlightjs.org/download/) 页面，在 Custom package 节选择所需的语言支持，将下载到的 zip 文件中的`highlight.pack.js`文件重命名为`highlight.min.js`，并替换`主题目录/assets/js/highlight.min.js`

highlight.js 支持多种颜色主题，默认为 `atom-one-light`，如需自定义代码高亮颜色主题，请替换`主题目录/assets/css/highlight.min.css`（可在自定义构建下载到的`highlight.zip`中的`styles`目录下找到所有支持的主题）

## 截断文章内容在目录中的显示

默认下，Typecho 会将文章的全部内容显示在文章目录中，在文章内容过长时，可在需要截断的位置加入分割标记`<!--more-->`，Typecho 将仅显示分割标记前的内容：

    这是一篇文章
    这里的内容会在文章目录中显示
    这里的内容也会在文章目录中显示

    <!--more-->

    这里的内容不会在文章目录中显示
    这里的内容不会在文章目录中显示

## 其它

1. `显示暗色模式切换按钮`与`自动切换至暗色模式`互不依赖，可同时开启、关闭或分别开启
2. 在开启 pangu 后，对于不需要在中文与西文、中文与数字间插入空格的内容，可将其放入`<nopangu></nopangu>`标签内，pangu 将不处理`<nopangu>`标签中的内容
3. 由于 Pjax 与评论反垃圾不兼容，本主题默认关闭了评论反垃圾保护，如有需求可使用插件替代
4. 如果您对本主题有任何建议或有问题需要反馈，可以提交 Issue、PR，或通过其它方式联系我

# 版本

4.8.5

# 更新日志

见 [CHANGELOG](https://github.com/EAimTY/materiality-typecho-theme/blob/master/CHANGELOG.md)

# 开源许可

The GNU General Public License v3.0

# 本项目使用了

- [MDUI](https://www.mdui.org/)
- [Pjax](https://github.com/MoOx/pjax)
- [lazysizes](https://github.com/aFarkas/lazysizes)
- [pangu.php](https://github.com/linclancey/pangu.php)
- [highlight.js](https://github.com/highlightjs/highlight.js)
- [smoothscroll-for-websites](https://github.com/gblazex/smoothscroll-for-websites)
