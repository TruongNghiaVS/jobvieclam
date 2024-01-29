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
                                <table class="table table-striped table-bordered table-hover" id="contactinfo_datatable_ajax">
                                    <thead>
                                        <tr role="row" class="filter">
                                            <!-- <td><input type="text" class="form-control" name="id" id="id" autocomplete="on"></td>
                                            <td><input type="text" class="form-control" name="email" id="email" autocomplete="off"></td>
                                            <td><input type="text" class="form-control" name="phoneNumber" id="phoneNumber" autocomplete="off"></td>
                                            
                                            
                                            <td><input type="text" class="form-control" name="status" id="status"></td>
                                            <td><input type="text" class="form-control" name="created_at" id="created_at"></td>
                                            <td><input type="text" class="form-control" name="updated_at" id="updated_at"></td> -->

                                            <td></td>
                                        </tr>
                                        <tr role="row" class="heading">
                                            <th>Id</th>
                                            <th>Tên</th>

                                            <th>Email</th>
                                            <th>Tiêu Đề</th>
                                            <th>Nội dung</th>

                                            <th>Số Điện Thoại</th>
                                            <th>Trạng thái</th>
                                            
                                            <th>Create at</th>
                                            <th>Update at</th>
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
        var oTable = $('#contactinfo_datatable_ajax').DataTable({
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
                url: `{{ route('admin.contactinfo.getAll')}}`,
                dataSrc:"",
                data: function (d) {
                    d.id = $('#contactinfo_datatable_ajax #id').val();
                    d.email = $('#contactinfo_datatable_ajax #email').val();
                    d.phoneNumber = $('#contactinfo_datatable_ajax #phoneNumber').val();
                    d.status = $('#contactinfo_datatable_ajax #status').val() == 1 ? "Hoạt động":"Không hoạt động";
                    d.created_at = $('#contactinfo_datatable_ajax #created_at').val();
                    d.update_at = $('#contactinfo_datatable_ajax #update_at').val();

            
                }
            }, columns: [
                /*{data: 'id_checkbox', name: 'id_checkbox', orderable: false, },*/
                {data: 'id', name: 'id' , },
                {data: 'fullName', name: 'fullName' , },

                {data: 'email', name: 'email'  },
                {data: 'title', name: 'title' },

                {data: 'messages', name: 'messages' },
                {data: 'phoneNumber', name: 'phoneNumber' },

                {
                    // "status" column with custom rendering
                    data: 'status',
                    name: 'status',
                    render: function (data) {
                        var statusText = data === 0 ? 'Không hoạt động' : 'Hoạt động';
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
    //                         var table = $('#contactinfo_datatable_ajax').DataTable({
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