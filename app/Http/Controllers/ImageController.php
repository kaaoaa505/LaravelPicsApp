<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::published()->latest()->paginate(10);
        return view('images.index', compact('images'));
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(ImageRequest $request)
    {
        Image::create($request->getData());
        return to_route('images.index')->with('success', 'Image has been uploaded successfully.');
    }

    public function edit(Image $image)
    {
        return view('images.edit', compact('image'));
    }

    public function update(ImageRequest $request, Image $image)
    {
        $image->update($request->getData());
        return to_route('images.index')->with('success', 'Image has been updated successfully.');
    }

    public function destroy(Image $image)
    {
        $image->delete();
        return to_route('images.index')->with('success', 'Image has been deleted successfully.');
    }
}
