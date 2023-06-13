<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\Store;
use App\Http\Controllers\Controller;
use App\Http\Requests\Slider\Update;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
   public function index()
   {
      $sliders = Slider::get();
      return view('admin.sliders.index', compact('sliders'));
   }
   public function create()
   {
      return view('admin.sliders.create');
   }
   public function store(Store $request)
   {
      $data = $request->validated();
      if ($request->hasFile('image')) {
         $logo = uniqid('image-') . '.' . $request->image->getClientOriginalExtension();
         $request->file('image')->storeAs(
            'sliders',
            $logo,
            'uploads'
         );
         $data['image'] = $logo;
      }
      Slider::create($data);
      return redirect()->route('sliders.index');
   }
   public function edit(Slider $slider)
   {

      return view('admin.sliders.edit', compact('slider'));
   }
   public function update(Update $request, Slider $slider)
   {
      $data = $request->validated();
      if ($request->hasFile('image')) {
         Storage::disk('uploads')->delete('sliders/' . $slider->image);
         $logo = uniqid('logo-') . '.' . $request->image->getClientOriginalExtension();
         $request->file('image')->storeAs(
            'sliders',
            $logo,
            'uploads'
         );
         $data['image'] = $logo;
      }
      $slider->update($data);
      return redirect()->route('sliders.index');
   }
   public function destroy(Slider $slider)
   {
      Storage::disk('uploads')->delete('sliders/' . $slider->image);
      $slider->delete();
      return redirect()->route('sliders.index');
   }
}
