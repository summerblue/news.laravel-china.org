![](http://ww3.sinaimg.cn/large/6d86d850jw1fas8n2v9irj211e0x0n9c.jpg)

## 说明

产品名称：Laravel 资讯

[Laravel 最新资讯](https://news.laravel-china.org/)、精华文章、开发技巧、推荐扩展包、[最新 Laravel 职位信息](https://laravel-china.org/categories/1) 以及 [「Laravel China 社区」](https://laravel-china.org/) 上的精华讨论。

由 [Summer](https://github.com/summerblue) 设计和编码。

想学习 Laravel 的同学，推荐 [Summer](https://github.com/summerblue) 的书籍 [《Laravel 入门教程》](https://laravel-china.org/topics/3383) 。

[![](http://ww1.sinaimg.cn/large/6d86d850gw1fao8va0fv0j208y0aw74v.jpg)](https://laravel-china.org/topics/3383)

> [《Laravel 入门教程》](https://laravel-china.org/topics/3383) 封面由设计师 [安正超](https://laravel-china.org/users/76) 设计。

<a href="http://estgroupe.com/" style="color:#a5a5a5">
      <img src="http://ww4.sinaimg.cn/large/6d86d850jw1fasan1tkn8j200k00k0sh.jpg" style="width: 20px;margin-right: 4px;margin-top: -4px;">
      <span style="margin-top: 7px;display: inline-block;">
        优帆远扬 - 创造不息，交付不止
      </span>
  </a>

## 运行环境

- Nginx 1.8+
- PHP 5.6+
- Mysql 5.7+
- Redis 3.0+
- Memcached 1.4+

## 开发环境部署/安装

本项目代码使用 PHP 框架 [Laravel 5.1](http://laravel-china.org/docs/5.1/) 开发，本地开发环境使用 [Laravel Homestead](http://laravel-china.org/docs/5.1/homestead)。

下文将在假定读者已经安装好了 Homestead 的情况下进行说明。如果您还未安装 Homestead，可以参照 [Homestead 安装与设置](http://laravel-china.org/docs/5.1/homestead#installation-and-setup) 进行安装配置。

### 基础安装

#### 1. 克隆源代码

克隆源代码到本地：

    > git clone git@github.com:summerblue/news.laravel-china.org.git

#### 2. 配置本地的 Homestead 环境

1). 运行以下命令编辑 Homestead.yaml 文件：

```shell
homestead edit
```

2). 加入对应修改，如下所示：

```
folders:
    - map: ~/my-path/news.laravel-china.org/ # 你本地的项目目录地址
      to: /home/vagrant/news.laravel-china.org

sites:
    - map: news.app
      to: /home/vagrant/news.laravel-china.org/public

databases:
    - news
```

3). 应用修改

修改完成后保存，然后执行以下命令应用配置信息修改：

```shell
homestead provision
```

> 注意：有时候你需要重启才能看到应用。运行 `homestead halt` 然后是 `homestead up` 进行重启。

#### 3. 安装扩展包依赖

    > composer install

#### 4. 使用安装命令

虚拟机里面：

```shell
php artisan est:instal
```

> 更多信息，请查阅 ESTInstallCommand

#### 5. 配置 hosts 文件

主机里:

    echo "192.168.10.10   news.app" | sudo tee -a /etc/hosts

### 链接入口

* 首页地址：http://news.app/
* 管理后台：http://news.app/admin

 在 `local` 环境下，直接访问管理后台即可默认登录 id 为 1 的管理员账号。

### 6. 前端工具集安装

1). 安装 node.js

直接去官网 [https://nodejs.org/en/](https://nodejs.org/en/) 下载安装最新版本。

2). 安装 Gulp

```shell
npm install --global gulp
```

3). 安装 Laravel Elixir

```shell
npm install
```

4). 直接 Gulp 编译前端内容

```shell
gulp
```

5). 监控修改并自动编译

```shell
gulp watch
```

至此, 安装完成


## 扩展包描述

| 扩展包 | 一句话描述 | 本项目应用场景 |
| --- | --- | --- | --- | --- | --- | --- | --- |
|[spatie/laravel-backup](https://github.com/spatie/laravel-backup)| 数据库备份解决方案 | 本项目的数据库备份使用此扩展包完成。 |
|[summerblue/administrator](https://github.com/summerblue/administrator)| 管理后台解决方案| 本项目的后台使用此扩展包开发。 |
|[laracasts/flash](https://packagist.org/packages/laracasts/flash)| 简单的 flash messages | 用户操作成功/失败的提示使用此扩展包开发 |
| [zizaco/entrust](https://github.com/Zizaco/entrust.git) | 用户组权限系统 | 整站的权限系统基于此扩展包开发。 |
| [VentureCraft/revisionable](https://github.com/VentureCraft/revisionable) | 记录 Model 的变更日志 | 以下 User Model 用此扩展包记录删除日志。|
| [mews/purifier](https://github.com/mewebstudio/Purifier) | HTML 白名单过滤器 | 用户发帖、回复时防止 XSS 过滤。 |
|[oumen/sitemap](https://github.com/RoumenDamianoff/laravel-sitemap)| Sitemap 生成工具| 本项目的 sitemap 使用此扩展包生成。 |
| [orangehill/iseed](https://github.com/orangehill/iseed) | 将数据表里的数据以 seed 的方式导出 | BannersTableSeeder, LinksTableSeeder, CategoriesTableSeeder 和 TipsTableSeeder 使用此扩展包生成。 |
| [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar) | 调试工具栏 | 开发时必备调试工具。 |
|[rap2hpoutre/laravel-logviewer](https://github.com/rap2hpoutre/laravel-log-viewer)| Log 查看工具 | 生产环境下，使用此扩展包快速查看 Log，已做权限控制。 |
| [laracasts/presenter](https://github.com/laracasts/Presenter) | Presenter 机制 | 以下 Model: User、Topic、Notification 都使用到了 Presenter。 |
|[league/html-to-markdown](https://github.com/thephpleague/html-to-markdown)| 将 HTML 转换成 Markdown| 用户进行内容发布动作时会使用此扩展包 |
|[erusev/parsedown](https://github.com/erusev/parsedown)| 将 Markdown 转换成 HTML | 用户进行内容发布动作时会使用此扩展包 |
| [laravel/socialite](https://github.com/laravel/socialite) | 官方社会化登录组件 | GitHub 登录逻辑使用了此扩展包。 |
| [Intervention/image](https://github.com/Intervention/image) | 图片处理功能库 | 用发帖和回复帖子时，图片上传的逻辑使用了此扩展包。 |
| [rtconner/laravel-tagging](https://github.com/rtconner/laravel-tagging) | 打标签功能 | 本地方式加载扩展包，打标签的内容有「微博用户」、「微博内容」 |
| [etrepat/baum](https://github.com/etrepat/baum) | 集成于 laravel-tagging 中，与其配合使用 | 增强了标签嵌套功能 |
| [Ubench](https://github.com/devster/ubench) | 性能统计工具 | 统计爬虫程序执行，花了多少时间和资源 |
## 自定义 Artisan 命令列表

| 命令行名字 | 说明 |
| --- | --- | --- | --- |
| `est: install` | 安装必备，首次安装时调用此命令可以快速初始化项目 |
| `est:reinstall` | 开发必备，重置所有的数据库和用户权限 |

## 队列列表

| 名称 | 说明 | 调用 |
| --- | --- | --- |
| BackupCommand | 每 4 小时运行一次，进行数据库备份，属于 [spatie/laravel-backup](https://github.com/spatie/laravel-backup) 的逻辑 | php artisan backup:run --only-db|
| ClearCommand | 每日 1:20 运行，清理过期的备份，，属于 [spatie/laravel-backup](https://github.com/spatie/laravel-backup) 的逻辑 | php artisan backup:clean |
| SyncUserActivedTime | 10 分钟运行一次，同步用户的最后访问时间 | php artisan basic:sync-user-actived-time |

## 代码生成器日志

记录这些日志目的为了方便后续开发可以借鉴。

```shell
php artisan make:scaffold Users --schema="github_id:integer:unsigned:default(0):index,notification_count:integer:unsigned:default(0):index,name:string:index,remember_token:string:nullable,image_url:string:nullable,verification_token:string:nullable,phone:string:nullable:index,email:string:nullable:index,real_name:string:nullable,avatar:string,wechat_openid:string:nullable:index,wechat_unionid:string:nullable:index,weibo_id:string:nullable:index,register_source:string:nullable:index,name:string:index:index"
```

## 使用协议

基于 MIT 协议基础上，增加署名权。请在你的修改版本站点底部保留：

```php
<p class="credits font2 add-top-quarter">
    由 <a href="https://github.com/summerblue" target="_blank">Summer</a> 设计与编码。
</p>
```
