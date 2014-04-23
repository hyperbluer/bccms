<?php echo $_header;?>
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid ">
					<div class="span12">
						<div class="tabbable tabbable-custom boxless">
							 <ul class="nav nav-tabs">
								<li class="active"><a href="#config_tab_1" data-toggle="tab">基本设置</a></li>
								<li><a href="#config_tab_2" data-toggle="tab">核心设置</a></li>
								<li><a href="#config_tab_3" data-toggle="tab">应用设置</a></li>
								<li><a href="#config_tab_4" data-toggle="tab">用户设置</a></li>
								<li><a href="#config_tab_5" data-toggle="tab">附件设置</a></li>
							 </ul>
							 <div class="tab-content">
							 
								<div class="tab-pane active" id="config_tab_1">
								   <div class="portlet box blue">
									  <div class="portlet-title">
										 <div class="caption"><i class="icon-cogs"></i>配置项</div>
										 <div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<a href="javascript:;" class="reload"></a>
										 </div>
									  </div>
									  <div class="portlet-body form">
									  <!-- BEGIN FORM-->
										<form action="#" class="form-horizontal form-bordered form-row-stripped">
											<div class="control-group">
											   <label class="control-label">网站名称</label>
											   <div class="controls">
												  <input name="site_name" type="text" placeholder="" class="m-wrap span12" />
												  <span class="help-inline"></span>
											   </div>
											</div>
											<div class="control-group">
											   <label class="control-label">网址</label>
											   <div class="controls">
												  <input name="www" type="text" placeholder="http://127.0.0.1" class="m-wrap span12" />
												  <span class="help-inline">例如：http://127.0.0.1</span>
											   </div>
											</div>
											<div class="control-group">
											   <label class="control-label">语言</label>
											   <div class="controls">
												  <div class="chosen-container">
													 <select name="lang" class="span12 chosen_category" data-placeholder="选择一项语言" tabindex="1">
														<option value="zh_CN">中文</option>
														<option value="en_US">英文</option>
													 </select>
													 <span class="help-block">选择一项语言.</span>
												  </div>
											   </div>
											</div>
											<div class="control-group">
											   <label class="control-label" >开启Debug</label>
											   <div class="controls">                                                
												  <label class="radio">
												  <input type="radio" name="open_debug" value="1" />
												  开启
												  </label>
												  <label class="radio">
												  <input type="radio" name="open_debug" value="0" checked />
												  关闭
												  </label>  
											   </div>
											</div>
											<div class="form-actions">
											   <button type="submit" class="btn blue"><i class="icon-ok"></i> 提交</button>
											   <button type="button" class="btn">取消</button>
											</div>
										</form>
										<!-- END FORM-->
									  </div>
									</div>
								</div>
								
								<div class="tab-pane" id="config_tab_2">
								   <div class="portlet box blue">
									  <div class="portlet-title">
										 <div class="caption"><i class="icon-cogs"></i>配置项</div>
										 <div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<a href="javascript:;" class="reload"></a>
										 </div>
									  </div>
									  <div class="portlet-body form">2
									  <!-- BEGIN FORM-->
										<form action="#" class="horizontal-form">
										</form>
										<!-- END FORM-->
									  </div>
									</div>
								</div>	
								
								<div class="tab-pane" id="config_tab_3">
								   <div class="portlet box blue">
									  <div class="portlet-title">
										 <div class="caption"><i class="icon-cogs"></i>配置项</div>
										 <div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<a href="javascript:;" class="reload"></a>
										 </div>
									  </div>
									  <div class="portlet-body form">3
									  <!-- BEGIN FORM-->
										<form action="#" class="horizontal-form">
										</form>
										<!-- END FORM-->
									  </div>
									</div>
								</div>	
								
								<div class="tab-pane" id="config_tab_4">
								   <div class="portlet box blue">
									  <div class="portlet-title">
										 <div class="caption"><i class="icon-cogs"></i>配置项</div>
										 <div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<a href="javascript:;" class="reload"></a>
										 </div>
									  </div>
									  <div class="portlet-body form">4
									  <!-- BEGIN FORM-->
										<form action="#" class="horizontal-form">
										</form>
										<!-- END FORM-->
									  </div>
									</div>
								</div>	
								
								<div class="tab-pane" id="config_tab_5">
								   <div class="portlet box blue">
									  <div class="portlet-title">
										 <div class="caption"><i class="icon-cogs"></i>配置项</div>
										 <div class="tools">
											<a href="javascript:;" class="collapse"></a>
											<a href="javascript:;" class="reload"></a>
										 </div>
									  </div>
									  <div class="portlet-body form">5
									  <!-- BEGIN FORM-->
										<form action="#" class="horizontal-form">
										</form>
										<!-- END FORM-->
									  </div>
									</div>
								</div>	
								
							</div>								
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->
<?php echo $_footer;?>