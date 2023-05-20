@extends('front.layouts.master')
@section('content')
    
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section class="inner-pages contact">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-8">
            <div class="section-title">
              <h2 class="course-title change-text-color2">{{!empty($courses->title) ? $courses->title : ''}} Course</h2>
            </div>
          </div>
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="info">
              <div class="price-detail">
                <select class="form-select" name="course_type" id="change_course">
                  <option value="full">Full Course</option>
                  <option value="half">Half Course</option>
                </select>
                <p id="course_price">Total Price: <strong>{{$courses->price}}</strong></p>
                <input type="hidden" name="course_id" id="course_id" value="{{$courses->id}}">
                @if(Auth::check())
                  <a href="javascript:void(0);" class="btn-learn-more fleft learnmore-btn book_a_demo" style="line-height:55px">Book A Demo</a>
                @else 
                  <a href="{{url('booking/'.$courses->id)}}" class="btn-learn-more fleft learnmore-btn book_a_demo" style="line-height:55px">Book A Demo</a>
                @endif
                <a href="{{route('Buy.Course',$courses->id)}}" class="btn btn-warning fright">Buy Course</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Frequently Asked Questions Section -->
    
    <!-- <section class="inner-pages contact">
      <div class="container" data-aos="fade-up">
        <div class="row">
           <div class="col-lg-4 d-flex align-items-stretch">
            <div class="info">
              <div class="price-detail">
                <p>Classes: <strong>1-6 </strong></p>
                <p> Price: <strong>$9000 </strong></p>
                <a href="#" class="btn-learn-more fleft learnmore-btn" style="line-height:55px">Book A Demo</a>
                <a href="#" class="btn btn-warning fright">Buy Course</a>
              </div>
            </div>
            
          </div>
          
        </div>
      </div>
    </section> -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-xl-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box course-about change-border-color2">
              <h4><a href="javascript:void(0);" class="change-text-color3">About the course</a></h4>
              <p>{{ strlen(strip_tags($courses->description) < 100 ) ? substr(strip_tags($courses->description), 0, 1000).' ...' : strip_tags($courses->description)}}</p>
              <br>
              <div class="col-xl-3 col-md-6 fleft">
                <div class="course-about-icon">
                  <p>Age Group: <strong>{{!empty($courses->age) ? $courses->age : ''}}</strong></p>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 fleft">
                <div class="course-about-icon">
                  <p>Batch size: <strong>{{!empty($courses->batch) ? $courses->batch : ''}}</strong></p>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 fleft">
                <div class="course-about-icon">
                  <p><strong>{{!empty($courses->hrs_training) ? $courses->hrs_training : ''}} Hrs of training</strong></p>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 fleft">
                <div class="course-about-icon">
                  <p><strong>Practice and analysis sessions</strong></p>
                </div>
              </div>
              <br><br>
              <div class="col-xl-3 col-md-6 fleft">
                <div class="course-about-icon">
                  <p>Format: <strong> {{!empty($courses->format) ? $courses->format : ''}}</strong></p>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 fleft">
                <div class="course-about-icon">
                  <p>Duration: <strong>
                    {{!empty($courses->duration) ? $courses->duration : ''}} hr/ session</strong></p>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 fleft">
                <div class="course-about-icon">
                  <p><strong>8 Test & review sessions</strong></p>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 fleft">
                <div class="course-about-icon">
                  <p><strong>Lifetime access to Grandmaster curated content</strong></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="clear-both"><br></div>
      </div>
    </section><!-- End Services Section -->
        
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2 class="change-text-color2">Curriculum</h2>
        </div>

        <div class="row">
          @if(!empty($curriculum))
        @foreach($curriculum as $data)
          <div class="col-xl-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box change-background-color1">
              <h4><a href="javascript:void(0);" class="change-text-color1">{{$data->title}}</a></h4>
              <p>{{$data->description}}</p>
            </div>
          </div>
          @endforeach
         
          @else
          <p> Course Curriculum Data Not Found</p>
          @endif
          
          <div class="clear-both"><br></div>
        </div>
        
        
        
       
        
      </div>
    </section><!-- End Services Section -->

    @endsection

@section('customscript')
<script>
  jQuery(document).on('click', '.book_a_demo', function(){
    alert('hello testing');
    let courseId = jQuery('#course_id').val();
    jQuery.ajax({
      type:'post',
      url: '/book_a_demo',
      data:{'course_id':courseId},
      success : function(response){

      },
      complete : function(){

      },
      error: function(){

      }
    });
    
  });

  jQuery(document).on('click', '#change_course', function(){
    let courseType = jQuery(this).val();
    let newPrice = "{{$courses->price}}";
    if(courseType=="full"){
      jQuery('#course_price').html("Total Price: <strong>"+newPrice+"</strong>")
    } else {
      jQuery('#course_price').html("Total Price: <strong>"+newPrice/2+"</strong>")
    }
  })

</script>
@endsection