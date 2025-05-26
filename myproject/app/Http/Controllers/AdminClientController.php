<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Str;

class AdminClientController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string|max:255'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/client_images'), $imageName);
        }

        Client::create([
            'image_name' => $imageName,
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('admin.clients')->with('success', 'Client image uploaded successfully!');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        $imagePath = public_path('uploads/client_images/' . $client->image_name);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $client->delete();

        return redirect()->route('admin.clients')->with('success', 'Client deleted successfully!');
    }
}
