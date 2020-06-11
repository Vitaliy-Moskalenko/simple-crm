<?php  

return [
	'/' => [
		'controller' => 'main',
		'action' => 'home',
	],
	// Store	
	'/store' => [
		'controller' => 'store',
		'action' => 'index',
	],
	'/store/create' => [
		'controller' => 'store',
		'action' => 'create',
	],
	'/store/update' => [
		'controller' => 'store',
		'action' => 'update',
	],	
	'/store/delete' => [
		'controller' => 'store',
		'action' => 'delete',
	],
	
	// Customers	
	'/customers' => [
		'controller' => 'customers',
		'action' => 'index',
	],
	'/customers/create' => [
		'controller' => 'customers',
		'action' => 'create',
	],
	'/customers/update' => [
		'controller' => 'customers',
		'action' => 'update',
	],	
	'/customers/delete' => [
		'controller' => 'customers',
		'action' => 'delete',
	],	
	
	// Orders
	'/orders' => [
		'controller' => 'orders',
		'action' => 'index',
	],
	'/orders/create' => [
		'controller' => 'orders',
		'action' => 'create',
	],
	'/orders/update' => [
		'controller' => 'orders',
		'action' => 'update',
	],	
	'/orders/delete' => [
		'controller' => 'orders',
		'action' => 'delete',
	],	
	
	// Static
	'/contacts' => [
		'controller' => 'main',
		'action' => 'contacts',
	],	

	'/cabinet/login' => [
		'controller' => 'cabinet',
		'action' => 'login',
	],

	'/news/list' => [
		'controller' => 'news',
		'action' => 'list',
	],

];