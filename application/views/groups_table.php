<table class="table table-bordered table-condensed">
	<caption> Active groups </caption>
	<thead>
		<tr>
			<th>Status</th>
			<th>Name</th>
			<th>Plugin</th>
			<th>Run type</th>
			<th>Time</th>
			<th>Progress</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($groups as $item): ?>

		<tr class="success"> <!--<installed?= $item['active']?><?=($item['active'] == 0 ? 'un' : '')?>link -->
			<td><i data-toggle="tooltip" title="Display detailed information" class="icon-play"></i> Running</td>
			<td><?= $item['name'] ?></td>
			<td><?= $item['plugin'] ?></td>
			<td><?= ($item['runonce'] == 0 ? 'Continuously' : 'Once') ?></td>
			<td>-</td>
			<td><div  style="margin-bottom:0px"  class="progress progress-striped">
				<div class="bar" style="width: 80%;">10 / 100 10%</div>
			</div></td>
			<td style="width: 1px;white-space: nowrap;"><div class="btn-group pull-right">
  <a class="btn" href=""  data-toggle="tooltip" title="Set plugin inactive"><i class="icon-pause"></i></a>
  <a class="btn" href="#"  data-toggle="tooltip" title="Edit settings"><i class="icon-pencil"></i></a>
   <a class="btn" href="#"  data-toggle="tooltip" title="View reports"><i class="icon-file-alt"></i></a>
  <a class="btn" href="#"  data-toggle="tooltip" title="Delete this group"><i class="icon-remove"></i></a>
</div></td>
		</tr>
		<tr class="info"> <!--<installed?= $item['active']?><?=($item['active'] == 0 ? 'un' : '')?>link -->
			<td><i data-toggle="tooltip" title="Display detailed information" class="icon-flag"></i> Finished</td>
			<td><?= $item['name'] ?></td>
			<td><?= $item['plugin'] ?></td>
			<td><?= ($item['runonce'] == 0 ? 'Run continuously' : 'Run once') ?></td>
			<td>-</td>
			<td><div  style="margin-bottom:0px"  class="progress progress-striped">
				<div class="bar" style="width: 100%;">100 / 100 100%</div>
			</div></td>
			<td><div class="btn-group pull-right">
  <a class="btn" href=""  data-toggle="tooltip" title="asd"><i class="icon-pause"></i></a>
  <a class="btn" href="#"  data-toggle="tooltip" title="Search for plugin usage"><i class="icon-search"></i></a>
  <a class="btn" href="#"  data-toggle="tooltip" title="Display detailed information"><i class="icon-info"></i></a>
  <a class="btn" href="#"><i class="icon-align-justify"></i></a>
</div></td>
		</tr>			
<?php endforeach; ?>
	</tbody>
</table>
	
<div class="btn-group">

                <!-- <button class="btn btn-primary">Action</button> -->
<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><i class="icon-magic"></i> New group <span class="caret"></span></button>
<ul class="dropdown-menu">
  <?php foreach ($plugins as $item): ?>
  <li><a href="<?= site_url($this->uri->segment(1) . '/newgroup/' . $item[1]) ?>"><?= $item[1] ?></a></li>
  <?php endforeach; ?>
</ul>
</div>