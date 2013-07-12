<div class="navbar">
				  		<a class="brand" style="position:absolute;margin-left:1px;" href="<?= site_url('/') ?>"> <i class="icon-fire icon-border"></i> Loader Bot
	  </a>
  <div class="navbar-inner">
    <!-- <div class="container"> -->


      <div class="navbar-content">
        <ul class="nav">

          <li <? if(is_active('dashboard')): ?>class="active"<? endif; ?>>
            <a href="<?= site_url('/dashboard') ?>"><i class="icon-dashboard"></i> Dashboard</a> 
          </li>
          <li <? if(is_active('clients')): ?>class="active"<? endif; ?>>
            <a href="<?= site_url('/clients') ?>"><i class="icon-user"></i> Clients</a> 
          </li>
          <li <? if(is_active('plugins')): ?>class="active"<? endif; ?>>
            <a href="<?= site_url('/plugins') ?>"><i class="icon-puzzle-piece"></i> Plugins</a> 
          </li>
          <li <? if(is_active('groups')): ?>class="active"<? endif; ?>>
            <a href="<?= site_url('/groups') ?>"><i class="icon-group"></i> Groups</a>
          </li>
          <li <? if(is_active('reports')): ?>class="active"<? endif; ?>>
            <a href="<?= site_url('/reports') ?>"><i class="icon-truck"></i> Reports</a> 
          </li>
          <li <? if(is_active('settings')): ?>class="active"<? endif; ?>>
            <a href="<?= site_url('/settings') ?>"><i class="icon-wrench"></i> Settings</a> 
          </li>
		  <li><a href="<?= site_url('/login') ?>"><i class="icon-off"></i> Logout</a></li>
        </ul>
      </div>
   <!-- </div> -->
  </div>
</div>