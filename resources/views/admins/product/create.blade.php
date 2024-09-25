<x-app-layout>
    <div id="content" class="content">
        <form class="form-create" method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
            @include('admins.product._form')
        </form>
    </div>
</x-app-layout>