<?php
spl_autoload_register(function($class){
  require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\MarkdownExtra;

# Read file and pass content through the Markdown parser
$html = MarkdownExtra::defaultTransform($article[0]['content']);


?>
  <div class="col-sm-8 col-sm-offset-2"  style="background-color: #FFF;margin-top:20px;border-radius: 8px;box-shadow:5px 5px 8px #DDDDDD,-5px -5px 8px #DDDDDD;">
    <div class="article" style="padding-top:50px;padding-bottom:50px;">
      <h2 class="text-center">
        <?php echo $article[0]['title'];?>
      </h2>
      <center>
        <p>
          <small class="text-muted">
            <?php $category_id = $article[0]['category'];$category_name = $all_category["$category_id"]['category'];?>
                分类于&nbsp<?php echo anchor("Category/show/{$category_id}","$category_name","")?> &nbsp&nbsp|&nbsp&nbsp<?php echo date('Y年m月d日',strtotime($article[0]['published_at']));?>&nbsp&nbsp|&nbsp&nbsp阅读人次：<?php echo $article[0]['pv'];?>次
          </small>
        </p>
        <?php if(isset($article[0]['tag'])):?>
          <?php foreach ($article[0]['tag'] as $key => $value):?>
            <?php echo anchor("/Tag/show/{$key}","<button type='button' class='btn btn-{$button_type["$value"]} btn-xs'>{$value}</button>","");?>
          <?php endforeach?>
        <?php endif?>
        <hr>
        </center>
        <article class="markdown-body">
          <?php echo $html; ?>
        </article>
    </div>     
    <!-- <hr style="height:1px;border:none;border-top:3px dashed #DDD;"> -->
    <div class="ds-thread" data-thread-key="<?php echo $article[0]['id'];?>" data-title="<?php echo $article[0]['title'];?>" data-url="<?php echo base_url("/Articles/article/{$article[0]['id']}");?>"></div>
  </div>
  <script type="text/javascript">
var duoshuoQuery = {short_name:"neytoph"};
  (function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] 
     || document.getElementsByTagName('body')[0]).appendChild(ds);
  })();
  </script>