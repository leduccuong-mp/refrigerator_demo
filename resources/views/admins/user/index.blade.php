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
    <div class="contentUser__create d-flex justify-content-end p-3">
        <a class="btn btn-primary" href="{{ route('admin.user.create') }}">作成する</a>
    </div>
    <div id="content" class="content">
        <div class="contentUser__main">
            <div class="user__list">
                <div class="user__list__table">
                    <table>
                        <thead>
                        <tr>
                            <th>名前</th>
                            <th>Eメール</th>
                            <th>電話</th>
                            <th>誕生日</th>
                            <th>にログインします</th>
                            <th>アクション</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr class="js-reserve-detail" data-id="{{ $item->id }}">
                                <td><small>{{ $item->name }}</small></td>
                                <td><small>{{ $item->email }}</small></td>
                                <td><small>{{ $item->phone }}</small></td>
                                <td><small>{{ $item->birthday }}</small></td>
                                <td><small>{{ $item->login_at }}</small></td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('admin.user.show', $item->id) }}"><i class="nav-icon fas fa-eye"></i></a>
                                        <a href="{{ route('admin.user.edit', $item->id) }}"><i class="nav-icon fas fa-edit"></i></a>
                                        <a href="{{ route('admin.user.password', $item->id) }}"><i class="nav-icon fas fa-key"></i></a>
                                        <form method="post" action="{{ route('admin.user.remove', $item->id) }}">
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
