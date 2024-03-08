<?php

class Product extends Domain {

	protected $createdAt;

	/**
	 * @var string
	 */
    protected string $number;
	
	public function initialize() {
		parent::initialize();
		$this->setSource('products');

		$this->belongsTo('idCompany', Company::class, 'id', ['alias' => 'company']);

		$this->skipAttributesOnUpdate(['createdAt']);
	}

	/**
	 * @return string
	 */
	public function getNumber(): string {
		return $this->number;
	}
	
	/**
	 * @param string $number
	 */
	public function setNumber(string $number): void {
		$this->number = $number;
	}

	/**
	 * @return mixed
	 */
	public function getCreatedAt() {
		return $this->createdAt;
	}

	/**
	 * @param mixed $createdAt
	 */
	public function setCreatedAt($createdAt): void {
		$this->createdAt = $createdAt;
	}

	public function getCompany($parameters = null) {
		return $this->getRelated('company', $parameters);
	}

	/**
	 * @return string[]
	 */
	public function columnMap()	{
		return [
			'id' => 'id',
			'number' => 'number',
			'created_at' => 'createdAt',
			'id_company' => 'idCompany'
		];
	}
 
}