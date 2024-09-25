<style>
  .form-check {
    padding-left: 0.875rem;
    padding-bottom: 0 !important;
    padding-top: 0 !important;
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
<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="">
            @csrf
            <div class="create">
                <input type="hidden" name="id" value="{{ $version->id ?? '' }}">
                <div class="content-header">
                    <h4 class="mb-0 js-change-title">詳細バージョン</h4>
                    <a class="btn btn-secondary" href="{{ route('admin.version.index') }}">リストに戻る</a>
                </div>

                <div class="content-body">
                <div class="content-body">
        <div class="form-input col-md-4">
            <label for="title">バージョン番号<span class="required">*</span></label>
            <input value="{{ old('version', $version->version ?? '') }}" type="text" name="version" id="title"
                    class="form-control" placeholder="バージョン番号" required disabled>
        </div>
        <div class="form-group">
            <label for="title">端末<span class="required">*</span></label>
            <div class="form-check">
                <input class="" type="radio" name="device" id="option1" value="1" @if(old('device') == '1' || $version->device == 1 ) checked @endif disabled>
                <label class="form-check-label" for="option1">
                IOS
                </label>
            </div>
            <div class="form-check">
                <input class="" type="radio" name="device" id="option2" value="2" @if(old('device') == '2' || $version->device == 2 ) checked @endif disabled>
                <label class="form-check-label" for="option2">
                Android
                </label>
            </div>
            <div class="form-check">
                <input class="" type="radio" name="device" id="option3" value="3" @if(old('device') == '3' || $version->device == 3 ) checked @endif disabled>
                <label class="form-check-label" for="option3">
                IOS & Android
                </label>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="title">公開日<span class="required">*</span></label>
            <input class="form-control" name="publish_date" id="publish_date" value="{{ old('publish_date', isset($version) && $version->publish_date ? date('Y/m/d', strtotime($version->publish_date)) : '') }}" disabled>
        </div>
        <div class="form-input">
            <label for="title">必須</label>
            <div class="form-check">
                <input class="" type="checkbox" name="flag" id="option1" value="1" @if(old('flag') == '1' || $version->flag == 1 ) checked @endif disabled>
                <label class="form-check-label" for="option1">
                はい
                </label>
            </div>
        </div>
    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>