<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.admin.changePassword', $id) }}">
            @csrf
            <div class="create">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="content-header">
                    <h4 class="mb-0 js-change-title">パスワードを変更する</h4>
                    <a class="btn btn-secondary" href="{{ route('admin.admin.index') }}">リストに戻る</a>
                </div>
            
                <div class="content-body">
                    <div class="form-input">
                        <label for="old_password">以前のパスワード<span class="required">*</span></label>
                        <input value="" type="password" name="old_password" id="old_password"
                                class="form-control @error('old_password') is-invalid @enderror" placeholder="以前のパスワード" required>
                        @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                </div>
                <div class="content-footer">
                    <button class="btn btn-primary" type="submit">アップデート</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>