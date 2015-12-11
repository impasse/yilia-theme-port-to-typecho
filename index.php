<?php
/**
* 移植Yilia主题到Typecho
* 
* @package Yilia
* @author Litten
* @version 0.1
* @link http://litten.github.io/
*/
 $this->need('header.php');
?>
<div class="body-wrap">
    <?php while($this->next()):?>

    <article class="article article-type-post" data-thread-key="<?php echo $this->cid;?>" itemscope itemprop="blogPost">
      <div class="article-meta">
        <a href="<?php $this->permalink() ?>" class="article-date">
        <time datetime="<?php $this->date('Y-m-d\TH:i:s.000\Z'); ?>" itemprop="datePublished"><?php $this->date('M j');?></time>
        </a>
      </div>
      <div class="article-inner">
        <input type="hidden" class="isFancy" />
        <header class="article-header">
          <h1 itemprop="name">
            <a class="article-title" href="<?php $this->permalink(); ?>"><?php $this->title() ?></a>
          </h1>
        </header>
        <div class="article-entry" itemprop="articleBody">
          <?php $this->content(''); ?>
        </div>
        <div class="article-info article-info-index">
            <div class="article-tag tagcloud">
                <?php echo yqctags($this);?>
            </div>
            <div class="article-category tagcloud">
            	<?php $this->category(""); ?>
            </div>
            <p class="article-more-link">
                <a href="<?php $this->permalink();?>#more">更多内容&gt;&gt;</a>
            </p>
            <div class="clearfix"></div>
        </div>
      </div>
    </article>
    <?php endwhile; ?>
    <?php $this->pageNav('&laquo; 上一页','下一页 &raquo;',1,'...'); ?>
</div>
<?php $this->need('footer.php');?>
