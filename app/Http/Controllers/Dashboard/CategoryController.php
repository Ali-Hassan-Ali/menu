<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.categorys.index');

    }//end of index 

    public function data()
    {
        $category = Category::latest()->get();

        return DataTables::of($category)
            ->addColumn('record_select', 'dashboard.categorys.data_table.record_select')
            ->editColumn('created_at', function (Category $category) {
                return $category->created_at->format('Y-m-d');
            })
            ->addColumn('count_product', function (Category $category) {
                return $category->products->count();
            })
            ->addColumn('image', function (Category $category) {
                return view('dashboard.categorys.data_table.image', compact('category'));
            })
            ->addColumn('name', function (Category $category) {
                return $category->name;
            })
            ->addColumn('actions', 'dashboard.categorys.data_table.actions')
            ->rawColumns(['record_select', 'actions','name'])
            ->toJson();

    }// end of data


    public function create()
    {
        return view('dashboard.categorys.create');

    }//end of create

    
    public function store(CategoryRequest $request)
    {
        $requestData           = $request->safe()->except('name_ar','name_en');
        $requestData['name']   = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $requestData['image']  = $request->file('image')->store('categorys', 'public');

        Category::create($requestData);

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('dashboard.categorys.index');

    }//end of store



    public function edit(Category $category)
    {
        return view('dashboard.categorys.edit', compact('category'));

    }//end of edit


    public function update(CategoryRequest $request, Category $category)
    {
        $requestData           = $request->safe()->except('name_ar','name_en');
        $requestData['name']   = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if($request->image) {
            $requestData['image']  = $request->file('image')->store('categorys', 'public');
        }
        $category->update($requestData);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.categorys.index');

    }//end of store

   
    public function destroy(Category $category)
    {
        $this->delete($category);
        session()->flash('success', __('dashboard.deleted_successfully'));
        return response(__('dashboard.deleted_successfully'));

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $category = Category::FindOrFail($recordId);
            $this->delete($category);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of bulkDelete

    private function delete(Category $category)
    {
        $category->delete();

    }// end of delete

}//end of controller