  <!-- Recruitment News -->
  <section class="recruitment-news section-static">
      <div class="container">
          @include('flash::message')
          <div class="tab tab-nav">
              <h4 class="tablinks section-title text-center mb-3 text-primary active" onclick="openCity(event, 'London')">
                  @lang('Featured Jobs')
              </h4>
              <h4 class="tablinks section-title text-center mb-3 text-primary" onclick="openCity(event, 'Paris')">
                  {{__('New Jobs')}}
              </h4>
          </div>

          <div id="London" class="tabcontent active">
              @include('templates.vietstar.includes.featured_jobs')
          </div>

          <div id="Paris" class="tabcontent">
              @include('templates.vietstar.includes.latest_jobs')
          </div>



          @if(auth::check()==true)
          <h4 class="section-title text-center mb-3 text-primary"> {{__('Suggested Jobs')}}</h4>
          @include('templates.vietstar.includes.suggested_jobs')
          @endif
  </section>