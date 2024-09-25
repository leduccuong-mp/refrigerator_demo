
<div class="create">
    <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
    <div class="content-header">
        <h4 class="mb-0 js-change-title">{{ isset($item) && $item->id ? 'バナーを更新する' : 'バナーを作成する' }}</h4>
        <a class="btn btn-secondary" href="{{ route('admin.maintain.index') }}">リストに戻る</a>
    </div>

    <div class="content-body">
        <div class="form-input">
            <label for="site_name">タイトル</label>
            <input value="{{ old('site_name', $item->site_name ?? '') }}" type="text" name="site_name" id="site_name"
                    class="form-control @error('site_name') is-invalid @enderror" placeholder="タイトル">
            @error('site_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="maintenance_ico">メンテナンスアイコン</label>
            <input value="{{ old('maintenance_ico', $item->maintenance_ico ?? '') }}" type="text" name="maintenance_ico" id="maintenance_ico"
                    class="form-control @error('maintenance_ico') is-invalid @enderror" placeholder="メンテナンスアイコン">
            @error('maintenance_ico')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="maintenance_co">メンテナンス会社</label>
            <input value="{{ old('maintenance_co', $item->maintenance_co ?? '') }}" type="text" name="maintenance_co" id="maintenance_co"
                    class="form-control @error('maintenance_co') is-invalid @enderror" placeholder="メンテナンス会社">
                    @error('maintenance_co')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
        <div class="form-input">
            <label for="maintenance_lin">メンテナンスライン</label>
            <input value="{{ old('maintenance_lin', $item->maintenance_lin ?? '') }}" type="text" name="maintenance_lin" id="maintenance_lin"
                    class="form-control @error('maintenance_lin') is-invalid @enderror" placeholder="メンテナンスライン">
                    @error('maintenance_lin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
        <div class="form-input">
            <label for="ios_app_version">iOSアプリのバージョン</label>
            <input value="{{ old('ios_app_version', $item->ios_app_version ?? '') }}" type="text" name="ios_app_version" id="ios_app_version"
                    class="form-control @error('ios_app_version') is-invalid @enderror" placeholder="iOSアプリのバージョン">
                    @error('ios_app_version')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
        <div class="form-input">
            <label for="android_app_ver">Androidアプリのバージョン</label>
            <input value="{{ old('android_app_ver', $item->android_app_ver ?? '') }}" type="text" name="android_app_ver" id="android_app_ver"
                    class="form-control @error('android_app_ver') is-invalid @enderror" placeholder="Androidアプリのバージョン">
                    @error('android_app_ver')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
        </div>
        <div class="form-input">
            <label for="started_at">メンテナンス予定期間<span class="required">*</span></label>
            <div class="d-flex" style="gap: 1rem">
                <input autocomplete="off" type="text" class="form-control input-date @error('started_at') is-invalid @enderror"
                    placeholder="yyyy/mm/dd H:i" name="started_at" id="started_time_at"
                    value="{{ old('started_at', $item->started_at ?? '') }}"
                    required>
                    @error('started_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input autocomplete="off" type="text" class="form-control input-date @error('ended_at') is-invalid @enderror"
                    placeholder="yyyy/mm/dd H:i" name="ended_at" id="ended_time_at"
                    value="{{ old('ended_at', $item->ended_at ?? '') }}"
                    required>
                    @error('ended_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
        </div>
        <div class="form-input">
            <label for="ios_os_version">Ios オペレーティング システムのバージョ</label>
            <textarea name="ios_os_version" id="ios_os_version" class="form-control @error('ios_os_version') is-invalid @enderror" placeholder="Ios os version">{{ old('ios_os_version', $item->ios_os_version ?? '') }}</textarea>
            @error('ios_os_version')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-input">
            <label for="android_os_vers">アンドロイドオペレーティングシステムのバージョン</label>
            <textarea name="android_os_vers" id="android_os_vers" class="form-control @error('android_os_vers') is-invalid @enderror" placeholder="Android os vers">{{ old('android_os_vers', $item->android_os_vers ?? '') }}</textarea>
            @error('android_os_vers')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="form-check form-switch p-0">
            <label for="is_maintenance" style="width: 220px;">無効</label>
            <label class="switch">
                <input class="form-check-input @error('is_maintenance') is-invalid @enderror" name="is_maintenance" type="checkbox" role="switch" value="{{ old('is_maintenance', $item->is_maintenance ?? 0) }}" @if((string)old('is_maintenance', $item->is_maintenance ?? 0) === '1') checked @endif>
                @error('is_maintenance')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
        </div>

        <div class="form-check form-switch p-0">
            <label for="is_update" style="width: 220px;">アップデート</label>
            <label class="switch">
                <input class="form-check-input @error('is_update') is-invalid @enderror" name="is_update" type="checkbox" role="switch" value="{{ old('is_update', $item->is_update ?? 0) }}" @if((string)old('is_maintenance', $item->is_update ?? 0) === '1') checked @endif>
                @error('is_update')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
        </div>

        <div class="form-check form-switch p-0">
            <label for="is_force_update" style="width: 220px;">アップデートさせる</label>
            <label class="switch">
                <input class="form-check-input @error('is_force_update') is-invalid @enderror" name="is_force_update" type="checkbox" role="switch" value="{{ old('is_force_update', $item->is_force_update ?? 0) }}" @if((string)old('is_maintenance', $item->is_force_update ?? 0) === '1') checked @endif>
                @error('is_force_update')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
        </div>

        <div class="form-check form-switch p-0">
            <label for="is_device" style="width: 220px;">デバイス</label>
            <label class="switch">
                <input class="form-check-input @error('is_device') is-invalid @enderror" name="is_device" type="checkbox" role="switch" value="{{ old('is_device', $item->is_device ?? 0) }}" @if((string)old('is_maintenance', $item->is_device ?? 0) === '1') checked @endif>
                @error('is_device')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>
        </div>
        <div class="form-input">
            <input type="checkbox" id="checkbox-show-button" name="vehicle1" value="">
            <label for="vehicle1">メンテナンスモードを変更する</label><br>
        </div>
    </div>
    <div class="content-footer" style="display: none">
        <button class="btn btn-primary" type="submit">変更実行</button>
    </div>
</div>