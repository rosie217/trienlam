<?php

use common\models\Image;
use common\models\Title;

/** @var yii\web\View $this
 * @var Image[] $Images
 * @var Image $Image
 * @var string $banner_image
 * @var string $title_name
 */
$this->title = 'Hội sinh viên Trường Đại học Mở Hà Nội';
?>
<header class="pm_header fixed_header">
    <div class="pm_fleft">
        <h3 style="margin: 0"><?=$title_name?></h3>
    </div>
</header>
<div class="pm_album_tape">
    <div class="pm_fullscreen_toggler"></div>
    <div class="pm_navigation_container">
        <div class="pm_prev_slide_button">
            <div class="pm_prev_thumb_cont"></div>
            <div class="pm_prev_button_fader"></div>
        </div>
        <div class="pm_pause_button"></div>
        <div class="pm_next_slide_button">
            <div class="pm_next_thumb_cont"></div>
            <div class="pm_next_button_fader"></div>
        </div>
    </div>

    <div class="pm_gallery_container gallery_tape">
        <div class="pm_gallery">
            <?php foreach ($Images as $key => $Image):?>
            <div class="pm_gallery_item" id="item_<?=$key+1?>" data-number="<?=$key+1?>"
                 data-thumbnail="<?= $Image->image_url?>">
                <img src="<?=$Image->image_url?>" alt="Pines"/>
            </div>
            <?php endforeach;?>
        </div><!-- pm_gallery -->
        <div class="clear"></div>
    </div><!-- pm_gallery_container -->
</div>
