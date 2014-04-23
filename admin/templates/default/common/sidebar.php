        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->        	
			<ul class="page-sidebar-menu">
				<li>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler hidden-phone"></div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li>
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<form class="sidebar-search">
						<div class="input-box">
							<a href="javascript:;" class="remove"></a>
							<input type="text" placeholder="搜索..." />
							<input type="button" class="submit" value=" " />
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
                <?php 
				$param_key = BC::$module == 'content' ? 'category_id' : 'menu_id';
				foreach($_sidebarTree as $k => $node):?>
				<li class="<?php
				    $nodeClass = '';
				    if ($k == 0)
				    {
				        echo 'start';
				    }
				    if (isset($_breadcrumb[$node->id]))
				    {
				        $nodeClass = 'open';
				        echo $nodeClass.' active';
				    }
				    ?>">
					<a href="<?php echo _url($node->url, array($param_key => $node->id));?>">
					<i class="<?php if ($node->icon) { echo $node->icon; } else { echo 'icon-th-list'; }?>"></i>
					<span class="title"><?php echo $node->name;?></span>
					<!--<span class="selected"></span>-->
                    <span class="arrow <?php echo $nodeClass;?>"></span>
					</a>
                    <?php if (is_array($node->children) && count($node->children)):?>
                    <ul class="sub-menu">
                        <?php foreach ($node->children as $k => $nodeSecond):?>
						<li class="<?php
						$nodeSecondClass = '';
						if ($nodeSecond->id == $_menuId)
                        {
                            echo 'active';
                        }
                        else if (isset($_breadcrumb[$nodeSecond->id]) && isset($_breadcrumb[$nodeSecond->id][$param_key]))
                        {
                            $nodeSecondClass = 'open';
                            echo $nodeSecondClass;
                        }
                        ?>">
                            <?php if (is_array($nodeSecond->children) && count($nodeSecond->children)):?>
							<a href="javascript:;"><?php echo $nodeSecond->name;?><span class="arrow <?php echo $nodeSecondClass;?>"></span></a>
                            <ul class="sub-menu" <?php if ($nodeSecondClass) echo 'style="display:block;"';?>>
                                <?php foreach ($nodeSecond->children as $k => $nodeThree):?>
								<li <?php if ($nodeThree->id == $_menuId) echo 'class="active"';?>><a href="<?php echo _url($nodeThree->url, array($param_key => $nodeThree->id));?>"><?php echo $nodeThree->name;?></a></li>
								<?php endforeach;?>
							</ul>
                            <?php else:?>
                            <a href="<?php echo _url($nodeSecond->url, array($param_key => $nodeSecond->id));?>"><?php echo $nodeSecond->name;?></a>
						    <?php endif;?>
                        </li>
                        <?php endforeach;?>
					</ul>
                    <?php endif;?>
				</li>
                <?php endforeach;?>
				
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
        <!-- END SIDEBAR -->