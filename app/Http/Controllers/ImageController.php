<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\ImageModel;

class ImageController extends Controller
{
  public function add()
  {
    $images = ImageModel::all();
    return view('addimage',['images' => $images]);
  }

  public function store(Request $request)
  {
      if ($request->hasFile('image')) {
          $images = request()->file('image');
          foreach ($images as $raw_image) {
              $originalimage = Image::make($raw_image);

              $originalpath = public_path().'/uploads/images/';
              $thumbnailpath = public_path().'/uploads/thumbnail/';

              $name_with_extension = $raw_image -> getClientOriginalName();
              $only_extension = $raw_image -> getClientOriginalExtension();
              $upload_image_name = time().'.'.$only_extension;

              $originalimage -> save($originalpath.$upload_image_name);

              $thumbnailimage = Image::make($raw_image);
              $thumbnailimage -> resize(150,150);
              $thumbnailimage -> save($thumbnailpath.$upload_image_name);

              $obj = new ImageModel();
              $obj -> filename = $upload_image_name;
              $obj -> save();
          }
          return back()->with('success', 'Your images has been successfully Upload');
      }
  }

}
