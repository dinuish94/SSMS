<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class CustManController extends Controller
{
    public function loadView()
    {
    	$customer = DB::select("select * from customer");
     	return view('CustMan', compact('customer'));
    	
    }

    public function getCust(Request $request)

    {
      $name = $request->input('name');
      $address = $request->input('address');
      $contactNo = $request->input('contactNo');
      $contactPerson= $request->input('contactPerson');
      $customerType=2;
      $mail = $request->input('mail');
      $nic = $request->input('nic');
      $pwd = $request ->input('pwd');
     
     DB::statement("INSERT INTO customer(name,address,contactNo,contactPerson,cusType,mail,nic,pwd) values('$name','$address','$contactNo','$contactPerson','$customerType','$mail','$nic','pwd')");

     $customer = DB::select("select * from customer");
     return view('CustMan', compact('customer'));	
  	}

  	public function deleteCustomer(Request $request)
  	{
        $cus_id = $request['cus_id'];
        DB::statement("DELETE FROM customer WHERE cus_id = '$cus_id'");
    }
}
