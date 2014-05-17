       <footer>
                	<div class="wrapper">
                        <img src="<?php bloginfo('template_directory'); ?>/img/footer-logo.svg" alt="Gaiacene"/>
                        <h3>Sustainability. CSR. Evaluation. Engagement. Communications.</h3>
                        <ul class="social">
                        	<li><a href="https://twitter.com/Gaiacene" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/twitter-footer-icon.svg" width="40" height="40" alt="Gaiacene"/></a></li>
                            <li><a href="http://www.linkedin.com/company/gaiacene?trk=company_name" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/linkedin-footer-icon.svg" width="40" height="40" alt="Gaiacene"/></a></li>
                        </ul>
                        <ul>
                          <li>&copy; Gaiacene 2014</li>
                            <li>/ <a href="<?php bloginfo('url'); ?>/terms-and-conditions/">Terms and Conditions</a> /</li>
                            <li>Registered in England and Wales as Gaiacene Ltd  / Company No. 8090349 / VAT Reg No. 158115220</li>
                        </ul>
                    </div>
                </footer>
			</div> <!-- End of mobileContainer -->
        </div> <!-- End of page -->
        
	   <?php
			/* Always have wp_footer() just before the closing </body>
			 * tag of your theme, or you will break many plugins, which
			 * generally use this hook to reference JavaScript files.
			 */
		
			wp_footer();
		?>
       
        <script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-47560867-1']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>
        
    </body>
</html>