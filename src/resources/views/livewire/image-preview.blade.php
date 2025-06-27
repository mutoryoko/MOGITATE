<div class="image-preview" style="max-width: 300px">
    @if($image)
        <img src="{{ $image->temporaryUrl() }}" alt="プレビュー" style="max-width: 300px; margin-bottom: 10px;">
    @endif
    <div class="upload-btn">
        <input id="image" type="file" name="image" wire:model="image" accept=".png, .jpeg, .jpg, .image/png, .image/jpg">
    </div>
</div>
