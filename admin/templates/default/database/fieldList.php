<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h3>字段列表</h3>
</div>
<div class="modal-body">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>字段</th>
				<th>类型</th>
				<th>Null</th>
				<th>默认</th>
				<th>额外</th>
				<th>注释</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($dataList as $k => $item):?>
			<tr class="odd gradeX">
				<td><?php echo $item['Field'];?></td>
				<td><?php echo $item['Type'];?></td>
				<td><?php echo $item['Null'];?></td>
				<td><?php echo $item['Default'];?></td>
				<td><?php echo $item['Extra'];?></td>
				<td><?php echo $item['Comment'];?></td>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>