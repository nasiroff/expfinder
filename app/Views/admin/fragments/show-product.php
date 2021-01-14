<div class="content">

    <!-- Main charts -->
    <div class="row">
        <div class="col-md-12">
            <div class="card-body">
                <form action="#">

                    <div class="form-group row">
                        <label class="col-form-label col-lg-2">Əlavə edən</label>
                        <div class="col-lg-10">
                            <input type="text"class="form-control" disabled value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Your state:</label>
                        <div class="col-lg-10">
                            <select class="form-control form-control-select2" required data-fouc>
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="KY">Kentucky</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Başlıq:</label>
                        <div class="col-lg-10">
                            <input type="text" required class="form-control" value="<?=$product->title?>" placeholder="Başlıq">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Təsvir:</label>
                        <div class="col-lg-10">
                                    <textarea rows="5" cols="5" class="form-control"
                                              placeholder="Məhsulun təsviri"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Qiymət:</label>
                        <div class="col-lg-10">
                            <input type="number" min="0" required step=".01" class="form-control"
                                   placeholder="Qiymət">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label font-weight-semibold">Single file upload:</label>
                        <div class="col-lg-10">
                            <input type="file" class="file-input" data-fouc>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
