@extends('layouts.app')

@section('title', 'تحدي نفسك')

@section('content')
@volt
<link rel="stylesheet" href="{{asset('website/css/festival-section.css')}}" />

<div class="app">

    <img class="top-right" src="{{asset('website/images/column.svg')}}" alt="" />

    <form action="">
        <div class="tab">
          <div class="poll-quesition-container">
            <img class="img-box" src="{{asset('website/images/Path 115.svg')}}" alt="" />

            <div class="end-container">
              <div class="img-end-btn-container">
                <img
                  class="red-small-end-btn"
                  src="../{{asset('website/images/end-red-btn.svg')}}"
                  alt=""
                />

                <h2 style="left: 35%">شاركنا تجربتك</h2>
              </div>
            </div>
          </div>
        </div>
        <!-- ====================== -->
        <div class="tab">
          <div class="poll-quesition-container">
            <img class="img-box" src="{{asset('website/images/Path 115.svg')}}" alt="" />

            <div class="title-container">
              <div class="img-btn-container">
                <img
                  class="red-small-btn"
                  src="../{{asset('website/images/red-small-btn.svg')}}"
                  alt=""
                />

                <h2>شاركنا تجربتك</h2>
              </div>
            </div>

            <div class="questions-container">
              <ul>
                <li>
                  <span>ما مدى رضاك عن مرافق المهرجان ؟</span>
                  <div class="imgs-container">
                    <div class="img-container">
                      <img src="{{asset('website/images/rating/very_suf.svg')}}" alt="" />
                      <span class="very_suf">راضي جدا</span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="{{asset('website/images/rating/suf.svg')}}" alt="" />
                      <span class="suf">راضي </span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="{{asset('website/images/rating/mid.svg')}}" alt="" />
                      <span class="mid">محايد </span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="{{asset('website/images/rating/sad.svg')}}" alt="" />
                      <span class="sad"> مستاء</span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="{{asset('website/images/rating/very_sad.svg')}}" alt="" />
                      <span class="very_sad"> مستاء جدا</span>
                      <input type="radio" />
                    </div>
                  </div>
                </li>

                <li>
                  <span>ما مدى رضاك عن تنظيم الفعالية ؟ </span>
                  <div class="imgs-container">
                    <div class="img-container">
                      <img src="../imges/rating/very_suf.svg" alt="" />
                      <span class="very_suf">راضي جدا</span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/suf.svg" alt="" />
                      <span class="suf">راضي </span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/mid.svg" alt="" />
                      <span class="mid">محايد </span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/sad.svg" alt="" />
                      <span class="sad"> مستاء</span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/very_sad.svg" alt="" />
                      <span class="very_sad"> مستاء جدا</span>
                      <input type="radio" />
                    </div>
                  </div>
                </li>

                <li>
                  <span>ما مدى رضاك عن الفعاليات المقامة ؟ </span>
                  <div class="imgs-container">
                    <div class="img-container">
                      <img src="../imges/rating/very_suf.svg" alt="" />
                      <span class="very_suf">راضي جدا</span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/suf.svg" alt="" />
                      <span class="suf">راضي </span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/mid.svg" alt="" />
                      <span class="mid">محايد </span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/sad.svg" alt="" />
                      <span class="sad"> مستاء</span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/very_sad.svg" alt="" />
                      <span class="very_sad"> مستاء جدا</span>
                      <input type="radio" />
                    </div>
                  </div>
                </li>

                <li>
                  <span>ما مدى رضاك عن سهولة الوصول للمهرجان ؟</span>
                  <div class="imgs-container">
                    <div class="img-container">
                      <img src="../imges/rating/very_suf.svg" alt="" />
                      <span class="very_suf">راضي جدا</span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/suf.svg" alt="" />
                      <span class="suf">راضي </span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/mid.svg" alt="" />
                      <span class="mid">محايد </span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/sad.svg" alt="" />
                      <span class="sad"> مستاء</span>
                      <input type="radio" />
                    </div>
                    <div class="img-container">
                      <img src="../imges/rating/very_sad.svg" alt="" />
                      <span class="very_sad"> مستاء جدا</span>
                      <input type="radio" />
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- ===================================================== -->

        <div class="tab">
          <div class="personal-info-container">
            <img
              class="personal-info-img"
              src="../imges/personal-info.svg"
              alt=""
            />
            <input type="text" />
            <input type="number" />
            <input type="email" />
          </div>
        </div>
        <!-- ========================== -->
        <div class="tab successTab">
          <div class="poll-quesition-container">
            <img class="img-box" src="../imges/Path 115.svg" alt="" />

            <div class="end-container">
              <div class="img-end-btn-container">
                <img
                  class="red-small-end-btn"
                  src="../imges/end-red-btn.svg"
                  alt=""
                />

                <h2>تم ارسال البيانات</h2>
              </div>
            </div>
          </div>
        </div>

        <!-- ========================== -->

        <div class="rating-footer">
          <div class="d-flex justify-content-evenly" id="btnsContainer">
            <div class="img-btn mt-3"
            id="nextBtnContainer"
            >
              <img src="../imges/start-btn.svg" alt="" />
              <button
                type="button"
                onclick="nextPrev(1)"
                id="nextBtn"
                class="button-form"
              >
                التالي
              </button>
            </div>
            <div class="img-btn mt-3" id="prevBtn">
              <img src="../imges/start-btn.svg" alt="" />
              <button type="button" onclick="nextPrev(-1)" class="button-form">
                السابق
              </button>
            </div>
          </div>
          <div style="text-align: center; margin-top: 40px">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
          </div>
        </div>
      </form>

          <!-- footer -->
    <div class="styling-footer">
        <img class="right-footer" src="{{asset('website/images/Group 33.svg')}}" alt="" />
        <img class="left-footer" src="{{asset('website/images/Group 33.svg')}}" alt="" />
      </div>

    <script src="{{asset('website/js/survey.js')}}"></script>
</div>
@endvolt
@endsection
