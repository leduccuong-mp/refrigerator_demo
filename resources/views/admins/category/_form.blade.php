
<div class="create">
    <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
    <div class="content-header">
        <h4 class="mb-0 js-change-title">{{ isset($item) && $item->id ? 'カテゴリを更新する' : 'カテゴリの作成' }}</h4>
        <a class="btn btn-secondary" href="{{ route('admin.category.index') }}">リストに戻る</a>
    </div>

    <div class="content-body">
        <div class="form-input">
            <label for="name">名前</label>
            <input value="{{ old('name', $item->name ?? '') }}" type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror" placeholder="名前">
            @error('name')
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
            <label for="sort">選別</label>
            <input value="{{ old('sort', $item->sort ?? '') }}" type="number" name="sort" id="sort"
                    class="form-control @error('sort') is-invalid @enderror" placeholder="選別">
            @error('sort')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="content-footer">
        <button class="btn btn-primary" type="submit">変更実行</button>
    </div>
</div>