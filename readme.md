# bossrefuse
# 找工作 就上Boss直拒

# boss直拒后端服务支持(Laravel)

* Boss直拒是一款基于B/S架构的web App，其UI界面酷似Boss直聘，可以实现招聘与应聘、发布职位与管理职位功能、浏览收藏招聘信息。
* `Boss直拒，为您在被boss拒绝的路上保驾护航`

## 相关技术

* Vue Vue-Cli VueRouter VueX
* Vant
* Axios
* `PHP` `Laravel`
* `MySQL`

# 运行方式(非常重要)

### [1. git Clone boss直拒手机端](https://github.com/abo1007/BossRefuseWebApp)

### [2. git Clone boss直拒后端服务支持](https://github.com/abo1007/BossRefuseServer)

### [3. git Clone boss直拒PC端(尚未开发)](https://github.com/abo1007/BossRefuseWebApp)

* 提示：由于本项目已经与后端连通，因此不启动并配置好Laravel后端服务将无法正常运行前端项目

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

4. 默认启动于`8083`端口

## 2. boss直拒后端服务支持

### 我的软件环境

```
node V12.13.1
npm 6.14.9
composer 2.0.4
PHP 7.1.9
```

### 数据库配置

* 打开根目录下的 `.env` 文件进行数据库配置

> bossServer/.env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306 
DB_DATABASE=
DB_USERNAME=mysql用户名
DB_PASSWORD=mysql密码
```

### 导入数据库

1. 建立一个名为 `boss` 的数据库
2. 将根目录下面的 `boss.sql` 文件导入到库中

### 安装依赖

> composer install

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

## 用户密码(已启用)

* 默认个人用户

```
username:abo1007
password:abo1007
```

* 默认企业用户

```
username:yangbo
password:yangbo
```

* 如有需要可在`boss_user`表中添加，`isCom`字段为1表示企业用户，0表示个人用户