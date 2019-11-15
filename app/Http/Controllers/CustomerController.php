<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    public function __construct(CustomerServiceInterface $customerService)
    {
        $this->customerService =$customerService;
    }

    public function index(){
        $customers = $this->customerService->getAll();
        return view('customer.list',compact('customers'));
    }

    public function add(Request $request){
        if ($request->ajax()){
            $customer=new Customer();
            $customer->name=$request->nameCustomer;
            $customer->age=$request->ageCustomer;
            $customer->save();
            return response()->json($customer);
        }
    }
}
