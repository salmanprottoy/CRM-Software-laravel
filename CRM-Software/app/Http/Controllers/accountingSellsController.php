<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bank;
use App\Models\customer;
use App\Models\product;
use App\Models\salary;
use App\Http\Requests\bankInfoRequest;
use App\Http\Requests\customerRequest;
use App\Http\Requests\productRequest;
use GuzzleHttp\Client;
use PDF;

class accountingSellsController extends Controller
{
    //index
    public function index()
    {
        return view('accountingSellsHome.index');
    }

    //calendar
    public function showCalendar()
    {
        return view('accountingSellsHome.calendar');
    }

    //customer
    public function showCustomer()
    {
        $customerList = customer::all();
        return view('accountingSellsHome.customer')->with('customerList', $customerList);
    }
    public function searchCustomer(Request $req)
    {
        if ($req->ajax()) 
        {
            
            $search = $req->get('search');
            $searchBy = $req->get('searchBy');
            $customerList = customer::where($req->searchBy, 'like', '%'.$req->search.'%')->get();
            error_log($customerList);
            return response()->json($customerList);
        } 
        else {
            return Redirect()->Back();
        }
    }
    public function createCustomer()
    {
        return view('accountingSellsHome.createCustomer');
    }
    public function creatingCustomer(customerRequest $req)
    {
        $customer = array();
        $customer['customerName']           = $req->customerName;
        $customer['customerContactNumber']  = $req->customerContactNumber;
        $customer['customerAddress']        = $req->customerAddress;
        $customer['customerEmail']          = $req->customerEmail;
        $customer['customerStatus']         = $req->customerStatus;
        $customer['customerGender']         = $req->customerGender;
        $createCustomer= customer::insert($customer);
        if($createCustomer){
            return redirect()->route('accountingSellsHome.customer');
        }
        else{
            return redirect()->back();
        }
    }
    public function editCustomer($id)
    {
        $customer = customer::find($id);
        return view('accountingSellsHome.editCustomer',$customer);
    }
    public function updateCustomer($id, customerRequest $req)
    {
        $customer = array();
        $customer['customerName']           = $req->customerName;
        $customer['customerContactNumber']  = $req->customerContactNumber;
        $customer['customerAddress']        = $req->customerAddress;
        $customer['customerEmail']          = $req->customerEmail;
        $customer['customerStatus']         = $req->customerStatus;
        $customer['customerGender']         = $req->customerGender;
        $updateCustomer= customer::where('id', $id)->update($customer);
        if($updateCustomer){
            return redirect()->route('accountingSellsHome.customer');
        }
        else{
            return redirect()->back();
        }
    }
    public function deleteCustomer($id)
    {
        $customer = customer::find($id);
        return view('accountingSellsHome.deleteCustomer',$customer);
    }
    public function deletingCustomer($id)
    {
        $deleteCustomer = customer::where('id',$id)->delete();
        if($deleteCustomer){
            return redirect()->route('accountingSellsHome.customer');
        }
        else{
            return redirect()->back();
        }
    }

    //product
    public function showProduct()
    {
        $productList = product::all();
        return view('accountingSellsHome.product')->with('productList', $productList);
    }
    public function searchProduct(Request $req)
    {
        if ($req->ajax()) 
        {
            
            $search = $req->get('search');
            $searchBy = $req->get('searchBy');
            $productList = product::where($req->searchBy, 'like', '%'.$req->search.'%')->get();
            error_log($productList);
            return response()->json($productList);
        } 
        else {
            return Redirect()->Back();
        }
    }
    public function createProduct()
    {
        return view('accountingSellsHome.createProduct');
    }
    public function creatingProduct(productRequest $req)
    {
        $product = array();
        $product['productCode']         = $req->productCode;
        $product['productName']         = $req->productName;
        $product['productVendor']       = $req->productVendor;
        $product['quantityInStock']     = $req->quantityInStock;
        $product['buyPrice']            = $req->buyPrice;
        $product['sellPrice']           = $req->sellPrice;
        $product['productDescription']  = $req->productDescription;
        $createProduct= product::insert($product);
        if($createProduct){
            return redirect()->route('accountingSellsHome.product');
        }
        else{
            return redirect()->back();
        }
    }
    public function editProduct($id)
    {
        $product = product::find($id);
        return view('accountingSellsHome.editProduct', $product);
    }
    public function updateProduct($id, productRequest $req)
    {
        $product = array();
        $product['productCode']         = $req->productCode;
        $product['productName']         = $req->productName;
        $product['productVendor']       = $req->productVendor;
        $product['quantityInStock']     = $req->quantityInStock;
        $product['buyPrice']            = $req->buyPrice;
        $product['sellPrice']           = $req->sellPrice;
        $product['productDescription']  = $req->productDescription;
        $updateProduct= product::where('id', $id)->update($product);
        if($updateProduct){
            return redirect()->route('accountingSellsHome.product');
        }
        else{
            return redirect()->back();
        }
    }
    public function deleteProduct($id)
    {
        $product = product::find($id);
        return view('accountingSellsHome.deleteProduct',$product);
    }
    public function deletingProduct($id)
    {
        $deleteProduct = product::where('id',$id)->delete();
        if($deleteProduct){
            return redirect()->route('accountingSellsHome.product');
        }
        else{
            return redirect()->back();
        }
    }

