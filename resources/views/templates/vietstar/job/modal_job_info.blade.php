<div class="table-responsive">
        <table class="table table-responsive table-job-info borderless ">
            <tbody>

                <tr>
                    <td class="text-primary">
                        <strong>Vị Trí:</strong>
                    </td>
                    <td class="table_value">
                        <a href="/viec-lam/{{$job->slug}}"> {{$job->title}} </a>
                    </td>
                </tr>

                <tr>
                    <td class="text-primary">
                        <strong>Ngày Ứng Tuyển:</strong>
                    </td>
                    <td class="table_value">
                        {{$infoJob->created_at->format('d/m/Y H:i:s');}}
                    </td>
                </tr>
                <tr>
                    <td class="text-primary">
                        <strong>Trạng thái:</strong>
                    </td>
                    <td class="table_value status-apply accept" status="CV tiếp nhận">
                       
                        @if($infoJob->status =="1")
                                  CV tiếp nhận
                        @elseif($infoJob->status =="2")
                                Phù hợp
                        @elseif($infoJob->status =="3")
                                Hẹn phỏng vấn
                        @elseif($infoJob->status =="4")
                                Gửi đề nghị
                        @elseif($infoJob->status =="5")
                               Nhận việc
                        @elseif($infoJob->status =="6")
                               Từ chối
                        @endif
                        
                    </td>
                </tr>
                @if($noteForJob)
                <tr>
                    <td class="text-primary" >
                        <strong>Phản Hồi Từ NTD:</strong>
                    </td>
                    <td class="table_value ">
                     {{$noteForJob->Noted}}
                    </td>
                </tr>

             
                <tr>
                    <td class="text-primary">
                        <strong>Cập Nhật Lần Cuối:</strong>
                    </td>
                    <td class="table_value">
                    {{$noteForJob->created_at->format('d/m/Y H:i:s');}}
                    </td>
                </tr>

                @endif
               
            </tbody>
        </table>
</div>


@push('styles')
<style>
    .table-job-info .table-job-info_title {
        width: unset !important;
    }
</style>
@endpush
