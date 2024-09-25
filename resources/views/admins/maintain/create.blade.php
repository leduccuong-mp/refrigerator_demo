<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.maintain.store') }}">
            @csrf
            @include('admins.maintain._form')
        </form>
    </div>
</x-app-layout>