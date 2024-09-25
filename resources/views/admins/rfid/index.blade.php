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
    <div id="content" class="content">
        <div class="content__main">
            <div class="list">
                <div class="list__table">
                    <table>
                        <thead>
                        <tr>
                            <th style="width: 10% !important">ID</th>
                            <th style="width: 40% !important">商品名</th>
                            <th style="width: 40% !important">RFID</th>
                            <th style="width: 10% !important">状態</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="js-reserve-detail" data-id="{{ $item->id }}">
                                <td><small>{{ $item->id }}</small></td>
                                <td><small>{{ $item->product->title }}</small></td>
                                <td><small>{{ $item->rfid }}</small></td>
                                <td><small>{{ $item->status == 0 ? '利用可能' : ($item->status == 1 ? '売られた' : 'キャンセル') }}</small></td>
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