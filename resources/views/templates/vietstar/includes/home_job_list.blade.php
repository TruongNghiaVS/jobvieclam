  <!-- Recruitment News -->
  <section class="recruitment-news section-static">
      <div class="container">
          @include('flash::message')
          <div class="tab tab-nav">
              <h4 class="tablinks section-title text-center  text-primary active"
                  onclick="openTab(event, 'Featured_Jobs')">
                  @lang('Featured Jobs')
              </h4>
              <h4 class="tablinks section-title text-center  " onclick="openTab(event, 'New_Jobs')">
                  {{__('New Jobs')}}
              </h4>
              @if(auth::check()==true)
              <h4 class="tablinks section-title text-center " onclick="openTab(event, 'suggestionJob')">
                  {{__('Suggested Jobs')}}
              </h4>
              @endif

          </div>

          <div id="Featured_Jobs" class="tabcontent active">
              @include('templates.vietstar.includes.featured_jobs')
          </div>
          <div id="New_Jobs" class="tabcontent">
              @include('templates.vietstar.includes.latest_jobs')
          </div>

          @if(auth::check()==true)
          <div id="suggestionJob" class="tabcontent">
              @include('templates.vietstar.includes.suggested_jobs')
          </div>
          @endif

  </section>