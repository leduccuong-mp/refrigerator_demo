<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="POST" action="{{ route('admin.banner.update', $item->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
            @include('admins.banner._form')
        </form>
    </div>
</x-app-layout>