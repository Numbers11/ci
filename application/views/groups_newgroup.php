      <form>
      <div class="row-fluid">
        <div class="span8">
          <div class="row-fluid">
            <div class="span12 bgcolor">
              <div class="alert alert-error">
              <a href="#" class="close" data-dismiss="alert">×</a>
                Error Messages.
              </div>
            </div>
          </div>         
          <div class="row-fluid">   

            <div class="span12">
                                        <label>Group name</label>
              <input type="text" name="groupname" class="span12" placeholder="My group name ...">                  
            </div>
          </div><!--/row-->
          <div class="row-fluid">

            <div class="span6 bgcolor">
                                        <label>Run from</label>
              <div id="datetimepicker1" class="input-append date">
                <input name="from" data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                  </i>
                </span>
              </div>
            </div><!--/span-->
            <div class="span6 bgcolor">
              <label>Run until</label>
             <div id="datetimepicker2" class="input-append date">
                <input name="to" data-format="dd/MM/yyyy hh:mm:ss" type="text"></input>
                <span class="add-on">
                  <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                  </i>
                </span>
              </div>
            </div><!--/span-->
          </div><!--/row-->                

          <div class="row-fluid">
            <div class="span12 bgcolor">
              <label>Countries</label>
              <input name="countries" type="text" class="span12 input-mini" placeholder="">    
            </div>
          </div>
          <div class="row-fluid">
            <div class="span6 bgcolor">
                           <label>OS</label>
<select class="multiselect" multiple="multiple">
  <?php foreach ($os as $item): ?>
    <option value="<?= $item['os'] ?>"><?= $item['os'] ?></option>
  <?php endforeach; ?>
</select>  
            </div><!--/span-->
          <div class="span6 bgcolor">
             <label>Number of installations</label>
               <input name="execnumber" type="text" class="span12 input-mini" placeholder="100">  
            </div><!--/span-->
          </div><!--/row-->           
        </div><!--/span-->
        
        <div class="span4">
          <div class="well">
            <strong>Group name</strong> must be unique.</br>
            If you set <strong>run until</strong> but not <strong>run from</strong> it defaults to now.<br>
            Both can be left out to let the task run forever.<br>
            <strong>Countries</strong> get added by their 2 digits country code and seperated by commata.<br>
          </div>
        </div><!--/span-->       
      </div><!--/row-->
      </form>
<br/><br/>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });

        $('#datetimepicker2').datetimepicker({
      language: 'pt-BR'
    });

    $('.multiselect').multiselect({
      buttonClass: 'btn',
      buttonWidth: 'auto',
      buttonContainer: '<div class="btn-group" />',
      includeSelectAllOption: true,
      maxHeight: false,
      buttonText: function(options) {
        if (options.length == 0) {
          return 'Select OS <b class="caret"></b>';
        }
        else if (options.length > 3) {
          return options.length + ' selected  <b class="caret"></b>';
        }
        else {
          var selected = '';
          options.each(function() {
            selected += $(this).text() + ', ';
          });
          return selected.substr(0, selected.length -2) + ' <b class="caret"></b>';
        }
      }
    });    
  });
</script>



<h4>Plugin settings</h2>
<hr>
