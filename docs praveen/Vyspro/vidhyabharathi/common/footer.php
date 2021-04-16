</div>
<div class="push">
</div>
<footer class="mainfooter">  
    <div class="container copyright">&COPY; 2019&nbsp;Vyspro India. All rights reserved.       
    </div>
</footer>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.1.min.js"><\/script>')</script>   
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>   
<script>window.jQuery || document.write('<script src="js/vendor/jquery-ui.min.js"><\/script>')</script>   
<!--<script src="http://vysproindia.org/js/main.js"></script>-->    
<script src="<?PHP echo $servername; ?>js/jquery.validate.min.js?v=16" type="text/javascript"></script>
<script src="<?PHP echo $servername; ?>js/vb.js?v=16" type="text/javascript"></script>
<?PHP
if (isset($extrascript) && $extrascript != '') {
    echo $extrascript;
}
?>
</body>
</html>
