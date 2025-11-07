<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;

class UploadImage extends Component
{
    use WithFileUploads;

    public $image;
    public $name='Enzo';
    public $uploaded = false;
    public $message = '';


    public $photo;
    public function save()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);

        $filename = $this->photo->store('photos','public');
        // $filename = $this->photo->store();

        // Crear registro en la base de datos
            GalleryImage::create([
                'filename' => basename($filename),
                'original_name' => $this->photo->getClientOriginalName(),
                'file_path' => $filename,
                'is_active' =>1
                //,'uploaded_by' => 'user_' . time(),
            ]);

            $this->uploaded = true;
            $this->message = '¡Archivo cargado exitosamente!';
            $this->image = null;
    }

    protected $rules = [
        'image' => 'required|image|max:10240', // 10MB max
    ];

    public function render()
    {
        return view('livewire.upload-image')->extends('layouts.app1');
    }

    public function upload()
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);
//dd('$this->image');
        try {
            // Guardar la imagen
            $filename = $this->image->store('gallery', 'public');

            // Crear registro en la base de datos
            GalleryImage::create([
                'filename' => basename($filename),
                'original_name' => $this->image->getClientOriginalName(),
                'file_path' => $filename,
                'uploaded_by' => 'user_' . time(),
            ]);

            $this->uploaded = true;
            $this->message = '¡Archivo cargado exitosamente!';
            $this->image = null;

        } catch (\Exception $e) {
            $this->message = 'Error al cargar el archivo: ' . $e->getMessage();
        }
    }


}
