@extends('layouts.frontend.ucicKarir.ucic_karir')

@section('title', 'Collegetivity — Aplikasi yang Membantu Dunia Perkuliahanmu!')
@section('content')


<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('frontend/assets/images/news_background.jpg')}})"></div>
		</div>
		<div class="home_content">
			<h1>Tentang Kami</h1>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-12">
					
					<div class="news_post_container">
						<!-- News Post -->
						<div class="news_post">
							@foreach($data as $a)  
							<!-- <div class="news_post_image">
								<img src="{{url('assets/images/news_1.jpg')}}" alt="https://unsplash.com/@dsmacinnes">
							</div> -->
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div>{{ date('d', strtotime($a->tanggal)) }}</div>
										<div>{{ date('M', strtotime($a->tanggal)) }}</div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<a href="news_post.html">{{ $a->judul }}</a>
									</div>
									
								</div>
							</div>
							<div class="news_post_text">
								{!!html_entity_decode($a->deskripsi)!!}
							</div>
						</div>
						@endforeach
					</div>
					
					<!-- Comments -->
					<!-- <div class="news_post_comments">
						<div class="comments_title">Comments</div>
						<ul class="comments_list">
							
							<li class="comment">
								<div class="comment_container d-flex flex-row">
									<div>
										<div class="comment_image">
											<img src="images/comment_1.jpg" alt="">
										</div>
									</div>
									<div class="comment_content">
										<div class="comment_meta">
											<span class="comment_name"><a href="#">Mark Smith</a></span>
											<span class="comment_separator">|</span>
											<span class="comment_date">Dec 18, 2017</span>
											<span class="comment_separator">|</span>
											<span class="comment_reply_link"><a href="#">Reply</a></span>
										</div>
										<p class="comment_text">Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque. </p>
									</div>
								</div>
							</li>

							<li class="comment">
								<div class="comment_container d-flex flex-row">
									<div>
										<div class="comment_image">
											<img src="images/comment_2.jpg" alt="">
										</div>
									</div>
									<div class="comment_content">
										<div class="comment_meta">
											<span class="comment_name"><a href="#">Mark Smith</a></span>
											<span class="comment_separator">|</span>
											<span class="comment_date">Dec 18, 2017</span>
											<span class="comment_separator">|</span>
											<span class="comment_reply_link"><a href="#">Reply</a></span>
										</div>
										<p class="comment_text">Aliquam rhoncus, purus in vehicula porttitor, lacus ante consequat purus, id elementum enim purus nec enim. In sed odio rhoncus, tristique ipsum id, pharetra neque. </p>
									</div>
								</div>
							</li>

						</ul>

					</div> -->

					<!-- Leave Comment -->

					<!-- <div class="leave_comment">
						<div class="leave_comment_title">Leave a comment</div>

						<div class="leave_comment_form_container">
							<form action="post">
								<input id="comment_form_name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
								<input id="comment_form_email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
								<textarea id="comment_form_message" class="text_field contact_form_message" name="message" placeholder="Message" required="required" data-error="Please, write us a message."></textarea>
								<button id="comment_send_btn" type="submit" class="comment_send_btn trans_200" value="Submit">send message</button>
							</form>
						</div>
					</div> -->

				</div>

				<!-- Sidebar Column -->

				{{-- <div class="col-lg-4">
					<div class="sidebar">

						<!-- Archives -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Archives</h3>
							</div>
							<ul class="sidebar_list">
								<li class="sidebar_list_item"><a href="#">Design Courses</a></li>
								<li class="sidebar_list_item"><a href="#">All you need to know</a></li>
								<li class="sidebar_list_item"><a href="#">Uncategorized</a></li>
								<li class="sidebar_list_item"><a href="#">About Our Departments</a></li>
								<li class="sidebar_list_item"><a href="#">Choose the right course</a></li>
							</ul>
						</div>

						<!-- Latest Posts -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Latest posts</h3>
							</div>

							<div class="latest_posts">
								
								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="{{url('frontend/assets/images/latest_1.jpg')}}" alt="https://unsplash.com/@dsmacinnes">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>

								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="{{url('frontend/assets/images/latest_2.jpg')}}" alt="https://unsplash.com/@erothermel">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>

								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="{{url('frontend/assets/images/latest_3.jpg')}}" alt="https://unsplash.com/@element5digital">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>

							</div>

						</div> --}}

						<!-- Tags -->

						<!-- <div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Tags</h3>
							</div>
							<div class="tags d-flex flex-row flex-wrap">
								<div class="tag"><a href="#">Course</a></div>
								<div class="tag"><a href="#">Design</a></div>
								<div class="tag"><a href="#">FAQ</a></div>
								<div class="tag"><a href="#">Teachers</a></div>
								<div class="tag"><a href="#">School</a></div>
								<div class="tag"><a href="#">Graduate</a></div>
							</div>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>


@endsection