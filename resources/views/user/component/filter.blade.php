<div class="filter-wrapper">
                            <div class="perpage">
                                <select name="perpage" class="form-control input-sm perpage filter mr10">
                                    @for($i=20 ;$i<=200;$i++)
                                        <option value="{{$i}}">{{$i}} bản ghi </option>\
                                    @endfor
                                </select>
                                <div class="action">
                                    <div class="uk-search uk-fle uk-flex-middle">
                                        <select name="action" class="form-control input-sm action filter mr10">
                                            <option value="0" selected="selected">chọn nhóm thành viên</option>
                                            <option value="1">Quản trị viên</option>
                                        </select>
                                        <div class="uk-search uk-fle uk-flex-middle mr10">
                                        </div>
                                            <div class="input-group">
                                                <input type="text" class="form-control input-sm" name="keyword" 
                                                value="" 
                                                placeholder="Tìm kiếm">
                                            </div>
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-primary" name="search" value="search" type="button">
                                                tìm kiếm
                                            </button>
                                        </span>
                                        <a href="{{ route('user.form_add') }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-plus"></i> Thêm mới
                                        </a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>