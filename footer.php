<?php
echo '

				<section id="cta">

<h2>Задайте нам вопрос</h2>


						<div class="row uniform 50%">
							<div class="8u 12u(mobilep)" >
						<form method="post" action="/sys/action.php" name="mail">
						<div class="row 50%" style="margin-bottom:25px;">
								<div class="6u 12u(mobile)" style="width:100%; margin-bottom:1rem"><input placeholder="Имя" type="text" name="name"></div>
								<div class="6u 12u(mobile)"><input placeholder="examlpe@example.com" type="email" name="email"></div>
								<div class="6u 12u(mobile)"><input placeholder="+38(093)1234567" type="tel" name="tel"></div>
							</div>
							<div class="row 50%" style="margin-bottom:25px;">
								<div class="12u"><textarea name="message" placeholder="Сообщение"></textarea></div>
							</div>
							<div class="row">
								<div class="12u">
									<ul class="actions">
										<li><input class="button" value="Отправить" type="submit"></li>
										<li><input class="button alt" value="Очистить" type="reset"></li>
									</ul>
								</div>
								
							</div>
						</form>
						<ul style="list-style: outside none none; color:#444443; text-align:left"><li>
<a href="https://goo.gl/3ne6Vu" style="color:#ffffff" target="_blanc">
<img src="/img/location_w.png"> Г.КИЕВ, УЛ. САБУРОВА 2/51</a></li>
<li><a class="contacts_a" href="tel:+380633716996">
<img src="/img/phone_w.png"> 063 371 69 96</a></li>
<li>
<a class="contacts_a" href="tel:+380506500259">
<img src="/img/phone_w.png"> 050 650 02 59</a></li>
<li><a href="mailto:magic.decorkiev@gmail.com" style="color:#fff;">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Livello_1" x="0px" y="0px" width="25px" height="18px" viewBox="0 0 25 18" enable-background="new 0 0 25 18" xml:space="preserve">
<path fill="none" stroke="#fff" stroke-linejoin="round" stroke-miterlimit="10" d="M24.438,15.565  c0,1.068-0.866,1.935-1.935,1.935H2.372c-1.068,0-1.935-0.866-1.935-1.935V2.435c0-1.068,0.866-1.935,1.935-1.935h20.131  c1.068,0,1.935,0.866,1.935,1.935V15.565z"/>
<polyline fill="none" stroke="#fff" stroke-width="0.9853" stroke-linecap="square" stroke-miterlimit="10" points="22.5,1   12.5,11 2.5,1 "/>
</svg> magic.decorkiev@gmail.com</a>
</li>
</ul>

					</div>
				
<div class="up_face"><div class="grid2">
					<figure class="effect-hover">
						<img src="/img/ask/lena.jpg" alt="Lena"/>
						<figcaption>
							<h2> Лена</h2>
		<p>
		<a href="https://vk.com/id652655" class="icon fa-vk"><span class="label">Vk</span></a><br>
		<a href="https://www.facebook.com/lena.hayday" class="icon fa-facebook"><span class="label">Facebook</span></a><br>
		<a href="https://instagram.com/lenahayday/">I</a>
		</p>
							
						</figcaption>			
					</figure>
					
				</div>
</div><div class="up_face">
<div class="grid2">
					<figure class="effect-hover">
						<img src="/img/ask/iana.jpg" alt="Iana"/>
						<figcaption>
							<h2> Яна</h2>
									<p>
		<a href="https://vk.com/ok.iana" class="icon fa-vk"><span class="label">Vk</span></a><br>
		<a href="https://www.facebook.com/okhrimenko.iana" class="icon fa-facebook"><span class="label">Facebook</span></a><br>
		<a href="https://instagram.com/ian0k/">I</a>
		</p>
							
						</figcaption>			
					</figure>
					
				</div></div>
</div>

</div>


					
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="https://www.facebook.com/magicdecor" class="icon fa-facebook" target="_blank"><span class="label">Facebook</span></a></li>
						<li><a href="https://instagram.com/magic_decor_kiev/" class="icon fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
						<li><a href="https://vk.com/magicdecor" class="icon fa-vk"><span class="label" target="_blank">Vk</span></a></li>
						<li><a href="https://goo.gl/YPyVT9" class="icon fa-google-plus" target="_blank"><span class="label">Google+</span></a></li>
						<li><a href="tel:+306986560754" class="icon fa-phone-square" target="_blank"><span class="label">Viber</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Magicdecor. All rights reserved.</li>
					</ul>
				</footer>

		</div>';
?>
		<!-- Scripts -->

<div class="go-up button" style="height:30px" title="Вверх" id='ToTop'>Вверх</div>
		<script src="/tree/assets/js/jquery.dropotron.min.js"></script>
			<script src="/tree/assets/js/jquery.scrollgress.min.js"></script>
			<script src="/tree/assets/js/skel.min.js"></script>
			<script src="/tree/assets/js/util.js"></script>
			<script src="/tree/assets/js/main.js"></script>
			
			<script src="/sys/js/isotope.pkgd.js"></script>
	
			<script type="text/javascript">

$(function(){
 if ($(window).scrollTop()>="250") $("#ToTop").fadeIn("slow")
 $(window).scroll(function(){
  if ($(window).scrollTop()<="250") $("#ToTop").fadeOut("slow")
   else $("#ToTop").fadeIn("slow")
});	
$("#ToTop").click(function(){$("html,body").animate({scrollTop:0},"slow")})
 $("#OnBottom").click(function(){$("html,body").animate({scrollTop:$(document).height()},"slow")})
	});
	
  var $grid=$('.grid_img').isotope({
    itemSelector: '.grid-item',
    masonry: {columnWidth: 1}
  });
  $('.grid_img').css('background', '#FFF none repeat scroll 0% 0%');
  $('.grid_img').css('visibility', 'visible');

setTimeout( function() {


		var $grid=$('.grid_img').isotope({
    itemSelector: '.grid-item',
    masonry: {columnWidth: 1}
	
  });
  $grid.isotope('layout');
}, 5000)


</script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			

	</body>
</html>
