<?php 
namespace App\Models;

class Customer extends BaseModel {
    protected $table = 'customer';

    public function getCustomers()
    {
        $sql = "SELECT * FROM $this->table";
        $this->setQuery($sql);

        return $this->loadAllRows();
    }
    public function getDetailCustomer($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);

        return $this->loadRow([$id]);
    }
    public function addCustomer($id, $ten, $tuoi)
    {
        $sql = "INSERT INTO $this->table VALUES(?, ?, ?)";
        $this->setQuery($sql);

        return $this->execute([$id, $ten, $tuoi]);
    }
    public function updateCutomer($id, $ten, $tuoi)
    {
        $sql = "UPDATE $this->table SET ten = ?, tuoi = ? WHERE id = ?";
        $this->setQuery($sql);

        return $this->execute([$ten, $tuoi, $id]);
    }
    public function deleteCustomer($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);

        return $this->execute([$id]);
    }
}