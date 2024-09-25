
<div class="create">
    <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
    <div class="content-header">
        <h4 class="mb-0 js-change-title">{{ isset($item) && $item->id ? '新しい自動販売機を作成する' : '新しい自動販売機を更新する' }}</h4>
        <a class="btn btn-secondary" href="{{ route('admin.vending-machine.index') }}">リストに戻る</a>
    </div>

    <div class="content-body">
        <div class="form-input">
            <label for="store_id">店<span class="required">*</span></label>
            <select id="store_id" name="store_id" class="form-control">
                <option value="">---</option>
                @foreach($stores as $store)
                    <option value="{{ $store['id'] }}" {{ old('store_id', $item->store_id ?? '') == $store['id'] ? 'selected' : '' }}>{{ $store['name'] }}</option>
                @endforeach
            </select>
            @error('store_id')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="category_id">カテゴリー<span class="required">*</span></label>
            <select id="category_id" name="category_id" class="form-control">
                <option value="">---</option>
                @foreach($machine_categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $item->category_id ?? '') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="title">名前<span class="required">*</span></label>
            <input value="{{ old('title', $item->title ?? '') }}" type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" placeholder="名前">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="title">郵便番号<span class="required">*</span></label>
            <input value="{{ old('post_code', $item->post_code ?? '') }}" type="text" name="post_code" id="post_code"
                    class="form-control @error('post_code') is-invalid @enderror" placeholder="郵便番号" onkeyup="AjaxZip3.zip2addr(this, '','pref21','addr21','strt21');">
                    @error('post_code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="content">pref21<span class="required">*</span></label>
            <input value="{{ old('pref21', $item->pref21 ?? '') }}" type="text" name="pref21" id="pref21"
                    class="form-control @error('pref21') is-invalid @enderror" placeholder="住所">
            @error('pref21')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="content">住所<span class="required">*</span></label>
            <input value="{{ old('addr21', $item->addr21 ?? '') }}" type="text" name="addr21" id="addr21"
                    class="form-control @error('addr21') is-invalid @enderror" placeholder="住所">
            @error('addr21')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="content">strt21<span class="required">*</span></label>
            <input value="{{ old('strt21', $item->strt21 ?? '') }}" type="text" name="strt21" id="strt21"
                    class="form-control @error('strt21') is-invalid @enderror" placeholder="住所">
            @error('strt21')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="latitude">緯度<span class="required">*</span></label>
            <input value="{{ old('latitude', $item->latitude ?? '') }}" type="text" name="latitude" id="latitude"
                    class="form-control @error('latitude') is-invalid @enderror" placeholder="緯度">
            @error('latitude')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="longitude">経度<span class="required">*</span></span></label>
            <input value="{{ old('longitude', $item->longitude ?? '') }}" type="text" name="longitude" id="longitude"
                    class="form-control @error('longitude') is-invalid @enderror" placeholder="経度">
            @error('longitude')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="content">説明<span class="required">*</span></label>
            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="説明">{{ old('desc', $item->desc ?? '') }}</textarea>
            @error('desc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="content">説明</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="0" {{ old('store_id', $item->status ?? '') == 0 ? 'selected' : '' }}>プライベート</option>
                <option value="1" {{ old('store_id', $item->status ?? '') == 1 ? 'selected' : '' }}>公開</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="longitude">冷蔵庫IPアドレス</label>
            <input value="{{ old('ip_address', $item->ip_address ?? '') }}" type="text" name="ip_address" id="ip_address"
                    class="form-control @error('ip_address') is-invalid @enderror" placeholder="冷蔵庫IPアドレス">
            @error('ip_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="icon">アイコン</label>
            <div class="mb-3">
                <img id="preview-image" class="icon" style="width: 200px;height: 200px;padding: .25rem;background-color: var(--bs-body-bg);border: var(--bs-border-width) solid var(--bs-border-color);
                border-radius: var(--bs-border-radius);" src={{ $item->icon ?? asset('assets/img/avatar.png') }}>
            </div>
            <input type="file" name="icon" id="category-icon" class="form-control @error('icon') is-invalid @enderror">
            @error('icon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="imageUpload">画像をアップロードする (JPG, JPEG, PNG, .webp)</label>
            <input class="form-control form-control-lg @error('images') is-invalid @enderror" type="file" name="images[]" id="images" multiple style="display: none;" />
            <button type="button" class="btn btn-secondary js-on-click">
                アップロード
            </button>
            @error('images')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <div class="images-preview-div">
                @if (isset($item) && $item->image)
                    @foreach ($item->image as $key => $image)
                        <div class="image-preview" data-index="{{ $key + 1 }}" data-id="{{ $image->id}}" data-url="{{ route('admin.vending-machine.removeImage', $image->id) }}">
                            <span class="delete-icon" data-id="{{ $image->id}}"><i  class="fa fa-trash-alt" style="color:red"></i></span>
                            <img class="img-preview" src="{{ $image ? $image->image_url : asset('assets/img/avatar.png') }}" alt="image">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="content-footer">
        <button class="btn btn-primary" type="submit">{{ isset($item) && $item->id ? 'アップデート' : '作成する' }}</button>
    </div>
</div>
