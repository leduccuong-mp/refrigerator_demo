<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="">
            @csrf
            <div class="create">
                <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
                <div class="content-header">
                    <h4 class="mb-0 js-change-title">製品詳細</h4>
                    <a class="btn btn-secondary" href="{{ route('admin.product.index') }}">リストに戻る</a>
                </div>

                <div class="content-body">
                    <div class="form-input">
                        <label for="category_id">カテゴリー<span class="required">*</span></label>
                        <input value="{{ old('category_id', $item->category->name ?? '') }}" type="text" name="category_id" id="category_id"
                                class="form-control" placeholder="カテゴリー" disabled>
                    </div>
                    <div class="form-input">
                        <label for="title">店<span class="required">*</span></label>
                        <select name="store_id" class="form-control" disabled>
                            @foreach($stores as $store)
                                <option value="{{ $store['id'] }}" {{ old('store_id', $item->store_id ?? '') == $store['id'] ? 'selected' : '' }}>{{ $store['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="title">自動販売機<span class="required">*</span></label>
                        <select name="vending_machine_id" class="form-control" disabled>
                            @foreach($vendingMachine as $value)
                                <option value="{{ $value['id'] }}" {{ old('vending_machine_id', $item->vending_machine_id ?? '') == $value['id'] ? 'selected' : '' }}>{{ $value['title'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="user_id">ユーザー名<span class="required">*</span></label>
                        <input value="{{ old('user_id', $item->user->name ?? '') }}" type="text" name="user_id" id="user_id"
                                class="form-control" placeholder="ユーザー名" disabled>
                    </div>
                    <div class="form-input">
                        <label for="title">タイトル<span class="required">*</span></label>
                        <input value="{{ old('title', $item->title ?? '') }}" type="text" name="title" id="title"
                                class="form-control" placeholder="タイトル" disabled>
                    </div>
                    <div class="form-input">
                        <label for="title">価格<span class="required">*</span></label>
                        <input value="{{ old('price', $item->price ?? '') }}" type="text" name="price" id="price"
                                class="form-control" placeholder="価格" disabled>
                    </div>
                    <div class="form-input">
                        <label for="content">優先度<span class="required">*</span></label>
                        <input value="{{ old('priority', $item->priority ?? '') }}" type="text" name="priority" id="priority"
                                class="form-control" placeholder="優先度" disabled>
                    </div>
                    <div class="form-input">
                        <label for="content">量<span class="required">*</span></label>
                        <input value="{{ old('quantity', $item->quantity ?? '') }}" type="text" name="quantity" id="quantity"
                                class="form-control" placeholder="量" disabled>
                    </div>
                    <div class="form-input">
                        <label for="content">タイプ<span class="required">*</span></label>
                        <input value="{{ old('type', $item->type ?? '') }}" type="text" name="type" id="type"
                                class="form-control" placeholder="タイプ" disabled>
                    </div>
                    <div class="form-input">
                        <label for="content">容量<span class="required">*</span></label>
                        <select name="status" class="form-control" disabled>
                            @foreach(['Small', 'Medium', 'Large'] as $value)
                                <option value="{{ $value }}" {{ old('capacity', $item->capacity ?? '') == $value ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="content">説明<span class="required">*</span></label>
                        <textarea name="desc" id="desc" class="form-control" placeholder="説明" disabled>{{ old('desc', $item->desc ?? '') }}</textarea>
                    </div>
                    <div class="form-input">
                        <label for="imageUpload">画像をアップロードする (JPG, JPEG, PNG, .webp)</label>
                        <input class="form-control form-control-lg" type="file" name="images[]" id="images" multiple style="display: none;" />
                    </div>
                    <div class="form-input">
                        <div class="images-preview-div">
                            @if (isset($item) && $item->image)
                                @foreach ($item->image as $key => $image)
                                    <div class="image-preview image-preview-{{ $key + 1 }}">
                                        <img class="img-preview" src="{{ $image ? $image->image_url : asset('assets/img/avatar.png') }}" alt="image">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>