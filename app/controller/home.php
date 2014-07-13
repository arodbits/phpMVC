<?php

class Home extends Controller{

	public function index($name = "Carlos"){

		echo 'Home/index'. $name;

	}
}