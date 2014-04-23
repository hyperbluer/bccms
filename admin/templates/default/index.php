<?php echo $_header;?>
				<div id="dashboard">
					<!-- BEGIN DASHBOARD STATS -->
                    <!--
					<div class="row-fluid">
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat blue">
								<div class="visual">
									<i class="icon-comments"></i>
								</div>
								<div class="details">
									<div class="number">
										1349
									</div>
									<div class="desc">
										新评论
									</div>
								</div>
								<a class="more" href="#">
								查看更多 <i class="m-icon-swapright m-icon-white"></i>
								</a>
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat green">
								<div class="visual">
									<i class="icon-shopping-cart"></i>
								</div>
								<div class="details">
									<div class="number">549</div>
									<div class="desc">新订单</div>
								</div>
								<a class="more" href="#">
								查看更多 <i class="m-icon-swapright m-icon-white"></i>
								</a>
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
							<div class="dashboard-stat purple">
								<div class="visual">
									<i class="icon-globe"></i>
								</div>
								<div class="details">
									<div class="number">+89%</div>
									<div class="desc">品牌知名度</div>
								</div>
								<a class="more" href="#">
								查看更多 <i class="m-icon-swapright m-icon-white"></i>
								</a>
							</div>
						</div>
						<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
							<div class="dashboard-stat yellow">
								<div class="visual">
									<i class="icon-bar-chart"></i>
								</div>
								<div class="details">
									<div class="number">12万</div>
									<div class="desc">利润总额</div>
								</div>
								<a class="more" href="#">
								查看更多 <i class="m-icon-swapright m-icon-white"></i>
								</a>
							</div>
						</div>
					</div>
					-->
					<!-- END DASHBOARD STATS -->
					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet solid bordered light-grey">
								<div class="portlet-title">
									<div class="caption"><i class="icon-bar-chart"></i>站点访问统计</div>
									<div class="tools">
										<div class="btn-group pull-right" data-toggle="buttons-radio">
											<a href="javascript:;" class="btn mini">用户</a>
											<a href="javascript:;" class="btn mini active">评论</a>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<div id="site_statistics_loading">
										<img src="<?php echo ASSETS_ADMIN_PATH;?>img/loading.gif" alt="loading" />
									</div>
									<div id="site_statistics_content" class="hide">
										<div id="site_statistics" class="chart"></div>
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet solid light-grey bordered">
								<div class="portlet-title">
									<div class="caption"><i class="icon-bullhorn"></i>活跃度</div>
									<div class="tools">
										<div class="btn-group pull-right" data-toggle="buttons-radio">
											<a href="javascript:;" class="btn blue mini active">用户</a>
											<a href="javascript:;" class="btn blue mini">订单</a>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<div id="site_activities_loading">
										<img src="<?php echo ASSETS_ADMIN_PATH;?>img/loading.gif" alt="loading" />
									</div>
									<div id="site_activities_content" class="hide">
										<div id="site_activities" style="height:100px;"></div>
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
							<!-- BEGIN PORTLET-->
							<div class="portlet solid bordered light-grey">
								<div class="portlet-title">
									<div class="caption"><i class="icon-signal"></i>服务器运行状态</div>
									<div class="tools">
										<div class="btn-group pull-right" data-toggle="buttons-radio">
											<a href="javascript:;" class="btn red mini active">
											<span class="hidden-phone">数据库</span>
											<span class="visible-phone">缓存</span></a>
											<a href="javascript:;" class="btn red mini">Web服务器</a>
										</div>
									</div>
								</div>
								<div class="portlet-body">
									<div id="load_statistics_loading">
										<img src="<?php echo ASSETS_ADMIN_PATH;?>img/loading.gif" alt="loading" />
									</div>
									<div id="load_statistics_content" class="hide">
										<div id="load_statistics" style="height:108px;"></div>
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span6">
							<div class="portlet box purple">
								<div class="portlet-title">
									<div class="caption"><i class="icon-calendar"></i>基本状态</div>
									<div class="actions">
										<a href="javascript:;" class="btn yellow easy-pie-chart-reload"><i class="icon-repeat"></i> 刷新</a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="row-fluid">
										<div class="span4">
											<div class="easy-pie-chart">
												<div class="number transactions"  data-percent="55"><span>+55</span>%</div>
												<a class="title" href="#">交易量 <i class="m-icon-swapright"></i></a>
											</div>
										</div>
										<div class="margin-bottom-10 visible-phone"></div>
										<div class="span4">
											<div class="easy-pie-chart">
												<div class="number visits"  data-percent="85"><span>+85</span>%</div>
												<a class="title" href="#">访问量 <i class="m-icon-swapright"></i></a>
											</div>
										</div>
										<div class="margin-bottom-10 visible-phone"></div>
										<div class="span4">
											<div class="easy-pie-chart">
												<div class="number bounce"  data-percent="46"><span>-46</span>%</div>
												<a class="title" href="#">跳出率 <i class="m-icon-swapright"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="span6">
							<div class="portlet box blue">
								<div class="portlet-title">
									<div class="caption"><i class="icon-calendar"></i>服务器状态</div>
									<div class="tools">
										<a href="" class="collapse"></a>
										<a href="#portlet-config" data-toggle="modal" class="config"></a>
										<a href="" class="reload"></a>
										<a href="" class="remove"></a>
									</div>
								</div>
								<div class="portlet-body">
									<div class="row-fluid">
										<div class="span4">
											<div class="sparkline-chart">
												<div class="number" id="sparkline_bar"></div>
												<a class="title" href="#">网络 <i class="m-icon-swapright"></i></a>
											</div>
										</div>
										<div class="margin-bottom-10 visible-phone"></div>
										<div class="span4">
											<div class="sparkline-chart">
												<div class="number" id="sparkline_bar2"></div>
												<a class="title" href="#">CPU负载 <i class="m-icon-swapright"></i></a>
											</div>
										</div>
										<div class="margin-bottom-10 visible-phone"></div>
										<div class="span4">
											<div class="sparkline-chart">
												<div class="number" id="sparkline_line"></div>
												<a class="title" href="#">负载级别 <i class="m-icon-swapright"></i></a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN REGIONAL STATS PORTLET-->
							<div class="portlet">
								<div class="portlet-title">
									<div class="caption"><i class="icon-globe"></i>区域统计</div>
									<div class="tools">
										<a href="javascript:;" class="collapse"></a>
										<a href="#portlet-config" data-toggle="modal" class="config"></a>
										<a href="javascript:;" class="reload"></a>
										<a href="javascript:;" class="remove"></a>
									</div>
								</div>
								<div class="portlet-body">
									<div id="region_statistics_loading">
										<img src="<?php echo ASSETS_ADMIN_PATH;?>img/loading.gif" alt="loading" />
									</div>
									<div id="region_statistics_content" class="hide">
										<div class="btn-toolbar">
											<div class="btn-group " data-toggle="buttons-radio">
												<a href="javascript:;" class="btn mini active">用户</a>
												<a href="javascript:;" class="btn mini">订单</a>
											</div>
											<div class="btn-group pull-right">
												<a href="javascript:;" class="btn mini dropdown-toggle" data-toggle="dropdown">
												选择区域 <span class="icon-angle-down"></span>
												</a>
												<ul class="dropdown-menu">
													<li><a href="javascript:;" id="regional_stat_world">全世界</a></li>
													<li><a href="javascript:;" id="regional_stat_usa">美国</a></li>
													<li><a href="javascript:;" id="regional_stat_europe">欧洲</a></li>
												</ul>
											</div>
										</div>
										<div id="vmap_world" class="vmaps chart hide"></div>
										<div id="vmap_usa" class="vmaps chart hide"></div>
										<div id="vmap_europe" class="vmaps chart hide"></div>
									</div>
								</div>
							</div>
							<!-- END REGIONAL STATS PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet paddingless">
								<div class="portlet-title line">
									<div class="caption"><i class="icon-bell"></i>订阅</div>
									<div class="tools">
										<a href="javascript:;" class="collapse"></a>
										<a href="#portlet-config" data-toggle="modal" class="config"></a>
										<a href="javascript:;" class="reload"></a>
										<a href="javascript:;" class="remove"></a>
									</div>
								</div>
								<div class="portlet-body">
									<!--BEGIN TABS-->
									<div class="tabbable tabbable-custom">
										<ul class="nav nav-tabs">
											<li class="active"><a href="#tab_1_1" data-toggle="tab">系统</a></li>
											<li><a href="#tab_1_2" data-toggle="tab">活跃度</a></li>
											<li><a href="#tab_1_3" data-toggle="tab">最新用户</a></li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="tab_1_1">
												<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
													<ul class="feeds">
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-success">
																			<i class="icon-bell"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			您有4个待完成任务.
																			<span class="label label-important label-mini">
																			执行
																			<i class="icon-share-alt"></i>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	刚刚
																</div>
															</div>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				版本 v1.4 已正常运行!
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		20分钟前
																	</div>
																</div>
															</a>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-important">
																			<i class="icon-bolt"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			数据库内存不足，请解决.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	24分钟前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	30 mins
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-success">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	40分钟前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-warning">
																			<i class="icon-plus"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			新用户注册成功.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	1.5小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-success">
																			<i class="icon-bell-alt"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			Web服务器硬件环境需要升级.
																			<span class="label label-inverse label-mini">过期</span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	2小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	3小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-warning">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	5小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	18小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	21小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	22小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	21小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	22小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	21小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	22小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	21小时前
																</div>
															</div>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-info">
																			<i class="icon-bullhorn"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			有新订单，请关注.
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	22小时前
																</div>
															</div>
														</li>
													</ul>
												</div>
											</div>
											<div class="tab-pane" id="tab_1_2">
												<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
													<ul class="feeds">
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				新用户注册完成
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		刚刚
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				有新订单
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		10分钟前
																	</div>
																</div>
															</a>
														</li>
														<li>
															<div class="col1">
																<div class="cont">
																	<div class="cont-col1">
																		<div class="label label-important">
																			<i class="icon-bolt"></i>
																		</div>
																	</div>
																	<div class="cont-col2">
																		<div class="desc">
																			订单编号 #24DOP4 失效.
																			<span class="label label-important label-mini">处理 <i class="icon-share-alt"></i></span>
																		</div>
																	</div>
																</div>
															</div>
															<div class="col2">
																<div class="date">
																	24分钟前
																</div>
															</div>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				新用户注册完成
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		刚刚
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				新用户注册完成
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		刚刚
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				新用户注册完成
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		刚刚
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				新用户注册完成
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		刚刚
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				新用户注册完成
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		刚刚
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				新用户注册完成
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		刚刚
																	</div>
																</div>
															</a>
														</li>
														<li>
															<a href="#">
																<div class="col1">
																	<div class="cont">
																		<div class="cont-col1">
																			<div class="label label-success">
																				<i class="icon-bell"></i>
																			</div>
																		</div>
																		<div class="cont-col2">
																			<div class="desc">
																				新用户注册完成
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col2">
																	<div class="date">
																		刚刚
																	</div>
																</div>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="tab-pane" id="tab_1_3">
												<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">张三</a>
																	<span class="label label-success">审核通过</span>
																</div>
																<div>2013-07-12 10:00</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">李四</a>
																	<span class="label label-info">待审核</span>
																</div>
																<div>2013-07-12 10:45</div>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">李四</a>
																	<span class="label label-info">待审核</span>
																</div>
																<div>2013-07-12 10:45</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">王五</a>
																	<span class="label label-important">注册中</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
													<div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">李四</a>
																	<span class="label label-info">待审核</span>
																</div>
																<div>2013-07-12 10:45</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">王五</a>
																	<span class="label label-important">注册中</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
                                                    <div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">李四</a>
																	<span class="label label-info">待审核</span>
																</div>
																<div>2013-07-12 10:45</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">王五</a>
																	<span class="label label-important">注册中</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
                                                    <div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">李四</a>
																	<span class="label label-info">待审核</span>
																</div>
																<div>2013-07-12 10:45</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">王五</a>
																	<span class="label label-important">注册中</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
                                                    <div class="row-fluid">
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">李四</a>
																	<span class="label label-info">待审核</span>
																</div>
																<div>2013-07-12 10:45</div>
															</div>
														</div>
														<div class="span6 user-info">
															<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" />
															<div class="details">
																<div>
																	<a href="#">王五</a>
																	<span class="label label-important">注册中</span>
																</div>
																<div>19 Jan 2013 11:55PM</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!--END TABS-->
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row-fluid">
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet box blue calendar">
								<div class="portlet-title">
									<div class="caption"><i class="icon-calendar"></i>日历</div>
								</div>
								<div class="portlet-body light-grey">
									<div id="calendar">
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
						<div class="span6">
							<!-- BEGIN PORTLET-->
							<div class="portlet">
								<div class="portlet-title line">
									<div class="caption"><i class="icon-comments"></i>在线聊天室</div>
									<div class="tools">
										<a href="javascript:;" class="collapse"></a>
										<a href="#portlet-config" data-toggle="modal" class="config"></a>
										<a href="javascript:;" class="reload"></a>
										<a href="javascript:;" class="remove"></a>
									</div>
								</div>
								<div class="portlet-body" id="chats">
									<div class="scroller" data-height="343px" data-always-visible="1" data-rail-visible1="1">
										<ul class="chats">
											<li class="in">
												<img class="avatar" alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar1.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">张三</a>
													<span class="datetime">2013-07-12 11:00</span>
													<span class="body">
													有人吗？
													</span>
												</div>
											</li>
											<li class="out">
												<img class="avatar" alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar2.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">李四</a>
													<span class="datetime">2013-07-12 11:02</span>
													<span class="body">
													冒个泡
													</span>
												</div>
											</li>
											<li class="in">
												<img class="avatar" alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar1.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">张三</a>
													<span class="datetime">2013-07-12 11:03</span>
													<span class="body">
													晚上请你吃饭
													</span>
												</div>
											</li>
											<li class="out">
												<img class="avatar" alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar3.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">王五</a>
													<span class="datetime">2013-07-12 11:03</span>
													<span class="body">
                                                    我也去
													</span>
												</div>
											</li>
											<li class="in">
												<img class="avatar" alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar3.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">张三</a>
													<span class="datetime">2013-07-12 11:03</span>
													<span class="body">
                                                    汗...
													</span>
												</div>
											</li>
											<li class="out">
												<img class="avatar" alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar2.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">李四</a>
													<span class="datetime">2013-07-12 11:05</span>
													<span class="body">
                                                    今晚有事，让王五陪你去吧。
													</span>
												</div>
											</li>
											<li class="in">
												<img class="avatar" alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar1.jpg" />
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name">张三</a>
													<span class="datetime">2013-07-12 11:05</span>
													<span class="body">
                                                    这...
													</span>
												</div>
											</li>
										</ul>
									</div>
									<div class="chat-form">
										<div class="input-cont">
											<input class="m-wrap" type="text" placeholder="发送信息..." />
										</div>
										<div class="btn-cont">
											<span class="arrow"></span>
											<a href="javascript:;" class="btn blue icn-only"><i class="icon-ok icon-white"></i></a>
										</div>
									</div>
								</div>
							</div>
							<!-- END PORTLET-->
						</div>
					</div>
				</div>
<?php echo $_footer;?>
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo ASSETS_PATH;?>plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo ASSETS_PATH;?>plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo ASSETS_PATH;?>plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_PATH;?>plugins/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="<?php echo ASSETS_PATH;?>plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
	<!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo ASSETS_PATH;?>plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/flot/jquery.flot.resize.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery.pulsate.min.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap-daterangepicker/date.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="<?php echo ASSETS_PATH;?>plugins/gritter/js/jquery.gritter.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?php echo ASSETS_PATH;?>plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery.sparkline.min.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo ASSETS_ADMIN_PATH;?>js/index.js" type="text/javascript"></script>
	<script>
		jQuery(document).ready(function() {
            Index.init();
            Index.initJQVMAP(); // init index page's custom scripts
            Index.initCalendar(); // init index page's custom scripts
            Index.initCharts(); // init index page's custom scripts
            Index.initChat();
            Index.initMiniCharts();
            Index.initDashboardDaterange();
            Index.initIntro();
		});
	</script>
    <!-- END PAGE LEVEL SCRIPTS -->