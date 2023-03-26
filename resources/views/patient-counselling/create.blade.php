@extends("base")
@section("content")
<!-- Content -->
<div class="row">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
        <span class="text-muted fw-light">Patient/</span>Patient Counselling
    </h4>
    <!-- Website Analytics-->
    <div class="col-lg-12 col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12"><h5 class="card-title mb-0">Counselling</h5></div>
                </div>                
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col"><h5>Patient Name: {{ $file->patient->first_name.' '.$file->patient->last_name }}</h5></div>
                    <div class="col"><h5>Patient ID: {{ $file->patient->id }}</h5></div>
                    <div class="col"><h5>File Number: {{ $file->id }}</h5></div>
                </div>
                
                <div class="col-xl-12">
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">                    
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-profile"
                          aria-controls="navs-justified-profile"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-user me-1"></i> Personal Details
                        </button>
                      </li>
                      @foreach($file->reasons as $key => $reason)
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-{{$reason->reason}}"
                          aria-controls="navs-justified-{{$reason->reason}}"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-file me-1"></i> {{ $reason->reasonname->name }}
                        </button>
                      </li>
                      @endforeach
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-justified-profile" role="tabpanel">                        
                        @include("sections.patient")
                      </div>
                      @foreach($file->reasons as $key => $reason)
                      <div class="tab-pane fade" id="navs-justified-{{$reason->reason}}" role="tabpanel">
                        @switch($reason->reason)
                            @case(27)
                                @include("sections.sud")
                                @break
                            @case(28)
                                @include("sections.mhp")
                                @break
                            @case(29)
                                @include("sections.counselling")
                                @break
                            @case(30)
                                @include("sections.smoking")
                                @break
                            @default
                                @include("sections.other")
                        @endswitch
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--/ Content -->
@endsection