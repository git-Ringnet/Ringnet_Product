<x-navbar :title="$title" activeGroup="products" activeName="warehouse"></x-navbar>
<div class="content-wrapper m-0 min-height--none">
    <div class="content-header-fixed p-0 margin-250">
        <div class="content__header--inner margin-left32">
            <div class="content__heading--left text-long-special">
                <span>
                    <a class="text-dark" href="{{ route('warehouse.index') }}">Kho hàng</a>
                </span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold">Xem kho hàng</span>
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M7.69269 13.9741C7.43577 13.7171 7.43577 13.3006 7.69269 13.0437L10.7363 10.0001L7.69269 6.95651C7.43577 6.69959 7.43577 6.28303 7.69269 6.02611C7.94962 5.76918 8.36617 5.76918 8.6231 6.02611L12.1319 9.53488C12.3888 9.7918 12.3888 10.2084 12.1319 10.4653L8.6231 13.9741C8.36617 14.231 7.94962 14.231 7.69269 13.9741Z"
                            fill="#26273B" fill-opacity="0.8" />
                    </svg>
                </span>
                <span class="font-weight-bold">{{ $warehouse->warehouse_name }}</span>
            </div>
            <div class="d-flex content__heading--right">
                <div class="row m-0">
                    <div class="dropdown">
                        <a href="{{ route('warehouse.index') }}" class="activity" data-name1="SP"
                            data-des="Hủy nhóm sản phẩm">
                            <button class="btn-destroy btn-light mx-1 d-flex align-items-center h-100" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                    viewBox="0 0 14 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7 14C10.866 14 14 10.866 14 7C14 3.13401 10.866 0 7 0C3.13401 0 0 3.13401 0 7C0 10.866 3.13401 14 7 14ZM5.03033 3.96967C4.73744 3.67678 4.26256 3.67678 3.96967 3.96967C3.67678 4.26256 3.67678 4.73744 3.96967 5.03033L5.93934 7L3.96967 8.96967C3.67678 9.26256 3.67678 9.73744 3.96967 10.0303C4.26256 10.3232 4.73744 10.3232 5.03033 10.0303L7 8.06066L8.96967 10.0303C9.26256 10.3232 9.73744 10.3232 10.0303 10.0303C10.3232 9.73744 10.3232 9.26256 10.0303 8.96967L8.06066 7L10.0303 5.03033C10.3232 4.73744 10.3232 4.26256 10.0303 3.96967C9.73744 3.67678 9.26256 3.67678 8.96967 3.96967L7 5.93934L5.03033 3.96967Z"
                                        fill="#6D7075" />
                                </svg>
                                <span class="text-btnIner-primary ml-2">Hủy</span>
                            </button>
                        </a>
                    </div>
                    <a href="{{ route('warehouse.edit', $warehouse->id) }}" class="activity" data-name1="SP"
                        data-des="Sửa nhóm sản phẩm">
                        <button type="submit" class="custom-btn d-flex align-items-center h-100"
                            style="margin-right:10px">
                            <svg class="mx-1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                viewBox="0 0 18 18" fill="none">
                                <path
                                    d="M4.75 2.00007C2.67893 2.00007 1 3.679 1 5.75007V11.25C1 13.3211 2.67893 15 4.75 15H10.2501C12.3212 15 14.0001 13.3211 14.0001 11.25V8.00007C14.0001 7.58586 13.6643 7.25007 13.2501 7.25007C12.8359 7.25007 12.5001 7.58586 12.5001 8.00007V11.25C12.5001 12.4927 11.4927 13.5 10.2501 13.5H4.75C3.50736 13.5 2.5 12.4927 2.5 11.25V5.75007C2.5 4.50743 3.50736 3.50007 4.75 3.50007H7C7.41421 3.50007 7.75 3.16428 7.75 2.75007C7.75 2.33586 7.41421 2.00007 7 2.00007H4.75Z"
                                    fill="white" />
                                <path
                                    d="M12.1339 5.19461L10.7197 3.7804L6.52812 7.97196C5.77185 8.72823 5.25635 9.69144 5.0466 10.7402C5.03144 10.816 5.09828 10.8828 5.17409 10.8677C6.22285 10.6579 7.18606 10.1424 7.94233 9.38618L12.1339 5.19461Z"
                                    fill="white" />
                                <path
                                    d="M13.4559 1.45679C13.2663 1.39356 13.0571 1.44293 12.9158 1.58431L11.7803 2.71974L13.1945 4.13395L14.33 2.99852C14.4714 2.85714 14.5207 2.64802 14.4575 2.45834C14.2999 1.98547 13.9288 1.61441 13.4559 1.45679Z"
                                    fill="white" />
                            </svg>
                            <span>Sửa</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="margin-top:3.8rem;">
        <section class="content margin-250">
            <div class="container-fluided mb-2">
                <div class="bg-filter-search border-0 text-left">
                    <p class="font-weight-bold text-uppercase info-chung--heading">THÔNG TIN CHUNG</p>
                </div>
                <div class="info-chung">
                    <div class="content-info">
                        <div class="d-flex align-items-center height-60-mobile">
                            <div class="title-info height-100 py-2 border border-left-0">
                                <p class="p-0 m-0 margin-left32 text-13-black">
                                    <b>Tên kho hàng</b>
                                </p>
                            </div>
                            <input type="text" placeholder="Nhập thông tin" value="{{ $warehouse->warehouse_name }}" disabled
                                class="border w-100 py-2 border-left-0 border-right-0 px-3 text-13-black height-100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluided">
                <div class="info-chung">
                    <div class="content-info">
                        <div class="title-info height-100 w-100 py-2 border-bottom">
                            <p class="p-0 m-0 margin-left32 text-13-black">
                                <b>Sản phẩm</b>
                            </p>
                        </div>
                    </div>
                    <div class="content-info">
                        <div class="title-info height-100 w-100 py-2 border-bottom scrollbar">
                            @foreach ($products as $item)
                                @if ($item->warehouse_id == $warehouse->id)
                                    <div class="d-flex align-items-center py-2">
                                        <input type="checkbox" class="p-0 m-0 margin-left32 text-13-black" disabled
                                            checked value="{{ $item->id }}">
                                        <p class="p-0 m-0 margin-left32 text-13-black">{{ $item->product_name }}</p>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<x-user-flow></x-user-flow>
<script src="{{ asset('/dist/js/export.js') }}"></script>