    //bankInfo
    public function showBankInfo()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:3000/home/getBankInfo');
        if ($response->getStatusCode() == 200) {
            $bankInfo = json_decode($response->getBody(), true);
            return view('accountingSellsHome.bankInfo')->with('bankInfo', $bankInfo);
        } else {
            echo "Not get";
        }
        /* $bankInfo = bank::all();
        return view('accountingSellsHome.bankInfo')->with('bankInfo', $bankInfo); */
    }
    public function searchBankInfo(Request $req)
    {
        if ($req->ajax()) 
        {
            
            $search = $req->get('search');
            $searchBy = $req->get('searchBy');
            $bankInfo = bank::where($req->searchBy, 'like', '%'.$req->search.'%')->get();
            error_log($bankInfo);
            return response()->json($bankInfo);
        } 
        else {
            return Redirect()->Back();
        }
    }
    public function editBankInfo($id)
    {
        $bankInfo = bank::find($id);
        return view('accountingSellsHome.editBankInfo',$bankInfo);
    }
    public function updateBankInfo($id, bankInfoRequest $req)
    {
        $bankInfo = array();
        $bankInfo['accountName']    = $req->accountName;
        $bankInfo['accountNumber']  = $req->accountNumber;
        $bankInfo['bankName']       = $req->bankName;
        $bankInfoEdit = bank::where('id', $id)->update($bankInfo);
        if($bankInfoEdit){
            return redirect()->route('accountingSellsHome.bankInfo');
        }
        else{
            return redirect()->back();
        }
    }

    //salary
    public function showSalary()
    {
        $salaryList = salary::all();
        return view('accountingSellsHome.salary')->with('salaryList', $salaryList);
    }
    public function searchSalary(Request $req)
    {
        if ($req->ajax()) 
        {
            
            $search = $req->get('search');
            $searchBy = $req->get('searchBy');
            $salaryInfo = salary::where($req->searchBy, 'like', '%'.$req->search.'%')->get();
            error_log($salaryInfo);
            return response()->json($salaryInfo);
        } 
        else {
            return Redirect()->Back();
        }
    }
    public function showReport()
    {
        $totalProduct = product::all();
        $countProduct = $totalProduct->count();
        $totalProductInStock = product::get()->sum('quantityInStock');
        $totalCustomer = customer::all();
        $countCustomer = $totalCustomer->count();
        $activeCustomer = customer::where('customerStatus', 'active');
        $countActiveCustomer = $activeCustomer->count();
        $maleCustomer = customer::where('customerGender', 'male');
        $countMaleCustomer = $maleCustomer->count();
        $femaleCustomer = customer::where('customerGender', 'female');
        $countFemaleCustomer = $femaleCustomer->count();

        return view('accountingSellsHome.report')->with('totalCustomer', $countCustomer)->with('totalProduct', $countProduct)->with('activeCustomer', $countActiveCustomer)->with('maleCustomer', $countMaleCustomer)->with('femaleCustomer', $countFemaleCustomer)->with('totalProductInStock', $totalProductInStock);
    }
    //Pdf
    public function generatePDF()
    {
        $totalProduct = product::all();
        $countProduct = $totalProduct->count();
        $totalProductInStock = product::get()->sum('quantityInStock');
        $totalCustomer = customer::all();
        $countCustomer = $totalCustomer->count();
        $activeCustomer = customer::where('customerStatus', 'active');
        $countActiveCustomer = $activeCustomer->count();
        $maleCustomer = customer::where('customerGender', 'male');
        $countMaleCustomer = $maleCustomer->count();
        $femaleCustomer = customer::where('customerGender', 'female');
        $countFemaleCustomer = $femaleCustomer->count();

        $data = [
                    'title'                 => 'Accounting & Sells Report',
                    'totalCustomer'         => $countCustomer,
                    'totalProduct'          => $countProduct,
                    'activeCustomer'        => $countActiveCustomer,
                    'maleCustomer'          => $countMaleCustomer,
                    'femaleCustomer'        => $countFemaleCustomer,
                    'totalProductInStock'   => $totalProductInStock
                ];
        $pdf = PDF::loadView('accountingSellsHome/pdfReport', $data);
  
        return $pdf->download('AccountingSells_report.pdf');
    }
}
