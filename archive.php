<?php $this->need('header.php'); ?>
<div class="body-wrap">
<section class="archives-wrap">
  <div class="archive-year-wrap">
    <a href="javascript:void(0);" class="archive-year">
    <?php
    if($this->have()){
    $this->archiveTitle('', '', '');
    }else{
    echo '<h1>未找到</h1>';
    }
    ?>
    </a>
  </div>
  <div class="archives">
    <?php
    while($this->next()){
    ?>
    <article class="archive-article archive-type-post">
      <div class="archive-article-inner">
        <header class="archive-article-header">
          <div class="article-meta">
            <a href="<?php $this->permalink();?>" class="archive-article-date">
              <time datetime="<?php $this->date('Y-m-d\TH:i:s.000\Z');?>" itemprop="datePublished"><?php $this->date('M j');?></time>
            </a>
            <br>
          </div>

          <h1 itemprop="name">
            <a class="archive-article-title" href="<?php $this->permalink();?>"><?php $this->title() ?></a>
          </h1>
          <div class="article-info info-on-right">
            <div class="articla-tag tagcloud">
                <?php echo yqctags($this);?>
            </div>
           </div>
           <div class="clearfix"></div>
        </header>
      </div>
    </article>
    <?php }?>
  </div>
</section>
</div>
<br>
<?php $this->pageNav('&laquo; 上一页','下一页 &raquo;',1,'...'); ?>
<?php $this->need('footer.php'); ?>
