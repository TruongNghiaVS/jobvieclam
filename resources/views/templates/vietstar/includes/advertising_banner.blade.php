<section class="advertising-banner cb-section cb-section-border-bottom">
    <div class="container">
        <div class="row p-4" id="listbannerSide">
            
        </div>
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
                            
                            if (element.postion.startsWith('2.')) {
                                
                                $("#listbannerSide").append(`
                                    <div class="col-lg col-sm-12 col-md-12">
                                        <div class="item" id="banner-${element.id}">
                                            <div class="image loadAds">
                                                <a href="#">
                                                <img src="{{url('/')}}/admin_assets/${element.linkDesktop}" alt="ads">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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