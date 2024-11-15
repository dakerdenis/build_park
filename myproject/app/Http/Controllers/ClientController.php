<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
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
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('public/client_images', $imageName); // Store in storage/app/public/client_images
    

    
            // Create a new client entry in the database
            $client = new Client();
            $client->image_name = $imageName;
            $client->description = $request->input('description');
            $client->save();
    
            return response()->json([
                'message' => 'Client image uploaded successfully!',
                'data' => $client,
                'image_path' => asset('storage/client_images/' . $imageName)
            ]);
        }
    
        return response()->json(['message' => 'Image upload failed!'], 500);
    }
}
