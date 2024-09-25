<x-app-layout>
    <div id="content" class="contentUser">
        <form class="form-create" method="post" action="{{ route('admin.user.store') }}">
            @csrf
            @include('admins.user._form')
        </form>
    </div>
</x-app-layout>