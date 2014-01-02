<?php class GigVenueTaxonomy extends SktTaxonomy {
	protected $singular = 'venue';
	protected $post_type = 'gig';
	protected $fields = array(
		'address' => array(
			'class' => 'widefat'
		),
		'url' => array(
			'label' => 'URL',
			'class' => 'widefat'
		)
	);
}