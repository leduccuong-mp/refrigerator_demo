<x-app-layout>
    <div id="content" class="contentUser">
        <form class="form-create" method="post" action="{{ route('admin.user.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @include('admins.user._form')
        </form>
    </div>
</x-app-layout>