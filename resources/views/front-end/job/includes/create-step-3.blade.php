
<div class="tab-pane fade show" id="Package" role="tabpanel" aria-labelledby="Package-tab">
    <section class="space-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-4">Employee Selection</h5>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6 select-border mb-3">
                    <label class="mb-2">Job Type *</label>
                    <select class="form-control " id="" name="type">
                        <option value="" >-Select One-</option>
                        @foreach($jobTypes as $jobType)
                        <option value="{{$jobType->id}}">{{ucwords($jobType->name)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6 select-border mb-3">
                    <label class="mb-2">Experience *(Years)</label>
                    <input maxlength="31" type="text" class="form-control EnterOnlyNumber" name="experience" id=""/>
                </div>
                <div class="form-group col-md-6 select-border mb-3">
                    <label class="mb-2">Gender *</label>
                    <select class="form-control" id="" name="gender">
                        <option value="">-Select One-</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group col-md-6 select-border mb-md-0 mb-3">
                    <label class="mb-2">Position *</label>
                    <select class="form-control " id="" name="position">
                        <option value="">-Select One-</option>
                        <option value="1">Human Resources</option>
                        <option value="2">Energy</option>
                        <option value="3">IT & Telecoms</option>
                    </select>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label class="mb-2">Enter Salary *</label>
                    <input maxlength="31" type="text" class="form-control EnterOnlyNumber" name="salary" />
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label class="mb-2">Enter Quantity *</label>
                    <input maxlength="31" type="text" class="form-control EnterOnlyNumber" name="quantity" id=""/>
                </div>
                <div class="col-md-12 mt-4">
                    <button class="btn btn-dark" type="button" id="previous">Previous</button>
                    <button class="btn btn-primary" type="submit" id="postJob" >Post Job</button>
                </div>
            </div>
        </div>
    </section>
</div>

