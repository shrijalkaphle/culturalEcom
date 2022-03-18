<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HeroSlider::all();
        return view('admin.slider.list',compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($image = $request->file('image'))
        {
            $new_name = 'slider'."-".uniqid()."." . $image->getClientOriginalExtension();
            $new_path = 'slider' . "/" . $new_name;
            Storage::disk('public')->putFileAs('slider', $image, $new_name);
            $input['file'] = $new_path;
            HeroSlider::create($input);
        }

        return redirect()->route('sliders.index')->with('success','New Hero slider image added!');

    }
    
    public function destroy($id)
    {
        $slider = HeroSlider::findorfail($id);
        Storage::disk('public')->delete($slider->file);
        $slider->delete();
        return redirect()->route('sliders.index')->with('success','Hero slider image deleted!');
    }
}
