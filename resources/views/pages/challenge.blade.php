<?php
 
use function Laravel\Folio\name;
 
name('challenge.index');

?>

@extends('layouts.app')

@section('title', 'تحدي نفسك')

@section('content')
@volt
<link rel="stylesheet" href="{{asset('website/css/festival-section.css')}}" />

<div class="app">
    
    <img class="top-right" src="{{asset('website/images/column.svg')}}" alt="" />
   
    <form action="">
        <div class="tab question-container">
            <div class="img-btn">
            <img class="red-bg-title" src="{{asset('website/images/column.svg')}}" alt="" />

            <h2>في أي قسم من المهرجان يمكنك مشاركة قصيدتك؟</h2>

            </div>
            <ul>
            <li><input type="checkbox" /> أ- جناح القصص المصورة</li>
            <li><input type="checkbox" /> ب ـ مساحة الشعر والموسيقى</li>
            <li><input type="checkbox" /> ج ـ منطقة الأطفال</li>
            <li><input type="checkbox" /> د ـ قصائد بين الطرق</li>
            </ul>
        </div>

        <div class="tab question-container">
            <div class="img-btn">
            <img class="red-bg-title" src="{{asset('website/images/column.svg')}}" alt="" />

            <h2>في أي قسم من المهرجان يمكنك مشاركة قصيدتك؟</h2>

            </div>
            <ul>
            <li><input type="checkbox" /> أ- جناح القصص المصورة</li>
            <li><input type="checkbox" /> ب ـ مساحة الشعر والموسيقى</li>
            <li><input type="checkbox" /> ج ـ منطقة الأطفال</li>
            <li><input type="checkbox" /> د ـ قصائد بين الطرق</li>
            </ul>
        </div>

        <div class="d-flex justify-content-evenly">
            <div class="img-btn mt-3">
              <img src="../imges/red-small-btn.svg" alt="" style="width: 260px;"/>
              <button type="button" onclick="nextPrev(1)" id="nextBtn" class="button-form">
                التالي
              </button>
            </div>
            <div class="img-btn mt-3" id="prevBtn">
              <img src="../imges/red-small-btn.svg" alt="" style="width: 260px;"/>
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
          
    </form>

    <script src="{{asset('website/js/challenge-yourself.js')}}"></script>

</div>
@endvolt
@endsection