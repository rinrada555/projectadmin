@extends('layouts.app')

@section('title', 'Edit Promotion')

@section('contents')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h4 class="mb-0">แกไขโปรโมชัน</h4>
                <hr />
                <form action="{{ route('promotions.update', $promotion->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <!-- แก้ชื่อ form ให้ตรงกับชื่อของ columns ใน Database -->
                    <div class="row">
                        <div class="col mb-3">
                            <!-- เพิ่มรูปภาพเดิม -->
                            <div style="display: flex; justify-content: center;">
                                <img src="{{ asset('asset/uploads/promotion/' . $promotion->PromotionImage) }}" alt="Old Image" style="width: 300px; height: auto;">
                            </div>
                            <div class="mb-3">
                                <label for="PromotionImage" class="form-label">รูปภาพใหม่ (ถ้าต้องการเปลี่ยน)</label>
                                <input type="file" class="form-control" id="PromotionImage" name="PromotionImage">
                            </div>
                            <div class="mb-3">
                                <label for="PromotionName" class="form-label">ชื่อโปรโมชัน</label>
                                <input type="text" class="form-control" id="PromotionName" name="PromotionName" value="{{ $promotion->PromotionName }}">
                            </div>
                            <div class="mb-3">
                                <label for="PromotionDetail" class="form-label">รายละเอียดโปรโมชัน</label>
                                <textarea class="form-control" id="PromotionDetail" name="PromotionDetail">{{ $promotion->PromotionDetail }}</textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="PromotionStartDate" class="form-label">วันที่เริ่ม</label>
                                    <input type="date" class="form-control" id="PromotionStartDate" name="PromotionStartDate" value="{{ $promotion->PromotionStartDate }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="PromotionEndDate" class="form-label">วันที่สิ้นสุด</label>
                                    <input type="date" class="form-control" id="PromotionEndDate" name="PromotionEndDate" value="{{ $promotion->PromotionEndDate }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <button class="btn btn-primary">ตกลง</button>
                                </div>
                                <div class="col">
                                    <a href="{{ route('promotions') }}" class="btn btn-danger">ยกเลิก</a>
                                </div>
                            </div>
                </form>
            </div>
        </main>
    </div>
</div>
@endsection