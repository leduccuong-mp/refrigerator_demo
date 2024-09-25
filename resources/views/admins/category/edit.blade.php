<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.category.update', $item->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
            @include('admins.category._form')
        </form>
    </div>
</x-app-layout>