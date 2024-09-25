<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="">
            @csrf
            <div class="create">
                <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
                <div class="content-header">
                    <h4 class="mb-0 js-change-title">自動販売機の詳細</h4>
                    <a class="btn btn-secondary" href="{{ route('admin.vending-machine.index') }}">リストに戻る</a>
                </div>

                <div class="content-body">
                    <div class="form-input">
                        <label for="title">店<span class="required">*</span></label>
                        <select name="store_id" class="form-control" disabled>
                            @foreach($stores as $store)
                                <option value="{{ $store['id'] }}" {{ old('store_id', $item->store_id ?? '') == $store['id'] ? 'selected' : '' }}>{{ $store['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="title">名前<span class="required">*</span></label>
                        <input value="{{ old('title', $item->title ?? '') }}" type="text" name="title" id="title"
                                class="form-control" placeholder="名前" disabled>
                    </div>
                    <div class="form-input">
                        <label for="title">郵便番号<span class="required">*</span></label>
                        <input value="{{ old('post_code', $item->post_code ?? '') }}" type="text" name="post_code" id="post_code"
                                class="form-control" placeholder="郵便番号" disabled>
                    </div>
                    <div class="form-input">
                        <label for="content">pref21<span class="required">*</span></label>
                        <textarea name="pref21" id="pref21" class="form-control" placeholder="住所" disabled>{{ old('pref21', $item->pref21 ?? '') }}</textarea>
                    </div>
                    <div class="form-input">
                        <label for="content">住所<span class="required">*</span></label>
                        <textarea name="addr21" id="addr21" class="form-control" placeholder="住所" disabled>{{ old('addr21', $item->addr21 ?? '') }}</textarea>
                    </div>
                    <div class="form-input">
                        <label for="content">strt21<span class="required">*</span></label>
                        <textarea name="strt21" id="strt21" class="form-control" placeholder="住所" disabled>{{ old('strt21', $item->strt21 ?? '') }}</textarea>
                    </div>
                    <div class="form-input">
                        <label for="content">説明<span class="required">*</span></label>
                        <textarea name="desc" id="desc" class="form-control" placeholder="説明" disabled>{{ old('desc', $item->desc ?? '') }}</textarea>
                    </div>
                    <div class="form-input">
                        <label for="content">説明</label>
                        <select name="status" class="form-control" disabled>
                            <option value="0" {{ old('store_id', $item->status ?? '') == 0 ? 'selected' : '' }}>プライベート</option>
                            <option value="1" {{ old('store_id', $item->status ?? '') == 1 ? 'selected' : '' }}>公開</option>
                        </select>
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