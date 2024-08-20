@extends('layouts.frontend.ucicKarir.ucic_karir')

@section('title', 'Collegetivity — Aplikasi yang Membantu Dunia Perkuliahanmu!')
@section('content')


<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('frontend/assets/images/news_background.jpg')}})"></div>
		</div>
		<div class="home_content">
			<h1>PT Teleperfomance</h1>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- News Post Column -->

				<div class="col-lg-8">
					
					<div class="news_post_container">
						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<img src="{{url('frontend/assets/images/loker_post.jpeg')}}" alt="https://unsplash.com/@dsmacinnes">
							</div>
						</div>
						<br>
						<div class="news_post">
							<div class="news_post_image">
								<img src="{{url('frontend/assets/images/loker_post1.jpeg')}}" alt="https://unsplash.com/@dsmacinnes">
							</div>
						</div>
						<br>
						<div class="news_post">
							<div class="news_post_image">
								<img src="{{url('frontend/assets/images/loker_post2.jpeg')}}" alt="https://unsplash.com/@dsmacinnes">
							</div>
						</div>
						<br>
						<div class="news_post">
							<div class="news_post_image">
								<img src="{{url('frontend/assets/images/loker_post3.jpeg')}}" alt="https://unsplash.com/@dsmacinnes">
							</div>
						</div>

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

				
			</div>
		</div>
	</div>


@endsection