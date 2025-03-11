<head>
    <base href="{{ env('APP_URL') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INSPINIA | Dashboard v.2</title>

    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/switchery/switchery.css')}}" rel="stylesheet">

    <script src="{{asset('admin/js/jquery-3.1.1.min.js')}}"></script>
    <script type="module">
    import RefreshRuntime from "http://localhost:5173/@react-refresh"
    RefreshRuntime.injectIntoGlobalHook(window)
    window.$RefreshReg$ = () => {}
    window.$RefreshSig$ = () => (type) => type
    window.__vite_plugin_react_preamble_installed__ = true
</script>

</head>