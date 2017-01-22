<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Post;
use App\Models\Issue;
use App\Models\Category;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $filenames = [1,2,3,4,5,6];
        $positions = ['undefined'];
        $categories = Category::all()->pluck('id')->toArray();
        $users = User::all()->pluck('id')->toArray();
        $issues = Issue::all()->pluck('id')->toArray();

        foreach (range(1, 200) as $index) {
            $datas[] = [
                'title'         => $faker->sentence(),
                'excerpt'       => $faker->sentence(),
                'body'          => $faker->text(),
                'position'         => $faker->randomElement($positions),
                'user_id'       => $faker->randomElement($users),
                'category_id'   => $faker->randomElement($categories),
                'issue_id'   => $faker->randomElement($issues),
                'cover'         => '/assets/images/faker/'.$faker->randomElement($filenames).'.jpg',
                'created_at' => '2015-12-06 04:20:00',
                'updated_at' => '2015-12-13 04:33:45',
            ];
        }
        DB::table('posts')->insert($datas);


        \DB::table('posts')->insert(array (
            0 =>
            array (
                'id' => 501,
                'title' => 'Laravel Valet 2.0 发布',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/0DDS4y7GlPAaHkDe40iT.jpg',
                'body' => '<p><a href="https://laravel-china.org/docs/5.3/valet">Laravel Valet</a> 一个专为 Mac 提供的极简主义开发环境。刚刚发布了 2.0 版本，包含了 BUG 修复和从 Caddy 切换到 Nginx。</p>
<h2>升级到 Valet 2.0</h2>
<p>首先你需要备份你的 <code>~/.valet</code> 文件，然后关停并卸载之前的版本：</p>
<pre><code class="language-bash">valet stop
valet uninstall</code></pre>
<p>安装可以参考 <a href="https://laravel-china.org/docs/5.3/valet#安装">文档</a> 中的安装步骤来完成升级。</p>
<h2>软件支持</h2>
<p>Valet 为我们提供以下软件和工具支持：</p>
<ul>
<li>Basic</li>
<li>Bedrock</li>
<li>Cake</li>
<li>Concrete5</li>
<li>Contao</li>
<li>CraftCMS</li>
<li>Drupal</li>
<li>Jigsaw</li>
<li>Joomla</li>
<li>Katana</li>
<li>Kirby</li>
<li>Laravel</li>
<li>Sculpin</li>
<li>Statamic</li>
<li>Symfony</li>
</ul>
<p>你也可以参照 <a href="https://laravel-china.org/docs/5.3/valet#自定义-Valet-驱动">文档</a> 来自定义 Valet 驱动。</p>
<h2>PHP 7.1</h2>
<p>Valet 目前版本支持的是 7.0，将在下一个版本支持 7.1。</p>
<blockquote>
<p>参考：<a href="https://laravel-news.com/laravel-valet-2">https://laravel-news.com/laravel-valet-2</a></p>
</blockquote>',
                'slug' => '',
                'position' => 'undefined',
            'body_original' => '[Laravel Valet](https://laravel-china.org/docs/5.3/valet) 一个专为 Mac 提供的极简主义开发环境。刚刚发布了 2.0 版本，包含了 BUG 修复和从 Caddy 切换到 Nginx。

## 升级到 Valet 2.0

首先你需要备份你的 ` ~/.valet` 文件，然后关停并卸载之前的版本：

```bash
valet stop
valet uninstall
```

安装可以参考 [文档](https://laravel-china.org/docs/5.3/valet#安装) 中的安装步骤来完成升级。

## 软件支持

Valet 为我们提供以下软件和工具支持：

- Basic
- Bedrock
- Cake
- Concrete5
- Contao
- CraftCMS
- Drupal
- Jigsaw
- Joomla
- Katana
- Kirby
- Laravel
- Sculpin
- Statamic
- Symfony

你也可以参照 [文档](https://laravel-china.org/docs/5.3/valet#自定义-Valet-驱动) 来自定义 Valet 驱动。


## PHP 7.1

Valet 目前版本支持的是 7.0，将在下一个版本支持 7.1。


> 参考：https://laravel-news.com/laravel-valet-2',
                'user_id' => 1,
                'category_id' => 1,
                'view_count' => 0,
                'order' => 0,
                'is_recommended' => 0,
            'excerpt' => '[Laravel Valet](https://laravel-china.org/docs/5.3/valet) 一个专为 Mac 提供的极简主义开发环境。刚刚发布了 2.0 版本，包含了 BUG 修复和从 Caddy 切换到 Nginx。
',
                'created_at' => '2016-12-08 04:09:00',
                'updated_at' => '2016-12-13 04:09:54',
            ),
            1 =>
            array (
                'id' => 503,
                'title' => 'Laravel Homestead 4.0 发布并开始支持 PHP 7.1',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/r8r1sXAUboDctmpD2qcH.jpg',
                'body' => '<p><a href="https://laravel-china.org/docs/5.3/homestead">Laravel Homestead</a> 是一个官方预封装的 Vagrant box，提供给你一个完美的开发环境，你无需在本机电脑上安装 PHP、HHVM、Web 服务器或其它服务器软件。并且不用再担心系统被搞乱！Vagrant box 为你搞定一切。如果有什么地方出错了，你也可以在几分钟内快速的销毁并重建虚拟机！</p>
<p>Homestead 刚刚发布了 v4.0 并且包含了对 PHP 7.1 的支持。</p>
<p>这里是一个简单的升级步骤：</p>
<h2>备份数据库</h2>
<p>首先先备份你的数据库:</p>
<pre><code class="language-bash">vagrant@homestead:~/Sites$ mysqldump -u homestead -p --all-databases &gt; alldbs.sql</code></pre>
<h2>Homestead 全局安装</h2>
<p>如果你是全局安装 Homestead 的话：</p>
<pre><code class="language-bash">cd /path/to/homestead
git fetch origin
git checkout v4.0.0
vagrant destroy
rm -rf .vagrant
vagrant up</code></pre>
<h2>Homestead 分项目安装</h2>
<p>如果你是分项目安装 Homestead 的，编辑你的 <code>composer.json</code> 文件进行版本指定：</p>
<pre><code class="language-javascript">"laravel/homestead": "^4.0"</code></pre>
<p>下一步运行一下命令：</p>
<pre><code>composer update
vagrant destroy
rm -rf .vagrant
vagrant up</code></pre>
<p>更多关于 Homestead 的安装可以参考这里： <a href="https://laravel-china.org/topics/2090">https://laravel-china.org/topics/2090</a> </p>
<blockquote>
<p>参考： <a href="https://laravel-news.com/laravel-homestead-4-0-is-released-featuring-support-for-php-7-1">https://laravel-news.com/laravel-homestead-4-0-is-released-featuring-support-for-php-7-1</a></p>
</blockquote>',
                'slug' => '',
                'position' => 'side_banner',
                'body_original' => '
[Laravel Homestead](https://laravel-china.org/docs/5.3/homestead) 是一个官方预封装的 Vagrant box，提供给你一个完美的开发环境，你无需在本机电脑上安装 PHP、HHVM、Web 服务器或其它服务器软件。并且不用再担心系统被搞乱！Vagrant box 为你搞定一切。如果有什么地方出错了，你也可以在几分钟内快速的销毁并重建虚拟机！

Homestead 刚刚发布了 v4.0 并且包含了对 PHP 7.1 的支持。

这里是一个简单的升级步骤：

## 备份数据库

首先先备份你的数据库:

```bash
vagrant@homestead:~/Sites$ mysqldump -u homestead -p --all-databases > alldbs.sql
```

## Homestead 全局安装

如果你是全局安装 Homestead 的话：

```bash
cd /path/to/homestead
git fetch origin
git checkout v4.0.0
vagrant destroy
rm -rf .vagrant
vagrant up
```

## Homestead 分项目安装

如果你是分项目安装 Homestead 的，编辑你的 `composer.json` 文件进行版本指定：

```javascript
"laravel/homestead": "^4.0"
```

下一步运行一下命令：

```
composer update
vagrant destroy
rm -rf .vagrant
vagrant up
```

更多关于 Homestead 的安装可以参考这里： https://laravel-china.org/topics/2090


> 参考： https://laravel-news.com/laravel-homestead-4-0-is-released-featuring-support-for-php-7-1',
                'user_id' => 1,
                'category_id' => 1,
                'view_count' => 0,
                'order' => 0,
                'is_recommended' => 0,
                'excerpt' => 'Laravel Homestead 4.0 发布并开始支持 PHP 7.1',
                'created_at' => '2016-12-06 04:20:00',
                'updated_at' => '2016-12-13 04:33:45',
            ),
            2 =>
            array (
                'id' => 504,
                'title' => 'Laravel 更新了发布周期计划',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/efVtIWXIe17o2XpSnU6r.png',
                'body' => '<p>在 2013 年的时候，Taylor 宣布了 Laravel 的 <a href="https://laravel-china.org/topics/2594">官方发布周期</a>，在每年的 6 月份和 12 月份进行版本发布。</p>
<p>昨天，Taylor 在 Twitter 上宣布，将把更新周期整体往后延期一个月，也就是修改为 1 月份和 7 月份。</p>
<p>对于核心开发团队来说有两个好处，第一是有更多的时间可以测试，第二是跟每年举办一次的 Laracon 更加接近。</p>
<p>对于大部分的 Laravel 开发者来说，这个变更没有太大关系。 Laravel 5.4 会在明年的 1 月份发布。然后是下一个 LTS Laravel 5.5 在 7 月份发布。</p>',
                'slug' => '',
                'position' => 'undefined',
                'body_original' => '


在 2013 年的时候，Taylor 宣布了 Laravel 的 [官方发布周期](https://laravel-china.org/topics/2594)，在每年的 6 月份和 12 月份进行版本发布。

昨天，Taylor 在 Twitter 上宣布，将把更新周期整体往后延期一个月，也就是修改为 1 月份和 7 月份。

对于核心开发团队来说有两个好处，第一是有更多的时间可以测试，第二是跟每年举办一次的 Laracon 更加接近。

对于大部分的 Laravel 开发者来说，这个变更没有太大关系。 Laravel 5.4 会在明年的 1 月份发布。然后是下一个 LTS Laravel 5.5 在 7 月份发布。',
                'user_id' => 1,
                'category_id' => 1,
                'view_count' => 0,
                'order' => 0,
                'is_recommended' => 0,
                'excerpt' => '
在 2013 年的时候，Taylor 宣布了 Laravel 的官方发布周期，在每年的 6 月份和 12 月份进行版本发布。',
                'created_at' => '2016-12-04 04:28:00',
                'updated_at' => '2016-12-14 15:38:31',
            ),
            3 =>
            array (
                'id' => 505,
                'title' => ' Laravel 5.3 与 Vue 组件如何协作',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/lW7OkIfJYL99k47rgEao.png',
                'body' => '<p>见过很多同学对写 JavaScript 代码都很头疼。因为后台代码的编写一般由框架规范了很多东西，大多数人其实都能快高效率的进入开发，而前端项目的代码就会粘贴复制居多，而且可复用性也很差。</p>
<p>Laravel 本身对前端开发就提供了很多支持，5.3 更是直接引入了 <a href="https://vuejs.org">Vue</a> 这个目前最流行的轻量级前端框架，这篇文章使用一个完整实际案例来讲讲如何在项目中使用 Vue 的 <a href="https://vuejs.org/v2/guide/reactivity.html">Reactivity</a> 特性和组件化系统，让前端开发和后端无缝的结合在一起，让开发过程更愉悦，而且代码的可复用性也更强。</p>
<blockquote>
<p>请前往阅读 <a href="https://laravel-china.org/topics/3260">https://laravel-china.org/topics/3260</a></p>
</blockquote>',
                'slug' => '',
                'position' => 'undefined',
                'body_original' => '见过很多同学对写 JavaScript 代码都很头疼。因为后台代码的编写一般由框架规范了很多东西，大多数人其实都能快高效率的进入开发，而前端项目的代码就会粘贴复制居多，而且可复用性也很差。

Laravel 本身对前端开发就提供了很多支持，5.3 更是直接引入了 [Vue](https://vuejs.org) 这个目前最流行的轻量级前端框架，这篇文章使用一个完整实际案例来讲讲如何在项目中使用 Vue 的 [Reactivity](https://vuejs.org/v2/guide/reactivity.html) 特性和组件化系统，让前端开发和后端无缝的结合在一起，让开发过程更愉悦，而且代码的可复用性也更强。

> 请前往阅读 https://laravel-china.org/topics/3260',
                'user_id' => 3,
                'category_id' => 2,
                'view_count' => 0,
                'order' => 0,
                'is_recommended' => 0,
                'excerpt' => '',
                'created_at' => '2016-12-14 13:03:45',
                'updated_at' => '2016-12-14 13:05:22',
            ),
            4 =>
            array (
                'id' => 506,
                'title' => 'Vue 中你不知道但却很实用的黑科技',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/hTyiq34rfKTpQLlL9KJx.png',
                'body' => '<blockquote>
<p>最近数月一直投身于 iView 的开源工作中，完成了大大小小 30 多个 UI 组件，在 Vue 组件化开发中积累了不少经验。其中也有很多带有技巧性和黑科技的组件，这些特性有的是 Vue 文档中提到但却容易被忽略的，有的更是没有写在文档里，今天就说说 Vue 组件的高级玩法。</p>
</blockquote>
<p>以上摘自源文章。</p>
<p>此文章发布于 Laravel China 社区，请前往阅读： <a href="https://laravel-china.org/topics/3363">https://laravel-china.org/topics/3363</a></p>',
                'slug' => '',
                'position' => 'undefined',
                'body_original' => '
> 最近数月一直投身于 iView 的开源工作中，完成了大大小小 30 多个 UI 组件，在 Vue 组件化开发中积累了不少经验。其中也有很多带有技巧性和黑科技的组件，这些特性有的是 Vue 文档中提到但却容易被忽略的，有的更是没有写在文档里，今天就说说 Vue 组件的高级玩法。

以上摘自源文章。

此文章发布于 Laravel China 社区，请前往阅读： https://laravel-china.org/topics/3363',
                'user_id' => 1,
                'category_id' => 2,
                'view_count' => 0,
                'order' => 0,
                'is_recommended' => 0,
                'excerpt' => '',
                'created_at' => '2016-12-14 13:16:51',
                'updated_at' => '2016-12-14 13:16:51',
            ),
            5 =>
            array (
                'id' => 507,
                'title' => 'Laravel 的核心概念',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/OlZQSvj6YhC4xE4ufnaA.png',
                'body' => '<p><a href="https://laravel-china.org/users/5462">@lufficc</a> 在此文中分享了他对 Laravel 核心概念的理解。包含以下话题：</p>
<ul>
<li>PHP 的生命周期</li>
<li>Laravel 的生命周期</li>
<li>Laravel 基础服务启动</li>
<li>请求与路由之间的传递</li>
<li>服务容器</li>
<li>依赖注入</li>
<li>绑定</li>
<li>Contracts &amp; Facades（合同&amp;假象</li>
</ul>
<p>以下是节选</p>
<blockquote>
<p>工欲善其事，必先利其器。在开发 Xblog 的过程中，稍微领悟了一点Laravel的思想。确实如此，这篇文章读完你可能并不能从无到有写出一个博客，但知道Laravel的核心概念之后，当你再次写起 Laravel 时，会变得一目了然胸有成竹。</p>
</blockquote>
<p>本发布于 Laravel China 社区，请前往阅读： <a href="https://laravel-china.org/topics/3057">https://laravel-china.org/topics/3057</a></p>',
                'slug' => '',
                'position' => 'side_banner',
            'body_original' => '[@lufficc](https://laravel-china.org/users/5462) 在此文中分享了他对 Laravel 核心概念的理解。包含以下话题：

- PHP 的生命周期
- Laravel 的生命周期
- Laravel 基础服务启动
- 请求与路由之间的传递
- 服务容器
- 依赖注入
- 绑定
- Contracts & Facades（合同&假象

以下是节选

> 工欲善其事，必先利其器。在开发 Xblog 的过程中，稍微领悟了一点Laravel的思想。确实如此，这篇文章读完你可能并不能从无到有写出一个博客，但知道Laravel的核心概念之后，当你再次写起 Laravel 时，会变得一目了然胸有成竹。

本发布于 Laravel China 社区，请前往阅读： https://laravel-china.org/topics/3057',
                'user_id' => 1,
                'category_id' => 2,
                'view_count' => 0,
                'order' => 0,
                'is_recommended' => 0,
                'excerpt' => '',
                'created_at' => '2016-12-14 13:28:38',
                'updated_at' => '2016-12-14 15:39:19',
            ),
            6 =>
            array (
                'id' => 508,
                'title' => '下载量最高的 100 个 Laravel 扩展包推荐',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/AP63Ij1MmdglLqkqUO4d.jpg',
                'body' => '<p>Laravel 另一个令人喜欢的地方，是拥有活跃的开发者社区，而活跃的开发者社区带来的，是繁华的扩展包生态。</p>
<p>本文对 <a href="https://packagist.org/search/?tags=laravel">Packagist 上打了 Laravel 标签</a> 的扩展包进行整理，截止到现在 2016 年 8 月 9号，有超过 7176 个扩展包，以下是下载量最大的 100 个。</p>
<p>相信下面这 100 个扩展包会让你的编码更加高效。</p>
<p>本文章发布在 Laravel China 社区，请前往阅读：<a href="https://laravel-china.org/topics/2530">https://laravel-china.org/topics/2530</a></p>',
                'slug' => '',
                'position' => 'side_banner',
                'body_original' => '
Laravel 另一个令人喜欢的地方，是拥有活跃的开发者社区，而活跃的开发者社区带来的，是繁华的扩展包生态。

本文对 [Packagist 上打了 Laravel 标签](https://packagist.org/search/?tags=laravel) 的扩展包进行整理，截止到现在 2016 年 8 月 9号，有超过 7176 个扩展包，以下是下载量最大的 100 个。

相信下面这 100 个扩展包会让你的编码更加高效。

本文章发布在 Laravel China 社区，请前往阅读：https://laravel-china.org/topics/2530',
                'user_id' => 1,
                'category_id' => 3,
                'view_count' => 0,
                'order' => 0,
                'is_recommended' => 0,
                'excerpt' => '',
                'created_at' => '2016-12-14 14:31:33',
                'updated_at' => '2016-12-14 15:39:11',
            ),
            7 =>
            array (
                'id' => 509,
                'title' => 'Entrust - Laravel 用户权限系统解决方案',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/8IE00fhQMpMMMo9cLwLv.jpg',
                'body' => '<h2>说明</h2>
<p><a href="https://github.com/Zizaco/entrust">Zizaco/Entrust</a> 是 Laravel 下 <code>用户权限系统</code> 的解决方案, 配合 <code>用户身份认证</code> 扩展包 <a href="https://github.com/Zizaco/confide">Zizaco/confide</a> 使用, 可以快速搭建出一套具备高扩展性的用户系统. </p>
<p>此文章发布于 Laravel China 社区，请前往查阅：<a href="https://laravel-china.org/topics/166">https://laravel-china.org/topics/166</a></p>',
                'slug' => '',
                'position' => 'undefined',
                'body_original' => '## 说明

[Zizaco/Entrust](https://github.com/Zizaco/entrust) 是 Laravel 下 `用户权限系统` 的解决方案, 配合 `用户身份认证` 扩展包 [Zizaco/confide](https://github.com/Zizaco/confide) 使用, 可以快速搭建出一套具备高扩展性的用户系统.

此文章发布于 Laravel China 社区，请前往查阅：https://laravel-china.org/topics/166',
                'user_id' => 1,
                'category_id' => 3,
                'view_count' => 0,
                'order' => 0,
                'is_recommended' => 0,
                'excerpt' => '',
                'created_at' => '2016-12-14 14:38:12',
                'updated_at' => '2016-12-14 14:38:12',
            ),
            8 =>
            array (
                'id' => 511,
                'title' => '最优雅的微信 SDK - overtrue/wechat',
                'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/AqoFEfO9lENgiSlLOIJU.jpg',
                'body' => '<p>请不要着急喷这个无耻的标题。</p>
<p>网上充斥着各种微信 SDK，但是找了一圈，发现没有一个想用，因为没有满足本项目存在后的各种优点：</p>
<ul>
<li>命名不那么乱七八糟；</li>
<li>隐藏开发者不需要关注的细节；</li>
<li>方法使用更优雅，不再那么恶心的使用恶心的命名譬如：getXML4Image...；</li>
<li>统一的错误处理，让你更方便的掌控异常；</li>
<li>自定义缓存方式；</li>
<li>符合 PSR-4 标准，你可以各种方便的与你的框架集成；</li>
<li>高度抽象的消息类，免去各种拼json与xml的痛苦。</li>
</ul>
<p>这里大部分人都用Laravel吧，都觉得她的语法很赞吧？那么你肯定也会喜欢我的这个 SDK 了（偷笑）。</p>
<p><a href="https://laravel-china.org/topics/605">Laravel 5 版已经出来啦！</a></p>
<p>先举一个处理用户消息的例子吧：</p>
<pre><code class="language-php">&lt;?php

use Overtrue\\Wechat\\Wechat;

$options = [
\'appId\'          =&gt; \'Your app id\',
\'secret\'         =&gt; \'Your secret\'
\'token\'          =&gt; \'Your token\',
\'encodingAESKey\' =&gt; \'Your encoding AES Key\' // optional
];

$wechat = Wechat::make($options);

$server = $wechat-&gt;on(\'message\', function($message){
error_log("收到来自\'{$message[\'FromUserName\']}\'的消息：{$message[\'Content\']}");
});

$result = $wechat-&gt;serve();

echo $result;</code></pre>
<p>怎么样？是不是感觉不错？（没感觉的赶紧关掉浏览器的这个 tab 就当啥也没有发生过一样...）</p>
<p>期待各位大拿的支持！（记得star哦）</p>
<p>项目： <a href="https://github.com/overtrue/wechat">https://github.com/overtrue/wechat</a></p>
<p>评论： <a href="https://laravel-china.org/topics/571">https://laravel-china.org/topics/571</a></p>',
            'slug' => '',
            'position' => 'side_banner',
            'body_original' => '请不要着急喷这个无耻的标题。

网上充斥着各种微信 SDK，但是找了一圈，发现没有一个想用，因为没有满足本项目存在后的各种优点：

- 命名不那么乱七八糟；
- 隐藏开发者不需要关注的细节；
- 方法使用更优雅，不再那么恶心的使用恶心的命名譬如：getXML4Image...；
- 统一的错误处理，让你更方便的掌控异常；
- 自定义缓存方式；
- 符合 PSR-4 标准，你可以各种方便的与你的框架集成；
- 高度抽象的消息类，免去各种拼json与xml的痛苦。

这里大部分人都用Laravel吧，都觉得她的语法很赞吧？那么你肯定也会喜欢我的这个 SDK 了（偷笑）。

[Laravel 5 版已经出来啦！](https://laravel-china.org/topics/605)

先举一个处理用户消息的例子吧：


```php
<?php

use Overtrue\\Wechat\\Wechat;

$options = [
\'appId\'          => \'Your app id\',
\'secret\'         => \'Your secret\'
\'token\'          => \'Your token\',
\'encodingAESKey\' => \'Your encoding AES Key\' // optional
];

$wechat = Wechat::make($options);

$server = $wechat->on(\'message\', function($message){
error_log("收到来自\'{$message[\'FromUserName\']}\'的消息：{$message[\'Content\']}");
});

$result = $wechat->serve();

echo $result;
```

怎么样？是不是感觉不错？（没感觉的赶紧关掉浏览器的这个 tab 就当啥也没有发生过一样...）

期待各位大拿的支持！（记得star哦）

项目： https://github.com/overtrue/wechat

评论： https://laravel-china.org/topics/571

',
        'user_id' => 1,
        'category_id' => 3,
        'view_count' => 0,
        'order' => 0,
        'is_recommended' => 0,
        'excerpt' => '',
        'created_at' => '2016-12-14 14:56:49',
        'updated_at' => '2016-12-14 15:39:03',
    ),
    9 =>
    array (
        'id' => 512,
        'title' => 'Fixhub 开源 Web 自动部署系统',
        'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/fOPn8Kv9fGya3W0kEhYg.jpeg',
        'body' => '<p>Fixhub 是一套免费、开源，基于最新版本 <a href="http://laravel.com">Laravel 5.3</a> 框架开发的web自动上线部署系统。</p>
<p>项目地址： <a href="https://github.com/Fixhub/Fixhub">https://github.com/Fixhub/Fixhub</a></p>
<p>更多截屏和使用说明，评论请见： <a href="https://laravel-china.org/topics/2722">https://laravel-china.org/topics/2722</a></p>',
        'slug' => '',
        'position' => 'undefined',
    'body_original' => 'Fixhub 是一套免费、开源，基于最新版本 [Laravel 5.3](http://laravel.com) 框架开发的web自动上线部署系统。

项目地址： https://github.com/Fixhub/Fixhub

更多截屏和使用说明，评论请见： https://laravel-china.org/topics/2722',
        'user_id' => 1,
        'category_id' => 4,
        'view_count' => 0,
        'order' => 0,
        'is_recommended' => 0,
        'excerpt' => '',
        'created_at' => '2016-12-14 15:12:03',
        'updated_at' => '2016-12-14 15:12:03',
    ),
    10 =>
    array (
        'id' => 513,
        'title' => '《性感的 PHP——现代化 PHP 开发》PPT 分享',
        'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/LNWpNA147qvOveQDvY14.jpeg',
        'body' => '<p>PHP 正在重生。作为一门专注WEB开发的语言，它不断吸取其他语言的优点，如命名空间，闭包，性状，操作码缓存等特性，PSR 规范和Composer 包管理以及 PHP 7 的性能提升，PHP 正在变成一门现代化的语言，让我们一起聊聊 PHP 有哪些新的变化！</p>
<ul>
<li>命名空间</li>
<li>PSR规范</li>
<li>闭包和匿名函数</li>
<li>Trait</li>
<li>Composer包管理器</li>
<li>语法新特性</li>
<li>PHP 7性能</li>
<li>Laravel框架介绍</li>
</ul>
<p>以上摘自，由 <a href="https://laravel-china.org/topics/2933">@纸牌屋弗兰</a> 同学分享于 Laravel China 社区，请点击此链接查阅详情： <a href="https://laravel-china.org/topics/2933">https://laravel-china.org/topics/2933</a> </p>
<p>PDF 版本 PPT ：<a href="https://oddgb63aa.qnssl.com/uploads/2016/08/modern-php.pdf">https://oddgb63aa.qnssl.com/uploads/2016/08/modern-php.pdf</a></p>',
        'slug' => '',
        'position' => 'undefined',
        'body_original' => '

PHP 正在重生。作为一门专注WEB开发的语言，它不断吸取其他语言的优点，如命名空间，闭包，性状，操作码缓存等特性，PSR 规范和Composer 包管理以及 PHP 7 的性能提升，PHP 正在变成一门现代化的语言，让我们一起聊聊 PHP 有哪些新的变化！

* 命名空间
* PSR规范
* 闭包和匿名函数
* Trait
* Composer包管理器
* 语法新特性
* PHP 7性能
* Laravel框架介绍


以上摘自，由 [@纸牌屋弗兰](https://laravel-china.org/topics/2933) 同学分享于 Laravel China 社区，请点击此链接查阅详情： https://laravel-china.org/topics/2933

PDF 版本 PPT ：https://oddgb63aa.qnssl.com/uploads/2016/08/modern-php.pdf',
        'user_id' => 1,
        'category_id' => 4,
        'view_count' => 0,
        'order' => 0,
        'is_recommended' => 0,
        'excerpt' => '',
        'created_at' => '2016-12-14 15:24:55',
        'updated_at' => '2016-12-14 15:24:55',
    ),
    11 =>
    array (
        'id' => 514,
        'title' => '中文新手入门书籍《Laravel 入门教程》',
        'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/Sk7sI3598LMYWDcbTrfz.jpg',
        'body' => '<h2>本书的特色：</h2>
<ul>
<li>定位为现代化 Web 开发新手入门，Git 工作流、前端工作流、Github 使用等；</li>
<li>使用 Laravel LTS 作为框架版本；</li>
<li>一步一步构建一个完整的项目，读者可以很轻松的跟着书的线索动手做下去；</li>
<li>使用真实项目开发中的流程工具，如：Git，Github，Gulp，代码上线等；</li>
<li>最佳实践，代码中加入许多最佳实践，让新手从一开始就养成好习惯；</li>
<li>崇尚 「DRY（Don\'t repeat yourself）不要重复自己」，让读者能真切体验到使用 Laravel 开发的愉悦感；</li>
</ul>
<h2>《Laravel 入门教程》适用于以下用户</h2>
<ul>
<li>几乎零基础，想入门 Web 开发的；</li>
<li>有 PHP 经验，准备学习 Laravel 的同学；</li>
<li>学过 Laravel 但是遇到阻力的；</li>
<li>全栈工程师入门课程。</li>
</ul>
<p>详见：<a href="https://laravel-china.org/topics/3383">https://laravel-china.org/topics/3383</a></p>',
        'slug' => '',
        'position' => 'big_banner',
        'body_original' => '
## 本书的特色：

- 定位为现代化 Web 开发新手入门，Git 工作流、前端工作流、Github 使用等；
- 使用 Laravel LTS 作为框架版本；
- 一步一步构建一个完整的项目，读者可以很轻松的跟着书的线索动手做下去；
- 使用真实项目开发中的流程工具，如：Git，Github，Gulp，代码上线等；
- 最佳实践，代码中加入许多最佳实践，让新手从一开始就养成好习惯；
- 崇尚 「DRY（Don\'t repeat yourself）不要重复自己」，让读者能真切体验到使用 Laravel 开发的愉悦感；

##《Laravel 入门教程》适用于以下用户

- 几乎零基础，想入门 Web 开发的；
- 有 PHP 经验，准备学习 Laravel 的同学；
- 学过 Laravel 但是遇到阻力的；
- 全栈工程师入门课程。

详见：https://laravel-china.org/topics/3383',
        'user_id' => 1,
        'category_id' => 4,
        'view_count' => 0,
        'order' => 0,
        'is_recommended' => 0,
        'excerpt' => 'Web 开发、PHP 开发、Laravel 开发新手入门教程，内容包含话题 用户认证/授权、Git/Github、Gulp...',
        'created_at' => '2016-12-14 15:36:12',
        'updated_at' => '2016-12-14 15:52:58',
    ),
    12 =>
    array (
        'id' => 515,
        'title' => 'Laravel 文化衫',
        'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/sZiPzKF0YyimDSl6WMfP.jpg',
        'body' => '<p>超哥（GitHub <a href="https://github.com/overtrue）发起的">https://github.com/overtrue）发起的</a> Laravel 文化衫购买，可以点击以下链接购买。</p>
<ul>
<li>卫衣：<a href="https://www.tshe.com/c/4de36565">https://www.tshe.com/c/4de36565</a> </li>
<li>长袖：<a href="https://www.tshe.com/c/21831347">https://www.tshe.com/c/21831347</a></li>
<li>短袖：<a href="https://www.tshe.com/c/1d9747a4">https://www.tshe.com/c/1d9747a4</a></li>
</ul>
<p>或者前往 Laravel China 社区页面，有优惠券可领 <a href="https://laravel-china.org/topics/3213">https://laravel-china.org/topics/3213</a></p>',
        'slug' => '',
        'position' => 'side_banner',
        'body_original' => '
超哥（GitHub https://github.com/overtrue）发起的 Laravel 文化衫购买，可以点击以下链接购买。

- 卫衣：https://www.tshe.com/c/4de36565
- 长袖：https://www.tshe.com/c/21831347
- 短袖：https://www.tshe.com/c/1d9747a4

或者前往 Laravel China 社区页面，有优惠券可领 https://laravel-china.org/topics/3213',
        'user_id' => 1,
        'category_id' => 4,
        'view_count' => 0,
        'order' => 0,
        'is_recommended' => 0,
        'excerpt' => '',
        'created_at' => '2016-12-14 20:39:47',
        'updated_at' => '2016-12-14 20:40:00',
    ),
    13 =>
    array (
        'id' => 516,
        'title' => '[Laravel Dinner 01 期][北京] 线下聚会',
        'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/Uot8b8WckjTfoIsqalZD.jpg',
        'body' => '<p>活动召集：<a href="https://laravel-china.org/topics/3314">https://laravel-china.org/topics/3314</a></p>
<p>活动结束：<a href="https://laravel-china.org/topics/3357">https://laravel-china.org/topics/3357</a></p>',
        'slug' => '',
        'position' => 'undefined',
        'body_original' => '活动召集：https://laravel-china.org/topics/3314

活动结束：https://laravel-china.org/topics/3357',
        'user_id' => 3,
        'category_id' => 6,
        'view_count' => 0,
        'order' => 0,
        'is_recommended' => 0,
        'excerpt' => '',
        'created_at' => '2016-12-15 15:24:01',
        'updated_at' => '2016-12-15 15:24:01',
    ),
    14 =>
    array (
        'id' => 517,
        'title' => '[Laravel Dinner 02 期] [深圳] 线下聚会',
        'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/ZaFGb4lTtvrsu4cmqWIt.jpg',
        'body' => '<p>活动召集：<a href="https://laravel-china.org/topics/3324">https://laravel-china.org/topics/3324</a></p>
<p>活动结束：<a href="https://laravel-china.org/topics/3357">https://laravel-china.org/topics/3357</a></p>',
        'slug' => '',
        'position' => 'undefined',
        'body_original' => '活动召集：https://laravel-china.org/topics/3324

活动结束：https://laravel-china.org/topics/3357',
        'user_id' => 1,
        'category_id' => 6,
        'view_count' => 0,
        'order' => 0,
        'is_recommended' => 0,
        'excerpt' => '',
        'created_at' => '2016-12-15 15:27:10',
        'updated_at' => '2016-12-15 15:27:10',
    ),
    15 =>
    array (
        'id' => 518,
        'title' => '[Laravel Dinner 03 期][上海] 线下聚会',
        'cover' => 'https://oi5u2gg2q.qnssl.com/uploads/covers/Y8XsDQHNF0ugdBIalRQM.jpg',
        'body' => '<p>活动召集：<a href="https://laravel-china.org/topics/3385">https://laravel-china.org/topics/3385</a></p>',
        'slug' => '',
        'position' => 'undefined',
        'body_original' => '活动召集：https://laravel-china.org/topics/3385

',
        'user_id' => 3,
        'category_id' => 6,
        'view_count' => 0,
        'order' => 0,
        'is_recommended' => 0,
        'excerpt' => '',
        'created_at' => '2016-12-15 15:28:19',
        'updated_at' => '2016-12-15 17:43:55',
    ),
));


    }
}
