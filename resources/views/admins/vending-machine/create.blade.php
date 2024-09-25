<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.vending-machine.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admins.vending-machine._form')
        </form>
    </div>
</x-app-layout>