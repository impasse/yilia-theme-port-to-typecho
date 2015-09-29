<?php

function themeConfig($form) {
    $github_url = new Typecho_Widget_Helper_Form_Element_Text('github_url',NULL,NULL,'GitHub地址','首页的GitHub图标链接地址');
    $form->addInput($github_url);
     $weibo_url = new Typecho_Widget_Helper_Form_Element_Text('weibo_url',NULL,NULL,'新浪微博地址','首页的新浪微博地址图标链接地址');
     $form->addInput($weibo_url);
     $duoshuo = new Typecho_Widget_Helper_Form_Element_Text('duoshuo',NULL,NULL,'多说域名','多说代码中的ShortName');
     $form->addInput($duoshuo);
     $jiathis = new Typecho_Widget_Helper_Form_Element_Text('jiathis',NULL,NULL,'jiathis的UID','JiaThis代码中的UID');
     $form->addInput($jiathis);
     $links = new Typecho_Widget_Helper_Form_Element_Textarea('links', NULL, NULL, _t('友情链接'),'格式为:名称|URL，每行一个');
     $form->addInput($links);
     $aboutme = new Typecho_Widget_Helper_Form_Element_Textarea('aboutme', NULL, NULL, _t('个人说明'),'首页个人说明内容');
     $form->addInput($aboutme);
     $analysis = new Typecho_Widget_Helper_Form_Element_Textarea('analysis', NULL, NULL, _t('页面统计'),'放置页面统计代码');
     $form->addInput($analysis);
}
/* 自定tags的输出格式 */
function yqctags($widget, $split = ',', $default = NULL){
  $outstr = '<ul class="article-tag-list">';
  if ($widget->tags) {
    foreach ($widget->tags as $tag) {
      $outstr.= '<li class="article-tag-list-item"><a href="'.$tag['permalink'].'">'.$tag['name'].'</a></li>';
    }
  } else {
    $outstr.= '<li class="article-tag-list-item"><a href="javascript:void(0);">无标签</a></li>';
  }
  $outstr.='</ul>';
  return $outstr;
}
/* 自定义标签云 */
function yqccloudtags(){
  Typecho_Widget::widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'limit' => 20, 'ignoreZeroCount' => true, 'desc' => true))->to($tags); 
  $outcloud ='';
  if($tags->have()){
    while ($tags->next()){
      $outcloud .= '<a href="'.$tags->permalink.'">'.$tags->name.'</a>';
    }
  }
  return $outcloud;
}
/**
 * 显示下一篇
 *
 * @access public
 * @param string $default 如果没有下一篇, 显示的默认文字
 * @return void
 */
function theNext($widget, $word = '下一篇', $default = NULL)
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
        ->where('table.contents.created > ?', $widget->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $widget->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_ASC)
        ->limit(1);
    $content = $db->fetchRow($sql);

    if ($content) {
        $content = $widget->filter($content);
        $link = '<a href="' . $content['permalink'] . '" id="article-nav-newer" class="article-nav-link-wrap" title="' . $content['title'] . '">' . '<strong class="article-nav-caption"><</strong><div class="article-nav-title">' . $content['title'] . '</div>' . '</a>';
        echo $link;
    } else {
        echo $default;
    }
}

/**
 * 显示上一篇
 *
 * @access public
 * @param string $default 如果没有上一篇, 显示的默认文字
 * @return void
 */
function thePrev($widget, $word = '上一篇', $default = NULL)
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
        ->where('table.contents.created < ?', $widget->created)
        ->where('table.contents.status = ?', 'publish')
        ->where('table.contents.type = ?', $widget->type)
        ->where('table.contents.password IS NULL')
        ->order('table.contents.created', Typecho_Db::SORT_DESC)
        ->limit(1);
    $content = $db->fetchRow($sql);

    if ($content) {
        $content = $widget->filter($content);
        $link = '<a href="' . $content['permalink'] . '" id="article-nav-older" class="article-nav-link-wrap" title="' . $content['title'] . '">' . '<div class="article-nav-title">' . $content['title'] . '</div><strong class="article-nav-caption">></strong>' . '</a>';
        echo $link;
    } else {
        echo $default;
    }
}