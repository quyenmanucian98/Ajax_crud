<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Service\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;
    protected $customer;

    public function __construct(CustomerServiceInterface $customerService,
                                Customer $customer)
    {
        $this->customerService = $customerService;
        $this->customer = $customer;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        return view('customer.list', compact('customers'));
    }

    public function add(Request $request)
    {
        if ($request->ajax()) {
            $customer = new Customer();
            $customer->name = $request->nameCustomer;
            $customer->age = $request->ageCustomer;
            $customer->save();
            return response()->json($customer);
        }
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $customers = $this->customer->where('name', 'LIKE', '%' . $request->keyword . '%')->get();
            return response()->json($customers);
        }
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return response()->json();
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {
            $customer = Customer::findOrFail($id);
            $customer->name = $request->newName;
            $customer->age = $request->newAge;
            $customer->save();
            return response()->json($customer);
        }
    }
}
