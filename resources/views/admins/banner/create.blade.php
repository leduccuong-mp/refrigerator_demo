<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.banner.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admins.banner._form')
        </form>
    </div>
</x-app-layout>