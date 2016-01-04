
    <footer id="footer">
      <div class="outer">
        <div id="footer-info">
          <div class="footer-left">
            &copy;  <?php echo date('Y');?>  <a href="<?php $this->options->siteurl(); ?>"><?php $this->options->title(); ?></a>|<a href="http://www.miitbeian.gov.cn/" rel="nofollow"  target="_blank">豫ICP备15030578号</a>
          </div>
          <div class="footer-right">
            <a href="http://typecho.org/" target="_blank">Typecho</a>  Theme <a href="https://github.com/lingmm/yilia-theme-port-to-typecho" target="_blank">Yilia</a> by Litten
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script>
  var yiliaConfig = {
		fancybox: true,
		mathjax: undefined,
		animate: true,
		isHome: <?php echo $this->is('index')?'true':'false'; ?>,
		isPost: <?php echo $this->is('post')?'true':'false'; ?>,
		isArchive: <?php echo $this->is('archive')?'true':'false'; ?>,
		isTag: false,
		isCategory: false,
		open_in_new: false,
		prettify: true,
		base_url: "<?php $this->options->themeUrl();?>"
	}</script>
  <script src="//cdn.bootcss.com/require.js/2.1.20/require.min.js" type="text/javascript"></script>
  <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
  <script src="<?php $this->options->themeUrl(); ?>js/main.js" type="text/javascript" ></script>
<?php $this->footer(); ?>
</div>
</body>
</html>
