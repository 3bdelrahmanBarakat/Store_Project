<?php
namespace App\Services;

use App\Repositories\ProductRepository;
use App\Utils\ImageUpload;
use Yajra\DataTables\Facades\DataTables;

class ProductService
{
    public $productRepository;
    public function __construct(ProductRepository $repo)
    {
        $this->productRepository = $repo;
    }

    public function getAll()
    {
        return $this->productRepository->baseQuery();
    }

    public function getById($id)
    {
        return $this->productRepository->baseQuery([],[],['id'=>$id])->firstOrFail();
    }

    public function store($params)
    {
        if (isset($params['image'])) {
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }

        if (isset($params['size_chart'])) {
            $params['size_chart'] = ImageUpload::uploadImage($params['size_chart']);
        }

        if (isset($params['colors'])) {
            $params['color'] = implode(',', $params['colors']);
            unset($params['colors']);
        }

        if (isset($params['sizes'])) {
            $params['size'] = implode(',', $params['sizes']);
            unset($params['sizes']);
        }

        return $this->productRepository->store($params);

    }

    public function update($id, $params)
    {
        if (isset($params['image'])) {
            $params['image'] = ImageUpload::uploadImage($params['image']);
        }

        if (isset($params['size_chart'])) {
            $params['size_chart'] = ImageUpload::uploadImage($params['size_chart']);
        }

        if (isset($params['colors'])) {
            $params['color'] = implode(',', $params['colors']);
            unset($params['colors']);
        }

        if (isset($params['sizes'])) {
            $params['size'] = implode(',', $params['sizes']);
            unset($params['sizes']);
        }
        return $this->productRepository->update($id, $params);
    }

    public function delete($params)
    {
        $this->productRepository->delete($params);
    }

    public function delete_image($id)
    {
        $this->productRepository->delete_image($id);
    }

    public function datatable()
    {
        $query = $this->productRepository->baseQuery(relations:['category']);
        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                return $btn = '
                <a href="' . Route('dashboard.products.edit', $row->id) . '"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>

                <button type="button" id="deleteBtn"  data-id="' . $row->id . '" class="btn btn-danger mt-md-0 mt-2" data-bs-toggle="modal"
                data-original-title="test" data-bs-target="#deletemodal"><i class="fa fa-trash"></i></button>';
            })

            ->addColumn('image', function($row) {
                return '<img src="' . asset($row->image) . '"width="100px" height="100px">';
            })

            ->addColumn('category', function ($row) {
                return $row->category->name;
            })




            ->rawColumns(['action','image'])
            ->make(true);
        }
}
