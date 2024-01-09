@extends('layouts.app')
  
@section('title', 'Create Product')
  
@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mb-0">เพิ่มโปรโมชันของคุณ</h1>
                <hr />
                <form action="{{ route('promotions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container mt-5">
                        <h1>Add Promotion</h1>
                        <form action="/promotions" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="PromotionImage" class="form-label">รูปภาพ</label>
                            <input type="file" class="form-control" id="promotionImage" name="PromotionImage">
                        </div>
                        <div class="mb-3">
                            <label for="PromotionName" class="form-label">ชื่อโปรโมชัน</label>
                            <input type="text" class="form-control" id="promotionName" name="PromotionName">
                        </div>
                        <div class="mb-3">
                            <label for="PromotionDetail" class="form-label">รายละเอียดโปรโมชัน</label>
                        <textarea class="form-control" id="promotionDescription" name="PromotionDetail"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="PromotionStartDate" class="form-label">วันที่เริ่ม</label>
                                <input type="date" class="form-control" id="startDate" name="PromotionStartDate">
                            </div>
                            <div class="col-md-6">
                                <label for="PromotionEndDate" class="form-label">วันที่สิ้นสุด</label>
                                <input type="date" class="form-control" id="endDate" name="PromotionEndDate">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">ตกลง</button>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection