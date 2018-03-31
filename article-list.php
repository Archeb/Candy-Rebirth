<?php
 
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit;
	?>

        
            <?php while($this->next()): ?>
            <?php if ($this->fields->previewImage && $this->fields->previewImage!==""): ?>
            <div class="article-with-preview" onclick="showArticle('<?php $this->permalink() ?>')">
                <div class="cover">
                    <div class="cover-image" style="background-image:url(<?php $this->fields->previewImage(); ?>)"><div class="title"><?php $this->title(); ?></div></div>
                    
                </div>
                <div class="content">
                    <div class="text">
                        <?php $this->excerpt(50, '') ?>
                    </div>
                </div>
                <div class="meta">
                    <div class="group">
                        <?php array_map(function($v){echo '<a class="category" href="'.$v['permalink'].'" style="'.$v['description'].'">'.$v['name'].'</a>';},$this->categories) ?>
                    </div>
                    <div class="group date"><?php echo time_elapsed_string('@'.$this->created) ?>前 · <?php $this->author(); ?></div>
                </div>
            </div>
            <?php else: ?>
            <div class="article" onclick="showArticle('<?php $this->permalink() ?>')">
                <div class="title"><?php $this->title(); ?>
                    <div class="meta"><?php array_map(function($v){echo '<a class="category" href="'.$v['permalink'].'" style="'.$v['description'].'">'.$v['name'].'</a>';},$this->categories) ?> <?php $this->author(); ?> · <?php echo time_elapsed_string('@'.$this->created) ?>前</div>
                </div>
                
                <div class="content">
                    <?php $this->content(); ?>
                </div>
            </div>
            <?php endif; endwhile;?>