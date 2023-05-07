<?php

use common\models\Image;
use common\models\Title;

/** @var yii\web\View $this
 * @var Image[] $Images
 * @var Image   $Image
 * @var string  $banner_image
 */
$this->title = 'Hội sinh viên Trường Đại học Mở Hà Nội';
?>
<div class="aurel_main_wrapper aurel_top_padding_no aurel_bottom_padding_no">
	<div class="aurel_container">
		<div class="aurel_content_wrapper row aurel_no_sidebar">
			<div class="aurel_content col col-12">
				<div class="aurel_tiny">
					<div class="row aurel_js_bg_image aurel_js_min_height aurel_bg_center_center aurel_bg_size_cover aurel_pf_fullwidth" data-src="<?= $banner_image ?>" data-min-height="450">
					</div>
					<div class="row aurel_pf_fullwidth">
						<div class="col col-12">
							<div class="aurel_widget_pm_grid_gallery">
								<div class="aurel_widget_container">
									<div class="aurel_front_end_display">
										<div class="aurel_grid_wrapper aurel_photoswipe_wrapper aurel_grid_007" data-uniqid="007" data-perload="4">
											<div class="aurel_grid_inner aurel_isotope_trigger is_masonry grid_columns4 hover_type_solid_plus side_paddings_off" data-perload="4" data-pad="30">
												<?php foreach ($Images as $Image): ?>
													<div class="grid-item element grid_b2p">
														<div class="grid-item-inner">
															<img src="<?php echo urldecode($Image->image_url) ?>" class="grid_thmb" alt=""/>
														</div>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
