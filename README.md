# materiality-typecho-theme

### 一款简洁并专注于显示文字内容的 Material Design 风格 Typecho 主题，基于 [MDUI](https://www.mdui.org/)

## 特点
- Material Design 风格
- 样式简洁，优化文字显示
- 图片懒加载
- 可自由切换主题颜色
- 可根据时间(20:00~6:00)自动或手动切换夜间模式
- 可自定义Header、Drawer、Footer中显示的内容
- 主题选项中可直接用代码设置友情链接
- 列表中支持截断文章并显示“继续阅读”（在文章中需要的位置加入分割符`<!--more-->`）

## 使用
1. 下载或使用Git克隆主题至`usr/themes/`下
2. 进入后台并启用主题
3. 进入设置外观并自定义主题

## Demo

![Demo](https://raw.githubusercontent.com/EAimTY/materiality-typecho-theme/master/screenshot.png)

[https://www.eaimty.com/theme.html](https://www.eaimty.com/theme.html)

## 版本
3.0.1

## 更新日志
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
- 修复Chrome会自动评论者信息并更改输入框样式的bug
- 修复未填写备案信息时网站信息在容器中不垂直居中的bug
- ...

## 开源许可
The GNU General Public License v3.0

## 本项目使用了
- [MDUI](https://www.mdui.org/)
- [lazysizes](https://github.com/aFarkas/lazysizes)
- [smoothscroll-for-websites](https://github.com/gblazex/smoothscroll-for-websites)
- [Smooth Scroll behavior polyfill](https://github.com/iamdustan/smoothscroll)
- [JavaScript Cookie](https://github.com/js-cookie/js-cookie)
