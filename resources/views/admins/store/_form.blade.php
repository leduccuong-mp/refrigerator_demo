
<div class="store__create">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-success">
            {{ Session::get('error') }}
        </div>
    @endif
    <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
    <div class="contentStore-header">
        <h4 class="mb-0 js-change-title">ストアを作成する</h4>
        <a class="btn btn-secondary" href="{{ route('admin.store') }}">リストに戻る</a>
    </div>

    <div class="contentStore-body">
        <div class="form-input">
            <label for="title">名前<span class="required">*</span></label>
            <input value="{{ old('name', $item->name ?? '') }}" type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror" placeholder="名前">
                    @error('name')
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
            <label for="content">住所 - pref21<span class="required">*</span></label>
            <input value="{{ old('pref21', $item->pref21 ?? '') }}" type="text" name="pref21" id="pref21"
                    class="form-control @error('pref21') is-invalid @enderror" placeholder="郵便番号">
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
            <label for="content">住所 - strt21<span class="required">*</span></label>
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
            <label for="content">説明<span class="required">*</span></label>
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
    </div>
    <div class="contentStore-footer">
        <button class="btn btn-primary" type="submit">{{ isset($item) && $item->id ? 'アップデート' : '作成する' }}</button>
    </div>
</div>