@include('backend.templates.header')



<div class="main-content side-content pt-0">
    <div class="container-fluid">
        <div class="inner-body">

            <!-- Page Header -->
            <div class="page-header">
                <div>
                    <h2 class="main-content-title tx-24 mg-b-5">Enquiry Details</h2>
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="{{ route('contact.all') }}">Enquiry</a></li> -->
                        <!-- <li class="breadcrumb-item active" aria-current="page">View</li> -->
                    </ol>
                </div>

                <a href="{{ route('contact.all') }}">
                    <button class="btn ripple btn-main-primary" style="background-color: #25233c;">Back</button>
                </a>

            </div>

            <div class="row row-sm">
                <div class="col-lg-12 col-md-12">
                    <div class="card custom-card">
                        <div class="card-body">

                        <form action="{{ route('contact.update', [ 'id'=> $contact->id ]) }}"  method="POST">
                        @csrf

                            <div class="main-content-title tx-24 mg-b-5">
                                <h6 class="main-content-label mb-1"> Enquiry Details </h6>
                            </div>
                            <br>
                            <hr>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Name <span
                                            style="padding-left:88px;">:</span></label>
                                </div>

                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    {{ $contact->name }}
                                </div>

                            </div>


                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Email <span
                                            style="padding-left:89px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $contact->email }}
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Phone <span
                                            style="padding-left:83px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $contact->phone }}
                                </div>
                            </div>

                            @if ( $contact->subject != null)
                                <div class="row row-xs align-items-center mg-b-20">
                                    <div class="col-md-4">
                                        <label class="mg-b-0" style="font-weight:500;">Subject <span
                                                style="padding-left:77px;">:</span></label>
                                    </div>
                                    <div class="col-md-8 mg-t-5 mg-md-t-0">

                                        {{ $contact->subject }}
                                    </div>
                                </div>

                            @endif

                           @if($contact->message != null)
                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Message <span
                                            style="padding-left:66px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">

                                    {{ $contact->message }}
                                </div>
                            </div>
                           @endif


                           @php

                           $followup = $contact->followup;
                           $show_followup = $contact->show_followup;

                           if($followup==1) $str = "checked";
                           else $str = "";

                           if($show_followup==1) $str1 = "checked";
                           else $str1 = "";

                           @endphp

                           <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Add follow-up <span style="padding-left:36px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="checkbox" name="followup" value="1" {{ $str }}>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-4">
                                    <label class="mg-b-0" style="font-weight:500;">Show in web <span style="padding-left:28px;">:</span></label>
                                </div>
                                <div class="col-md-8 mg-t-5 mg-md-t-0">
                                    <input type="checkbox" name="show_followup" value="1" {{ $str1 }}>
                                </div>
                            </div>
                            <br><hr>

                            <div class="form-group row justify-content-end mb-0">
                                <div class="col-md-8 pl-md-2">
                                    <button type="submit" class="btn ripple btn-primary pd-x-30 mg-r-5" style="background-color: #006677;">Submit</button>
                                </div>
                            </div>

                       </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
    </div>
</div>


@include('backend.templates.footer')
