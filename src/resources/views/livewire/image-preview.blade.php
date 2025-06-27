<div class="image-preview">
    @if($image)
        <img src="{{ $image->temporaryUrl() }}" alt="プレビュー" style="max-width: 300px; margin-bottom: 10px;">
    @endif
    <div class="upload-btn">
        <input type="file" name="image" wire:model="image" accept=".png, .jpeg, .jpg, .image/png, .image/jpg">
    </div>
</div>
