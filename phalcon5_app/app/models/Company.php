<?php

class Company extends Domain {

	/**
	 * Company's Name
	 * @var string
	 */
	protected $name;

	public function initialize() {
		$this->setSource('companies');
	}

	public function getName(): string {
		return $this->name;
	}

	public function setName(string $name): void {
		$this->name = $name;
	}



	public function columnMap() {
		return [
			'id' => 'id',
			'name' => 'name',
			'id_parent' => 'idParent'
		];
	}

}