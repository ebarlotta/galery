<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GalleryImage;

class ImageCarousel extends Component
{
    public $currentIndex = 0;
    public $images = [];

    protected $listeners = ['refreshCarousel' => '$refresh'];

    public function render()
    {
        return view('livewire.image-carousel')->extends('layouts.app1');
    }

    public function mount()
    {
        $this->loadImages();
    }

    public function loadImages()
    {
        $this->images = GalleryImage::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($image) {
                return [
                    'id' => $image->id,
                    'url' => asset('storage/' . $image->file_path),
                    'name' => $image->original_name,
                ];
            })
            ->toArray();
    }

    public function next()
    {
        if (count($this->images)) {
            $this->currentIndex = ($this->currentIndex + 1) % count($this->images);
        }
    }

    public function previous()
    {
        if (count($this->images)) {
            $this->currentIndex = ($this->currentIndex - 1 + count($this->images)) % count($this->images);
        }
    }
}
