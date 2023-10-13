<?php

namespace App\Controllers;
use App\Models\ProductModel;

class Home extends BaseController
{
  
    public function index(): string{
        $productModel = new ProductModel();
        $product=  $productModel->findAll();
        $data['product'] = $product;
   
        return view('furniture', $data); 
    }
    public function showProduct($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            // Handle the case where the product with the given ID does not exist.
            return redirect()->to('/')->with('error', 'Product not found');
        }

        $data['product'] = $product;

        return view('product_detail', $data);
    }
    
    public function showTables()
    {
      $productModel = new ProductModel();
        $product=  $productModel->findAll();
        $data['product'] = $product;
    
        return view('tables', $data);     
          
    }

    public function userSide(){
        return view('welcome_message');
    }

    public function about(){
        return view ('about');
    }
    
    public function furniture(){
        return view ('furniture');
    }

    public function blog(){
        return view ('blog');
    }

    public function contact(){
        return view ('contact');
    }



    // user register function
    public function register(){
        return view('register');
    }

    public function login(){
        return view('adminLogin');
    }

    // admin function
    public function tables(){
        return view('tables');
    }

    // admin dashboard
    public function adminDashboard(){
        return view('adminDashboard');
    }

    public function userLogin(){
        return view('userLogin');
    }
    
//     public function showProduct(){
//         // Assuming you have fetched the products data in your controller
//         $productModel = new ProductModel();
//         $product = $productModel->findAll();
    
//         // Create an associative array with the product data
//         $data['product'] = $product;
    
//         // Load the view and pass the data to it
//         return view('furniture', $data);
// }

    
}
