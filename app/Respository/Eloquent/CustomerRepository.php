<?php


namespace App\Respository\Eloquent;


use App\Customer;
use App\Respository\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    protected $customer;
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function getAll()
    {
       return $this->customer->all();
    }

    public function add($object)
    {
        $object->save();
    }
}
