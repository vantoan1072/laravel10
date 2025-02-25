<div class="row">
        
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>{{config('user.tableHeading')}} </h5>
                        @include('user.component.toolbox')
                    </div>
                    <div class="ibox-content">
                        @include('user.component.filter')
                        @include('user.component.table')
                        
                    </div>
                </div>
            </div>  
            </div>
<!-- <script>
    $(document).ready(function(){   
        var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });
    });
    
</script> -->