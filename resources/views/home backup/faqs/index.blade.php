@extends('front.layouts.master')
@section('content')    
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq inner-pages">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class=" change-text-color2">Frequently Asked Questions</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="faq-list">
          <ul>
            
            @if(!empty($faqs))
            @foreach($faqs as $faq)
            <li data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-help-circle icon-help change-text-color3"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{$faq->id}}">{{$faq->question}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
              <div id="faq-list-{{$faq->id}}" class="collapse" data-bs-parent=".faq-list">
                <p>
                  {{$faq->answer}}
                </p>
              </div>
            </li> 
            @endforeach
            @else
           
            <p >Frequently Asked Questions Data Not Found</p>
            @endif

          </ul>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

@endsection