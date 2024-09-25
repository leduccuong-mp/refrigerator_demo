<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.maintain.update', $item->id) }}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
            @include('admins.maintain._form')
        </form>
    </div>
</x-app-layout>