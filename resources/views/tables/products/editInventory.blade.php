<x-navbar :title="$title" activeGroup="products" activeName="product"></x-navbar>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header p-0">
        <div class="container-fluided">
            <div class="mb-3">
                <span>Tồn kho</span>
                <span>/</span>
                <span class="font-weight-bold">{{ $title }}</span>
            </div>
        </div><!-- /.container-fluided -->
    </section>
    <section class="content-header">
        <div class="container-fluided">
            <div class="d-flex">
                <a href="{{ route('inventory.create') }}">
                    <button class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                            fill="none" style="&#10;">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9 0C9.58186 -2.96028e-08 10.0536 0.471694 10.0536 1.05356L10.0536 16.9464C10.0536 17.5283 9.58186 18 9 18C8.41814 18 7.94644 17.5283 7.94644 16.9464V1.05356C7.94644 0.471694 8.41814 -2.96028e-08 9 0Z"
                                fill="white" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18 9C18 9.58187 17.5283 10.0536 16.9464 10.0536H1.05356C0.471694 10.0536 -2.07219e-07 9.58187 0 9C-7.69672e-07 8.41814 0.471695 7.94644 1.05356 7.94644H16.9464C17.5283 7.94644 18 8.41814 18 9Z"
                                fill="white" />
                        </svg>
                        Tạo mới</button>
                </a>
                <div class="ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                            fill="#42526E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                            fill="#42526E" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                            fill="#42526E" />
                    </svg>
                </div>
            </div>
        </div>
    </section>
    {{-- Search --}}
    <section></section>
    {{-- Content --}}
    <section class="mt-2">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <th scope="col">Mã hàng hóa</th>
                    <th scope="col">Tên hàng hóa</th>
                    <th scope="col">Số lượng tồn</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td><input type="checkbox"></td>
                        <td>{{ $item->product_code }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_inventory }}</td>
                        <td>
                            <a href="{{ route('inventory.showProductInventory', $item->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M21 12C21 10.8954 20.1046 10 19 10C17.8954 10 17 10.8954 17 12C17 13.1046 17.8954 14 19 14C20.1046 14 21 13.1046 21 12Z"
                                        fill="#42526E"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12Z"
                                        fill="#42526E"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 12C7 10.8954 6.10457 10 5 10C3.89543 10 3 10.8954 3 12C3 13.1046 3.89543 14 5 14C6.10457 14 7 13.1046 7 12Z"
                                        fill="#42526E"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
