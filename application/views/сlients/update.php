<h2>Обновить данные клиента</h2>

<?php

 	if(isset($this->vars['error']))
		echo '<h3 class="err-msg">'.$this->vars['error'].'</h3>';
	
	if(isset($this->vars['msg']))
		echo '<h3 class="msg">'.$this->vars['msg'].'</h3>';
?>

<div class="form-block">
	<form class="form-style-9" method="POST" action="<?= ABS_URL ?>/clients/update">
		<ul>
			<li>
				<input type="hidden" name="c-id" value="<?= $this->vars['item'][0]['c_id'] ?>" />
				<input type="text"   name="c-name"  class="field-style field-full"  placeholder="<?= $this->vars['item'][0]['c_name'] ?>" required />
			</li>
			<li>
				<input type="email" name="c-email" class="field-style field-split align-left"  placeholder="<?= $this->vars['item'][0]['c_email'] ?>" required />
				<input type="tel"   name="c-phone" class="field-style field-split align-right" pattern="[0-9+ -]{5,14}" placeholder="<?= $this->vars['item'][0]['c_phone'] ?>" />
			</li>
			<li>
				<input type="text"  name="c-address"  class="field-style field-full"  placeholder="<?= $this->vars['item'][0]['c_address'] ?>" />
			</li>
			<li>
				<input type="text"  name="c-company"  class="field-style field-full"  placeholder="<?= $this->vars['item'][0]['c_company'] ?>" />
			</li>
			<li>
				<input type="submit" value="Обновить" />
			</li>
		</ul>		
	</form>
</div>

<br/><br/>

<a href="<?= ABS_URL ?>/clients" class="btn btn-success">К списку клиентов</a>
<a href="<?= ABS_URL ?>" class="btn btn-success">На главную</a>

