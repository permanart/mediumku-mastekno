<?php $adsfooter = get_option('adsfooter'); if($adsfooter) { echo '<div class="ads">'.$adsfooter.'</div>'; } ?>
<?php
function mastekno_about(){ ?>
<a href="#">Tentang Kami</a> &#8226; <a href="#">Kontak</a> &#8226; <a href="#">Disclaimer</a> &#8226; <a href="#">Privacy Policy</a><br/> &copy; Copyright <?php echo date("Y") ?> <?php bloginfo('name'); ?> </a>.</p>
<?php } ?>
<?php mediumku_footer(); ?>
<script>
//<![CDATA[
      var loadSc = false;
      window.addEventListener("scroll", function(){
      if ((document.documentElement.scrollTop != 0 && loadSc === false) || (document.body.scrollTop != 0 && loadSc === false)) {


for (index = 0; index < scripts.length; ++index) {
    var script = document.createElement('script');
    script.src = scripts[index];
    script.type='text/javascript';    document.body.appendChild(script);
document.getElementsByTagName("head")[0].appendChild(script);
};
          loadSc = true;
        }
      }, true);

//]]></script>
</body>
</html>