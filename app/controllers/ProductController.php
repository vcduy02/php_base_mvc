<?php
namespace App\Controllers;
use App\Models\Product;

class ProductController extends BaseController{
    public $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    public function index()
    {
        $products = $this->product->getProducts();
        return $this->render('product.index', compact('products'));
    }
    public function addProduct()
    {
        return $this->render('product.create');
    }
    public function postProduct()
    {
        if (isset($_POST['create'])) {
            $errors = [];
            if (empty($_POST['ten_sp'])) {
                $errors[] = "Tên sản phẩm không được bỏ trống";
            }
            if (empty($_POST['gia'])) {
                $errors[] = "Giá sản phẩm không được bỏ trống";
            }else if ($_POST['gia'] <= 0) {
                $errors[] = "Giá sản phẩm không được nhỏ hơn 0";
            }
            if (count($errors) > 0) {
                flash('errors', $errors, 'add-product');
            } else {
                $result = $this->product->addProduct(NULL, $_POST['ten_sp'], $_POST['gia']);
                if ($result) {
                    flash('success', 'Thêm thành công', 'list-product');
                }
            }
        }
    }
    public function detailProduct($id)
    {
        $product = $this->product->getDetailProduct($id);

        return $this->render('product.edit', compact('product'));
    }
    public function editProduct($id)
    {
        if (isset($_POST['update'])) {
            $errors = [];
            if (empty($_POST['ten_sp'])) {
                $errors[] = "Tên sản phẩm không được bỏ trống";
            }
            if (empty($_POST['gia'])) {
                $errors[] = "Giá sản phẩm không được bỏ trống";
            }
            if ($_POST['gia'] <= 0) {
                $errors[] = "Giá sản phẩm không được nhỏ hơn 0";
            }
            if (count($errors) > 0) {
                flash('errors', $errors, 'detail-product/' . $id);
            } else {
                $result = $this->product->updateProduct($id, $_POST['ten_sp'], $_POST['gia']);
                if ($result) {
                    flash('success', 'Sửa thành công', 'detail-product/' . $id);
                }
            }
        }
    }
    public function destroyProduct($id) 
    {
        $result = $this->product->deleteProduct($id);
        if ($result) {
            flash('success', 'Xóa thành công', 'list-product');
        }
    }
}
