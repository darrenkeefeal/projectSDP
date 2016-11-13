<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->view("home");
	}
	
	public function about()
	{
		$this->load->view('about');
	}
	
	public function menu()
	{
		$this->load->view('menu');
	}
	
	public function gallery()
	{
		$this->load->view('gallery');
	}
	
	public function events()
	{
		$this->load->view('events');
	}
	
	public function reservation()
	{
		$this->load->view('reservation');
	}
	
	public function contact()
	{
		$this->load->view('contact');
	}
	
	public function login()
	{
		$this->load->view('login');
	}
	
	public function register()
	{
		$this->load->view('register');
	}
	
}
