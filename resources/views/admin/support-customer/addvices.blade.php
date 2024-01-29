@extends('admin.layouts.admin_layout')
@section('content')
<style type="text/css">
    .table td,
    .table th {
        font-size: 12px;
        line-height: 2.42857 !important;
    }
</style>

<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                <li> <a href="{{ route('admin.home') }}">{{__('Home')}}</a> <i class="fa fa-circle"></i> </li>
                <li> <span>BANNER Việc Làm</span> </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h3 class="page-title">Quản lý Banner <small>BANNER Việc Làm</small> </h3>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption"> <i class="icon-settings font-dark"></i> <span class="caption-subject font-dark sbold uppercase">Banner Job</span> </div>
                       
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <form method="post" role="form" id="banner-search-form">
                                <table class="table table-striped table-bordered table-hover" id="customer_datatable_ajax">
                                    <thead>
                                        <tr role="row" class="filter">
                                            <!-- <td><input type="text" class="form-control" name="id" id="id" autocomplete="on"></td>
                                            <td><input type="text" class="form-control" name="priorities" id="priorities" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="status" id="status"></td>
                                            <td><input type="text" class="form-control" name="created_at" id="created_at"></td>
                                            <td><input type="text" class="form-control" name="updated_at" id="updated_at"></td> -->

                                            <td></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>Id</th>
                                            <th>Tên</th>
                                            <th>Email</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Thành Phố</th>
                                            <th>Trạng Thái</th>

                                            <th>Ngày Tạo</th>
                                            <th>Cập Nhật</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
