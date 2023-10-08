<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $task;
    protected $product;

    public function __construct()
    {
        $this->task = new category();
        $this->product = new product();
    }


    public function index()
    {
        $response['tasks'] = $this->product->all();
        $response['categories'] = $this->task->all();
        // dd($response);
        return view('pages.admin.index')->with($response);
    }

    // public function addProduct()
    // {
    //     $response['tasks'] = $this->task->all();
    //     return view('pages.admin.addProduct')->with($response);
    // }

    public function addProduct()
    {
        $categories = $this->task->all();
        //dd($response['tasks']);
        if (count($categories) === 0) {
            return redirect()->route('adminDashboard')->with('error', 'No categories found. Please add a category first.');
        }
        $response['tasks'] = $this->task->all();
        return view('pages.admin.addProduct')->with($response);
    }


    public function storeProduct(Request $request)
    {
        // dd($request);


        try {
            $this->product->create($request->all());
            return redirect()->route('adminDashboard');
        } catch (\Exception $e) {
            return redirect()->route('addProduct')->with('error', 'Something went wrong. Please try again later.');
        }
    }

    public function deleteProduct($task_id)
    {
        //dd($task_id);
        $task = $this->product->find($task_id);
        $task->delete();

        return redirect()->back();
    }

    public function productUpdateView($task_id)
    {
        $response['tasks'] = $this->product->find($task_id);
        $response['categories'] = $this->task->all();
        //dd($response);
        return view('pages.admin.ptoductEdit')->with($response);
    }

    public function UpdateProduct(Request $request)
    {




        try {
            $id = $request->input('id');
            //dd($id);

            $products = Product::find($id);

            $products->name = $request->input('name');
            $products->price = $request->input('price');
            $products->category_id = $request->input('category_id');
            $products->description = $request->input('description');


            $products->save();

            return redirect()->route('adminDashboard');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }







    public function categoryView()
    {
        $response['tasks'] = $this->task->all();
        //dd($response);
        return view('pages.admin.categoryView')->with($response);
    }

    public function storeCategory(Request $request)
    {
        // dd($request);

        try {
            $this->task->create($request->all());
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }


    public function deleteCategory($task_id)
    {
        //dd($task_id);
        $task = $this->task->find($task_id);
        $task->delete();

        return redirect()->back();
    }


    public function categoryUpdateView($task_id)
    {
        $response['tasks'] = $this->task->find($task_id);
        //dd($response);
        return view('pages.admin.categoryEdit')->with($response);
    }

    public function UpdateCategory(Request $request)
    {
        try {
            $id = $request->input('id');
            $category = Category::find($id);

            $category->name = $request->input('name');
            $category->save();

            return redirect()->route('categoryView');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
