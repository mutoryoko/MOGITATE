<div class="image-preview" style="max-width: 370px">
    @if ($image)
        <img src="{{ $image->temporaryUrl() }}" alt="プレビュー" style="max-width: 370px; margin-bottom: 10px;">
    @elseif ($existingImage)
        <img src="{{ asset('storage/' . $existingImage) }}" alt="現在の画像" style="max-width: 370px; margin-bottom: 10px;">
    @endif

    <div class="file-upload__wrapper">
        <label class="file-upload__btn">
            ファイルを選択
            <input wire:model="image" type="file" name="image" accept=".png, .jpeg, .jpg, image/png, image/jpg" style="display:none;">
        </label>
        @if($fileName)
            <span class="file__name">{{ $fileName }}</span>
        @endif
    </div>
</div>