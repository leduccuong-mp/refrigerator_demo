<x-app-layout>
    <div id="content" class="contentUser">
        <form class="form-create" method="post" action="">
            @csrf
            <div class="user__create">
                <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
                <div class="contentUser-header">
                    <h4 class="mb-0 js-change-title">新しいユーザーを作成する</h4>
                    <a class="btn btn-secondary" href="{{ route('admin.user.index') }}">リストに戻る</a>
                </div>
            
                <div class="contentUser-body">
                    <div class="form-input">
                        <label for="title">名前<span class="required">*</span></label>
                        <input value="{{ old('name', $item->name ?? '') }}" type="text" name="name" id="name"
                                class="form-control" placeholder="名前" disabled>
                    </div>
                    <div class="form-input">
                        <label for="title">Eメール<span class="required">*</span></label>
                        <input value="{{ old('email', $item->email ?? '') }}" type="text" name="email" id="email"
                                class="form-control" placeholder="Eメール" disabled>
                    </div>
                    <div class="form-input">
                        <label for="title">電話<span class="required">*</span></label>
                        <input value="{{ old('phone', $item->phone ?? '') }}" type="text" name="phone" id="phone"
                                class="form-control" placeholder="電話" disabled>
                    </div>
                    <div class="form-input">
                        <label for="title">誕生日<span class="required">*</span></label>
                        <input value="{{ old('birthday', $item->birthday ?? '') }}" type="text" name="birthday" id="birthday"
                                class="form-control" placeholder="誕生日" disabled>
                    </div>
                    <div class="form-input">
                        <label for="title">パスワード<span class="required">*</span></label>
                        <input value="********" type="password" name="password" id="password"
                                class="form-control" placeholder="パスワード" disabled>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>