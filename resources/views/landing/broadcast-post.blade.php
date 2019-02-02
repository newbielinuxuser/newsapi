<div class="single-blog-post featured-post mb-30">
	<div class="post-thumb">
		<a href="{{ $objArticle->url }}" target="_blank"><img src="{{ $objArticle->urlToImage }}" alt=""></a>
	</div>
	<div class="post-data">
		<a href="#" class="post-catagory">{{ $objArticle->category }}</a>
		<a href="{{ $objArticle->url }}" target="_blank" class="post-title">
			<h6>{{ $objArticle->title }}</h6>
		</a>
		<div class="post-meta">
		@if(isset($objArticle->author))
			<p class="post-author">By <a href="#">{{ $objArticle->author }} - {{ $objArticle->source_name }}</a></p>
		@endif
			<p class="post-excerp">{{ $objArticle->description }} </p>
			<p>Date Posted : {{ $objArticle->publishedAt }} </p>
			<!-- Post Like & Post Comment -->
<!-- 			<div class="d-flex align-items-center">
				<a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
				<a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
			</div> -->
		</div>
	</div>
</div>
