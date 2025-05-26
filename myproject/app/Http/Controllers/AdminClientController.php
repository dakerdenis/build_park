<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class AdminClientController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string'
        ]);
    
        // Handle the image upload
        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $imageName = time() . '_' . $uploadedImage->getClientOriginalName();
    
            // Move the image to the public/uploads/client_images directory
            $uploadedImage->move(public_path('uploads/client_images'), $imageName);
    
            // Create a new client entry in the database
            $client = new Client();
            $client->image_name = $imageName;
            $client->description = $request->input('description');
            $client->save();
    
            // Redirect to the clients section
return redirect()->route('admin.clients')->with('success', 'Client image uploaded successfully!');

        }
    
        // If image upload fails, redirect back with an error message
        return redirect()->back()->with('error', 'Image upload failed!');
    }
    
    public function destroy($id)
    {
        // Find the client
        $client = Client::findOrFail($id);

        // Delete the image file from the storage
        $imagePath = public_path('uploads/client_images/' . $client->image_name);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the client record
        $client->delete();

        // Redirect back to the clients section with a success message
        return redirect()->route('admin.clients')->with('success', 'Client deleted successfully!');
    }  
}