@endsection
@push('scripts')
<script>
    $(function () {
        var oTable = $('#customer_datatable_ajax').DataTable({
            "language": { // language settings
                // metronic spesific
                "metronicGroupActions": "_TOTAL_ bản ghi được chọn:  ",
                "metronicAjaxRequestGeneralError": "Không thể hoàn thành yêu cầu, xin check kết nối mạng",

                // data tables spesific
                "lengthMenu": "<span class='seperator'></span>Xem _MENU_ bản ghi",
                "info": "<span class='seperator'></span>Tìm thấy tổng số _TOTAL_ bản ghi",
                "infoEmpty": "Không có bản ghì nào để hiển thị/ No records found to show",
                "emptyTable": "Không có dữ liệu trong bảng/ No data available in table",
                "zeroRecords": "Không có bản ghi nào khớp/ No matching records found",
            "infoFiltered":   "(lọc từ tổng _MAX_  mục)",
            "paginate": {
                    "previous": "Trước/Prev",
                    "next": "Tiếp/Next",
                    "last": "Cuối/Last",
                    "first": "Đầu/First",
                    "page": "Trang/Page",
                    "pageOf": "trong/of"
                }
            },
            procesing: true,
            destroy: true,
            serverSide: true,
            stateSave: true,
         searching:false,
            // "order": [[0, "desc"]],
     
            /*		
             paging: true,
             info: true,
             */
            ajax: {
                url: `{{ route('admin.advise.getAll')}}`,
                dataSrc:"",
                data: function (d) {
                    d.id = $('#customer_datatable_ajax #id').val();
                    d.priorities = $('#customer_datatable_ajax #fullName').val();
                    d.status = $('#customer_datatable_ajax #status').val() == 1 ? "Hoạt động":"Không hoạt động";
                    d.created_at = $('#customer_datatable_ajax #created_at').val();
                    d.update_at = $('#customer_datatable_ajax #update_at').val();


                }
            }, columns: [
                /*{data: 'id_checkbox', name: 'id_checkbox', orderable: false, },*/
                {data: 'id', name: 'id' , },
                {data: 'fullName', name: 'fullName' , },
                {data: 'email', name: 'email' , },
                {data: 'phoneNumber', name: 'phoneNumber' , },

                {data: 'citys', name: 'citys' , 
                    render: function (data) {
                        const tmp= [
                                {"city_id": "", "city_name": "Chọn Địa Điểm"},
                                {"city_id": "3", "city_name": "Port Blair"},
                                {"city_id": "48666", "city_name": "Lào Cai"},
                                {"city_id": "48667", "city_name": "Yên Bái"},
                                {"city_id": "48668", "city_name": "Lai Châu"},
                                {"city_id": "48669", "city_name": "Điện Biên"},
                                {"city_id": "48670", "city_name": "Sơn La"},
                                {"city_id": "48671", "city_name": "Hòa Bình"},
                                {"city_id": "48672", "city_name": "Hà Giang"},
                                {"city_id": "48673", "city_name": "Tuyên Quang"},
                                {"city_id": "48674", "city_name": "Phú Thọ"},
                                {"city_id": "48675", "city_name": "Thái Nguyên"},
                                {"city_id": "48676", "city_name": "Bắc Kạn"},
                                {"city_id": "48677", "city_name": "Cao Bằng"},
                                {"city_id": "48678", "city_name": "Lạng Sơn"},
                                {"city_id": "48679", "city_name": "Bắc Giang"},
                                {"city_id": "48680", "city_name": "Quảng Ninh"},
                                {"city_id": "48681", "city_name": "Tp. Hà Nội"},
                                {"city_id": "48682", "city_name": "Tp. Hải Phòng"},
                                {"city_id": "48683", "city_name": "Vĩnh Phúc"},
                                {"city_id": "48684", "city_name": "Bắc Ninh"},
                                {"city_id": "48685", "city_name": "Hưng Yên"},
                                {"city_id": "48686", "city_name": "Hải Dương"},
                                {"city_id": "48687", "city_name": "Thái Bình"},
                                {"city_id": "48688", "city_name": "Nam Định"},
                                {"city_id": "48689", "city_name": "Ninh Bình"},
                                {"city_id": "48690", "city_name": "Hà Nam"},
                                {"city_id": "48691", "city_name": "Thanh Hóa"},
                                {"city_id": "48692", "city_name": "Nghệ An"},
                                {"city_id": "48693", "city_name": "Hà Tĩnh"},
                                {"city_id": "48694", "city_name": "Quảng Bình"},
                                {"city_id": "48695", "city_name": "Quảng Trị"},
                                {"city_id": "48696", "city_name": "Thừa Thiên Huế"},
                                {"city_id": "48697", "city_name": "Tp. Đà Nẵng"},
                                {"city_id": "48698", "city_name": "Quảng Nam"},
                                {"city_id": "48699", "city_name": "Quảng Ngãi"},
                                {"city_id": "48700", "city_name": "Bình Định"},
                                {"city_id": "48701", "city_name": "Phú Yên"},
                                {"city_id": "48702", "city_name": "Khánh Hòa"},
                                {"city_id": "48703", "city_name": "Ninh Thuận"},
                                {"city_id": "48704", "city_name": "Bình Thuận"},
                                {"city_id": "48705", "city_name": "Kon Tum"},
                                {"city_id": "48706", "city_name": "Gia Lai"},
                                {"city_id": "48707", "city_name": "Đắk Lắk"},
                                {"city_id": "48708", "city_name": "Đắk Nông"},
                                {"city_id": "48709", "city_name": "Lâm Đồng"},
                                {"city_id": "48710", "city_name": "TP. Hồ Chí Minh"},
                                {"city_id": "48711", "city_name": "Đồng Nai"},
                                {"city_id": "48712", "city_name": "Bà Rịa-Vũng Tàu"},
                                {"city_id": "48713", "city_name": "Bình Dương"},
                                {"city_id": "48714", "city_name": "Bình Phước"},
                                {"city_id": "48715", "city_name": "Tây Ninh"},
                                {"city_id": "48716", "city_name": "Tp. Cần Thơ"},
                                {"city_id": "48717", "city_name": "Long An"},
                                {"city_id": "48718", "city_name": "Tiền Giang"},
                                {"city_id": "48719", "city_name": "Bến Tre"},
                                {"city_id": "48720", "city_name": "Vĩnh Long"},
                                {"city_id": "48721", "city_name": "Trà Vinh"},
                                {"city_id": "48722", "city_name": "Đồng Tháp"},
                                {"city_id": "48723", "city_name": "An Giang"},
                                {"city_id": "48724", "city_name": "Kiên Giang"},
                                {"city_id": "48725", "city_name": "Hậu Giang"},
                                {"city_id": "48726", "city_name": "Sóc Trăng"},
                                {"city_id": "48727", "city_name": "Bạc Liêu"},
                                {"city_id": "48728", "city_name": "Cà Mau"}
                                ]

                              
                        const city = tmp.find(city => city.city_id === data);
                       
                        return city ? city.city_name : "";
                    }, 
                
                
                
                },

                {
                    // "status" column with custom rendering
                    data: 'status',
                    name: 'status',
                    render: function (data) {
                        var statusText = data === 0 ? 'Chưa phản hồi' : 'Đã phản hồi';
                        var colorClass = data === 0 ? 'text-danger ' : 'text-success ';
                        return '<span class="' + colorClass + '">' + statusText + '</span>';
                    }, 
                },


                {
                    data: 'created_at', name: 'created_at',
                
                    render: function (data) {
                        var date = new Date(data);
                
                    // Format the date as dd/mm/yy
                        var day = date.getDate().toString().padStart(2, '0');
                        var month = (date.getMonth() + 1).toString().padStart(2, '0');
                        var year = date.getFullYear().toString();

                        return day + '/' + month + '/' + year;
                    }, 
                
                },
                {data: 'updated_at',name: 'updated_at'
                    ,render: function (data) {
                        var date = new Date(data);
                
                    // Format the date as dd/mm/yy
                        var day = date.getDate().toString().padStart(2, '0');
                        var month = (date.getMonth() + 1).toString().padStart(2, '0');
                        var year = date.getFullYear().toString();

                        return day + '/' + month + '/' + year;
                    }, 
                },
                
            ]
        });
        $('#banner-search-form').on('submit', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#banner-search-form #id').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
        $('#banner-search-form #priorities').on('keyup', function (e) {
            oTable.draw();
            e.preventDefault();
        });
    });

    // function delete_bannerjob(id) {
    //     if (confirm('Are you sure! you want to delete? All content pages will be deleted too.')) {
    //         $.post("{{ route('admin.advertisementBannerJob.delete') }}", {id: id, _method: 'POST', _token: '{{ csrf_token() }}'})
    //                 .done(function (response) {
    //                     if (response == '1')
    //                     {
    //                         var table = $('#customer_datatable_ajax').DataTable({
    //                             "language": { // language settings
    //                                 // metronic spesific
    //                                 "metronicGroupActions": "_TOTAL_ bản ghi được chọn:  ",
    //                                 "metronicAjaxRequestGeneralError": "Không thể hoàn thành yêu cầu, xin check kết nối mạng",

    //                                 // data tables spesific
    //                                 "lengthMenu": "<span class='seperator'></span>Xem _MENU_ bản ghi",
    //                                 "info": "<span class='seperator'></span>Tìm thấy tổng số _TOTAL_ bản ghi",
    //                                 "infoEmpty": "Không có bản ghì nào để hiển thị/ No records found to show",
    //                                 "emptyTable": "Không có dữ liệu trong bảng/ No data available in table",
    //                                 "zeroRecords": "Không có bản ghi nào khớp/ No matching records found",
    //                                 "paginate": {
    //                                     "previous": "Trước/Prev",
    //                                     "next": "Tiếp/Next",
    //                                     "last": "Cuối/Last",
    //                                     "first": "Đầu/First",
    //                                     "page": "Trang/Page",
    //                                     "pageOf": "trong/of"
    //                                 }
    //                             }

    //                         });
    //                         table.row('row' + id).remove().draw(false);
    //                     } else
    //                     {
    //                         alert('Request Failed!');
    //                     }
    //                 });
    //     }
    // }






</script>
@endpush