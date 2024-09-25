<x-app-layout>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-error">
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="contentStore__create d-flex justify-content-end p-3">
        <a class="btn btn-primary" href="{{ route('admin.store.create') }}">作成する</a>
    </div>
    <div id="content" class="content">
        <div class="contentStore__main">
            <div class="store__list">
                <div class="store__list__table">
                    <table>
                        <thead>
                        <tr>
                            <th>名前</th>
                            <th>住所-pref21</th>
                            <th>住所-addr21</th>
                            <th>住所-strt21</th>
                            <th>緯度</th>
                            <th>経度</th>
                            <th>説明</th>
                            <th>更新日時</th>
                            <th>アクション</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="js-reserve-detail" data-id="{{ $item->id }}">
                                <td><small>{{ $item->name }}</small></td>
                                <td><small>{{ $item->pref21 }}</small></td>
                                <td><small>{{ $item->addr21 }}</small></td>
                                <td><small>{{ $item->strt21 }}</small></td>
                                <td><small>{{ $item->latitude }}</small></td>
                                <td><small>{{ $item->longitude }}</small></td>
                                <td><small>{{ $item->desc }}</small></td>
                                <td><small>{{ $item->updated_at }}</small></td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.store.edit', $item->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                        <form method="post" action="{{ route('admin.store.remove', $item->id) }}">
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
</x-app-layout>
