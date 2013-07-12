<table class="table table-bordered table-condensed">
	<thead>
		<tr>
			<th width="5%"></th>
			<th>Name</th>
			<th>Version</th>
			<th>Author</th>
			<th>Info</th>
			<th>Options</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($plugins as $item): ?>

		<tr class="<?= ($item[0] == 0 ? 'error' : 'success')?>">
			<td style="vertical-align:bottom"><i class="icon-<?= ($item[0] == 0 ? 'un' : '')?>link"></i></td>
			<td style="vertical-align:bottom"><?= $item[1] ?></td>
			<td style="vertical-align:bottom"><?= $item[2] ?></td>
			<td style="vertical-align:bottom"><a target="_blank" href="<?= $item[5] ?>"><?= $item[3] ?></td>
			<td style="vertical-align:bottom"><?= $item[4] ?></td>
			<td style="width: 1px;white-space: nowrap;"><div class="btn-group">
  <a class="btn" href="<? ECHO site_url(($item[0] == 0 ? '/plugins/install/' . $item[1]  : '/plugins/uninstall/' . $item[1]))?>"  data-toggle="tooltip" title="<?= ($item[0] == 1 ? 'Uninstall' : 'Install')?>"><i class="icon-<?= ($item[0] == 1 ? 'un' : '')?>link"></i></a>
  <a class="btn" href="#"  data-toggle="tooltip" title="Search for plugin usage"><i class="icon-search"></i></a>
  <a class="btn" href="#"  data-toggle="tooltip" title="Display detailed information"><i class="icon-info"></i></a>
  <a class="btn" href="#"><i class="icon-align-justify"></i></a>
</div></td>
		</tr>

<?php endforeach; ?>
	</tbody>
</table>