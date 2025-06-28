<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductImage extends Component
{
    use WithFileUploads;

    public $image;
    public $existingImage;
    public $fileName = '選択されていません';

    public function mount($existingImagePath)
    {
        $this->existingImage = $existingImagePath;
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image | max:2048'
        ]);
        // ファイル名を更新
        $this->fileName = $this->image->getClientOriginalName();
        // 既存画像の表示は非表示に（オプション）
        $this->existingImage = null;
    }

    public function render()
    {
        return view('livewire.edit-product-image');
    }
}
