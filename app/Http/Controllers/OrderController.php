<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function index()
    {
    }

    
    public function create()
    {
        return view('order.create');
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'contact' => 'bail|numeric|required|digits:10', //bail: quit after fisrt validation fail
            'address' => 'required',
            'items' => 'required',
            'base' => 'required'

        ], [

            'name.required' => 'Hming dah tur',
            'contact.required' => 'Phone number dah tur',
            'address.required' => 'Address dah tur',
            'items.required' => 'Lei tur dah tur',
            'contact.numeric' => 'Number chiah ziah tur',
            'contact.digits' => 'Number 10 chiah chiah tur',

        ]);

        $order = Order::create($validatedData);
              

        return back()->with('success', 'Order created successfully.');


    }

    
    public function show(Order $order)
    {
         
        return view('order.show',compact('order'));
    }

     
    public function edit(Order $order)
    {
        return view ('order.update',compact('order'));
    }

    
    public function update(Request $request, Order $order)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'contact' => 'bail|numeric|required|digits:10', //bail: quit after fisrt validation fail
            'address' => 'required',
            'items' => 'required'
        ], [

            'name.required' => 'Hming dah tur',
            'contact.required' => 'Phone number dah tur',
            'address.required' => 'Address dah tur',
            'items.required' => 'Lei tur dah tur',
            'contact.numeric' => 'Number chiah ziah tur',
            'contact.digits' => 'Number 10 chiah chiah tur',

        ]);

       $order->update($validatedData);
              

        return back()->with('success', 'Order updated successfully.');

    }

   
    public function destroy(Order $order)
    {
        $contact = $order->contact;
        $order->delete();

        return redirect('/order/mo/'.$contact);
        //return back()->with('success', 'Order deleted successfully.');
    }

    public function getMyOrders(){
        return view('order.search_user');

    }

    public function myOrders(Request $request){
        $validatedData = $request->validate([
            'contact' => 'bail|numeric|required|digits:10', //bail: quit after fisrt validation fail
        
        ], [
            'contact.required' => 'Phone number dah tur',
            'contact.numeric' => 'Number chiah ziah tur',
            'contact.digits' => 'Number 10 chiah chiah tur',

        ]);
         $contact = $validatedData["contact"];

        $orders = Order::where('contact',$contact)->get();
        
        return view('order.index',compact('orders'));
    }
    public function myOrdersDelReturn($contact){

        $orders = Order::where('contact',$contact)->get();
        
        return view('order.index',compact('orders'))->with('success', 'Order deleted successfully.');
    }

    public function adminGetAll(){
        //TODO:: THIS SHOULD BE PASSWORD PROTECT
        $orders = Order::where('base','1')->get();
        return view('admin.index',compact('orders'));
    }

    public function adminChangeStatus(Request $request){
        error_log("lksaflksadfsdjflksjfkl;sadjfklds");
        $order = Order::find($request->id);
        $order->status=$request->status;
        $order->save();
        return $order;
    }
    
}
