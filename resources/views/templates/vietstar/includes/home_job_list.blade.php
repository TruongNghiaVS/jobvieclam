  <!-- Recruitment News -->
  <section class="recruitment-news section-static">
    <div class="container">
       @include('flash::message')
       <h4 class="section-title text-center mb-3 text-primary">@lang('Featured Jobs')</h4>

        @include('templates.vietstar.includes.featured_jobs')

        <h4 class="section-title text-center mb-3 text-primary"> {{__('New Jobs')}}</h4>
        @include('templates.vietstar.includes.latest_jobs')
    @if(auth::check()==true)
        <h4 class="section-title text-center mb-3 text-primary"> {{__('Suggested Jobs')}}</h4>
        @include('templates.vietstar.includes.suggested_jobs')
    @endif
  </section>
