<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    public function index()
    {
        return view('dashboard.sliders.index');

    }//end of index 

    public function data()
    {
        $sliders = Slider::latest()->get();

        return DataTables::of($sliders)
            ->addColumn('record_select', 'dashboard.sliders.data_table.record_select')
            ->editColumn('created_at', function (Slider $slider) {
                return $slider->created_at->format('Y-m-d');
            })
            ->addColumn('image', function (Slider $slider) {
                return view('dashboard.sliders.data_table.image', compact('slider'));
            })
            ->addColumn('name', function (Slider $slider) {
                return $slider->name;
            })
            ->addColumn('actions', 'dashboard.sliders.data_table.actions')
            ->rawColumns(['record_select', 'actions','name'])
            ->toJson();

    }// end of data


    public function create()
    {
        return view('dashboard.sliders.create');

    }//end of create

    
    public function store(SliderRequest $request)
    {
        $requestData                = $request->safe()->except('name_ar','name_en', 'description_en', 'description_ar');
        $requestData['name']        = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $requestData['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        if ($request->image) {
            $requestData['image']   = $request->file('image')->store('sliders', 'public');
        }

        Slider::create($requestData);

        session()->flash('success', __('dashboard.added_successfully'));
        return redirect()->route('dashboard.sliders.index');

    }//end of store



    public function edit(Slider $slider)
    {
        return view('dashboard.sliders.edit', compact('slider'));

    }//end of edit


    public function update(SliderRequest $request, Slider $slider)
    {
        $requestData                = $request->safe()->except('name_ar','name_en', 'description_en', 'description_ar');
        $requestData['name']        = ['ar' => $request->name_ar, 'en' => $request->name_en];
        $requestData['description'] = ['ar' => $request->description_ar, 'en' => $request->description_en];
        if ($request->image) {
            $requestData['image']   = $request->file('image')->store('sliders', 'public');
        }
        $slider->update($requestData);

        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->route('dashboard.sliders.index');

    }//end of store

   
    public function destroy(SliderRequest $slider)
    {
        $this->delete($slider);
        session()->flash('success', __('dashboard.deleted_successfully'));
        return response(__('dashboard.deleted_successfully'));

    }// end of destroy

    public function bulkDelete()
    {
        foreach (json_decode(request()->record_ids) as $recordId) {

            $slider = Slider::FindOrFail($recordId);
            $this->delete($slider);

        }//end of for each

        session()->flash('success', __('site.deleted_successfully'));
        return response(__('dashboard.deleted_successfully'));

    }// end of bulkDelete

    private function delete(Slider $slider)
    {
        $slider->delete();

    }// end of delete

}//end of controller