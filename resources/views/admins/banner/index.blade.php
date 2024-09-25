<x-app-layout>
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
    <div class="content__create d-flex justify-content-end p-3">
        <a class="btn btn-primary" href="{{ route('admin.banner.create') }}">作成する</a>
    </div>
    <div id="content" class="content">
        <div class="content__main">
            <div class="list">
                <div class="list__table">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>タイトル</th>
                            <th>URL</th>
                            <th>画像のURL</th>
                            <th>優先度</th>
                            <th>に始まりました</th>
                            <th>に終了しました</th>
                            <th>状態</th>
                            <th>タイプ</th>
                            <th>アクション</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="js-reserve-detail" data-id="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td><small>{{ $item->title }}</small></td>
                                <td><a class="banner-url" href="{{ $item->url }}" target="_blank">{{ $item->url }}</a></td>
                                <td><img class="img-thumbnail" src="{{ $item->image_url }}" alt="image"></td>
                                <td>{{ $item->priority }}</td>
                                <td><small>{{ $item->started_at_format }}</small></td>
                                <td><small>{{ $item->ended_at_format }}</small></td>
                                <td>{{ $item->status == 1 ? '公開' : 'プライベート' }}</td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.banner.show', $item->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                        <a href="{{ route('admin.banner.edit', $item->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                        <form method="POST" action="{{ route('admin.banner.destroy', $item->id) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <button type="submit" style="border:none; background:none"><i  class="fa fa-trash-alt" style="color:red"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center">空の</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix page-pagination">
        {{ $items->links() }}
    </div>
</x-app-layout>