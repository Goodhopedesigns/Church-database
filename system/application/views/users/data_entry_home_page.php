	<ul  class="nav nav-tabs nav-stacked">
	   <li><?php  //echo anchor('','home').'  '; ?></li>
	   <li> <?php  echo anchor(base_url().'members/index','Manage Members'); ?></li>	
	   <li> <?php  echo anchor('expenditure/index','Manage Expenditures'); ?></li>
	   <li><?php  echo anchor('inventory/index','Manage Inventories').'  '; ?></li>
	   <li><?php  echo anchor('attendance/index','Manage Attendance').'  '; ?></li>
	   <li><?php  echo anchor('giving/index','Manage Giving').'  '; ?></li>
	   <li><?php  echo anchor('Welcome/logout','Logout').'  '; ?></li>   
	</ul>