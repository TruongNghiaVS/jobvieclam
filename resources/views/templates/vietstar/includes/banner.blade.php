<section class="banner cb-section cb-section-border-bottom">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="item">
                    <a href="http://localhost:8000/" id="bannerSide">
                        
                    </a>
                </div>
            </div>
            </row>
        </div>
</section>



@push('scripts')
<script type="text/javascript">
    
        $(document).ready(function() {
            // Set your API endpoint
            const apiUrl = `{{ route('admin.advertisementBanner.getAll')}}`;

            // Make the API request
            $.ajax({
                url: apiUrl,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Handle the data from the API
                    if(data) {
                        data.forEach(element => {
                          
                            if (element.postion == '1') {
                                $("#bannerSide").append(`
                                    <img src="{{url('/')}}/admin_assets/${element.linkDesktop}" alt="banner">
                                `)
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error('Error:', error);
                }
            });
        });
   
</script>
@endpush