<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentInfo;
use App\Models\Costomer;

use Mpdf\Mpdf;

class PagesController extends Controller
{
    public function studentView()
    {
        $customer = costomer::orderBy('id', 'desc')->get();

        return view('Frontend.Pages.Student', compact('customer'));
    }

    public function addCustomer(Request $request)
    {
        $customer = new costomer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return response()->json($customer);
    }


    public function showCustomer($id)
    {

        $data = costomer::find($id);

        return response()->json($data);
    }

    public function updateCustomer($id)
    {
        $customer = costomer::find($id);
        return response()->json($customer);
    }

    public function updateData(Request $request)
    {
        $customer = costomer::find($request->id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();
        return response()->json($customer);
    }

    public function deleteCustomer($id)
    {
        $customer = costomer::find($id);
        $customer->delete();
        return response()->json(['success' => 'Record Has Been Deleted Successfully']);
    }
}
