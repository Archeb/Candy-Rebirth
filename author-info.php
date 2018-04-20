<div class="author-info right-in-animation">
    <?php if ($this->options->logoURL){ ?>
            <img class="avatar" src="<?php $this->options->logoURL(); ?>" width="100" height="100">
    <?php }else{
            $this->author->gravatar(100,null,null,'avatar'); 
           }
    ?>
            <div class="name"><?php $this->options->title(); ?></div>
            <div class="desc"><?php $this->options->description(); ?></div>
            <div class="stat">
                <?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                <div class="article-count"><?php echo $stat->PublishedPostsNum ?></div>
                <div class="category-count"><?php echo $stat->categoriesNum ?></div>
                <div class="comment-count"><?php echo $stat->PublishedCommentsNum ?></div>
            </div>
            <div class="social">
                <?php if ($this->options->SNSHTML) echo $this->options->SNSHTML ; ?>
            </div>
            <div class="copyright">
                © <?php $this->options->title(); ?> 2014-2018
                <div class="theme-info">
                    Theme <a href="https://github.com/Archeb/Candy-Rebirth">Candy-Rebirth</a> By <a href="https://qwq.moe/">Archeb</a>
                </div>
            </div>
        </div>