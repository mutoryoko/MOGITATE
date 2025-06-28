<div class="image-preview" style="max-width: 300px">
    @if($image)
        <img src="{{ $image->temporaryUrl() }}" alt="プレビュー" style="max-width: 300px; margin-bottom: 10px;">
    @endif
    <div class="upload-btn">
        <label class="file-upload__btn">
            ファイルを選択
            <input wire:model="image" type="file" name="image" accept=".png, .jpeg, .jpg, image/png, image/jpg" style="display:none;">
        </label>
    </div>
</div>