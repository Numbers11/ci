<table style="white-space: nowrap" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
	<thead>
		<tr>
			<th>ID</th>
			<th>Online</th>
			<th>Countrylong</th>
			<th>Country</th>
			<th>Region</th>
			<th>City</th>
			<th>IP</th>
			<th>OS</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>

            Show online only:  
<div id="switchOnline" class="switch" data-on="success" data-off="danger" data-on-label="<i class='icon-ok icon-white'></i>" data-off-label="<i class='icon-remove'></i>">
    <input type="checkbox" />

<script type="text/javascript">
	var clienttable;
$(document).ready(function() {
	clienttable = $('#example2').dataTable({
		"bProcessing": true,
	    "bServerSide": true, 
		"bAutoWidth" : true,
		 "sServerMethod": "POST",
        "sAjaxSource": "<?= site_url('/clients/ajax') ?>",
		"fnRowCallback": function( nRow, aData, iDisplayIndex ) {
			/* Append the grade to the default row class name */

				
				$('td:eq(0)', nRow)[0].className = "online"+ aData[1];
				console.log($('tr', nRow));
				//$('tr', nRow).className += " online"+ aData[1];
			return nRow;
		},
		 "fnServerParams": function ( aoData ) {
            console.log(aoData);
        },
		"aoColumns" : [
        {"bVisible": false, "bSortable": false, "bSearchable": false},	//ID
		{"bVisible": false, "bSortable": true, "bSearchable": true},	//ONLINE
		{"bVisible": false, "bSortable": true, "bSearchable": true},	//Country long name
		null,null,null,null,null
		],
"sDom": 'W<"clear">lfrtip'
	});
	//$('#example2').dataTable().columnFilter();
	$('#switchOnline').on('switch-change', function (e, data) {
		console.log(data.value);
		var value = data.value ? '1' : '';
		clienttable.fnFilter(value, 1);
	});
} );
</script>