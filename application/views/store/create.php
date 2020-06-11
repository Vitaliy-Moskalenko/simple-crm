<h2>Новый товар</h2>

<?php

 	if(isset($this->vars['error']))
		echo '<h3 class="err-msg">'.$this->vars['error'].'</h3>';
	
	if(isset($this->vars['msg']))
		echo '<h3 class="msg">'.$this->vars['msg'].'</h3>';

?>

<div class="form-block">
	<form class="form-style-9" method="POST" action="<?= ABS_URL ?>/store/create">
		<ul>
			<li>
				<input type="text"  name="p-name"  class="field-style field-split align-left"  placeholder=" * Наименование товара" required />
				<input type="text" name="p-nomen" class="field-style field-split align-right" placeholder=" * Номенклатурный номер" required />
			</li>
			<li>
				<input type="number" step="0.01" min="1" name="p-price" class="field-style field-split align-left" placeholder="Цена" />
				<input type="number" min="1" max="100" name="p-quantity" class="field-style field-split align-right" placeholder="Количество" />
			</li>

			<li>
				<textarea name="p-description" class="field-style" placeholder="Описание"></textarea>
			</li>
			<li>
				<input type="submit" value="Создать" />
			</li>
		</ul>
	</form>
</div>

<br/><br/>


<a href="<?= ABS_URL ?>/store" class="btn btn-success">К списку товаров</a>
<a href="<?= ABS_URL ?>" class="btn btn-success">На главную</a>

