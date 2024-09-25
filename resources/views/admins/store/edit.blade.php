<x-app-layout>
    <div id="content" class="contentStore">
        <form class="form-create" method="post" action="{{ route('admin.store.update', $item->id) }}">
            @csrf
            @include('admins.store._form')
        </form>
    </div>
</x-app-layout>