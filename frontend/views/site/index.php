<?php

use common\models\Title;
use yii\helpers\Url;

/** @var yii\web\View $this
 * @var Title[] $titles
 * @var Title   $title
 * @var string  $banner_image
 */
$this->title = 'Hội sinh viên Trường Đại học Mở Hà Nội';
?>
<div class="row aurel_js_bg_image aurel_js_min_height aurel_bg_top_center aurel_bg_size_cover aurel_pf_fullwidth parallax aurel_landing_container aurel_landing_title aurel_sm_min_height_auto" data-src="<?= $banner_image; ?>" data-min-height="750" style="background-position: 50% 0px; background-image: url('<?= $banner_image; ?>');">
	<div class="row push-bottom aurel_landing_content" style="margin-bottom:10px">
		<?php foreach ($titles as $title): ?>
			<div class="col-md-3 aurel_widget_button aurel_mb_20 aurel_sm_mb_100">
				<div class="aurel_widget_container aurel_text_align_center">
					<a href="<?= Url::to([
						'/image/index',
						'name'     => preg_replace('/\s+/', '-', $title->name),
						'title_id' => $title->id,
					]) ?>" class="aurel-button" style="width: 300px;">
						<span><?= $title->name ?></span>
					</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
