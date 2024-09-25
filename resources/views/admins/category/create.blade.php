<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admins.category._form')
        </form>
    </div>
</x-app-layout>