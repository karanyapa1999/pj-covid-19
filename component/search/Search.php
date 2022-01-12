<div class="col-xl-8 order-xl-1">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">การค้นหาผู้สัมผัส (รายชื่อผู้สัมผัสใกล้ชิดในระยะป่วย ระบุลักษณะการสัมผัส ถ้ามีอาการป่วยกรุณาระบุอาการด้วย)</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="#!" class="btn btn-sm btn-primary">ตั่งค่า</a>
                </div>
            </div>
        </div>
        <div class="card-body" id="more2">
            <form>
                <h6 class="heading-small text-muted mb-4">ประวัติส่วนตัว</h6>
                <div class="pl-lg-4 tab_logic" id="tab_logic">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username">ชื่อ-สกุล</label>
                                <input type="text" id="input-username" class="form-control" placeholder="ชื่อ-สกุล">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label" for="input-old">อายุ</label>
                                <input type="number" id="input-old" class="form-control" min="1" max="99" maxlength="2" placeholder="อายุ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <h5>เพศ</h5>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="inlineRadio1" value="men">
                                    <label class="form-check-label" for="men">ชาย</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="inlineRadio2" value="women">
                                    <label class="form-check-label" for="women">หญิง</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">ที่อยู่/เบอร์โทรศัพท์</label>
                                <input type="text" id="input-first-name" class="form-control" placeholder="ที่อยู่/เบอร์โทรศัพท์">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="datemax">วันที่สัมผัส : </label><br>
                                <input type="date" id="datemax" name="datemax" max="2021-12-31">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">ลักษณะการสัมผัส</label>
                                <input type="text" id="input-first-name" class="form-control" placeholder="ลักษณะการสัมผัส">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">ป่วย/ไม่ป่วย (กรณีป่วยระบุวันเริ่มป่วยและอาการ)</label>
                                <input type="text" id="input-first-name" class="form-control" placeholder="ที่อยู่/เบอร์โทรศัพท์">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">การใส่อุปกรณ์ป้องกัน</label>
                                <input type="text" id="input-first-name" class="form-control" placeholder="การใส่อุปกรณ์ป้องกัน">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="datemax">วันที่ได้รับวัคซีนป้องกันโรค COVID-19 ครบตามเกณฑ์ : </label>
                                <input type="date" id="datemax" name="datemax" max="2021-12-31">
                            </div>
                        </div>
                    </div>
                    <hr class="my-4" />
                </div>
                <input type="submit" class="btn btn-outline-primary" name="submit_insert_general" value="บันทึกข้อมูล">
                <input type="button" class="btn btn-outline-primary" id="more_fields" onclick="add_fields();" value="เพิ่มข้อมูล" />
            </form>
        </div>
    </div>
</div>