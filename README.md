## lsky pro图床优化&美化

- 增加首页上传背景美化/PC端：视频   手机端：图片
- 修改上传页面半透明、页面头部半透明、页面底部全透明
- 修改登录页面、注册页面、找回页面等输入框半透明
- 修改页面相关UI、公告页面半透明、修改二级菜单背景蓝色
- 后台增加`获取token功能`（用于picgo等图床工具链接使用）
- 默认`反向代理https://`（http访问加载不了静态资源/）`本地环境安装需要先反向代理才能访问安装`
- 取消[反向代理https://](https://github.com/sangxuesheng/lsky-pro-Docker#%E5%8F%8D%E4%BB%A3https)方法
- 

### 效果

![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c551989b92c.png)

![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c57cf308c4a.png)

![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c5557898c1c.png)





## 使用方式

### `Docker搭建`

  ```docker
docker run -d \
    --name lsky-pro \
    --restart unless-stopped \
    -p 8089:8089 \
    -v 此处修改成本地文件夹位置（绝对路径）:/var/www/html \
    -e （修改成自己需要的端口）=8089 \
    tingwensuojian/lsky-pro-docker:latest
  ```




### 宝塔面板安装

- `PHP >= 8.0.2`
- `Mysql>=5.7`
  （**数据库版本5.7！**是5.7！5.6装不了，记得升级一下数据库版本，**`升级前记得备份数据库！`**  **`升级前记得备份数据库！`**）

**1、**(你的有一个域名，解析域名和宝塔安装就不多赘述)废话不多说，**首先创建一个站点和数据库**
![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c56289a876d.png)
创建好站点和数据库后，**数据库名和用户密码记下来**备用

![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c562a658c07.png)

在宝塔面板左侧点文件，你的域名地址文件点进去，把你下载好的**lsky-pro美化包导入根目录**，双击解压(然后删除压缩包)
![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c562c99c98a.png)

 

**2、**设置运行**目录为public**为了防止出错，可以**关闭防跨站攻击**，按着步骤来

![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c562d43a796.png)

 

**设置伪静态复制以下代码粘贴到宝塔面板伪静态里**

```
location / {
    if (!-e $request_filename) {
        rewrite ^(.*)$ /index.php?s=$1 last; break;
    }
}
```

![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c562e53f982.png)

 

**4、**安装**fileinfo，imagemagick和exif扩展**PHP设置→安装扩展

ps:  **`fileinfo`**扩展安装不上一可以通过宝塔面板的软件商店：Linux工具箱——Swap/虚拟内存设置2048或4096的虚拟内存解决

![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c562ff543b4.png)

 



禁用函数默认情况下8.0对这几个函数都是禁用了的。如果是通过宝塔面板进行设置，可以通过面板操作进行删除， 删除后注意重启PHP服务 ：

**找到以下几个函数，删除即可↓↓↓**

- **`exec`**
- **`shell_exec`**
- **`readlink`**
- **`symlink`**
- **`putenv`**
- **`getenv`**

![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c5630ee670a.png)
 **5、**安装图床访问你的网站域名，未安装自动跳转至安装页面，根据页面提示安装即可↓↓↓
![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c5631af1624.png)

 

**最后填入你的数据库名、用户名、密码**
![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c5633a2c906.png)
点这里就进入Lsky Pro主界面，然后就开心的上传你的图片了
![](https://tuchuang2.sangxuesheng.com/2023/07/30/64c56347df584.png)


----

<img align="right" width="100" src="https://avatars.githubusercontent.com/u/100565733?s=200" alt="Lsky Pro Logo"/>

<h1 align="left"><a href="https://www.lsky.pro">Lsky Pro</a></h1>

☁ Your photo album on the cloud.

[![PHP](https://img.shields.io/badge/PHP->=8.0-orange.svg)](http://php.net)
[![Release](https://img.shields.io/github/v/release/lsky-org/lsky-pro)](https://github.com/lsky-org/lsky-pro/releases)
[![Issues](https://img.shields.io/github/issues/lsky-org/lsky-pro)](https://github.com/lsky-org/lsky-pro/issues)
[![Code size](https://img.shields.io/github/languages/code-size/lsky-org/lsky-pro?color=blueviolet)](https://github.com/lsky-org/lsky-pro)
[![Repo size](https://img.shields.io/github/repo-size/lsky-org/lsky-pro?color=eb56fd)](https://github.com/lsky-org/lsky-pro)
[![Last commit](https://img.shields.io/github/last-commit/lsky-org/lsky-pro/dev)](https://github.com/lsky-org/lsky-pro/commits/dev)
[![License](https://img.shields.io/badge/license-GPL_V3.0-yellowgreen.svg)](https://github.com/lsky-org/lsky-pro/blob/master/LICENSE)

[官网](https://www.lsky.pro) &middot;
[文档](https://docs.lsky.pro) &middot;
[社区](https://github.com/lsky-org/lsky-pro/discussions) &middot;
[演示](https://pic.vv1234.cn) &middot;
[Telegram 群组](https://t.me/lsky_pro)

> master 分支为未安装三方拓展的版本，通常包含了最新未发布版本的一些实验性新特性和修复补丁，正式版本请点击 [这里](https://github.com/lsky-org/lsky-pro/releases) 下载。  
> 发现 bug 请提交 [issues](https://github.com/lsky-org/lsky-pro/issues) (提问前建议阅读[提问的智慧](https://github.com/ryanhanwu/How-To-Ask-Questions-The-Smart-Way/blob/main/README-zh_CN.md))  
> 有任何想法、建议、或分享，请移步 [社区](https://github.com/lsky-org/lsky-pro/discussions)

![看不见图片请使用科学上网](https://user-images.githubusercontent.com/22728201/157242302-bfbd04a0-fb30-4241-800e-cc2b1dad9b19.png)
![看不见图片请使用科学上网](https://user-images.githubusercontent.com/22728201/157242314-5716d578-fee5-4083-8d91-0d98cb2545d9.png)

### 📌 TODO
* [x] 支持`本地`等多种第三方云储存 `AWS S3`、`阿里云 OSS`、`腾讯云 COS`、`七牛云`、`又拍云`、`SFTP`、`FTP`、`WebDav`、`Minio`
* [x] 多种数据库驱动支持，`MySQL 5.7+`、`PostgreSQL 9.6+`、`SQLite 3.8.8+`、`SQL Server 2017+`
* [x] 支持配置使用多种缓存驱动，`Memcached`、`Redis`、`DynamoDB`、等其他关系型数据库，默认以文件的方式缓存
* [x] 多图上传、拖拽上传、粘贴上传、动态设置策略上传、复制、一键复制链接
* [x] 强大的图片管理功能，瀑布流展示，支持鼠标右键、单选多选、重命名等操作
* [x] 自由度极高的角色组配置，可以为每个组配置多个储存策略，同时储存策略可以配置多个角色组
* [x] 可针对角色组设置上传文件、文件夹路径命名规则、上传频率限制、图片审核等功能
* [x] 支持图片水印、文字水印、水印平铺、设置水印位置、X/y 轴偏移量设置、旋转角度等
* [x] 支持通过接口上传、管理图片、管理相册
* [x] 支持在线增量更新、跨版本更新
* [x] 图片广场

### 🛠 安装要求
- PHP >= 8.0.2
- BCMath PHP 扩展
- Ctype PHP 扩展
- DOM PHP 拓展
- Fileinfo PHP 扩展
- JSON PHP 扩展
- Mbstring PHP 扩展
- OpenSSL PHP 扩展
- PDO PHP 扩展
- Tokenizer PHP 扩展
- XML PHP 扩展
- Imagick 拓展
- exec、shell_exec 函数
- readlink、symlink 函数
- putenv、getenv 函数
- chmod、chown、fileperms 函数

### 😋 鸣谢
- [Laravel](https://laravel.com)
- [Tailwindcss](https://tailwindcss.com)
- [Fontawesome](https://fontawesome.com)
- [Echarts](https://echarts.apache.org)
- [Intervention/image](https://github.com/Intervention/image)
- [league/flysystem](https://flysystem.thephpleague.com)
- [overtrue](https://github.com/overtrue)
- [Jquery](https://jquery.com)
- [jQuery-File-Upload](https://github.com/blueimp/jQuery-File-Upload)
- [Alpinejs](https://alpinejs.dev/)
- [Viewer.js](https://github.com/fengyuanchen/viewerjs)
- [DragSelect](https://github.com/ThibaultJanBeyer/DragSelect)
- [Justified-Gallery](https://github.com/miromannino/Justified-Gallery)
- [Clipboard.js](https://github.com/zenorocha/clipboard.js)

### 💰 捐赠
Lsky Pro 的开发和更新等，都是作者在业余时间独立开发，并免费开源使用，如果您认可我的作品，并且觉得对你有所帮助我愿意接受来自各方面的捐赠😃。
<table width="100%">
    <tr>
        <th>支付宝</th>
        <th>微信</th>
    </tr>
    <tr>
        <td><img alt="看不见图片请使用科学上网" src="https://raw.githubusercontent.com/lsky-org/lsky-pro/82988ebe2edd32264d609b26bf9132b3dce7c39e/public/static/app/images/demo/alipay.png"></td>
        <td><img alt="看不见图片请使用科学上网" src="https://raw.githubusercontent.com/lsky-org/lsky-pro/82988ebe2edd32264d609b26bf9132b3dce7c39e/public/static/app/images/demo/wechat.jpeg"></td>
    </tr>
</table>

### 🤩 Stargazers over time
[![Stargazers over time](https://starchart.cc/lsky-org/lsky-pro.svg)](https://starchart.cc/lsky-org/lsky-pro)

### 📧 联系我
- Email: i@wispx.cn

### 📃 开源许可
[GPL 3.0](https://opensource.org/licenses/GPL-3.0)

Copyright (c) 2018-present Lsky Pro.

---------

# Lsky-Pro Docker镜像

每天自动拉取最新代码构建Docker镜像

## 使用方法

```docker
docker run -d \
    --name lsky-pro \
    --restart unless-stopped \
    -p 8089:8089 \
    -v 此处修改成本地文件夹位置（绝对路径）:/var/www/html \
    -e （修改成自己需要的端口）=8089 \
    tingwensuojian/lsky-pro-docker:latest
```

## 环境变量

目前该容器只有一个环境变量：`WEB_PORT`，用于指定容器内的`Apache`监听的端口，默认为`8089`，如果需要修改的话可以在启动容器时添加`-e WEB_PORT=8089`来指定端口

### Windows内以`WSL`的方式部署`Docker`容器

按照 [#13](https://github.com/HalcyonAzure/lsky-pro-docker/issues/13) 的反馈来看，如果在`Windows`内创建容器出现了将文件挂载于`WSL`内，然后出现了重启系统文件未识别的情况，可以将映射目录修改为类似`\\wsl$\Ubuntu\path-mount-lsky\`的形式

## 反代HTTPS

如果使用了Nginx反代后，如果出现无法加载图片的问题，可以根据原项目 [#317](https://github.com/lsky-org/lsky-pro/issues/317) 执行以下指令来手动修改容器内`AppServiceProvider.php`文件对于HTTPS的支持

***Tips：将lskypro改为自己容器的名字***

```bash
docker exec -it lskypro sed -i '32 a \\\Illuminate\\Support\\Facades\\URL::forceScheme('"'"'https'"'"');' /var/www/html/app/Providers/AppServiceProvider.php
```

## Docker-Compose部署参考

使用`MySQL`来作为数据库的话可以参考原项目 [#256](https://github.com/lsky-org/lsky-pro/issues/256) 来创建`docker-compose.yaml`，参考内容如下：

```yaml
version: '3'
services:
  lskypro:
    image: tingwensuojian/lsky-pro-docker:latest
    restart: unless-stopped
    hostname: lskypro
    container_name: lskypro
    environment:
      - WEB_PORT=8089
    volumes:
      - $PWD/lsky/web:/var/www/html/
    ports:
      - "8089:8089"
    networks:
      - lsky-net

  mysql-lsky:
    image: mysql:5.7.22
    restart: unless-stopped
    # 主机名，可作为"数据库连接地址"
    hostname: mysql-lsky
    # 容器名称
    container_name: mysql-lsky
    # 修改加密规则
    command: --default-authentication-plugin=mysql_native_password
    volumes:
      - $PWD/mysql/data:/var/lib/mysql
      - $PWD/mysql/conf:/etc/mysql
      - $PWD/mysql/log:/var/log/mysql
    environment:
      MYSQL_ROOT_PASSWORD: lAsWjb6rzSzENUYg # 数据库root用户密码，自行修改
      MYSQL_DATABASE: lsky-data # 可作为"数据库名称/路径"
    networks:
      - lsky-net

networks:
  lsky-net: {}
```

原项目：[☁️兰空图床(Lsky Pro) - Your photo album on the cloud.](https://github.com/lsky-org/lsky-pro)

## 手动备份/升级

如果需要迁移数据库/手动升级`Lsky-Pro`，可以参考官方文档：[升级｜Lsky Pro](https://docs.lsky.pro/docs/free/v2/quick-start/upgrade.html)，来备份主要文件以进行恢复/升级

----------



