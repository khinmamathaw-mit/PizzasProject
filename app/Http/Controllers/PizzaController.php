<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    
    function pizzas() {

        // send data to blade file
        // 2 parameters in views(bladefile,['pizza_name']) 
        // fake data from database array format
        // $pizzadatas =[
        //         ["id"=>1,"username"=>"AungAung","pizzaname"=>"chicken pizza","topping"=>"salad","sauce"=>"tomato sauce","price"=>9.99],
        //         ["id"=>2,"username"=>"KyawKyaw","pizzaname"=>"chicken pizza","topping"=>"salad","sauce"=>"tomato sauce","price"=>9.99],
        //         ["id"=>3,"username"=>"MmgMg","pizzaname"=>"chicken pizza","topping"=>"salad","sauce"=>"tomato sauce","price"=>9.99],
        //         ["id"=>4,"username"=>"MawMaw","pizzaname"=>"hot spicy pizza","topping"=>"salad","sauce"=>"tomato sauce","price"=>8.99]
        // ];
            // object format or collection
            // data retrieve from database
         $pizzadatas = Pizza::all();
        // dd($pizzadatas);
        return view('pizzas',['pizzadatas'=>$pizzadatas]);
    }

    function index() 
    {
        return view('index');
    }

    function insert(Request $req)
    {
    //  names of input field  
    
        $validation = $req->validate([
            'username'=>'required',
            'pizzaname'=>'required',
            'topping'=>'required',
            'sauce'=>'required',
            'price'=>'required'

        ]); 

        if($validation)
        {
            // insert data to DB
            $pizza=new Pizza();
            // database column field      form data
            $pizza->username =  $req->username;
            $pizza->pizzaname =  $req->pizzaname;
            $pizza->topping =  $req->topping;
            $pizza->sauce =  $req->sauce;
            $pizza->price =  $req->price;
            // insert form data to dB
            $pizza->save();
            // return $pizza;
            return back()->with("success","Thank you for ordering from us!");

        }
        else{
            return back()->withErrors($validation);
        }
    }
 
    // delete data
    function delete ($id)
    { 
        // return $id;
        // find data by id
        $delete_pizza_data= Pizza::find($id);
        // return $delete_pizza_data;
        
        // delete that data
        $delete_pizza_data->delete();
        return back()->with("delete","$delete_pizza_data->username 's Order is deleted");
    }

    // display edit form
    function edit($id)
    {
        // return $id;
        $pizzaedit = Pizza::find($id);
        //send data to form
        return view('edit',['PizzaEdit'=>$pizzaedit]); 
    }

    // update DB
    function update($id,Request $req)
    {
        // return $id;
        $pizzaUpdate = Pizza::find($id);
        // overwrite found data 
        $pizzaUpdate->username = $req->username;
        $pizzaUpdate->pizzaname = $req->pizzaname;
        $pizzaUpdate->topping = $req->topping;
        $pizzaUpdate->sauce = $req->sauce;
        $pizzaUpdate->price = $req->price;
        $pizzaUpdate->update();
        // return redirect('/pizzas') directly call by route
        return redirect()->route('pizzas');
    } 
}
