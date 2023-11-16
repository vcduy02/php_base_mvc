<?php 
namespace App\Controllers;
use App\Models\Customer;

class CustomerController extends BaseController {
    public $customer;

    public function __construct()
    {
        $this->customer = new Customer();
    }
    public function index()
    {
        $customers = $this->customer->getCustomers();

        return $this->render('customer.index', compact('customers'));
    }
    public function addCustomer()
    {
        return $this->render('customer.create');
    }
    public function postCustomer()
    {
        if (isset($_POST['create'])) {
            $errors = [];
            if (empty($_POST['ten'])) {
                $errors[] = 'Tên khách hàng không được bỏ trống';
            }
            if (empty($_POST['tuoi'])) {
                $errors[] = 'Tuổi khách hàng không được bỏ trống';
            } else if ($_POST['tuoi'] <= 0) {
                $errors[] = "Tuổi khách hàng không được nhỏ hơn 0";
            }
            if (count($errors) > 0) {
                flash('errors', $errors, 'add-customer');
            } else {
                $result = $this->customer->addCustomer(NULL, $_POST['ten'], $_POST['tuoi']);
                if ($result) {
                    flash('success', 'Thêm thành công', 'list-customer');
                }
            }
        }
    }
    public function detailCustomer($id) 
    {
        $customer = $this->customer->getDetailCustomer($id);

        return $this->render('customer.edit', compact('customer'));
    }
    public function editCustomer($id)
    {
        if (isset($_POST['update'])) {
            $errors = [];
            if (empty($_POST['ten'])) {
                $errors[] = 'Tên khách hàng không được bỏ trống';
            }
            if (empty($_POST['tuoi'])) {
                $errors[] = 'Tuổi khách hàng không được bỏ trống';
            } else if ($_POST['tuoi'] <= 0) {
                $errors[] = "Tuổi khách hàng không được nhỏ hơn 0";
            }
            if (count($errors) > 0) {
                flash('errors', $errors, 'detail-customer/' . $id);
            } else {
                $result = $this->customer->updateCutomer($id, $_POST['ten'], $_POST['tuoi']);
                if ($result) {
                    flash('success', 'Sửa thành công', 'detail-customer/' . $id);
                }
            }
        }
    }
    public function destroyCustomer($id)
    {
        $result = $this->customer->deleteCustomer($id);
        if ($result) {
            flash('success', 'Xóa thành công', 'list-customer');
        }
    }
}