<x-app-layout>
    <div id="content" class="contentUser">
        <form class="form-create" method="post" action="{{ route('admin.user.changePassword', $id) }}">
            @csrf
            <div class="user__create">
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
                <div class="contentUser-header">
                    <h4 class="mb-0 js-change-title">パスワードを変更する</h4>
                    <a class="btn btn-secondary" href="{{ route('admin.user.index') }}">リストに戻る</a>
                </div>
            
                <div class="contentUser-body">
                    <div class="form-input">
                        <label for="title">以前のパスワード<span class="required">*</span></label>
                        <input value="" type="password" name="old_password" id="old_password"
                                class="form-control" placeholder="以前のパスワード" required>
                    </div>
                    <div class="form-input">
                        <label for="title">新しいパスワード<span class="required">*</span></label>
                        {{-- <input value="" type="password" name="password" id="password"
                                class="form-control" placeholder="新しいパスワード" required> --}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="新しいパスワード" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-input">
                        <label for="title">パスワードの確認<span class="required">*</span></label>
                        {{-- <input value="" type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" placeholder="パスワードの確認" required> --}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="パスワードの確認" required autocomplete="current-password">
                    </div>
                </div>
                <div class="contentUser-footer">
                    <button class="btn btn-primary" type="submit">アップデート</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>