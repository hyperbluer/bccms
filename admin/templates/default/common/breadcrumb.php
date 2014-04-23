<?php 
$param_key = BC::$module == 'content' && $_categoryId ? 'category_id' : 'menu_id';
$param_id = BC::$module == 'content' && $_categoryId ? $_categoryId : $_menuId;
?>
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							<?php echo $_breadcrumb[$param_id]['name'];?>
							<!--<small><?php echo $_breadcrumb[$param_id]['alias'];?></small>-->
						</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="<?php echo _url('index', array('menu_id' => 1));?>">首页</a>
								<i class="icon-angle-right"></i>
							</li>
							<?php if (BC::$module == 'content' && $_categoryId):?>
							<li>
								<a href="<?php echo _url('category', array('menu_id' => 12));?>">栏目</a>
								<i class="icon-angle-right"></i>
							</li>
							<?php endif;?>
							<?php foreach ($_breadcrumb as $v):?>
							<li>
								<a href="<?php echo _url($v['url'], array($param_key => $v[$param_key]));?>"><?php echo $v['name'];?></a>
								<?php if ($v[$param_key] != $param_id):?><i class="icon-angle-right"><?php endif?></i>
							</li>
							<?php endforeach;?>
							<!--
							<li class="pull-right no-text-shadow">
								<div id="dashboard-report-range" class="dashboard-date-range tooltips no-tooltip-on-touch-device responsive" data-tablet="" data-desktop="tooltips" data-placement="top" data-original-title="选择时间段">
									<i class="icon-calendar"></i>
									<span></span>
									<i class="icon-angle-down"></i>
								</div>
							</li>
							-->
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->