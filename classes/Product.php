<?php
namespace aitsydney;
class Product extends Database{
    public $products = array();
    public function _construct(){
        parent::_construct();
    }
    public function getProducts(){
        $query ="SELECT
        @product_id :=product.product_id As product_id,
        product.name,
        product.description,
        product.price,
        (SELECT @image_id := product_image.image_id from product_image where product_image.product_id = @product_id limit 1)As image_id,
        
        (select image_file_name from image WHERE image.image_id = @image_id ) AS image 
        from product";

        $statement = $this -> connection ->prepare($query);
        if($statement -> execute()){
            $result = $statement -> get_result();
            while ($row = $result -> fetch_assoc()){
                array_push( $this -> products ,$row);
            }

        }
        return $this -> products;
    }
}
?>