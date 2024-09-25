<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="POST" action="{{ route('admin.vending-machine.update', $item->id) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            @include('admins.vending-machine._form')
        </form>
    </div>
</x-app-layout>