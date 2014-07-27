	
		<footer class="bs-docs-footer" role="contentinfo">
			
		<ul class="col-md-2 nav navbar-nav navbar-right" >	
			<div class="btn-group btn-group-justified">
				<script>
                    var url=document.URL;
                    var res = url.replace("<?= DIR ?>", "");
                    document.write('<a class="btn btn-default" href="<?= DIR ?>lang/fr/'+res +'">Fr</a>');
                    document.write('<a class="btn btn-default" href="<?= DIR ?>lang/en/'+ res+'">Eng</a>');
                </script>
                        <!-- 
		   		<a class="btn btn-default" href="<?= DIR ?>fr">Fr</a>
		     	<a class="btn btn-default" href="<?= DIR ?>eng/">Eng</a>
			-->     
		    </div>
		 </ul>	    
		</footer>
	</div>  
	<script src="<?= TEMPLATES_REP.'default' ?>/js/jquery.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-transition.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-alert.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-modal.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-dropdown.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-tab.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-tooltip.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-popover.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-button.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-collapse.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-carousel.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/bootstrap-typeahead.js"></script>
    <!-- JS Alexi -->
    <script src="<?= TEMPLATES_REP.'default' ?>/js/tab.js"></script>
    <script src="<?= TEMPLATES_REP.'default' ?>/js/entrepreneur.js"></script>

    <!-- JS Anass -->
    <script src="<?= TEMPLATES_REP.'default' ?>/js/ana/formhelper.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
        });
    </script>
</body>
</html>