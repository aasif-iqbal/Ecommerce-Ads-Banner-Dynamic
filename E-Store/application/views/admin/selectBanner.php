<!DOCTYPE html>

<html>
    <head>
        <h2>Select Banner Image</h2>
        <style>
            ul {
  list-style-type: none;
}

li {
  display: inline-block;
}

input[type="checkbox"][id^="myCheckbox"] {
  display: none;
}

label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + label {
  border-color: #ddd;
}

:checked + label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

:checked + label img {
  transform: scale(0.9);
  /* box-shadow: 0 0 5px #333; */
  z-index: -1;
}
        </style>
    </head>
    <body>
      <!-- <//?php print_r((($img_path))); ?> -->
    
      <!-- Select Image -->
      <h4>All Banners (Set Image)</h4>
      <ul>
      <?php if(isset($img_path_all) && !empty($img_path_all)){ ?>
      <?php for($i=0; $i < count($img_path_all); $i++){ ?>
      <li>
        <input type="checkbox" value="<?= $img_path_all[$i]['img_path'] ?>"/>
        <label for="myCheckbox1">
          <img src="<?php echo base_url('images/'.$img_path_all[$i]['img_path']);?>" />
        </label>
      </li>
        <?php }; ?>  
        <?php }else{ echo("<h1>No Image Found</h1>"); }?> 
      </ul>
      <button type="button" id="sbmt_checkedValue" class="btn btn-primary">Submit</button>
     
     <hr>
      <!-- Select Image -->
      <h4>All Banners (Un-Set Image)</h4>
      <ul>
      <?php if(isset($img_path_all) && !empty($img_path_all)){ ?>
      <?php for($i=0; $i < count($img_path_all); $i++){ ?>
      <li>
        <input type="checkbox" value="<?= $img_path_all[$i]['img_path'] ?>"/>
        <label for="myCheckbox1">
          <img src="<?php echo base_url('images/'.$img_path_all[$i]['img_path']);?>" />
        </label>
      </li>
        <?php }; ?>   
        <?php }else{ echo("<h1>No Image Found</h1>"); }?> 
      </ul>
      <button type="button" id="sbmt_unCheckedValue" class="btn btn-primary">Submit</button>

      <!-- selected Images -->
      <hr>
      <h4>Select Image shown in Banner</h4>
      <ul>
      <?php if(isset($img_path) && !empty($img_path)){ ?>
      <?php for($i=0; $i < count($img_path); $i++){ ?>
  <li>
    <!-- <input type="checkbox" id="<//?php $img_path[$i]['img_path'] ?>"/> -->
    <label for="myCheckbox1">
      <img src="<?php echo base_url('images/'.$img_path[$i]['img_path']);?>" />
    </label>
  </li>
  
  <?php }; ?>
  <?php }else{ echo("<h1>No Image Found</h1>"); }?> 
  
</ul>

 
    </body>
   <script>
   var all = [];

//1. on button click checkbox value will send to controller 
//2. controller will update checkbox value by setting status 1 inside Model

  // ---------------select Checkbox value---------------------
  $(document).on('change','input[type=checkbox]' ,function(){
        // checkedVal={};
        all=[];
        $('input[type=checkbox]:checked').each(function(){             
             
            all.push($(this).val());
       
        });
        
        console.log(all);
       
        });

        //send image_name to controller UpdateTokenStatus and set value 1 in table tbl_tokenMaster
     
         //  Sending Project-Admin-id with Assign token-id and toy-id
         //  table_name: tblAssignToyToProjectAdmin
         $("#sbmt_checkedValue").on('click',function(){            
          $.ajax({
                  url: "<?= base_url('Admin/Admin_Controller/setBannerStatusToChecked') ?>",
                  type: 'POST',
                  data: {                 
                      checked_id:all
                  },
                  success: function(data, textStatus, jqXHR) {
                    alert(data); 
                    // window.location = "<//?= base_url("viewAssignToys"); ?>";               
                  }
              })
          });

    // Get Unchecked Value from array all[]
    $("#sbmt_unCheckedValue").on('click',function(){            
          $.ajax({
              url: "<?= base_url('Admin/Admin_Controller/setBannerStatusToUnChecked') ?>",
                  type: 'POST',
                  data: {                 
                      checked_id:all
                  },
                  success: function(data, textStatus, jqXHR) {
                    alert(data); 
                    // window.location = "<//?= base_url("viewAssignToys"); ?>";               
                  }
              })
          });
   </script>
</html>