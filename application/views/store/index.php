<h2>Товары на Складе</h2>

<a href="store/create" class="btn btn-success">Добавить товар</a>
<br/><br/>

<?php 

if(isset($this->vars['error']))
		echo '<h3 class="err-msg">'.$this->vars['error'].'</h3>';

if(count($this->vars['products'])) { ?>
		
<table class='spreadsheet table'>
	<thead>
		<tr>
			<th></th>
			<th>Наименование</th>
			<th>Номенклатура</th>
			<th>Цена за ед.</th>
			<th>Количество</th>
			<th>Описание</th>
			<!-- <th>Изображение</th> -->
			<!-- <th>Склад</th> -->
		</tr>
	</thead>
	<tbody>	
	
	<?php foreach($this->vars['products'] as $item) { ?>			
		<tr>
   			<td class='links'>
       			<a class="btn btn-table" href="<?= ABS_URL ?>/store/update?item=<?= $item['p_id'] ?>">Обновить</a>
       			<a class="btn btn-table" href="<?= ABS_URL ?>/store/delete?item=<?= $item['p_id'] ?>"
       			   onclick="return confirm('Удаляем дaнный товар <?= $item['p_nomenclature'] ?>. Вы уверены?');">
       					Удалить
       			</a>
   			</td>
   			<td><div class="td"><?= $item['p_name'] ?></div></td>
   			<td><div class="td"><?= $item['p_nomenclature'] ?></div></td>    
   			<td><div class="td"><?= $item['p_price'] ?></div></td>
   			<td><div class="td"><?= $item['p_quantity'] ?></div></td>
   			<td><div class="td"><?= $item['p_description'] ?></div></td>
   			<!-- <td><div class="td"><?= $item['p_image_link'] ?></div></td> -->
   			<!-- <td><div class="td"><?= $item['p_store'] ?></div></td> -->
		</tr>

	<?php } ?>	
		
	</tbody>
</table>	
		
<?php	
	} else 
		echo '<h3 class="msg">На складе в данный момент нет товаров.</h3>';
	
?>




