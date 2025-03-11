<table class="table table-striped"> 
                            <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="input-checkbox" id="check_all">
                                </th>
                                <th style="width: 90p";> Họ Tên:</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Chức vụ</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                            @if(isset($Employees) && is_object($Employees))
                            @foreach($Employees as $Employee)
                            <tr>
                                <td>
                                    <input type="checkbox" class="input-checkbox" id="">
                                </td>
                                <td>
                                    <div class="infor-item-email">{{$Employee->first_name.$Employee->last_name}}</div>
                                </td>
                                <td>                               
                                <div class="infor-item-email">{{$Employee->email}} </div>
                                </td>
                                <td>
                                <div class="infor-item-phone">{{$Employee->phone}} </div>
                                </td>
                                <td>
                                <div class="infor-item-">{{$Employee->position_id}} </div>
                                </td>
                                <td>
                                    <input type="checkbox" class="js-switch" checked />
                                </td>
                                <td>

                                    <a href="{{ route('user.edit', ['id' => $Employee->id]) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i> Sửa
                                    </a>
                                    <a href="{{route('user.delete',['id' => $Employee->id])}}" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Xóa
                                    </a>
                               
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{
                            $Employees->links('pagination::bootstrap-4')
                        }}


                        <script>
    // $(document).ready(function(){   
    //     var elem = document.querySelector('.js-switch');
    //         var switchery = new Switchery(elem, { color: '#1AB394' });
    // });
    $(document).ready(function(){   
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(elem) {
            var switchery = new Switchery(elem, { color: '#1AB394' });
        });
    });
</script>