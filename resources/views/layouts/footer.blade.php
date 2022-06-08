<div id="footer">
	<div class="container">
		
		<div class="row">
			<div class="col-12">

				<!-- Contact -->
					<section class="contact">
						<header>
							<h3>Loving The Case of Shows ?</h3>
						</header>
						<p>Come and join us on our many social media accounts and keep up to date with all the buzz going on !</p>
						<ul class="icons">
							<li><a href="https://twitter.com/theatredenamur" class="icon brands fa-twitter" target="_blank"><span class="label">Twitter</span></a></li>
							<li><a href="https://www.facebook.com/letheatredenamur/" class="icon brands fa-facebook-f" target="_blank"><span class="label">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/theatredenamur/" class="icon brands fa-instagram" target="_blank"><span class="label">Instagram</span></a></li>
							<li><a href="https://www.linkedin.com/company/th%C3%A9%C3%A2tre-de-namur?originalSubdomain=be" target="_blank" class="icon brands fa-linkedin-in"><span class="label">Linkedin</span></a></li>
						</ul>
					</section>

				<!-- Copyright -->
					<div class="copyright">
						<ul class="menu">
							<li>&copy; TheCaseOfShows. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
						</ul>
					</div>

			</div>

		</div>
	</div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.dropotron.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrolly.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollex.min.js') }}"></script>
<script src="{{ asset('js/browser.min.js') }}"></script>
<script src="{{ asset('js/breakpoints.min.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
        var availableTags = [];
        $.ajax({
            type: "GET",
            url: "/show-list",
            success: function(response) {
                //console.log(response);
                autoComplete(response);
            }
        });

        function autoComplete(availableTags) {
            $("#search_product").autocomplete({
                source: availableTags
            });
        }
    </script>