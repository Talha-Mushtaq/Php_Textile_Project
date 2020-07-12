<?php

class dbconn
{
   private $bdcon;
   function __construct()
   {
       $this->dbcon = new PDO("mysql:host=localhost;dbname=textile","root","");
       (!$this->dbcon)
            &&
          die("Database not connected") ;        
   }
   
 function Login()
 {
   try
   {
      $sql="SELECT * FROM login";
      $show=$this->dbcon->query($sql);
      $data=$show->fetchAll();
      return $data;   
   }
   catch(PDOException $e)
      {
         print "Error = ".$e->getMessage();
         return false;
       }            


 }

   function ProductInsert($p_title , $p_cat , $newImage , $p_detail)
   {
             $ret = false;      
       try
       {

      $sql = "INSERT INTO product(PRODUCTTITLE, PRODUCTCATEGORY, PRODUCTIMAGE, PRODUCTDETAIL) VALUES ('$p_title' , '$p_cat' , '$newImage' , '$p_detail')";
      $insert =  $this->dbcon->prepare($sql);
      
       $insert->bindparam(':PRODUCTTITLE',$p_title);
       $insert->bindparam(':PRODUCTCATEGORY',$p_cat);
       $insert->bindparam(':PRODUCTIMAGE',$newImage);
       $insert->bindparam(':PRODUCTDETAIL',$p_detail);

      $insert->execute();      
       
       ($insert->rowCount())
       ?
          $ret = true
       :
          $ret = false;   
       
       return $ret;

      }
      catch(PDOException $e)
      {
         print "Error = ".$e->getMessage();
        $ret = false;
        return false;
      }        
   }

   function ProductShow()
   {
      try
      {
         $sql="SELECT * FROM product";
         $show=$this->dbcon->query($sql);
         $data=$show->fetchAll();
         return $data;   
      }
      catch(PDOException $e)
         {
            print "Error = ".$e->getMessage();
            return false;
          }            
   
   }

     function ProductSearch($title)
     {
         try
         {
            $sql="SELECT * FROM product WHERE PRODUCTTITLE LIKE '$title%'";
            $search=$this->dbcon->query($sql);
            $data=$search->fetchAll();
            // echo "<script>alert($data)</script>";

            return $data;
      
         }
         catch(PDOException $e)
          {
            print "Error = ".$e->getMessage();
            return false;
              }
     }

     function ProductDelete($Id)
     {
        $ret = false ;
         try
         {
            $sql="DELETE FROM product WHERE PRODUCTID = $Id";
            $delete=$this->dbcon->prepare($sql);

            $delete->bindparam(':PRODUCTID',$Id);

            $delete->execute();
            
            ( $delete->rowCount() )           
            ?
               $ret = true
            :
               $ret = false;   
            return $ret;      
         }
         catch(PDOException $e)
          {
            echo "Error = ".$e->getMessage();
           $ret = false; 
           return false;
          }
     }

     function ProductEdit($preID,$p_title , $p_cat , $newImage , $p_detail)
     {
        $ret = false ;
         try
         {
            $sql="UPDATE product SET PRODUCTTITLE = '$p_title', PRODUCTCATEGORY = '$p_cat', PRODUCTIMAGE = '$newImage', PRODUCTDETAIL = '$p_detail' WHERE PRODUCTID = $preID";
            $update =  $this->dbcon->prepare($sql);
      
            $update->bindparam(':PRODUCTTITLE',$p_title);
            $update->bindparam(':PRODUCTCATEGORY',$p_cat);
            $update->bindparam(':PRODUCTIMAGE',$newImage);
            $update->bindparam(':PRODUCTDETAIL',$p_detail);
            $update->bindparam(':PRODUCTID',$preID);
     
           $update->execute();      
            
            ($update->rowCount())
            ?
               $ret = true
            :
               $ret = false;   
            
            return $ret;
     
           }
           catch(PDOException $e)
           {
              print "Error = ".$e->getMessage();
             $ret = false;
             return false;
           } 
     }

}

?>