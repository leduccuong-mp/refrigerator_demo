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
        <a class="btn btn-primary" href="{{ route('admin.product.create') }}">作成する</a>
    </div>
    <div id="content" class="content">
        <div class="content__main">
            <div class="list">
                <div class="list__table">
                    <table>
                        <thead>
                        <tr>
                            <th>店名</th>
                            <th>カテゴリー</th>
                            <th>自動販売機</th>
                            <th>ユーザー名</th>
                            <th>タイトル</th>
                            <th>価格</th>
                            <th>優先度</th>
                            <th>量</th>
                            <th>タイプ</th>
                            <th>容量</th>
                            <th>説明</th>
                            <th>画像</th>
                            <th>アクション</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="js-reserve-detail" data-id="{{ $item->id }}">
                                <td><small>{{ $item->store->name ?? '' }}</small></td>
                                <td><small>{{ $item->category->name ?? '' }}</small></td>
                                <td><small>{{ $item->vendingMachine->title ?? '' }}</small></td>
                                <td><small>{{ $item->user->name ?? '' }}</small></td>
                                <td><small>{{ $item->title }}</small></td>
                                <td><small>{{ $item->price }}</small></td>
                                <td><small>{{ $item->priority }}</small></td>
                                <td><small>{{ $item->quantity }}</small></td>
                                <td><small>{{ $item->type }}</small></td>
                                <td><small>{{ $item->capacity }}</small></td>
                                <td><small>{{ $item->desc }}</small></td>
                                <td>
                                @if($item->image->isNotEmpty())
                                    <img class="img-thumbnail aspect-ratio-1-1" src="{{ $item->image->first()->image_url }}" alt="image">
                                @endif
                                </td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.product.show', $item->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                        <a href="{{ route('admin.product.edit', $item->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                        <form method="POST" action="{{ route('admin.product.destroy', $item->id) }}">
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
