<?php
 
if (!defined('__TYPECHO_ROOT_DIR__'))
	exit;
	?>

        <?php function listArticles($art){
            $delay=0;
            while($art->next()):
            $delay++; ?>
            <?php if ($art->fields->previewImage && $art->fields->previewImage!==""): ?>
            <div class="article-with-preview right-in-animation" style="animation-duration:<?php echo 0.5+$delay*0.1?>s">
                <div class="cover" onclick="showArticle('<?php $art->permalink() ?>')">
                    <div class="cover-image" style="background-image:url(<?php $art->fields->previewImage(); ?>)"><div class="title"><?php $art->title(); ?></div></div>
                </div>
                <div class="content" onclick="showArticle('<?php $art->permalink() ?>')">
                    <div class="text">
                        <?php $art->excerpt(50, '') ?>
                    </div>
                </div>
                <div class="meta">
                    <div class="group">
                        <?php array_map(function($v){echo '<a class="category" onclick="showArchive(\''.$v['permalink'].'\')" style="'.$v['description'].'">'.$v['name'].'</a>';},$art->categories) ?>
                    </div>
                    <div class="group date"><?php echo time_elapsed_string('@'.$art->created) ?>前 · <?php $art->author(); ?></div>
                </div>
            </div>
            <?php else: ?>
            <div class="article right-in-animation">
                <div class="title"><a onclick="showArticle('<?php $art->permalink() ?>')"><?php $art->title(); ?></a>
                    <div class="meta"><?php array_map(function($v){echo '<a class="category" onclick="showArchive(\''.$v['permalink'].'\')" style="'.$v['description'].'">'.$v['name'].'</a>';},$art->categories) ?> <?php $art->author(); ?> · <?php echo time_elapsed_string('@'.$art->created) ?>前</div>
                </div>
                
                <div class="content" onclick="showArticle('<?php $art->permalink() ?>')">
                    <?php $art->content(); ?>
                </div>
            </div>
            <?php endif; endwhile;?>
            
        <?php } ?>