<?php 
	 function cateParent($data,$select_name="",$parent = 0, $str ='--',$select=0){
       foreach ($data as $key => $value)
       {
           $id = $value['id'];
           $name = $value['name'];

            if($value['parent_id'] == $parent )
            {
               if($select!=0 && $id ==$select)
               {
                    echo "<option";
                    if(old($select_name) == $value['id'] ){

                    echo 'selected ="selected"';

                    }
                    echo" value='".$value['id']."' selected='selected'> $str $name</option>";
                }
                else{
                  echo "<option ";
                  if(old($select_name) == $value['id'] ){

                    echo 'selected ="selected"';

                  }
                  echo"value='".$value['id']."'> $str $name</option>";
                }
                cateParent($data,$name,$id,$str.'--',$select);
            }

       }

    }
 ?>