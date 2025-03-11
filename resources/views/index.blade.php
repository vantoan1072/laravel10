<!DOCTYPE html>
<html lang="en">
<head>
<script type="module">
  import RefreshRuntime from "http://localhost:5173/@react-refresh"
  RefreshRuntime.injectIntoGlobalHook(window)
  window.$RefreshReg$ = () => {}
  window.$RefreshSig$ = () => (type) => type
  window.__vite_plugin_react_preamble_installed__ = true
</script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel + Vite + React</title>
    @vite('resources/js/app.jsx')
</head>
<body>
    <h1>Hello from Blade!</h1>
    <div id="app"></div>
</body>
</html>
