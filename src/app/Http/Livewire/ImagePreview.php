<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;


class ImagePreview extends Component
{
    use WithFileUploads;

    public $image;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image | max:2048'
        ]);
    }

    public function render()
    {
        return view('livewire.image-preview');
    }
}
