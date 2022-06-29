<?php

class Banner_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index(){}

    public function saveBannerPath($imagePath)
    {
        $query = "INSERT INTO tbl_ads_images (img_path) VALUES ('$imagePath')";

        $result = $this->db->query($query);
      return $this->result;
    }

     //move this function to model - for eStore front
     public function fetchBannerImage()
     {
         //get image checked by admin from table_banner
        $query = "SELECT img_path FROM `tbl_ads_images` WHERE status=1"; 
        $result = $this->db->query($query);
        
      //  print_r($result);die();

        if ($result->num_rows() > 0) {
                return $result->result_array();        
            }   
            else {
                return FALSE;
            }    
     }

     public function fetchAll_BannerImage()
     {
         //get image checked by admin from table_banner
        $query = "SELECT img_path FROM `tbl_ads_images`"; 
        $result = $this->db->query($query);
        
      //  print_r($result);die();

        if ($result->num_rows() > 0) {
                return $result->result_array();        
            }   
            else {
                return Null;
            }    
     }

    public function updateBannerStatusToChecked($id)
    {
     //print_r(gettype($id)); //gettype($id)
     
     $id = str_replace('[', ' ', $id); // Replaces all spaces with hyphens.
     $id = str_replace(']', ' ', $id);
     $query = "UPDATE tbl_ads_images SET Status = '1' WHERE(img_path) IN($id)"; 
     $result = $this->db->query($query);
     
      if ($result) {
        return $result;        
        }   
        else {
            return Null;
        }       
    }

    public function updateBannerStatusToUnchecked($id)
    {
     //print_r(gettype($id));   // gettype string
     
     // Replaces [] spaces with space.
     $id = str_replace('[', ' ', $id); 
     $id = str_replace(']', ' ', $id);
     $query = "UPDATE tbl_ads_images SET Status = '0' WHERE(img_path) IN($id)"; 
     $result = $this->db->query($query);
     
      if ($result) {
        return $result;        
        }   
        else {
            return Null;
        }       
    }

    public function finalDeleteCheckedBanner($id)
    {
      //print_r(gettype($id));   // gettype string
     
     // Replaces [] spaces with space.
     $id = str_replace('[', ' ', $id); 
     $id = str_replace(']', ' ', $id);

     $query = "DELETE FROM tbl_ads_images  WHERE(img_path) IN ($id)"; 
     $result = $this->db->query($query);
     
      if ($result) {
             return $result;        
        }   
        else {
             return Null;
        }       
    }

}