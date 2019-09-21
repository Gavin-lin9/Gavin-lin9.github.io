Mac 上实现Apache + php + Mysql 的环境搭建
==

# 一级标题
第一次尝试搭建环境，踩了很多坑，在这里简单作以总结
万分感谢 https://www.jianshu.com/p/2fb9a3bb12f6 这篇文章，才得以解决困扰了我好几天的问题。本文大部分内容均出自于此，再加上自己的一些亲身经历，第一次发文如有不足或冒犯之处还请多多见谅

## 为什么我要自己搭环境
本来是用的xampp，但是最新版的xampp我找不到xamppfiles这个文件，而网上的大部分教程都是基于之上，所以在修改Apache根目录时费了不少时间，好不容易改完之后发现莫名其妙的mysql又打不开了，谷歌了数个小时都没有解决问题，无奈之下只能自己搭建环境，反正这些坑早晚都是要踩的

# Apache+PHP配置
mac系统都自带了Apache和PHP环境，只是默认情况下没有开启，我个人设备环境如下：
PHP版本：7.1.23 
Apache版本 2.4.34 (Unix)
系统版本：macOS Mojave  10.14.6

# 开启Apache
打开终端，输入�如下开启命令。

开启Apache：sudo apachectl start
关闭Apache：sudo apachectl stop
重启Apache：sudo apachectl restart
在浏览器中输入localhost，�如果出现如下默认的“It works!”界面，则表示Apache开启成功。

![开启成功]/url/to/./1.png