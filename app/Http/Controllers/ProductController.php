<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category'])->orderBy('created_at','desc')->get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->excpet(['_token','image','images']);
        $product = Product::create($data);
        if($request->hasFile('image'))
        {
            $fileName = time().'-product.'.$request->image->extension();
            $request->image->move(public_path('website/images/product'),$fileName);
            $image_url = new ImageProduct();
            $image_url->image_url = 'website/images/product/'. $fileName;
            $image_url->product_id = $product->id;
        }

        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $image)
            {                $fileName = time().'-product.'.$image->extension();
                $image->move(public_path('website/images/product'),$fileName);
                $image_url = new ImageProduct();
                $image_url->image_url = 'website/images/product/'. $fileName;
                $image_url->product_id = $product->id;
            }
        }

        return to_route('admin.product.index')->with('success','product successfuly created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        dd($product->images->image_url);
        $data = $request->excpet(['_token','image','images']);
        $product->update($data);
        if($request->hasFile('image'))
        {
            $fileName = time().'-product.'.$request->image->extension();
            if (File::exists($product->image[0]->image_url)) {
                File::delete($product->image[0]->image_url);
            }
            $request->image->move(public_path('website/images/product'),$fileName);
            ImageProduct::where(['image_url' => $product->images[0]->image_url,'product_id' => $product->id])->update([
                'image_url' => 'website/images/product/'. $fileName,
            ]);
        }

        if($request->hasFile('images'))
        {
            foreach ($request->file('images') as $image)
            {
                $fileName = time().'-product.'.$image->extension();
                $image->move(public_path('website/images/product'),$fileName);
                foreach ($product->images as $image) {
                    ImageProduct::where(['image_url' => $product->images[0]->image_url,'product_id' => $product->id])->update([
                        'image_url' => 'website/images/product/'. $fileName,
                    ]);
                }
                $image_url = new ImageProduct();
                $image_url->image_url = 'website/images/product/'. $fileName;
                $image_url->product_id = $product->id;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
