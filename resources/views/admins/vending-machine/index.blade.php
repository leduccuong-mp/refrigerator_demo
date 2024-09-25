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
        <a class="btn btn-primary" href="{{ route('admin.vending-machine.create') }}">作成する</a>
    </div>
    <div id="content" class="content">
        <div class="content__main">
            <div class="list">
                <div class="list__table">
                    <table>
                        <thead>
                        <tr>
                            <th>店名</th>
                            <th>タイトル</th>
                            <th>郵便番号</th>
                            <th>pref21</th>
                            <th>addr21</th>
                            <th>strt21</th>
                            <th>説明</th>
                            <th>状態</th>
                            <th>アイコン</th>
                            <th>画像</th>
                            <th>アクション</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="js-reserve-detail" data-id="{{ $item->id }}">
                                <td><small>{{ $item->store->name ?? '' }}</small></td>
                                <td><small>{{ $item->title }}</small></td>
                                <td><small>{{ $item->post_code }}</small></td>
                                <td><small>{{ $item->pref21 }}</small></td>
                                <td><small>{{ $item->addr21 }}</small></td>
                                <td><small>{{ $item->strt21 }}</small></td>
                                <td><small>{{ $item->desc }}</small></td>
                                <td>{{ $item->status == 1 ? '公開' : 'プライベート' }}</td>
                                <td><img class="img-thumbnail" src="{{ $item->icon }}" alt="image"></td>
                                <td>
                                    @foreach ($item->image as $image)
                                        <img class="img-thumbnail" src="{{ $image->image_url }}" alt="image">
                                    @endforeach
                                </td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.vending-machine.show', $item->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                        <a href="{{ route('admin.vending-machine.edit', $item->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                        <form method="POST" action="{{ route('admin.vending-machine.destroy', $item->id) }}">
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