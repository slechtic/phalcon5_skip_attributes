<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller {

	public function indexAction() {

		$query = \Phalcon\Di\Di::getDefault()->getModelsManager()->createBuilder()
			->addFrom(ViewProduct::class, 'p');

		$products = $query->getQuery()->execute();

		foreach ($products as $product) {
			var_dump($product->getSource());
			var_dump($product->getExtraColumn());
			var_dump($product->getParentCompany()->getName());

		}

		echo "Done";
		die;
	}
}