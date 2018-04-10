<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,user-scalable=no,minimal-ui">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="m.jd.com">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Pragma" content="no-cache">
    <meta name="full-screen" content="yes">
    <meta name="browsermode" content="application">
    <meta name="x5-fullscreen" content="true">
    <meta name="x5-page-mode" content="app">
    <meta name="description" content=""/>
    <meta name="Keywords" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '首页') - 澳新选校宝</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
    @yield('content')
</body>
</html>