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
        <a class="btn btn-primary" href="{{ route('admin.version.create') }}">新規登録</a>
    </div>
    <div id="content" class="content">
        <div class="content__main">
            <div class="list">
                <div class="list__table">
                    <table>
                        <thead>
                        <tr>
                            <th>商品id</th>
                            <th>バージョン番号</th>
                            <th>端末</th>
                            <th>公開日</th>
                            <th>必須</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($versions as $item)
                            <tr class="js-reserve-detail" data-id="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->version }}</td>
                                <td>{{ $item->device == 1 ? 'IOS' : ($item->device == 2 ? 'Android' : 'IOS & Android') }}</td>
                                <td>{{ date('Y/m/d', strtotime($item->publish_date)) }}</td>
                                <td>{{ $item->flag == 1 ? 'はい' : 'いいえ' }}</td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.version.show', $item->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                        <a href="{{ route('admin.version.edit', $item->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                        <form method="POST" action="{{ route('admin.version.destroy', $item->id) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <button type="submit" style="border:none; background:none"><i  class="fa fa-trash-alt" style="color:red"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center">空の</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer clearfix page-pagination">
        {{ $versions->links() }}
    </div>
</x-app-layout>