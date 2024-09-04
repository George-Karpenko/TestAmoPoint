<?php

namespace Project\Controller;

use Core\Controller;
use Project\Model\Metric;

class HomeController extends Controller
{
	function index()
	{
		$this->title = 'Главная';

		$metric = new Metric;

		return $this->render('index', ['chart' => $metric->chart(), 'pie_chart' => $metric->pie_chart()]);
	}
}
