<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Make;
use App\Models\Year;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Artisan;

class ManageCustomersController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customers = DB::table('customers')->latest()->paginate(10);
        $pageTitle = 'Manage Customers';

        return view('admin.apps.managecustomer', [
            'customers' => $customers,
            'pageTitle' => $pageTitle,
            'custom_pagination' => 'custom_pagination',
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');

        $customers = DB::table('customers')
            ->where( 'name','like', '%' . $search . '%')->ORwhere( 'email','like', '%' . $search . '%')->ORwhere( 'phone_number','like', '%' . $search . '%')
            ->orderBy('id')
            ->paginate(10);

        $pageTitle = 'Manage Customers';

        return view('admin.apps.managecustomer', [
            'customers' => $customers,
            'pageTitle' => $pageTitle,
            'custom_pagination' => 'custom_pagination',
        ]);
    }

    public function create()
    {
        $pageTitle = 'Add Customer';
      
        return view('admin.apps.customercreate', compact('pageTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'phone_number' =>  ['required', 'regex:/^\d{3}-\d{3}-\d{4}$/'],
            'status' => 'required',
                  
        ],[

        'customer_name.required' => 'Customer Name field is required!',
        'email.required' => 'Email Address field is required!',
        'email.email' => 'Email Address should be a valid email format!',
        'email.unique' => 'This email address is already taken!',
        'phone_number.required' => 'Phone Number field is required!',
        'phone_number.regex' => 'Phone Number should be in XXX-XXX-XXXX format',
        'status.required' => 'Status field is required!',

        ]);
      
        $presentDateTime = Carbon::now();
        $currentDateTime = Carbon::now();
        $nextMonthDateTime = $presentDateTime->addMonth();
        $nextMonthDateTime = $nextMonthDateTime->subDay(1);
        $nextMonthDateTimeString = $nextMonthDateTime->toDateTimeString();


        $id = DB::table('customers')->insertGetId([
            'name' => $request->customer_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'status' => $request->status,
        ]);

        $customersId = DB::table('customers_payment_period')->insertGetId([
            'cid' =>$id,
            'pp_from' =>$currentDateTime,
            'pp_to' =>$nextMonthDateTimeString,
            'amount' => '20',
            'status' => 'unpaid',
        ]);

        $subject = 'Welcome ' . $request->customer_name . ' to MediaCenterTech';

        MailController::addCustomerEmail($request->email, $subject);
        MailController::remainderEmail($request->email);
        return redirect()->route('manage-customers.manage')->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $customers = DB::table('customers')->find($id);
        $pageTitle = 'Edit Customer';
        
        return view('admin.apps.customeredit', compact('customers', 'pageTitle'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required',
            'email' => 'required|email',
            'phone_number.required' => 'Phone Number field is required!',
            'phone_number.regex' => 'Phone Number should be in XXX-XXX-XXXX format',
            'status' => 'required|',        
        ],
        [
            'customer_name.required' => 'Customer Name field is required!',
            'email.required' => 'Email Address field is required!',
            'phone_number.required' => 'Phone Number field is required!',
            'phone_number.regex' => 'Phone Number should be in XXX-XXX-XXXX format',
            'status.required' => 'Status field is required!',
            
        ]);

        $customers = DB::table('customers')->find($id);

        

        DB::table('customers')->where('id', $id)->update([
            'name' => $request->customer_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'status' => $request->status,

       
        ]);

       
        return redirect()->route('manage-customers.manage')->with('success', 'Customer updated successfully.');
    }
    public function delete($id)
    {
        DB::table('customers')->where('id', $id)->delete();
        return redirect()->route('manage-customers.manage')->with('success', 'Customer deleted successfully.');
    }

    //for api
    public function getdata(Request $request){
       
    
       $apps = DB::table('apps')->select('id','app_name', 'keyword', 'url')->where("keyword","=",$request['keyword'])->get();

        if(count($apps) > 0){
            return response()->json($apps);
        }
        else {
            $apps = '[{"id": 0,"app_name":"", "keyword":"Not Found","url":""}]';
            return response($apps);
        }
    
    }

// for customer payment period
    public function paymentperiod($id)
    {
        $customers = DB::table('customers_payment_period')->select('id','cid','pp_from','pp_to','amount','status', 'payment_done_date')->where('cid','=',$id)->orderBy('id', 'desc')->get();

        $customersname = DB::table('customers')->find($id);
        $name = ucfirst(strtolower($customersname->name));
        

        if(count($customers) > 0){

            
            $error = "Customer Record";
            return view('admin.apps.managecustomerslot', compact('customers','error','name'));

        } 

        else{

            $error = " Record Not Found";
            return view('admin.apps.managecustomerslot', compact('customers','error','name'));
        }

    }
    
    //for customer payment period update
    public function customerstatusupdate(Request $request, $id)
    {
    
        $customers = DB::table('customers_payment_period')->find($id);
        
        DB::table('customers_payment_period')->where('id', $id)->update([
            'status' => 'paid',
            'payment_done_date' => Carbon::now(),
        ]);

     
        return redirect()->back();
    }

    public function checkPaymentPeriod()
    {
        Artisan::call('user:addpaymentperiod');
        return response()->json(['message' => 'Scheduled task executed successfully']);
    }

    public function remainderMail()
    {
        Artisan::call('user:sendmail');
        return response()->json(['message' => 'Scheduled task executed successfully']);
    }
}
