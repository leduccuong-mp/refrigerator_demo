<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.admin.store') }}">
            @csrf
            @include('admins.admin._form')
        </form>
    </div>
</x-app-layout>