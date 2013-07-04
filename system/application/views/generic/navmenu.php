<div class="navbar" style="margin-top: 10px;">
  <div class="navbar-inner">   
    <ul class="nav">
      <? if($_SESSION['user']['role'] == 5){ ?>
         <li><a href="<?= base_url()?>users/view" class="" >Users<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
        <li><a href="<?= base_url()?>givingcategory/index" class="" >Categories<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
      <? } ?>  
        <li><a href="<?= base_url()?>members/index" class="" >Members<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
        <li><a href="<?= base_url()?>Inventory/index" class="" >Inventory<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
        <li><a href="<?= base_url()?>giving/index" class="" >Givings<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
        <li><a href="<?= base_url()?>expenditure/index" class="">Expenditure<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
        <li><a href="<?= base_url()?>attendance/index" class="">Attendance<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
        <li><a href="<?= base_url()?>associates/index" class="">Associates<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
        <li><a href="<?= base_url()?>ministries/index" class="">Ministries<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>        
        <li><a href="<?= base_url()?>welcome/logout" class="">Logout<div class="arrow"></div></a></li>
        <li class="divider-vertical"></li>
    </ul>
  </div>   
</div>