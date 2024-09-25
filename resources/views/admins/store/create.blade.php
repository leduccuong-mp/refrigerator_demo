<x-app-layout>
    <div id="content" class="contentStore">
        <form class="form-create" method="post" action="{{ route('admin.store.store') }}">
            @csrf
            @include('admins.store._form')
        </form>
    </div>
</x-app-layout>