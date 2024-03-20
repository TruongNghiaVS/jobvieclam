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
                    @if($infoJob->status =="6")
                        <td class="table_value status-apply reject" status="Từ chối">
                            Từ chối
                        </td>
                    @elseif($infoJob->status =="1")
                            <td class="table_value status-apply accept" status="CV tiếp nhận">
                                    CV tiếp nhận
                            </td>     
                        @elseif($infoJob->status =="2")
                            <td class="table_value status-apply accept" status="CV tiếp nhận">
                                Phù hợp
                            </td>    
                        @elseif($infoJob->status =="3")
                            <td class="table_value status-apply accept" status="CV tiếp nhận">
                                Hẹn phỏng vấn
                            </td> 
                        @elseif($infoJob->status =="4")
                            <td class="table_value status-apply accept" status="CV tiếp nhận">
                                Gửi đề nghị
                            </td> 
                        @elseif($infoJob->status =="5")
                            Nhận việc
                            <td class="table_value status-apply accept" status="CV tiếp nhận">
                               Nhận việc
                        </td> 
                    @endif
                   
                        
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
