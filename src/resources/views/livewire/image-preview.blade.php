<div class="image-preview" style="max-width: 370px">
    @if($image)
        <img src="{{ $image->temporaryUrl() }}" alt="プレビュー" style="max-width: 370px;">
    @endif
    <div class="file-upload__wrapper">
        <label class="file-upload__btn">
            ファイルを選択
            <input wire:model="image" type="file" name="image" accept=".png, .jpeg, .jpg, image/png, image/jpg" style="display:none;">
        </label>
    </div>
</div>