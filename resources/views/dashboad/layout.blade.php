<!DOCTYPE html>
<html>

@include('dashboad.component.head')

<body>
    <div id="wrapper">
        @include('dashboad.component.sidebar')
    
        <div id="page-wrapper" class="gray-bg">
        
        @include('dashboad.component.nav')
        
        @include($template)
        
        @include('dashboad.component.footer')
        
    </div>

    @include('dashboad.component.script')
<script>
    if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
    }
</script>
</body>
</html>
