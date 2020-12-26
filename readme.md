# bossrefuse
# 找工作 就上Boss直拒

* Boss直拒是一款基于B/S架构的web App，其UI界面酷似Boss直聘，可以实现招聘与应聘、发布职位与管理职位功能、浏览收藏招聘信息。
* `Boss直拒，为您在被boss拒绝的路上保驾护航`

# 运行方式(非常重要)

### [1. git Clone boss直拒手机端](https://github.com/abo1007/BossRefuseWebApp)

### [2. git Clone boss直拒后端服务支持](https://github.com/abo1007/BossRefuseServer)

### [3. git Clone boss直拒PC端](https://github.com/abo1007/BossRefuseWebApp)

## 1. boss直拒手机端

### 我的软件环境

```
node V12.13.1
npm 6.14.9
@vue/cli 4.2.3
```

1. 使用npm安装依赖

```
npm install
```

2. 使用指令启动服务（可在`package.json`中修改）

```
npm run serve
```

3. （可选）如有修改可以重新打包构建dist目录（如无则不需要）

```
npm run build
```

## 2. boss直拒后端服务支持

### 我的软件环境

```
node V12.13.1
npm 6.14.9
composer 2.0.4
PHP 7.1.9
```

### 启动方式1 Apache

1. 将项目本身放置在Apache站点目录中
	* 如果你的站点目录仅仅存储本项目，那么可以直接将所有源文件复制到站点目录中
	* 如果站点目录是多个项目，那么请将项目整体文件夹复制到站点目录，并根据情况添加合适的域名后缀


2. 将前端项目如下路径的文件 其中的如下行进行修改

> bossrefuse\src\util\APIUtil.js

```
const serverBase = "http://127.0.0.1:8090/public/"; // 请根据启动方式自行修改
```

* 例如你的Apache是默认的80端口那么地址应为`http://127.0.0.1/public/`
* 例如你修改了Apache端口为8090，那么地址应为`http://127.0.0.1:8090/public/`
* 例如站点目录是多个项目，那么还需要加上目录名,地址就像`http://127.0.0.1:8090/BossRefuseServer/public/`

### 启动方式2 php内置服务器

1. 打开终端，输入以下命令运行

```
php artisan serve
```

2. 默认会运行在`http://127.0.0.1:8000`路径下，`如果发生了端口冲突，请根据需要修改运行端口`

```
php artisan serve --port=端口号
```


3. 将前端项目如下路径的文件 其中的如下行进行修改

> bossrefuse\src\util\APIUtil.js

```
const serverBase = "http://127.0.0.1:8000/";
```
* 这是默认情况，如果修改了端口那么将不再是8000

## 3. boss直拒PC端

* 感谢支持，还没做


<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
