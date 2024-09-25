<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="">
            @csrf
            <div class="create">
                <input type="hidden" name="id" value="{{ $item->id ?? '' }}">
                <div class="content-header">
                    <h4 class="mb-0 js-change-title">詳細バナー</h4>
                    <a class="btn btn-secondary" href="{{ route('admin.banner.index') }}">リストに戻る</a>
                </div>

                <div class="content-body">
                    <div class="form-input">
                        <label for="title">タイトル<span class="required">*</span></label>
                        <input value="{{ old('title', $item->title ?? '') }}" type="text" name="title" id="title"
                                class="form-control" placeholder="タイトル" disabled>
                    </div>
                    <div class="form-input">
                        <label for="url">URL<span class="required">*</span></label>
                        <input value="{{ old('url', $item->url ?? '') }}" type="text" name="url" id="url"
                                class="form-control" placeholder="価格" disabled>
                    </div>
                    <div class="form-input">
                        <label for="image_url">画像のURL<span class="required">*</span></label>
                        <input value="{{ old('image_url', $item->image_url ?? '') }}" type="text" name="image_url" id="image_url"
                                class="form-control" placeholder="価格" disabled>
                    </div>
                    <div class="form-input">
                        <label for="content">優先度<span class="required">*</span></label>
                        <input value="{{ old('priority', $item->priority ?? '') }}" type="text" name="priority" id="priority"
                                class="form-control" placeholder="優先度" disabled>
                    </div>
                    <div class="form-input">
                        <label for="started_at">に始まりました<span class="required">*</span></label>
                        <input autocomplete="off" type="text" class="form-control input-date"
                            placeholder="yyyy/mm/dd" name="started_at" id="started_at"
                            value="{{ old('started_at', $item->started_at ?? '') }}"
                            disabled>
                    </div>
                    <div class="form-input">
                        <label for="ended_at">に終了しました<span class="required">*</span></label>
                        <input autocomplete="off" type="text" class="form-control input-date"
                            placeholder="yyyy/mm/dd" name="ended_at" id="ended_at"
                            value="{{ old('ended_at', $item->ended_at ?? '') }}"
                            disabled>
                    </div>
                    <div class="form-input">
                        <label for="status">説明</label>
                        <select name="status" class="form-control" disabled>
                            <option value="0" {{ old('status', $item->status ?? '') == 0 ? 'selected' : '' }}>プライベート</option>
                            <option value="1" {{ old('status', $item->status ?? '') == 1 ? 'selected' : '' }}>公開</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <label for="type">タイプ<span class="required">*</span></label>
                        <select name="type" class="form-control" disabled>
                            @foreach([1,2,3,4,5] as $value)
                                <option value="{{ $value }}" {{ old('type', $item->type ?? '') == $value ? 'selected' : '' }}>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>