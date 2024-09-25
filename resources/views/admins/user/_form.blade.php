
<div class="user__create">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
    <div class="contentUser-header">
        <h4 class="mb-0 js-change-title">新しいユーザーを作成する</h4>
        <a class="btn btn-secondary" href="{{ route('admin.user.index') }}">リストに戻る</a>
    </div>

    <div class="contentUser-body">
        <div class="form-input">
            <label for="name">名前<span class="required">*</span></label>
            <input value="{{ old('name', $item->name ?? '') }}" type="text" name="name" id="name"
                    class="form-control @error('name') is-invalid @enderror" placeholder="名前" required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="email">Eメール<span class="required">*</span></label>
            <input value="{{ old('email', $item->email ?? '') }}" type="text" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Eメール" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-input">
            <label for="phone">電話<span class="required">*</span></label>
            <input value="{{ old('phone', $item->phone ?? '') }}" type="text" name="phone" id="phone"
                    class="form-control" placeholder="電話" required>
        </div>
        <div class="form-input">
            <label for="birthday">誕生日<span class="required">*</span></label>
            <input autocomplete="off" type="text" class="form-control input-date"
                placeholder="yyyy/mm/dd" name="birthday" id="birthday"
                value="{{ old('birthday', $item->birthday ?? '') }}"
                required>
        </div>
        @if (empty($item))
            <div class="form-input">
                <label for="password">新しいパスワード<span class="required">*</span></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="新しいパスワード" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-input">
                <label for="password_confirmation">パスワードの確認<span class="required">*</span></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="パスワードの確認" required autocomplete="current-password">
            </div>
        @endif
    </div>
    <div class="contentUser-footer">
        <button class="btn btn-primary" type="submit">{{ isset($item) && $item->id ? 'アップデート' : '作成する' }}</button>
    </div>
</div>