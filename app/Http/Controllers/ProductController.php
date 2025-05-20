<?php

namespace App\Http\Controllers;

use App\Mail\ChannelDoctor;
use App\Mail\OrderRequest;
use App\Models\Doctor;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::orderBy('name', 'asc')->paginate(15);
        return view('product.index', compact('products'));
    }
    public function create(){
        return view('product.create');
    }
    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required',
            'price' => ['required', 'integer', 'min:1'],
            'type' => ['required', Rule::in([1, 0])],
            'description' => 'required',
            'slug' => ["string", "max:255",],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        $image = $request->file('image');

        $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('product_images', $filename, 'public');

        $product = Product::create([
            'name' => $attributes['name'],
            'price' => $attributes['price'],
            'type' => $attributes['type'],
            'description' => $attributes['description'],
            'slug' => $attributes['slug'],
            'image' => $filename,
        ]);
        return redirect()->route('dashboard');
    }

    public function edit(Product $product){
        return view('product.edit', compact('product'));
    }
    public function update(Request $request, Product $product){
        $attributes = $request->validate([
            'name' => 'required',
            'price' => ['required', 'integer', 'min:1'],
            'type' => ['required', Rule::in([1, 0])],
            'description' => 'required',
            'slug' => ["string", "max:255",],
            'image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        if ($request->has('image')){
            $image = $request->file('image');

            $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('product_images', $filename, 'public');
            $product->update([
                'image' => $filename,
            ]);
        }
        $product->update($attributes);
        return redirect()->route('dashboard');
    }
    public function destroy(Product $product){
        $product->delete();
    }
    public function products(){
        $products = Product::all();
        return view('product.products', compact('products'));
    }
    public function buy(Product $product){
        return view('product.buy', compact('product'));
    }
    public function submitBuy(Product $product){
        $attributes = request()->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:10'],
            'qty' => ['required', 'integer', 'min:1'],
        ]);
        try {
            Mail::to(env('ADMIN_MAIL'))
                ->send(
                    new OrderRequest(
                        $attributes['f_name'],
                        $attributes['l_name'],
                        $attributes['email'],
                        $attributes['phone'],
                        $attributes['qty'],
                        $product->name,
                        $product->id
                    )
                );
            return redirect()->back()->with('reply', 'Buy request submitted! We will get back you soon')->withInput();
        }
        catch (\Exception $exception){
            return redirect()->back()->with('reply', 'Error')->withInput();
        }
    }
    public function show(Product $product){
        return view('product.show', compact('product'));
    }
}
