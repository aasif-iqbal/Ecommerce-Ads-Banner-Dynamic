<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
       
        $this->load->model('Banner_Model');
    }
    
    public function index()
	{		
		$this->load->view('admin/index');
	}

	// upload image for ads on main page of website i.e banner
	public function uploadBanner()
	{
		$this->load->view('admin/index');
		$this->load->view('admin/banner');
		$this->load->view('admin/footer');
	}

	public function store() {
		
        $this->uploadVideos();
    }

	private function uploadVideos(){
        try{
            $imgId="img";
            $tmp_file=$_FILES["files"]["tmp_name"];
            $file_name=$_FILES["files"]["name"];

            if($tmp_file!=null){
				$length=count($tmp_file);
				$uploadedlength=0;
                for($i=0; $i<count($tmp_file); $i++){

                    $filename = explode(".",$file_name[$i]);

					$ext = end($filename);

					$newfileName = $imgId."-".rand().".".$ext;
                    $path = "images/".$newfileName;

                    if(in_array($ext,array('jpeg','jpg','png','gif'))){

                        if(move_uploaded_file($tmp_file[$i],"./".$path)){
                           $uploadedlength++;
                        }
                        else{
							// failed to upload
                        }
                    }
                    else{
                            echo "Wrong file format";
                    }
                }

                if($uploadedlength==$length){
                    //echo($newfileName);die();
                    
                    //sending image file to model
                    $this->Banner_Model->saveBannerPath($newfileName);
					
                    //echo "Success";
                    redirect(base_url('banner')); 
				}
				else{
					echo "Failed to upload file";
				}
            }
            else{
                echo "File note found to upload";
            }
        }
        catch(Exception $e){
            echo "Internal Server Error";
        }
    }

    

    public function showAllBanner()
    {
        $this->load->view('admin/index');

        $selectedBanner['img_path_all'] = $this->Banner_Model->fetchAll_BannerImage();
        $selectedBanner['img_path'] = $this->Banner_Model->fetchBannerImage();

        $this->load->view('admin/selectBanner', $selectedBanner);       
    }

    public function setBannerStatusToChecked()
    {
        $id = $this->input->post('checked_id'); //id => image_name
        
        $updatedValue = $this->Banner_Model->updateBannerStatusToChecked(json_encode($id));
       
        print_r(($updatedValue));
     
    //    print_r(json_encode($id));
    }
    
    public function setBannerStatusToUnChecked()
    {
        $id = $this->input->post('checked_id'); //id => image_name
        
    $updatedValue = $this->Banner_Model->updateBannerStatusToUnchecked(json_encode($id));
       
        print_r(($updatedValue));
     
    //    print_r(json_encode($id));
    }

    public function deleteBanner()
    {
        $this->load->view('admin/index');
        $selectedBanner['img_path_all'] = $this->Banner_Model->fetchAll_BannerImage();
        $this->load->view('admin/deleteBanner',$selectedBanner);  
    }
    
    public function deleteCheckedBanner()
    {
        $ids = $this->input->post('checked_id');
      
        if($ids){
            $deletedphoto = $this->Banner_Model->finalDeleteCheckedBanner(json_encode($ids));
           
            //print_r(gettype($deletedphoto));die(); //return bool
           
            if($deletedphoto){ // true
                foreach($ids as $id){
                  //  print_r(($id));die(); 
                   // Remove files from the server  
                   unlink('images/'.$id);
                   print_r("done");
                }
            }
        }    
       //gettype($deletedphoto); 
        print_r(json_decode($deletedphoto));
       
      }
       
  
}
