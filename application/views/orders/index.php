<h2>Заказы</h2>

<a href="orders/create" class="btn btn-success">Оформить заказ</a>
<br/><br/>

<?php 

$orderPrice = 0;

if(isset($this->vars['error']))
		echo '<h3 class="err-msg">'.$this->vars['error'].'</h3>';

if(count($this->vars['orders'])) { ?>
		
<table class='spreadsheet table'>
	<thead>
		<tr>
			<th></th>
			<th>id</th>
			<th>Клиент</th>
			<th>Товар</th>
			<th>Количество</th>
			<th>Цена</th>
			<th>Дата</th>
			<th>Статус</th>
			<th>Примечания</th>
		</tr>
	</thead>
	<tbody>	
	
	<?php 
	
	foreach($this->vars['orders'] as $item) { 
		

	?>			
		<tr>
   			<td class='links'>
       			<a class="btn btn-table" href="<?= ABS_URL ?>/orders/update?item=<?= $item['o_id'] ?>">Обновить</a>
       			<a class="btn btn-table" href="<?= ABS_URL ?>/orders/delete?item=<?= $item['o_id'] ?>"
       			   onclick="return confirm('Удаляем дaнный заказ <?= $item['o_id'] ?>. Вы уверены?');">
       					Удалить
       			</a>
   			</td>
   			<td><div class="td"><?= $item['o_id'] ?></div></td>
   			<td><div class="td"><?= $item['o_customerid'] ?></div></td>    
   			<td><div class="td"><?= $item['o_productid'] ?></div></td>
   			<td><div class="td"><?= $item['o_quantity'] ?></div></td>
   			<td><div class="td"><?= $item['o_total_price'] ?></div></td>
   			<td><div class="td"><?= $item['o_date'] ?></div></td>
   			<td><div class="td"><?= $item['o_status'] ?></div></td>
   			<td><div class="td"><?= $item['o_note'] ?></div></td>
		</tr>

	<?php } ?>	
		
	</tbody>
</table>	
		
<?php	
	} else 
		echo '<h3 class="msg">Пока нет заказов..</h3>';
	
?>




