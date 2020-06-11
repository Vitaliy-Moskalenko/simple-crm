<h2>Новый Заказ</h2>

<?php

 	if(isset($this->vars['error']))
		echo '<h3 class="err-msg">'.$this->vars['error'].'</h3>';
	
	if(isset($this->vars['msg']))
		echo '<h3 class="msg">'.$this->vars['msg'].'</h3>';

?>

<div class="form-block">
	<form class="form-style-9" method="POST" action="<?= ABS_URL ?>/orders/create">
		<ul>
			<li>
				<select name="o-customer" id="o-customer" class="field-style field-split align-left">
				<?php			
						foreach($this->vars['customers'] as $customer)
							echo '<option>'.$customer['c_name'].' - '.$customer['c_email'].'</option>';
							
				?>
				</select>	
				<select name="o-product" id="o-product" class="field-style field-split align-right">
				<?php			
						foreach($this->vars['products'] as $product)
							echo '<option>'.$product['p_name'].' - '.$product['p_nomenclature'].'</option>';
							
				?>
				</select>				
			</li>
			<li>
				<input type="number" min="1" max="100" name="o-quantity" class="field-style field-full" placeholder="Количество" required />
			</li>
			<li>	
				<input type="date" name="o-date" class="field-style field-full" value="<?= date('Y-m-d') ?>" placeholder="Дата" />
			</li>
			<li>
				<input type="text"  name="o-status"  class="field-style field-split align-left"  placeholder="Статус" />
			</li>
			<li>
				<textarea name="o-note" class="field-style" placeholder="Примечаниие"></textarea>
			</li>
			<li>
				<input type="submit" value="Создать" />
			</li>
		</ul>
	</form>
</div>

<br/><br/>


<a href="<?= ABS_URL ?>/orders" class="btn btn-success">К списку заказов</a>
<a href="<?= ABS_URL ?>" class="btn btn-success">На главную</a>

