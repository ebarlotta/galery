<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GalleryImage;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class AdminGallery extends Component
{
    public $search = '';

    use WithPagination;

    public function render()
    {
        $images = GalleryImage::when($this->search, function ($query) {
            return $query->where('original_name', 'like', '%' . $this->search . '%');
        })
        ->latest()
        ->paginate(12);

        return view('livewire.admin-gallery', compact('images'))->extends('layouts.app1');
    }

    public function deleteImage($id)
    {
        $image = GalleryImage::findOrFail($id);

        // Eliminar archivo físico
        if (Storage::disk('public')->exists($image->file_path)) {
            Storage::disk('public')->delete($image->file_path);
        }

        // Eliminar registro de la base de datos
        $image->delete();

        session()->flash('message', 'Imagen eliminada exitosamente.');
    }

    public function toggleVisibility($id)
    {
        $image = GalleryImage::findOrFail($id);
        $image->update([
            'is_active' => !$image->is_active
        ]);
    }
}
