<x-navbar :title="$title" activeGroup="buy" activeName="import"></x-navbar>
<div class="content-wrapper m-0 min-height--none" style="min-height: 479px;">
    <!-- Content Header (Page header) -->
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left">
                <div class="content-header--options p-0 border-0">
                    <ul class="header-options--nav-1 nav nav-tabs margin-left32">
                        <li>
                            <a href="#export" data-toggle="tab" class="text-secondary active m-0 pl-3">Bán Hàng</a>
                        </li>
                        <li>
                            <a href="#import" data-toggle="tab" class="text-secondary m-0 pl-3 pr-3">Mua hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex content__heading--right">
            </div>
        </div>
    </div>
    <div class="content margin-top-38">
        <section class="content margin-250">
            <div class="container-fluided">
                <div class="row p-0 m-0">
                    <div class="col-12 p-0">
                        <div class="card">
                            <div class="outer text-nowrap">
                                <div class="tab-content">
                                    <div id="export" class="content tab-pane in active">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="width:5%;padding-left: 2rem;"
                                                        class="height-52">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link" data-sort-by="id"
                                                                data-sort-type="#">
                                                                <button class="btn-sort text-13" type="submit">Người
                                                                    dùng</button>
                                                            </a>
                                                            <div class="icon" id="icon-id"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="created_at" data-sort-type="">
                                                                <button class="btn-sort text-13"
                                                                    type="submit">Trang</button>
                                                            </a>
                                                            <div class="icon" id="icon-created_at"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="created_at" data-sort-type=""><button
                                                                    class="btn-sort text-13" type="submit">Hành
                                                                    động</button>
                                                            </a>
                                                            <div class="icon" id="icon-created_at"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link" data-sort-by="total"
                                                                data-sort-type=""><button class="btn-sort text-13"
                                                                    type="submit">Thời gian</button>
                                                            </a>
                                                            <div class="icon" id="icon-total"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user_flow_export as $item)
                                                    <tr class="position-relative import-info" style="height:44px;">
                                                        <input type="hidden" name="id-import" class="id-import"
                                                            id="id-import" value="{{ $item->id }}">
                                                        <td class="text-13-black">
                                                            <span class="margin-Right10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                                    height="10" viewBox="0 0 6 10" fill="none">
                                                                    <g clip-path="url(#clip0_1710_10941)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                            fill="#282A30"></path>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1710_10941">
                                                                            <rect width="6" height="10"
                                                                                fill="white">
                                                                            </rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <input type="checkbox" id="{{ $item->id }}"
                                                                class="cb-element checkall-btn">
                                                        </td>
                                                        <td class=" text-13-black">
                                                            {{ $item->name_user }}
                                                        </td>
                                                        <td class=" text-13-black">
                                                            {{ $item->activity_type }}
                                                        </td>
                                                        <td class=" text-13-black">
                                                            {{ $item->activity_description }}
                                                        </td>
                                                        <td class=" text-13-black">
                                                            {{ date_format(new DateTime($item->created_at), 'd-m-Y H:i:s') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="import" class="tab-pane fade">
                                        <table id="example2" class="table table-hover">
                                            <thead class="sticky-head">
                                                <tr>
                                                    <th scope="col" style="width:5%;padding-left: 2rem;"
                                                        class="height-52">
                                                        <input type="checkbox" name="all" id="checkall"
                                                            class="checkall-btn">
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link" data-sort-by="id"
                                                                data-sort-type="#">
                                                                <button class="btn-sort text-13" type="submit">Người
                                                                    dùng</button>
                                                            </a>
                                                            <div class="icon" id="icon-id"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="created_at" data-sort-type="">
                                                                <button class="btn-sort text-13"
                                                                    type="submit">Trang</button>
                                                            </a>
                                                            <div class="icon" id="icon-created_at"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex">
                                                            <a href="#" class="sort-link"
                                                                data-sort-by="created_at" data-sort-type=""><button
                                                                    class="btn-sort text-13" type="submit">Hành
                                                                    động</button>
                                                            </a>
                                                            <div class="icon" id="icon-created_at"></div>
                                                        </span>
                                                    </th>
                                                    <th scope="col" class="height-52">
                                                        <span class="d-flex justify-content-start">
                                                            <a href="#" class="sort-link" data-sort-by="total"
                                                                data-sort-type=""><button class="btn-sort text-13"
                                                                    type="submit">Thời gian</button>
                                                            </a>
                                                            <div class="icon" id="icon-total"></div>
                                                        </span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user_flow_import as $item)
                                                    <tr class="position-relative import-info" style="height:44px;">
                                                        <input type="hidden" name="id-import" class="id-import"
                                                            id="id-import" value="{{ $item->id }}">
                                                        <td class="text-13-black">
                                                            <span class="margin-Right10">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="6"
                                                                    height="10" viewBox="0 0 6 10" fill="none">
                                                                    <g clip-path="url(#clip0_1710_10941)">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                            d="M1 8C1.55228 8 2 8.44772 2 9C2 9.55228 1.55228 10 1 10C0.447715 10 0 9.55228 0 9C0 8.44772 0.447715 8 1 8ZM5 8C5.55228 8 6 8.44772 6 9C6 9.55228 5.55228 10 5 10C4.44772 10 4 9.55228 4 9C4 8.44772 4.44772 8 5 8ZM1 4C1.55228 4 2 4.44772 2 5C2 5.55228 1.55228 6 1 6C0.447715 6 0 5.55228 0 5C0 4.44772 0.447715 4 1 4ZM5 4C5.55228 4 6 4.44772 6 5C6 5.55228 5.55228 6 5 6C4.44772 6 4 5.55228 4 5C4 4.44772 4.44772 4 5 4ZM1 0C1.55228 0 2 0.447715 2 1C2 1.55228 1.55228 2 1 2C0.447715 2 0 1.55228 0 1C0 0.447715 0.447715 0 1 0ZM5 0C5.55228 0 6 0.447715 6 1C6 1.55228 5.55228 2 5 2C4.44772 2 4 1.55228 4 1C4 0.447715 4.44772 0 5 0Z"
                                                                            fill="#282A30"></path>
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0_1710_10941">
                                                                            <rect width="6" height="10"
                                                                                fill="white">
                                                                            </rect>
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </span>
                                                            <input type="checkbox" id="{{ $item->id }}"
                                                                class="cb-element checkall-btn">
                                                        </td>
                                                        <td class=" text-13-black">
                                                            {{ $item->name_user }}
                                                        </td>
                                                        <td class=" text-13-black">
                                                            {{ $item->activity_type }}
                                                        </td>
                                                        <td class=" text-13-black">
                                                            {{ $item->activity_description }}
                                                        </td>
                                                        <td class=" text-13-black">
                                                            {{ date_format(new DateTime($item->created_at), 'd-m-Y H:i:s') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
