<?php
App::uses('AppModel', 'Model');
/**
 * Publication Model
 *
 */
class Publication extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'publication_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'publication_name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'publication_id' => array(
			'blank' => array(
				'rule' => 'blank',
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'publication_name' => array(
			'words' => array(
				'rule' => array('custom', '/([\w.-]+ )+[\w+.-]/'),
				'message' => 'The publication name only be letter, number',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Publication can not be empty',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'maxLength' => array(
				'rule' => array('maxLength', 100),
				'message' => 'Name can not be longer then 100',

			),
			'isUnique' => array(
					'rule' => 'isUnique',
					'message' => 'The publication name already '
				),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $hasmany = array(
		'PublicationIssues' => array(
			'className' => 'Issue',
			'foreignKey' => 'issue_publication_id',

		)
	);
}

}
