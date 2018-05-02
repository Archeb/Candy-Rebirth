<?php
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit ;
	
if(!isset($_GET['ajaxload'])){
    $this->need('header.php');
    ?><div id="index" class="screen index">
    <div style="margin:40vh auto;text-align:center;">
    <h1 style="font-size:2.3rem"><?php $this->options->title(); ?></h1>
    <span style="color:#696969;font-size:0.9rem"><?php $this->options->description(); ?></font>
        <h3></h3>
        <br>
        <a href="#" class="btn" onclick="Move('#archive','#index','right')">Explore Me</a>
    </div>
    
</div>
<div id="archive" class="screen archive">
    <div class="archive-container">
        <?php $this->need('author-info.php'); ?>
        <div class="article-list">
            <?php $art=$this->widget('Widget_Archive@indexfenlei', 'pageSize=5&type=index') ?>
            <?php $this->need('article-list.php'); 
            listArticles($art); ?>
        </div>
    </div>
    <div class="category-container">
        
    </div>
</div>
<div id="page" class="screen page move-show" style="overflow-y: scroll;">
    <div class="page-container">
    <?php
	}
?>
<div class="page-wrapper">
    <?php if ($this->fields->previewImage && $this->fields->previewImage!==""): ?>
    <div class="cover">
        <div class="cover-image" style="background-image:url(<?php $this->fields->previewImage(); ?>)">
            <div class="title"><?php $this->title(); ?>
            <div class="meta"><?php array_map(function($v){echo '<a class="category" onclick="showArchive(\''.$v['permalink'].'\')" style="'.$v['description'].'">'.$v['name'].'</a>';},$this->categories) ?> <?php $this->author(); ?> · <?php echo time_elapsed_string('@'.$this->created) ?>前</div></div>
        </div>
    </div>
    <?php else: ?>
    <div class="title"><?php $this->title(); ?>
    <div class="meta"><?php array_map(function($v){echo '<a class="category" onclick="showArchive(\''.$v['permalink'].'\')" style="'.$v['description'].'">'.$v['name'].'</a>';},$this->categories) ?> <?php $this->author(); ?> · <?php echo time_elapsed_string('@'.$this->created) ?>前</div>
    </div>
    <?php endif; ?>
    <div class="content">
        <?php $this->content(); ?>
    </div>
    <?php $this->need('comments.php'); ?>
</div>
<?php 
if(!isset($_GET['ajaxload'])){
?>
    </div>
</div>
<script>
document.querySelector('#back').style.transform="rotate(90deg)";
document.querySelector(".drop-down").style.transform="translate(0)";
        document.querySelector(".drop-down").style.opacity="1";
        var codeBlocks=document.querySelectorAll('pre code').forEach((e)=>{
                　　hljs.highlightBlock(e);
                });
    var pageInfo=<?php echo json_encode(
        [
            'currentPage' => $art->_currentPage,
            'total'=> $art->getTotal(),
            'pageSize' => $art->parameter->pageSize,
            'type' => $art->parameter->type
        ]
        )  ?>
</script>
<?php
}
?>
