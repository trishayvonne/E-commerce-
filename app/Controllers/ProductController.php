<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController 
{
    public function index(){
    
    }
  
        

    public function addProduct(){
        return view('add');
    }

    public function insert()
    {
        // Load the helper to handle file uploads (if not already loaded).
        helper(['form']);

        if ($this->request->getMethod() === 'post') {
            $productModel = new ProductModel();
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'category' => $this->request->getPost('category'),
                'quantity' => $this->request->getPost('quantity'),
            ];

            // Handle image upload
            $image = $this->request->getFile('image');
            if ($image->isValid() && !$image->hasMoved()) {
                // Generate a unique filename (e.g., using the current timestamp).
                $imageName = time() . $image->getClientName();
                // Move the uploaded image to a writable directory.
                $image->move('public/uploads', $imageName);

                $data['image'] = $imageName;
            }

            // Insert the data into the database.
            if ($productModel->insert($data)) {
                // Data inserted successfully.
                return redirect()->to('/addProduct')->with('success', 'Product added successfully');
            } else {
                // Insertion failed.
                return redirect()->back()->withInput()->with('error', 'Product insertion failed');
            }
        }

        // Load your view here (e.g., the form view).
        return view('addProduct');
    }

    
    public function getProduct($id)
    {
        // Query your database or data source to retrieve the product data
        // Replace this with your actual database query or data retrieval logic
        $productModel = new ProductModel();
        $productData = $this->$productModel->getProductData($id); // You need to define this model method

        // Send the product data as JSON response
        return $this->response->setJSON($productData);
    }


    public function deleteProduct($id)
    {
        $productModel = new ProductModel();
        // Load your model and call a method to delete the product by ID
        
        $result = $productModel->deleteProductById($id);
    
        if ($result) {
            // Return a success response if deletion is successful
            return redirect()->to('/tables');
        } 
    }



public function updateProduct()
    {
        $request = $this->request;
        
        // Get the data from the POST request
        $productId = $request->getPost('id');
        $name = $request->getPost('name');
        $description = $request->getPost('description');
        $price = $request->getPost('price');
        $category = $request->getPost('category');
        $quantity = $request->getPost('quantity');
        
        // Load the ProductModel
        $model = new ProductModel();
        
        // Update the product in the database
        $data = [
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'category' => $category,
            'quantity' => $quantity,
        ];
        
      
        
         $model->update($productId, $data);
            // Data inserted successfully.
            return json_encode(['message' => 'Product updated successfully']);
      
    }

    
 
}

