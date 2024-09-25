<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.version.store') }}">
            @csrf
            @include('admins.version._form')
        </form>
    </div>
</x-app-layout>