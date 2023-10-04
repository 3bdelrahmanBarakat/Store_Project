<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductImage;
use App\Utils\ImageUpload;
use Yajra\DataTables\Facades\DataTables;

class ProductRepository implements RepositoryInterface
{
    public $product;
    public function __construct(Product $product)
    {

        $this->product = $product;
    }

    public function baseQuery($relations=[],$withCount=[], $where=[])
    {
        $query = $this->product->select('*')->with($relations);
        foreach ($withCount as $key => $value) {
           $query->withCount($value);
        }
        foreach ($where as $key => $value) {
            $query->where($key, $value);
        }
       return $query;
    }

    public function getbyId($id)
    {
        return $this->product->where('id', $id)->firstOrFail();
    }


    public function store($params)
    {
        $product = $this->product->create($params);


        $images= $this->uploadMultipleImages($params,$product);


        $product->images()->createMany($images);
        return $product;
    }

    private function uploadMultipleImages($params,$product)
    {
        $images= [];
        if(isset($params['images']))
        {
            $i = 0;
            foreach($params['images'] as $key => $value)
            {
                $images[$i]['image'] = ImageUpload::uploadImage($value);
                $images[$i]['product_id'] = $product->id;
                $i++;
            }
        }
        return $images;
    }

    public function addColor($product, $params)
    {
        $product->productColor()->createMany($params['colors']);
    }



    public function update($id, $params)
    {
        // dd($params);
        $product = $this->getbyId($id);
        // dd($product);
        $product =($product->update($params));
        $product = $this->getbyId($id);
        $images = $this->uploadMultipleImages($params , $product);
        $product->images()->createMany($images);
        return $product;
    }

    public function delete($params)
    {
        $product = $this->getbyId($params['id']);
        if(file_exists($product->image)){
            unlink($product->image);
          }
          if(file_exists($product->size_chart)){
            unlink($product->size_chart);
          }
        return $product->delete();
    }
    public function delete_image($id)
    {
        $image = ProductImage::where('id', $id)->firstOrFail();
        if(file_exists($image->image)){
            unlink($image->image);
          }
        return $image->delete();
    }
}
