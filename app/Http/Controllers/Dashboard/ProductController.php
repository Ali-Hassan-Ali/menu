<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('dashboard.products.index');

    }//end of index 

    public function data()
    {
        $products = Product::latest()->get();

        return DataTables::of($products)
            ->addColumn('record_select', 'dashboard.products.data_table.record_select')
            ->editColumn('created_at', function (Product $product) {
                return $product->created_at->format('Y-m-d');
            })
            ->addColumn('image', function (Product $product) {
                return view('dashboard.products.data_table.image', compact('product'));
            })
            ->addColumn('name', function (Product $product) {
                return $product->name;
            })
            ->addColumn('actions', 'dashboard.products.data_table.actions')
            ->rawColumns(['record_select', 'actions','name','image'])
            ->toJson();

    }// end of data


    public function create()
    {
        $categorys = Category::all();

        return view('dashboard.products.create', compact('categorys'));

    }//end of create

    
    public function store(ProductRequest $request)
    {
        $requestData                = $request->safe()->except('name_ar','name_en', 'description_en', 'description_ar','item_name_ar','sitem_name_en');
        $requestData['name']        = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $requestData['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        
        if ($request->image) {
            $requestData['image']   = $request->file('image')->store('products', 'public');
        }

        $product = Product::create($requestData);

        $this->storeItem($request, $product);

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of store



    public function edit(Product $product)
    {
        $categorys = Category::all();

        return view('dashboard.products.edit', compact('product', 'categorys'));

    }//end of edit


    public function update(ProductRequest $request, Product $product)
    {
        $requestData                = $request->safe()->except('name_ar','name_en', 'description_en', 'description_ar','item_name_ar','sitem_name_en');
        $requestData['name']        = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $requestData['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        if ($request->image) {
            $requestData['image']   = $request->file('image')->store('products', 'public');
        }
        
        $product->update($requestData);

        $this->storeItem($request, $product, 'update');

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.products.index');

    }//end of store

   
    public function destroy(Product $product)
    {
        $this->delete($product);
        session()->flash('success', __('dashboard.deleted_successfully'));
        return response(__('dashboard.deleted_successfully'));

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $product = Product::FindOrFail($recordId);
            $this->delete($product);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('dashboard.deleted_successfully'));

    }// end of bulkDelete

    private function delete(Product $product)
    {
        $product->delete();

    }// end of delete

    private function storeItem($request, $product, $update = false)
    {
        if($request->item_name_en) {

            if($update) {
                $product->items()->delete();
            }

            foreach($request->item_name_en as $index=>$item) {
               
                $name = ['ar' => $request->item_name_ar[$index], 'en' => $request->item_name_en[$index]];
                
                ProductItem::create([
                    'name'       => $name,
                    'product_id' => $product->id,
                ]);
            }

        }//emd of check

    }//end of storeItem

}//end of controller