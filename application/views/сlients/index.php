<h2>Клиенты</h2>

<a href="clients/create" class="btn btn-success">Добавить клиента</a>
<br/><br/>

<?php 

if(isset($this->vars['error']))
		echo '<h3 class="err-msg">'.$this->vars['error'].'</h3>';

if(count($this->vars['customers'])) { ?>
		
<table class='spreadsheet table'>
	<thead>
		<tr>
			<th></th>
			<th>Имя</th>
			<th>EMail</th>
			<th>Телефон</th>
			<th>Адрес</th>
			<th>Компания</th>
		</tr>
	</thead>
	<tbody>	
	
	<?php foreach($this->vars['customers'] as $item) { ?>			
		<tr>
   			<td class='links'>
       			<a class="btn btn-table" href="<?= ABS_URL ?>/clients/update?item=<?= $item['c_id'] ?>">Обновить</a>
       			<a class="btn btn-table" href="<?= ABS_URL ?>/clients/delete?item=<?= $item['c_id'] ?>"
       			   onclick="return confirm('Удаляем дaнного клиента <?= $item['c_name'] ?>. Вы уверены?');">
       					Удалить
       			</a>
   			</td>
   			<td><div class="td"><?= $item['c_name'] ?></div></td>
   			<td><div class="td"><?= $item['c_email'] ?></div></td>    
   			<td><div class="td"><?= $item['c_phone'] ?></div></td>
   			<td><div class="td"><?= $item['c_address'] ?></div></td>
   			<td><div class="td"><?= $item['c_company'] ?></div></td>
		</tr>

	<?php } ?>	
		
	</tbody>
</table>	
		
<?php	
	} else 
		echo '<h3 class="msg">Пока нет клиентов..</h3>';
	
?>




