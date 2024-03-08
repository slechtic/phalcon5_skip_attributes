<?php

use Phalcon\Mvc\Model\Relation;
use Phalcon\Mvc\ModelInterface;

#[\AllowDynamicProperties]
abstract class Domain extends \Phalcon\Mvc\Model {

	/** @var integer */
	protected $id;

	public function initialize() {
		$this->useDynamicUpdate(true);
		$this->keepSnapshots(true);
	}

	/**
	 * Get id
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set id
	 * @param integer $id
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}
}