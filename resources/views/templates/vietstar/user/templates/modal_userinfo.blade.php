<div class="modal fade" id="user_profile_modal" tabindex="-1" role="dialog" aria-labelledby="user_profile_modal_Label" aria-hidden="true">
    <div class="modal-dialog modal-user-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="user_profile_modal_Label">Hồ Sơ Công Khai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <section class="main-content public-profile my-1" id="main-content ">
                    <div class="card card-bio mb-4 w-100 shadow-sm" bis_skin_checked="1">
                        <div class="row g-0" bis_skin_checked="1">
                            <div class="col-md-2" bis_skin_checked="1">
                                <div class="img-avatar__wrapper">
                                    @if(Auth::user())
                                    {{Auth::user()->printUserImage()}}
                                    @else
                                    <img id="avatar" class="" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Avatar">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10" bis_skin_checked="1">
                                <div class="card-body card-body-profile-seeker" bis_skin_checked="1">
                                    <h5 class="card-title text-sub-color">{{auth()->user()->name}}</h5>
                                    <p class="card-text justify-content-between align-items-center">
                                        {{ auth()->user()->getProfileSummary('summary') }}
                                    </p>

                                </div>

                                <div class="card-body contact-bio" bis_skin_checked="1">
                                    <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-location"></i>{{Auth::user()->getLocation()}}</span>
                                    <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-phone-call"></i>{{auth()->user()->phone}}</span>
                                    <span class="contact-bio-info me-4 mb-2"><i class="iconmoon icon-recruiter-email"></i>{{auth()->user()->email}}</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row" bis_skin_checked="1">
                        <div class="col-md-8" bis_skin_checked="1">
                            <div class="summary-card row mx-0" bis_skin_checked="1">
                                <div class="col-md-4 mb-4 d-flex gap-16" bis_skin_checked="1">
                                    <div class="summary-card__item-icon" bis_skin_checked="1">
                                        <div class="icon-gender icon-size-30" bis_skin_checked="1"></div>
                                    </div>
                                    <div class="summary-card__item-content" bis_skin_checked="1">
                                        <p>{{__('Gender')}}</p>
                                        <strong>Nam</strong>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex gap-16" bis_skin_checked="1">
                                    <div class="summary-card__item-icon" bis_skin_checked="1">
                                        <div class="icon-birthday-cake icon-size-30" bis_skin_checked="1"></div>
                                    </div>
                                    <div class="summary-card__item-content" bis_skin_checked="1">
                                        <p>{{__('Age')}}</p>
                                        <strong>20</strong>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex gap-16" bis_skin_checked="1">
                                    <div class="summary-card__item-icon" bis_skin_checked="1">
                                        <div class="icon-wedding-rings icon-size-30" bis_skin_checked="1"></div>
                                    </div>
                                    <div class="summary-card__item-content" bis_skin_checked="1">
                                        <p>{{__('Marital Status')}}</p>
                                        <strong>Độc thân</strong>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex gap-16" bis_skin_checked="1">
                                    <div class="summary-card__item-icon" bis_skin_checked="1">
                                        <div class="icon-suicase icon-size-30" bis_skin_checked="1"></div>
                                    </div>
                                    <div class="summary-card__item-content" bis_skin_checked="1">
                                        <p>Kinh nghiệm</p>
                                        <strong>1 năm</strong>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex gap-16" bis_skin_checked="1">
                                    <div class="summary-card__item-icon" bis_skin_checked="1">
                                        <div class="icon-salary icon-size-30" bis_skin_checked="1"></div>
                                    </div>
                                    <div class="summary-card__item-content" bis_skin_checked="1">
                                        <p>Lương hiện tại</p>
                                        <strong>0 </strong>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4 d-flex gap-16" bis_skin_checked="1">
                                    <div class="summary-card__item-icon" bis_skin_checked="1">
                                        <div class="icon-salary icon-size-30" bis_skin_checked="1"></div>
                                    </div>
                                    <div class="summary-card__item-content" bis_skin_checked="1">
                                        <p>Lương mong muốn</p>
                                        <strong>0 </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5">
                                <h6 class="mb-4">{{__('Experience')}}</h6>
                                <div class="" id="experience_div"></div>
                            </div>
                        </div>
                        <div class="col-md-4" bis_skin_checked="1">
                            <div class="mb-5" bis_skin_checked="1">
                                <h6>Trình độ học vấn</h6>
                                @foreach(auth()->user()->profileEducation as $education)
                                <div class="form-card mb-3">
                                    <h6 class="my-0">{{$education->degree_title}}</h6>
                                    @php
                                    $degree_type = ($education->Industries) ? ' | '.$education->Industries->industry : '';
                                    @endphp
                                    <p class="text-blue-color mb-2">{{$education->date_completion}} | {{$education->institution . $degree_type}}</p>
                                    <h6 class="my-0">{{$education->degree}}</h6>
                                    <p>{{$education->school}}</p>
                                </div>
                                @endforeach
                            </div>

                            <div class="mb-5" bis_skin_checked="1">
                                @php($jobSkills=\App\JobSkill::where('lang',\App::getLocale())->pluck('job_skill','job_skill_id'))
                                @php($jobExperiences = \App\JobExperience::where('lang', \App::getLocale())->pluck('job_experience','job_experience_id'))
                                <h6>{{__('Skills')}}</h6>
                                @foreach(auth()->user()->profileSkills as $skill)
                                <div class="form-card d-flex justify-content-between mb-3">
                                    <p class="text-blue-color mb-2">{{ $jobSkills[$skill->job_skill_id] ?? ''}}</p>
                                    <p>{{$jobExperiences[$skill->job_experience_id] ?? ''}} {{$skill->job_experience_id}}/5</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="mb-5" bis_skin_checked="1">
                                @php($jobLanguages = \App\Language::all()->pluck('lang','id'))
                                @php($jobLanguageLevels = \App\LanguageLevel::all()->pluck('language_level','language_level_id'))
                                <h6>{{__('Languages')}}</h6>
                                @foreach(auth()->user()->profileLanguages as $language)
                                <div class="form-card d-flex justify-content-between mb-3">
                                    <p class="text-blue-color mb-2"> {{$jobLanguages[$language->language_id]?? ''}}</p>
                                    <p>{{$jobLanguageLevels[$language->language_level_id] ?? ''}}</p>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a class="btn-view-more" href="{{ route('view.public.profile', Auth::user()->id ) }}" target="_blank" rel="noopener noreferrer">Xem thêm</a>
                    </div>
                </section>

            </div>
        </div>
    </div>
</div>
@push('styles')
<style type="text/css">
    .modal-dialog.modal-user-dialog {
        max-width: 80%;
        height: 90vh;
    }
</style>
@endpush