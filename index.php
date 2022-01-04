<html>
<head>
<title>
欢迎访问LLT新闻系统！
</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/news.css" type="text/css">
    <script src="//cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="path/to/bootstrap.min.css" rel="stylesheet">
    <link href="path/to/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="path/to/jquery.min.js"></script>
    <script src="path/to/bootstrap.min.js"></script>

</head>
<body>

	<div id="header">
        <div id="logo"><img src="images/logo.png"></div>
		<div id="menu">
            <div class="row">
                <div class="col-md-12">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <ul id="breadcrumb" class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp"  style="border-top: red solid 3px">
                                <li><a  href="index.php?url=news_list.php">首页</a></li>
                                <li><a href="index.php?url=review_list.php">评论审核</a></li>
                                <li><a href="index.php?url=tougao_list.php">新闻审核</a></li>
                                <li><a href="index.php?url=category_list.php">分类浏览</a></li>
                                <li><a href="index.php?url=news_add.php">新闻发布</a></li>
                                <li><a href="index.php?url=category_add.php">添加分类</a></li>
                                <li><a href="index.php?url=tougao.php">我要投稿</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        登录 <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <div class="login">
                                            <?php
                                            include_once("functions/is_login.php");
                                            $login=new islogin();
                                            if(isset($_GET["login_message"])) {
                                                if ($_GET["login_message"] == "password_error") {
                                                    echo ("<script type='text/javascript'>alert('密码错误请重新输入！');history.back();</script>");
                                                }
                                                else if ($_GET["login_message"] == "password_right") {
                                                    echo ("<script type='text/javascript'>alert('登录成功！');history.back();</script>");

                                                }
                                            }
                                            $name = "";
                                            if(isset($_COOKIE["name"])){
                                                $name = $_COOKIE["name"];
                                            }
                                            $password = "";
                                            if(isset($_COOKIE["password"])){
                                                $password = $_COOKIE["password"];
                                            }
                                            ?>
                                            <form action="login_process.php" method="post" name="testform">
                                                用户名：<label>
                                                    <input type="text" name="name" size="11" placeholder="请输入用户名" " />
                                                </label><br/>
                                                密 码 ：<label>
                                                    <input type="password" name="password" size="11" placeholder="请输入密码"  />
                                                </label><br/>
                                                <a href="./uploads/register.html">还没有账号？点击注册</a>
                                                <br/><br/>
                                                <input class="btn" type="submit" value="登录" />
                                                <input class="btn" type="button" value="注销" onclick="location=window.location.href='logout.php'">
                                            </form>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </div>

            </div>
		</div>
        <div id="container">
<div class="ad"><img src="https://yt-adp.ws.126.net/zhangmaoling/1200125_arjy_20200605.jpg"></div>

        <div id="pagebody">
		<div id="sidebar"><br>
		<h4 style="border-left: red solid 2px" >热点新闻</h4>
            <?php

            include_once("popular_news_list.php");
            ?>
		</div>
		<div id="mainbody">
			<div id="mainfunction">
				<br>
				<?php
					if(isset($_GET["url"])){
						$url = $_GET["url"];
					}else{
						$url = "news_list.php";
					}
					include_once($url);
				?>
			</div>
		</div>
            <div class="carousel">
            <div id="myCarousel" class="carousel slide">
                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner" style="border-top: red solid 3px">
                    <div class="item active" >
                        <a href="http://localhost:63342/phpstorm%20project/news/index.php?url=news_detail.php&keyword=&news_id=35"> <img  src="https://cms-bucket.ws.126.net/2020/0614/85a1404cj00qbwmnc003cc0008c00b4c.jpg?imageView&thumbnail=300y400&type=webp" alt="First slide"></a>
                        <div class="carousel-caption">浙江槽罐车爆炸，楼房房顶炸毁</div>
                    </div>
                    <div class="item">
                        <a href="http://localhost:63342/phpstorm%20project/news/index.php?url=news_detail.php&keyword=&news_id=37">
                        <img src="https://cms-bucket.ws.126.net/2020/0614/885132e4j00qbwmwo0039c0008c00b4c.jpg?imageView&thumbnail=300y400&type=webp" alt="Second slide">
                        </a>
                            <div class="carousel-caption">“黑人的命也是命”字样现身旧金山</div>
                    </div>
                    <div class="item">
                        <a href="http://localhost:63342/phpstorm%20project/news/index.php?url=news_detail.php&keyword=&news_id=36">
                        <img src="https://cms-bucket.ws.126.net/2020/0614/997e7091j00qbwmi4002jc0008c00b4c.jpg?imageView&thumbnail=300y400&type=webp" alt="Third slide">
                        </a>
                            <div class="carousel-caption">北京市民在体育场进行核酸采样</div>
                    </div>
                </div>
                <!-- 轮播（Carousel）导航 -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
                <div class="adv">
                    <a href="https://ecare.unicef.cn/campaign/201904cws/index.php?utm_source=NeteaseX_DG201&utm_campaign=NeteaseX-Xaxis_square_300x250&utm_medium=DSPC-Xaxis-Response&pyx=%26r%3D14eb5c0734df47a8b9d0babed241583c%26ap%3D350000%26ac%3D350100%26os%3D3%26pf%3Dwindows%26bt%3D2%26nt%3D0%26gi%3Da9ea9b4a32d60c60a9c9313f2ffeac61%26m%3D1%26clt%3Dpc%26st%3D7%26cr%3Dnews%26ipf%3D0%26isp%3D4%26cid%3Da9ea9b4a32d60c60a9c9313f2ffeac61%26av%3D1.0%26dm%3Dx64%26at%3D%26lo%3D%26la%3D%26apt%3D%26mac%3D%26utp%3D1%26oaid%3D%26u%3DhHH8jLP%252FkOgy7YlaQnBDPa%252B9a9fR0QNBgqHoxRm8Bx9yIUN4%252Bxx5gW4YmoioxwFW%26ip%3D220.200.32.145%26ates%3D21245%26pnes%3D279483%26soes%3D665765%26iaes%3D1139246%26ct%3D2%26it%3D38%26i1%3D18%26i2%3D152%26lc%3D31&classify_code=21&ptc=1" >
                        <img src="https://pg-ad-b1.ws.126.net/yixiao/21245/88d1c6a41305f9a9d0b3d74804d7101c.jpg">
                    </a>
                </div>
        </div>
        </div>

        </div>

		<div style="clear:both;">
	<div id="footer" style="border-top: red solid 3px">
		<a href="http://baike.baidu.com/view/6458345.htm">系统简介</a>
		<a href="http://baike.baidu.com/view/6458345.htm">联系方法</a>
		<a href="http://baike.baidu.com/view/6458345.htm">相关法律</a>
		<a href="http://baike.baidu.com/view/6458345.htm">举报违法信息</a>
		<br><br><a href="http://baike.baidu.com/view/6458345.htm">©LLT新闻系统版权所有</a>
	</div>
</div>
</div>
</body>
</html>
<script>
var sidebarHeight = document.getElementById("sidebar").clientHeight;
var mainbodyHeight = document.getElementById("mainbody").clientHeight;
if(sidebarHeight<500&&mainbodyHeight<500){
	document.getElementById("sidebar").style.height="500px";
	document.getElementById("mainbody").style.height="500px";
}else{
	if(sidebarHeight<mainbodyHeight){
		document.getElementById("sidebar").style.height=mainbodyHeight+"px";
	}else{
		document.getElementById("mainbody").style.height=sidebarHeight+"px";
	}
}
</script>
