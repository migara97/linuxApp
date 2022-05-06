@include('template.head')
<body> 
@include('template.navbar')

    @yield('content')	 
	
	@yield('scripts')
</body>

</html>