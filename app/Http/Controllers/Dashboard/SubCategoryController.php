<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.sub_categorys.index');

    }//end of index 

    public function data()
    {
        $category = Category::where('parent_id', '>', 0)->get();

        return DataTables::of($category)
            ->addColumn('record_select', 'dashboard.sub_categorys.data_table.record_select')
            ->editColumn('created_at', function (Category $category) {
                return $category->created_at->format('Y-m-d');
            })
            ->addColumn('count_product', function (Category $category) {
                return $category->products->count();
            })
            ->addColumn('image', function (Category $category) {
                return view('dashboard.sub_categorys.data_table.image', compact('category'));
            })
            ->addColumn('name', function (Category $category) {
                return $category->name;
            })
            ->addColumn('actions', 'dashboard.sub_categorys.data_table.actions')
            ->rawColumns(['record_select', 'actions','name'])
            ->toJson();

    }// end of data


    public function create()
    {
        $categorys = Category::where('parent_id', 0)->get();

        return view('dashboard.sub_categorys.create', compact('categorys'));

    }//end of create

    
    public function store(CategoryRequest $request)
    {
        $requestData           = $request->safe()->except('name_ar','name_en');
        $requestData['name']   = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if($request->image) {
            $requestData['image']  = $request->file('image')->store('categorys', 'public');
        }

        Category::create($requestData);

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('dashboard.sub_categorys.index');

    }//end of store



    public function edit(Category $subCategory)
    {
        $categorys = Category::where('parent_id', 0)->get();

        return view('dashboard.sub_categorys.edit', compact('subCategory', 'categorys'));

    }//end of edit


    public function update(CategoryRequest $request, Category $subCategory)
    {
        $requestData           = $request->safe()->except('name_ar','name_en');
        $requestData['name']   = ['ar' => $request->name_ar, 'en' => $request->name_en];
        if($request->image) {
            $requestData['image']  = $request->file('image')->store('categorys', 'public');
        }
        $subCategory->update($requestData);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.sub_categorys.index');

    }//end of store

   
    public function destroy(Category $subCategory)
    {
        $this->delete($subCategory);
        session()->flash('success', __('dashboard.deleted_successfully'));
        return response(__('dashboard.deleted_successfully'));

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $subCategory = Category::FindOrFail($recordId);
            $this->delete($subCategory);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('site.deleted_successfully'));

    }// end of bulkDelete

    private function delete(Category $subCategory)
    {
        $subCategory->delete();

    }// end of delete

}//end of controller