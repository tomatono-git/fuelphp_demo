<ul class="nav nav-pills">
	<li class='<?php echo Arr::get($subnav, "login" ); ?>'><?php echo Html::anchor('auth/login','Login');?></li>
	<li class='<?php echo Arr::get($subnav, "logout" ); ?>'><?php echo Html::anchor('auth/logout','Logout');?></li>
	<li class='<?php echo Arr::get($subnav, "register" ); ?>'><?php echo Html::anchor('auth/register','Register');?></li>
	<li class='<?php echo Arr::get($subnav, "lostpassword" ); ?>'><?php echo Html::anchor('auth/lostpassword','Lostpassword');?></li>

</ul>
<p>Lostpassword</p>