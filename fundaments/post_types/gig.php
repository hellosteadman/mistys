<?php class GigPostType extends SktPostType {
	protected $fields = array(
		'tickets_url' => array('class' => 'widefat', 'label' => 'Tickets URL')
	);
	
	protected $supports = array('title');
}