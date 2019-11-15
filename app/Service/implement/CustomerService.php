<?php


namespace App\Service\implement;


use App\Respository\CustomerRepositoryInterface;
use App\Service\CustomerServiceInterface;
use App\User;

class CustomerService implements CustomerServiceInterface
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        return $this->customerRepository->getAll();
    }

    public function add($request)
    {
        $customer = new User();
        $customer->name = $request->name;
        $customer->age = $request->age;
        $this->customerRepository->add($customer);
    }
}
