<?php class ProductPostType extends SktPostType {
	protected $name = 'Merchandise';
	protected $fields = array(
		'price' => array(
			'class' => 'widefat',
			'type' => 'float'
		),
		'quantity' => array(
			'type' => 'number',
			'class' => 'quantity'
		)
	);
	
	protected $meta_boxes = array(
		'selling' => array(
			'fields' => array('price', 'quantity'),
			'context' => 'side'
		)
	);
}