<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="POST" action="{{ route('admin.admin.update', $item->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
            @include('admins.admin._form')
        </form>
    </div>
</x-app-layout>