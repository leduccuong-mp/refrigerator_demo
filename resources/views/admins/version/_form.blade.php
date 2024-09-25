<style>
  .form-check {
    padding-left: 0.875rem;
    padding-bottom: 0;
    padding-top: 0;
  }
  input[type=radio] {
    border-radius: 0 !important;
    margin-right: 5px;
  }
  input[type=checkbox] {
    padding: 2px;
    margin-right: 5px;
  }
</style>
<div class="create">
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <input type="hidden" name="id" value="{{ isset($version) && $version->id ? $version->id : '' }}">
    <div class="content-header">
        <h4 class="mb-0 js-change-title">{{ isset($version) && $version->id ? 'バージョンを更新する' : 'バージョンを作成する ' }}</h4>
        <a class="btn btn-secondary" href="{{ route('admin.version.index') }}">リストに戻る</a>
    </div>

    <div class="content-body">
        <div class="form-input col-md-4">
            <label for="title">バージョン番号<span class="required">*</span></label>
            <input value="{{ old('version', $version->version ?? '') }}" type="text" name="version" id="title"
                    class="form-control" placeholder="バージョン番号" required>
        </div>
        <div class="form-group">
            <label for="title">端末<span class="required">*</span></label>
            <div class="form-check">
                <input class="" type="radio" name="device" id="option1" value="1" @if(old('device') == '1' || isset($version) && $version->device == 1 ) checked @endif>
                <label class="form-check-label" for="option1">
                IOS
                </label>
            </div>
            <div class="form-check">
                <input class="" type="radio" name="device" id="option2" value="2" @if(old('device') == '2' || isset($version) && $version->device == 2 ) checked @endif>
                <label class="form-check-label" for="option2">
                Android
                </label>
            </div>
            <div class="form-check">
                <input class="" type="radio" name="device" id="option3" value="3" @if(old('device') == '3' || isset($version) && $version->device == 3 ) checked @endif>
                <label class="form-check-label" for="option3">
                IOS & Android
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="title">公開日<span class="required">*</span></label>
            <input class="form-control" name="publish_date" id="publish_date" value="{{ old('publish_date', isset($version) && $version->publish_date ? date('Y/m/d', strtotime($version->publish_date)) : '') }}">
        </div>
        <div class="form-input">
            <label for="title">必須</label>
            <div class="form-check">
                <input class="" type="checkbox" name="flag" id="option1" value="1" @if(old('flag') == '1' || isset($version) && $version->flag == 1 ) checked @endif>
                <label class="form-check-label" for="option1">
                はい
                </label>
            </div>
        </div>
    </div>
    <div class="content-footer">
        <button class="btn btn-primary" type="submit">{{ isset($version) && $version->id ? 'アップデート' : '作成する' }}</button>
    </div>
</div>