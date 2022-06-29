<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EStore_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_Model');
    }

	public function index()
	{		
		
	}

   
	public function getBannerImage()
    {
        $img_path['img_path'] = $this->Banner_Model->fetchBannerImage();
        // print_r($img_path);
        $this->load->view('eStore/index', $img_path);
    }

 
}
