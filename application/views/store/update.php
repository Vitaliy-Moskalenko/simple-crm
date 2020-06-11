<h2>Обновить данные товара</h2>

<?php

 	if(isset($this->vars['error']))
		echo '<h3 class="err-msg">'.$this->vars['error'].'</h3>';
	
	if(isset($this->vars['msg']))
		echo '<h3 class="msg">'.$this->vars['msg'].'</h3>';
?>

<div class="form-block">
	<form class="form-style-9" method="POST" action="<?= ABS_URL ?>/store/update">
		<ul>
			<li>
				<input type="hidden" name="p-id" value="<?= $this->vars['item'][0]['p_id'] ?>" />	
				<input type="text"   name="p-name"  class="field-style field-split align-left"  placeholder="<?= $this->vars['item'][0]['p_name'] ?>" required />
				<input type="text"   name="p-nomen" class="field-style field-split align-right" placeholder="<?= $this->vars['item'][0]['p_nomenclature'] ?>" required />
			</li>
			<li>
				<input type="number" step="0.01" min="1" name="p-price" class="field-style field-split align-left" placeholder="<?= $this->vars['item'][0]['p_price'] ?>" required />
				<input type="number" min="1" max="100" name="p-quantity" class="field-style field-split align-right" placeholder="<?= $this->vars['item'][0]['p_quantity'] ?>" required />
			</li>
			<li>
				<textarea name="p-description" class="field-style" placeholder="<?= $this->vars['item'][0]['p_description'] ?>"></textarea>
			</li>
			<li>
				<input type="submit" value="Обновить" />
			</li>
		</ul>
	</form>
</div>

<br/><br/>


<a href="<?= ABS_URL ?>/store" class="btn btn-success">К списку товаров</a>
<a href="<?= ABS_URL ?>" class="btn btn-success">На главную</a>

