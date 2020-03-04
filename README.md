# materiality-typecho-theme

### 一款简洁并专注于显示文字内容的 Material Design 风格 Typecho 主题，基于 [MDUI](https://www.mdui.org/)

## 特点：
- 遵循 Material Design
- 样式简洁，专注于显示文字内容
- Pjax无刷新加载页面
- 图片懒加载
- 可自由切换主题颜色
- 可手动或根据时间(20:00~7:00)自动切换夜间模式
- 可自定义应用栏、侧边栏、文章信息、页脚中显示的内容
- 主题选项中可直接设置友情链接
- 列表中支持截断文章并显示“继续阅读”（在文章中需要的位置加入分割符`<!--more-->`）

## Demo

![Demo](https://raw.githubusercontent.com/EAimTY/materiality-typecho-theme/master/screenshot.png)

[https://www.eaimty.com/theme.html](https://www.eaimty.com/theme.html)

## 使用
1. 下载或使用Git克隆主题至`usr/themes/`下
2. 进入后台并启用主题
3. 进入设置外观并自定义主题

## 须知
1. 由于Pjax与评论反垃圾不兼容，本主题默认关闭了评论反垃圾保护，如有需求可使用插件替代
2. 本主题正在快速开发阶段，如果您在使用过程中遇到了问题，请尝试将主题更新至最新版本并清除浏览器与CDN缓存
3. 如果您对本主题有任何建议或有问题需要反馈，可以提交Issue、PR，或通过其它方式联系我

## 版本
3.5.2

## 更新日志
#### 3.5.2
- 重写了页面加载动效
- 在Drawer中加入了首页链接
- 优化Drawer中的站点描述是单行文字时的显示位置
#### 3.5.1
- 修复index与archive页不计`<!--more-->`标记而显示文章所有内容的bug
#### 3.5
- 高亮显示Drawer中正在访问的链接
- 加入了Pjax加载失败时的提示
- 搜索得到的内容为空时提示未找到内容并输出随机文章
- Drawer中的项目在为空时不再显示
- 在Chrome下Drawer滚动条的出现不再会引起Drawer中内容抖动
- 更换了“评论已关闭”图标
- 优化对懒加载图片元素的处理
- 修复了访问空页面时返回`Call to a member function format() on null`的bug
#### 3.4
- 优化了对已有评论的“回复”与“取消回复”操作体验
- 将对懒加载图片元素的处理放入PHP后端，不再依赖JS
- 优化了Drawer中评论的所在文章Tooltip
- 优化了跳页按钮，减少JS依赖
- 修复了回复已有评论时添加评论卡片过宽的bug
- 默认关闭了评论分页功能以优化体验
- 精简Drawer、CSS、JS代码
#### 3.3.4
- 标签与文章内容之间的分割线在没有标签时不再显示
- 为评论响应函数加入了判断使其不再在任何页面执行
- 取消对评论来源页检测功能的强制关闭
- 修复了特定页面不通过Pjax跳转的bug
#### 3.3.3
- 在窄屏幕设备上点击Drawer中的链接后会自动收回Drawer
- 将标签与文章内容用分割线分开
- 加入了Drawer中分类的描述Tooltip
- 加入了Drawer中评论的所在文章Tooltip
- 加入了Drawer中按月归档的文章数Tooltip
- 加入了亮/暗色模式切换按钮的提示Tooltip
#### 3.3.2
- 亮暗色模式可以在Pjax加载时自动切换了
- 为评论中的头像启用了懒加载
#### 3.3.1
- 修复了评论丢失的bug
- 加入了评论html5表单验证
- 关闭反垃圾保护和来源页检测以兼容Pjax评论
#### 3.3
- 加入了显示文章作者功能与其开关
- 加入了显示文章分类功能与其开关
- 加入了显示文章标签功能
- 重新加入了显示“评论已关闭”功能与其开关
- 去除了文章与独立页面中标题的跳转链接
- 优化了添加评论时显示登录身份的纸片
#### 3.2
- 引入Pjax
- 精简夜间模式代码
#### 3.1.1
- 修复post和page页时间格式不遵从设置的bug
- 优化文案、变量名与Cookie名
#### 3.1
- 重写了夜间模式
- 增加了是否开启夜间模式自动切换的选项
- 优化了目录结构
#### 3.0.2.1
- 更换Gravatar头像源
- 现已无需转义友情链接设置中的引号
#### 3.0.2
- 优化了友情链接设置（更新主题需重新设置友情链接）
#### 3.0.1
- 更换Gravatar头像源与默认头像
- 优化页面加载逻辑
- 修复有时会加载Roboto与Material Icon的bug
#### 3.0
- 重构主题，优化代码结构
- 移除jQuery依赖，减小主题体积
- 加入根据时间自动切换暗色模式功能
- 加入图片懒加载功能
- 加入页面加载时的动效
- 加入了404页面模板
- 优化使用鼠标滚轮滚动页面的体验
- 优化各平台上的字体显示
- 废弃部分无用自定义选项
- 修复Drawer中Logo移除容器的bug
- 修复页面内容过少时Footer偏离底部的bug
- 修复宽屏设备上返回顶部按钮遮挡页脚网站信息的bug
- 修复Chrome会自动填入评论者信息并更改输入框样式的bug
- 修复未填写备案信息时网站信息在容器中不垂直居中的bug
- ...

## 开源许可
The GNU General Public License v3.0

## 本项目使用了
- [MDUI](https://www.mdui.org/)
- [Pjax](https://github.com/MoOx/pjax)
- [lazysizes](https://github.com/aFarkas/lazysizes)
- [smoothscroll-for-websites](https://github.com/gblazex/smoothscroll-for-websites)
- [Smooth Scroll behavior polyfill](https://github.com/iamdustan/smoothscroll)
- [JavaScript Cookie](https://github.com/js-cookie/js-cookie)
