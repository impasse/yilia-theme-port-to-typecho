<!DOCTYPE html>
<html>
	<head>
		<title>您要查看的页面不存在</title>
		<style>
			body{
				margin:0;
			}
			a{
				text-decoration: none;
				color: black;
			}
			#fullpage{
				width: 100%;
				height: 100%;
				overflow: hidden;
				position: absolute;
				background-image: url(<?php $this->options->themeUrl();?>404.jpg);
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}
			#center{
				width:80%;
				height:70%;
				position: relative;
				top: 15%;
				left:10%;
				background-color: white;
				opacity: 0.5;
				box-shadow:2px 3px 5px black;
				border-radius: 5px 5px;
			}
			#title{
				font-size: 3em;
				opacity: 1;
				text-align: center;
				font-weight: bold;
				padding: 0.5em;
			}
			#content{
				padding:2em;
				height: 2em;
				line-height: 2em;
				font-size: 1.5em;
			}
		</style>
	</head>
	<body>
		<div id="fullpage">
			<div id="center">
				<div id="title">404 Not Found</div>
				<div id="content">您要查看的页面不存在，可能原因是：<br/>
				此页面已被删除 或 链接拼写不正确；<br/>
				<a href="<?php $this->options->siteUrl(); ?>">回到<?php $this->options->title(); ?></a>
				</div>
			</div>
		</div>
	</body>
</html>
