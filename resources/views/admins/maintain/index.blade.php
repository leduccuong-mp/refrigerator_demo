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
        <a class="btn btn-primary" href="{{ route('admin.maintain.create') }}">作成する</a>
    </div>
    <div id="content" class="content">
        <div class="content__main">
            <div class="list">
                <div class="list__table">
                    <table>
                        <thead>
                        <tr>
                            <th style="width: 10% !important">ID</th>
                            <th style="width: 25% !important">無効</th>
                            <th style="width: 55% !important">メンテナンス予定期間</th>
                            <th style="width: 10% !important">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="js-reserve-detail" data-id="{{ $item->id }}">
                                <td>{{ $item->id }}</td>
                                <td><small>{{ $item->is_maintenance.$item->is_update.$item->is_force_update.$item->is_device }}</small></td>
                                <td><small>{{ $item->time_line_format ?? '' }}</small></td>
                                <td>
                                    <div class="action">
                                        <a type="button" href="{{ route('admin.maintain.edit', $item->id) }}" style="border-radius: 5px; background: #51be51; padding: 6px 10px;"><i class="nav-icon fas fa-edit" style="color:white"></i></a>
                                        <form method="POST" action="{{ route('admin.maintain.destroy', $item->id) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                            <button type="submit" style="border:none; background:red; border-radius: 5px; padding: 6px 12px;"><i  class="fa fa-trash-alt" style="color:white"></i></button>
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