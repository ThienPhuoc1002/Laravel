<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tin tức</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="style.css">

 
</head>
<body>

	@include('header')
  	<br><br><br><br>
	@include('nav')
	<br><br><br>

<div class="container">
	<div class="row">

	<div class="container" style="width: 75%;float: left;">
		<h1 style="padding-bottom: 18px">Bài viết mới</h1>
		<div class="row row-cols-sm-3">
			@foreach ($news as $new)
			<div class="col" style="padding-bottom: 20px">
				<a class="card p-2" style="color: black; text-decoration: none;height:400px" href="">
					<img src="hinhanh/{{ $new->hinhanh }}" height="200px" width="auto" alt="Pudding xoài dâu tây thơm mát ngày hè">
					<div class="content">
						<h5 class="header" >{{ $new->noidung }}</h5>
						<div class="meta">
							<span class="price"><i class="bi-calendar3"></i>&nbsp;{{ $new->ngay }}</span>
						</div>
						<div class="description">
							<p>{{ $new->chitiet }}</p>
						</div>
					</div>
				</a>	
			</div>
			@endforeach
		</div>
	  </div>
	<div class="container" style="width: 25%; float: right">
		<h2>Tin tức liên quan</h2>
		<hr style="color: yellow ; height:5px">
		<div class="row row-cols-sm-auto">

			@foreach ($news as $new)
				@if ($new->id>=1 && $new->id<=4)
				<div class="col" style="padding-bottom: 20px">
					<a class="card py-2" style="color: black; text-decoration: none;" href="">
						<div class="row g-0">
						<div class="col-md-4">
							<img src="/hinhanh/{{ $new->hinhanh }}" width="100px" height="100px" alt="...">
						</div>
						<div class="col-md-8 px-2">
							<div class="card-body" style="font-size: 14px">
							<p class="card-title"><b>{{ $new->noidung }}</b> </p>
							<p class="card-text"><span class="bi-calendar3">&nbsp;{{ $new->ngay }}</span></p>
							</div>
						</div>
						</div>
					</a>
				</div>
				@endif
			@endforeach
		</div>
	</div>   
	
</div>
</div>
@include('footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/owl.carousel.js"></script>
</body>