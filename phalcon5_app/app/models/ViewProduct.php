<?php

class ViewProduct extends Product {

	protected $extraColumn;
	
	public function initialize() {
		parent::initialize();
		$this->setSource('v_products');

		$this->belongsTo('idParentCompany', Company::class, 'id', ['alias' => 'parentCompany']);
	}

	/**
	 * @return mixed
	 */
	public function getExtraColumn() {
		return $this->extraColumn;
	}

	/**
	 * @param mixed $extraColumn
	 */
	public function setExtraColumn($extraColumn): void {
		$this->extraColumn = $extraColumn;
	}

	public function getParentCompany($parameters = null) {
		return $this->getRelated('parentCompany', $parameters);
	}

	/**
	 * @return string[]
	 */
	public function columnMap()	{
		return array_merge(parent::columnMap(), [
			'extra_column' => 'extraColumn',
			'id_parent_company' => 'idParentCompany'
		]);
	}
}