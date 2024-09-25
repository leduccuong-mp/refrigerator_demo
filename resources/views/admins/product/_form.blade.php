
<div class="create">
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
    <div class="content-header">
        <h4 class="mb-0 js-change-title">{{ isset($item) && $item->id ? '新製品を更新' : '新しい製品を作成する' }}</h4>
        <a class="btn btn-secondary" href="{{ route('admin.product.index') }}">リストに戻る</a>
    </div>

    <div class="content-body">
        <div class="form-input">
            <label for="content">カテゴリー<span class="required">*</span></label>
            <select name="category_id" class="form-control">
                @foreach($categories as $value)
                    <option value="{{ $value['id'] }}" {{ old('category_id', $item->category_id ?? '') == $value['id'] ? 'selected' : '' }}>{{ $value['name'] }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-input">
            <label for="title">店<span class="required">*</span></label>
            <select name="store_id" class="form-control" required>
                @foreach($stores as $store)
                    <option value="{{ $store['id'] }}" {{ old('store_id', $item->store_id ?? '') == $store['id'] ? 'selected' : '' }}>{{ $store['name'] }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="form-input">
            <label for="title">自動販売機<span class="required">*</span></label>
            <select name="vending_machine_id" class="form-control" required>
                @foreach($vendingMachine as $value)
                    <option value="{{ $value['id'] }}" {{ old('vending_machine_id', $item->vending_machine_id ?? '') == $value['id'] ? 'selected' : '' }}>{{ $value['title'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-input">
            <label for="title">ユーザー名<span class="required">*</span></label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user_index => $user)
                    <option value="{{ $user_index }}" {{ old('user_id', $item->user_id ?? '') == $user_index ? 'selected' : '' }}>{{ $user }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-input">
            <label for="title">タイトル<span class="required">*</span></label>
            <input value="{{ old('title', $item->title ?? '') }}" type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" placeholder="タイトル">
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="price">価格<span class="required">*</span></label>
            <input value="{{ old('price', $item->price ?? '') }}" type="number" name="price" id="price"
                    class="form-control @error('price') is-invalid @enderror" placeholder="価格" min="0">
                    @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="priority">優先度<span class="required">*</span></label>
            <input value="{{ old('priority', $item->priority ?? '') }}" type="number" name="priority" id="priority"
                    class="form-control @error('priority') is-invalid @enderror" placeholder="優先度" min="0">
                    @error('priority')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="quantity">量<span class="required">*</span></label>
            <input value="{{ old('quantity', $item->quantity ?? '') }}" type="number" name="quantity" id="quantity"
                    class="form-control @error('quantity') is-invalid @enderror" placeholder="量" min="0">
                    @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="content">タイプ<span class="required">*</span></label>
            <input value="{{ old('type', $item->type ?? '') }}" type="text" name="type" id="type"
                    class="form-control @error('type') is-invalid @enderror" placeholder="タイプ">
                    @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="content">容量<span class="required">*</span></label>
            <select name="capacity" class="form-control">
                @foreach(['小', '中', '大'] as $value)
                    <option value="{{ $value }}" {{ old('capacity', $item->capacity ?? '') == $value ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
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
