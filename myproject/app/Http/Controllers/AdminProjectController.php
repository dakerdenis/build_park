<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class AdminProjectController extends Controller
{
    public function store(Request $request)
    {
        try {
            Log::info('Запрос на добавление проекта получен.', ['data' => $request->all()]);

            $request->validate([
                'project__name__en' => 'required|string|max:255',
                'project__name__ru' => 'required|string|max:255',
                'project__name__az' => 'required|string|max:255',
                'project__desc__en' => 'required|string',
                'project__desc__ru' => 'required|string',
                'project__desc__az' => 'required|string',
                'category_id'       => 'required|exists:categories,id',
                'project__video'    => 'nullable|url',
                'main_image'        => 'required|image|max:2048',
                'images'            => 'required|array|min:1',
                'images.*'          => 'image|max:2048'
            ]);

            Log::info('Валидация прошла успешно.');

            // Сохранение главного изображения
            $destinationPath = base_path('../uploads/project_images');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $mainImage = $request->file('main_image');
            $mainImageName = time() . '_main_' . Str::random(10) . '.' . $mainImage->getClientOriginalExtension();
            $mainImage->move($destinationPath, $mainImageName);
            

            Log::info('Главное изображение сохранено.', ['main_image' => $mainImageName]);

            // Сохранение дополнительных изображений
            $imageNames = [];
            foreach ($request->file('images') as $img) {
                $imgName = time() . '_' . Str::random(10) . '.' . $img->getClientOriginalExtension();
                $img->move($destinationPath, $imgName);
                $imageNames[] = $imgName;
            }
            

            Log::info('Дополнительные изображения сохранены.', ['images' => $imageNames]);

            $project = Project::create([
                'name_en'        => $request->input('project__name__en'),
                'name_ru'        => $request->input('project__name__ru'),
                'name_az'        => $request->input('project__name__az'),

                'description_en' => $request->input('project__desc__en'),
                'description_ru' => $request->input('project__desc__ru'),
                'description_az' => $request->input('project__desc__az'),

                'category_id'    => $request->input('category_id'),
                'youtube_url'    => $request->input('project__video'),
                'address'        => $request->input('address'),

                'main_image'     => $mainImageName,
                'images'         => $imageNames, // вот тут было важно
            ]);

            Log::info('Проект успешно добавлен в базу.', ['project_id' => $project->id]);

            return redirect()->route('admin.projects')->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            Log::error('Ошибка при добавлении проекта.', ['error' => $e->getMessage()]);
            return back()->withErrors(['general' => 'Something went wrong, please try again later.']);
        }
    }


    public function destroy($id)
{
    try {
        $project = Project::findOrFail($id);

        // Удаление главной картинки
        $mainImagePath = base_path('../uploads/project_images/' . $project->main_image);
        if (file_exists($mainImagePath)) {
            unlink($mainImagePath);
        }

        // Удаление дополнительных картинок
        foreach ($project->images as $image) {
            $imagePath = base_path('../uploads/project_images/' . $image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $project->delete();

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error deleting project.']);
    }
}
public function edit($id)
{
    $project = Project::findOrFail($id);
    $categories = \App\Models\Category::all();

    return view('admin.dashboard.edit_project', compact('project', 'categories'));
}
public function update(Request $request, $id)
{
    try {
        $project = Project::findOrFail($id);

        $request->validate([
            'project__name__en' => 'required|string|max:255',
            'project__name__ru' => 'required|string|max:255',
            'project__name__az' => 'required|string|max:255',
            'project__desc__en' => 'required|string',
            'project__desc__ru' => 'required|string',
            'project__desc__az' => 'required|string',
            'category_id'       => 'required|exists:categories,id',
            'project__video'    => 'nullable|url',
            'main_image'        => 'nullable|image|max:2048',
            'images.*'          => 'image|max:2048'
        ]);

        // Если загружено новое главное изображение
        if ($request->hasFile('main_image')) {

$destinationPath = base_path('../uploads/project_images');
if (!file_exists($destinationPath)) {
    mkdir($destinationPath, 0755, true);
}

$mainImage = $request->file('main_image');
$mainImageName = time() . '_main_' . Str::random(10) . '.' . $mainImage->getClientOriginalExtension();
$mainImage->move($destinationPath, $mainImageName);


            // Удаляем старое изображение
            if (file_exists(base_path('../uploads/project_images/' . $project->main_image))) {
                unlink(base_path('../uploads/project_images/' . $project->main_image));
            }

            $project->main_image = $mainImageName;
        }

        // Если загружены новые дополнительные изображения
        if ($request->hasFile('images')) {
            $imageNames = [];
            foreach ($request->file('images') as $img) {
                $imgName = time() . '_' . Str::random(10) . '.' . $img->getClientOriginalExtension();
                $img->move($destinationPath, $imgName);
                $imageNames[] = $imgName;
            }
            
            $project->images = $imageNames;
        }

        $project->update([
            'name_en' => $request->input('project__name__en'),
            'name_ru' => $request->input('project__name__ru'),
            'name_az' => $request->input('project__name__az'),
            'description_en' => $request->input('project__desc__en'),
            'description_ru' => $request->input('project__desc__ru'),
            'description_az' => $request->input('project__desc__az'),
            'category_id' => $request->input('category_id'),
            'youtube_url' => $request->input('project__video'),
            'address' => $request->input('address'),
        ]);

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully.');

    } catch (\Exception $e) {
        return back()->withErrors(['general' => 'Something went wrong, please try again.']);
    }
}

}
