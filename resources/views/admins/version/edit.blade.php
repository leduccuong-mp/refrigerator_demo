<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="POST" action="{{ route('admin.version.update', $version->id) }}">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            @include('admins.version._form')
        </form>
    </div>
</x-app-layout>