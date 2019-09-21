Mac 上实现Apache + php + Mysql 的环境搭建
==

# 一级标题
第一次尝试搭建环境，踩了很多坑，在这里简单作以总结
万分感谢 https://www.jianshu.com/p/2fb9a3bb12f6 这篇文章，才得以解决困扰了我好几天的问题。***本文大部分内容均出自于此***，再加上自己的一些亲身经历，第一次发文如有不足或冒犯之处还请多多见谅

## 为什么我要自己搭环境
本来是用的xampp，但是最新版的xampp我找不到xamppfiles这个文件，而网上的大部分教程都是基于之上，所以在修改Apache根目录时费了不少时间，好不容易改完之后发现莫名其妙的mysql又打不开了，谷歌了数个小时都没有解决问题，无奈之下只能自己搭建环境，反正这些坑早晚都是要踩的

# Apache+PHP配置
mac系统都自带了Apache和PHP环境，只是默认情况下没有开启，我个人设备环境如下：
PHP版本：7.1.23 
Apache版本 2.4.34 (Unix)
系统版本：macOS Mojave  10.14.6

# 开启Apache
打开终端，输入�如下开启命令。

开启Apache：    
    sudo apachectl start

关闭Apache：    
    sudo apachectl stop

重启Apache：    
    sudo apachectl restart
    
在浏览器中输入localhost，�如果出现如下默认的“It works!”界面，则表示Apache开启成功。

![开启成功]./img/en-1.png


# 开启PHP
开启PHP，需要修改Apache配置文件，方法如下：

1.打开终端，输入命令：sudo vim /etc/apache2/httpd.conf
2.找到#LoadModule php5_module libexec/apache2/libphp5.so，去掉注释（删除前面的井号）。
mac下Apache的默认文件夹为/Library/WebServer/Documents，在该目录下创建一个名为index.php文件，在文件中添加如下内容：<?php phpinfo(); ?>。删除原目录下的index.html文件，然后在浏览器中输入localhost，如果出现如下PHP的info页，则表示PHP开启成功，如果不成功，用前面的命令重启Apache再试。
3.这里是我本人踩到的一个坑，那就是按照前两部实施之后会显示

### 出现403 Forbidden You don’t have permission to access / on this server的提示。

造成这个问题的原因最主要的就是403权限不足，（因为我的php文件一开始是建立在桌面上然后拖进根目录的），所以我们只需要给那个文件权限即可
解决办法：
1.在终端输入如下指令（跳转到index.php的根目录，注意cd后面有空格）      cd /library/WebServer/Documents
2.给予权限       chmod 777 index.php
输入完之后如果正确，终端不会有任何反应，重启Apache并刷新页面就应该会显示下图info页
./img/en-2.png



# 修改Apache目录
上面说到了mac下Apache的默认文件夹为/Library/WebServer/Documents，该目录默认是隐藏的，操作不是很方便，我们可以将其修改成自定义的目录，例如我的文件夹路径为/Users/gavin/Sites

1.打开终端，输入命令：sudo vim /etc/apache2/httpd.conf
2.找到如下两处
　　DocumentRoot "/Library/WebServer/Documents"
　　<Directory "/Library/WebServer/Documents">
3.将两处中引号中的目录替换为/Users/gavin/Sites
完成以上三步后，重启Apache，将之前创建的index.php文件拷贝到自定义目录中，然后在浏览器中输入localhost，如果出现PHP的info页，则表示�目录修改成功。

# MySQL安装
 10.14  没有自带MySQL，需要我们自己安装。这里只介绍最简单的方式，到MySQL官网下载最新的dmg安装包，我本人下载的是mysql-5.7.11-osx10.10-x86_64.dmg。进入下载页面后，会提示你登陆或注册，这里不必理会，直接点击底部的“No thanks, just start my download.”即可开始下载。
　　双击下载的dmg安装，一直下一步安装，最后安装完成后会弹出一个提示，告诉你MySQL为root@localhost账号生成了一个临时密码，务必将这个密码保存下来。

./img/en-3.png


# 启动MySQL
1.进入系统偏好设置，点击MySQL。
2.点击Start MySQL Server
3.修改root用户的密码
打开终端，输入命令（将temppassword替换为之前保存的临时密码）：
/usr/local/mysql/bin/mysqladmin -u root -p'temppassword' password 'newpassword'

# phpMyAdmin
完成以上两步，MySQL就算安装配置完成了，不过为了方便，有必要安装一个可视化的工具，我选择phpMyAdmin。
　　直接到phpMyAdmin官网下载最新的zip包，建议下载多语言版本，支持简体中文。下载完成后，将解压后的文件夹重命名为phpMyAdmin，然后放置到自定义的Apache路径的根目录下。
　　在浏览器中输入localhost/phpMyAdmin，出现MySQL的登陆页面，在该页面可以设置语言，然后用root和之前设置的密码登陆。看到如下两个页面，就大功告成了！！
### 我遇到的第二个问题
因为之前装过xammp和mysql，所以我的环境有点乱，导致我登陆时出现如下问题
./img/en-5.png
这个问题基本都是因为之前注册过数据库账号导致环境混乱，解决办法为打开localhost/phpMyAdmin中的
config.inc.php文件，找到并修改如下

$cfg['Servers'][$i]['controluser'] = 'root';（这里的用户名必须为root）
$cfg['Servers'][$i]['controlpass'] = '你自定的密码';


#最后总结：谷歌是个好东西，遇到问题把错误原文复制一下扔到搜索框里就行了，但是一个问题往往会有很多解决办法，不确定的情况下只能挨个试错，在没有万分把握的情况下一定要对原文件进行备份！说多了都是泪啊。最后还要万分感谢开头提到的原文作者，我已经打赏过了，如果你们觉得这篇文章有用也可以去打赏一下他
