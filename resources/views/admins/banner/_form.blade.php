
<div class="create">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
    <div class="content-header">
        <h4 class="mb-0 js-change-title">{{ isset($item) && $item->id ? 'バナーを更新する' : 'バナーを作成する' }}</h4>
        <a class="btn btn-secondary" href="{{ route('admin.banner.index') }}">リストに戻る</a>
    </div>

    <div class="content-body">
        <div class="form-input">
            <label for="title">タイトル<span class="required">*</span></label>
            <input value="{{ old('title', $item->title ?? '') }}" type="text" name="title" id="title"
                    class="form-control @error('title') is-invalid @enderror" placeholder="名前" >
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="url">URL<span class="required">*</span></label>
            <input value="{{ old('url', $item->url ?? '') }}" type="text" name="url" id="url"
                    class="form-control @error('title') is-invalid @enderror" placeholder="価格" >
            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="image_url">画像のURL<span class="required">*</span></label>
            <div class="mb-3">
                <img id="preview-image" class="image_url" style="width: 200px;height: 200px;padding: .25rem;background-color: var(--bs-body-bg);border: var(--bs-border-width) solid var(--bs-border-color);
                border-radius: var(--bs-border-radius);" src={{ $item->image_url ?? asset('assets/img/avatar.png') }}>
            </div>
            <input type="file" name="image_url" id="banner-url-image" class="form-control @error('image_url') is-invalid @enderror">
            @error('image_url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="priority">優先度<span class="required">*</span></label>
            <input value="{{ old('priority', $item->priority ?? '') }}" type="text" name="priority" id="priority"
                    class="form-control @error('priority') is-invalid @enderror" placeholder="優先度">
            @error('priority')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="started_at">に始まりました<span class="required">*</span></label>
            <input autocomplete="off" type="text" class="form-control input-date @error('started_at') is-invalid @enderror"
                placeholder="yyyy/mm/dd" name="started_at" id="started_at"
                value="{{ old('started_at', $item->started_at ?? '') }}">
                @error('started_at')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="ended_at">に終了しました<span class="required">*</span></label>
            <input autocomplete="off" type="text" class="form-control input-date @error('ended_at') is-invalid @enderror"
                placeholder="yyyy/mm/dd" name="ended_at" id="ended_at"
                value="{{ old('ended_at', $item->ended_at ?? '') }}">
                @error('ended_at')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="status">説明</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror">
                <option value="0" {{ old('status', $item->status ?? '') == 0 ? 'selected' : '' }}>プライベート</option>
                <option value="1" {{ old('status', $item->status ?? '') == 1 ? 'selected' : '' }}>公開</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="type">タイプ<span class="required">*</span></label>
            <select name="type" class="form-control @error('type') is-invalid @enderror">
                @foreach([1,2,3,4,5] as $value)
                    <option value="{{ $value }}" {{ old('type', $item->type ?? '') == $value ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
            @error('type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="content-footer">
        <button class="btn btn-primary" type="submit">{{ isset($item) && $item->id ? 'アップデート' : '作成する' }}</button>
    </div>
</div>