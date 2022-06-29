<!DOCTYPE html>
<html>
    <head>
        <h3>Delete Banner</h3>
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
  max-width: 300px;
  height: auto;
  width: 100%;
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
<!-- <//?= print_r($img_path_all); ?> -->
<ul>  <?php if(isset($img_path_all) && !empty($img_path_all)){ ?>
      <?php for($i=0; $i < count($img_path_all); $i++){ ?>
      <li>
        <input type="checkbox" value="<?= $img_path_all[$i]['img_path'] ?>"/>
        <label for="">
          <img src="<?php echo base_url('images/'.$img_path_all[$i]['img_path']);?>" />
        </label>
      </li>
        <?php }; ?>     
        <?php }else{ echo("<h1>No Image Found</h1>"); }?> 
      </ul>
      <button type="button" id="dlt_checkedValue" class="btn btn-primary">Delete</button>
    </body>
    <script>
  
  var all = [];
  // ---------------select Checkbox value---------------------
  $(document).on('change','input[type=checkbox]' ,function(){
        all = []; 
        $('input[type=checkbox]:checked').each(function(){                          
            all.push($(this).val());       
        });        
        console.log(all);       
        });

        
         $("#dlt_checkedValue").on('click',function(){            
          $.ajax({
                  url: "<?= base_url('Admin/Admin_Controller/deleteCheckedBanner') ?>",
                  type: 'POST',
                  data: {                 
                      checked_id:all
                  },
                  success: function(data, textStatus, jqXHR) {
                    alert(data); 
                    // window.location = "<//?= base_url("delete-banner"); ?>";               
                  }
              })
          });
 
   </script>
</html>