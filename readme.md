# Candy:Rebirth

一个Typecho单行横屏滚动主题！

预览地址 https://moeclue.com/ https://www.bokutake.com/ 


### 鸣谢

感谢 @lichaoxilcx 对本主题的贡献！

本主题开发过程中还得到了胖次群的 @PhosphorusP 的许多建议和灵感！

### 主题特色
- 别具一格的横屏滚动
- 自适应屏幕大小，风格一致
- 完善的Pjax加载和Ajax评论支持
- 代码高亮功能
- 友好的后台体验

### 使用方法
- Clone或者下载ZIP
- 解压后直接把Candy-Rebirth-master文件夹放到 /usr/themes 目录下
- Enjoy it!

### 设置项
- 到 管理->分类->分类描述 中可以自定义背景颜色和一些样式，如`background-color:#6495ed;`就是设置背景颜色
- 到 外观->设置外观 中可以设置背景、Logo、首屏、社交网络、内页位置、导航栏字体颜色

### SNS链接设置

	<a href="链接地址" target="_blank" class="item"><span class="mdi mdi-图标类名"></span>显示内容</a>

一行一个，图标类名请参考 https://cdn.materialdesignicons.com/2.0.46/

### 内置友链模板

在任意页面都可以
	
      <div class="friends">
        <a class="a-friend" target="_blank" style="background-color:背景颜色;color:前景颜色" href="博客链接">
          <img class="blog-avatar" src="博客头像地址" />
          <div class="text-container">
            <div class="name">博客名字</div>
            <div class="description">博客描述</div></div>
        </a>
        <!-- 在此区域内重复上面的即可 -->
      </div>


### 更新日志
#### v1.3
- 添加设置：文章内页位置 和 导航栏颜色风格
- 支持搜索功能
- 简单的修复了一下文章切换的一些BUG
- 扔掉了丑陋的 `alert()` 改为自己实现了一个 `showNotify()` 气泡
- 文章阅读体验优化
- 用 ← 按钮来返回开头，当当前位置已经处于开头的时候才作为返回键使用
- v1.3.1 => 添加typecho自带函数 `header()` 和 `footer()` 调用，解决许多插件不能用的问题

#### v1.2
- 添加了主题后台设置项
- 添加一些视觉效果
- 评论部分用户体验优化 (By @lichaoxilcx)
- 修复BUG
- 1.2.1 => 修复永久链接路径为.html的加载效果BUG

#### v1.1
- 修复了Archive分类功能
- 修正了一些样式
- 修复首页文章计数为0的问题


#### v1.0

- 首次发布
