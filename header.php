<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<?php if($this->is('index')){?>
<title><?php $this->options->title() ?> - <?php $this->options->description() ?></title>
<?php }else{?>
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
<?php }?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="icon" href="<?php $this->options->themeUrl();?>favicon.ico">
<link rel="stylesheet" href="<?php $this->options->themeUrl();?>css/style.css" type="text/css">
<!--[if lte IE 8]><script>window.location.href='http://cdn.dmeng.net/upgrade-your-browser.html?referrer='+location.href;</script><![endif]-->
<?php $this->header(); ?>
<?php echo $this->options->analysis; ?>
</head>
<body>
<div id="container">
  <div class="left-col">
    <div class="overlay"></div>
    <div class="intrude-less">
      <header id="header" class="inner">
        <a href="<?php $this->options->siteUrl(); ?>" class="profilepic">
          <img src="<?php $this->options->themeUrl();?>tx.png" class="js-avatar"/>
        </a>

        <hgroup>
        <h1 class="header-author"><a href="/"><?php $this->options->title(); ?></a></h1>
        </hgroup>
        <p class="header-subtitle"><?php $this->options->description() ?></p>
        <!--搜索框
        <form method="post" id="searchform" action="<?php $this->options->siteUrl(); ?>">
        <input type="text" id="sear_txt" name="s" placeholder="Search..."/>
        </form>
        -->
        <div class="switch-btn">
          <div class="icon">
            <div class="icon-ctn">
              <div class="icon-wrap icon-house" data-idx="0">
                <div class="birdhouse"></div>
                <div class="birdhouse_holes"></div>
              </div>
              <div class="icon-wrap icon-ribbon hide" data-idx="1">
                <div class="ribbon"></div>
              </div>
              <div class="icon-wrap icon-me hide" data-idx="0">
                <div class="user"></div>
                <div class="shoulder"></div>
              </div>
            </div>

          </div>
          <div class="tips-box hide">
            <div class="tips-arrow"></div>
            <ul class="tips-inner">
              <li>菜单</li>
              <li>标签</li>
              <li>友链</li>
              <li>关于</li>
            </ul>
          </div>
        </div>


        <div class="switch-area">
          <div class="switch-wrap">
            <section class="switch-part switch-part1">
              <nav class="header-menu">
                <ul>
                  <?php $this->widget('Widget_Contents_Page_List')->to($pages);
                  while($pages->next()): ?>
                  <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                  <?php endwhile; ?>
                </ul>
              </nav>
              <nav class="header-nav">
                <div class="social">
                  <a class="github" rel="bookmark" target="_blank" href="<?php echo $this->options->github_url; ?>" title="github">github</a>
                  <a class="weibo" rel="bookmark" target="_blank" href="<?php echo $this->options->weibo_url;?>" title="weibo">weibo</a>
                  <a class="rss" rel="bookmark" target="_blank" href="<?php $this->options->feedUrl();?>" title="rss">rss</a>
                </div>
              </nav>
            </section>
            <section class="switch-part switch-part2">
              <div class="widget tagcloud" id="js-tagcloud">
              <?php echo yqccloudtags(); ?>
              </div>
            </section>
            <section class="switch-part switch-part3">
                <div id="js-aboutme"><?php echo $this->options->aboutme;?></div>
            </section>
            <section class="switch-part switch-part4">
                <div id="js-friends">
              <?php
              if($this->options->links!=""){
              $links = explode("\n",$this->options->links);
              foreach($links as $link){
              if(strpos($link,'|')!=FALSE){
                $s = explode('|',$link);
                echo '<a rel="friend" target="_blank" class="main-nav-link switch-friends-link" href="'.$s[1].'">'.$s[0].'</a><br/>';
                }else{
                echo '<a rel="friend" target="_blank" class="main-nav-link switch-friends-link" href="'.$link.'">'.$link.'</a><br/>';
                }
              }
              }
              ?>
              </div>
            </section>
          </div>
        </div>
      </header>				
    </div>
  </div>
  <div class="mid-col">
    <nav id="mobile-nav">
        <div class="overlay">
  		<div class="slider-trigger"></div>
  		<h1 class="header-author js-mobile-header hide"><?php $this->options->title() ?></h1>
  	</div>
      <div class="intrude-less">
        <header id="header" class="inner">
          <div class="profilepic">
            <img src="<?php $this->options->themeUrl();?>tx.png" class="js-avatar">
          </div>

          <hgroup>
          <h1 class="header-author"><a href="/"><?php $this->options->title(); ?></a></h1>
          </hgroup>

          <p class="header-subtitle"><?php $this->options->description(); ?></p>
          <nav class="header-menu">
            <ul>
                  <?php $this->widget('Widget_Contents_Page_List')->to($pages);
                  while($pages->next()): ?>
                  <li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
                  <?php endwhile; ?>
              <div class="clearfix"></div>
            </ul>
          </nav>
          <nav class="header-nav">
            <div class="social">
              <a class="github" target="_blank" href="<?php echo $this->options->github_url; ?>" title="github">github</a>
              <a class="weibo" target="_blank" href="<?php echo $this->options->weibo_url; ?>" title="weibo">weibo</a>
              <a class="rss" target="_blank" href="<?php $this->options->feedUrl();?>" title="rss">rss</a>
            </div>
          </nav>
        </header>				
      </div>
    </nav>