</div>  
</div>
</section>
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
<script src="/jquery.validate.min.js" type="text/javascript"></script>


<script type="text/javascript">
//<![CDATA[ 
    <!--
            function GetXmlHttpObject(handler)
            {
                var objXmlHttp = null;
                if (navigator.userAgent.indexOf("Opera") >= 0)
                {
                    alert("This example doesn't work in Opera");
                    return;
                }
                if (navigator.userAgent.indexOf("MSIE") >= 0)
                {
                    var strName = "Msxml2.XMLHTTP";
                    if (navigator.appVersion.indexOf("MSIE 5.5") >= 0)
                    {
                        strName = "Microsoft.XMLHTTP";
                    }
                    try
                    {
                        objXmlHttp = new ActiveXObject(strName);
                        objXmlHttp.onreadystatechange = handler;
                        return objXmlHttp;
                    }
                    catch (ex)
                    {
                        alert("Error. Scripting for ActiveX might be disabled");
                        return null;
                    }
                }
                if (navigator.userAgent.indexOf("Mozilla") >= 0)
                {
                    objXmlHttp = new XMLHttpRequest();
                    objXmlHttp.onload = handler;
                    objXmlHttp.onerror = handler;
                    return objXmlHttp;
                }
            }
//-->   
//]]>

    $("#payuform").validate({
        rules: {
            name: {
                required: true
            },
            surname:{
               required: true 
            },
            email: {
                required: true,
                email: true
            },
            contactnumbers: {
                required: true,
                minlength: 10,
                maxlength: 10
            },
            googleform:{
                required: true
            },
            transport: {
                required: true
            },
            nooftickets: {
                required: true
            },
            amount: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Please enter Name"
            },
            surname:{
               required: "Please enter Surname" 
            },
            email: {
                required: "Please enter Email",
                email: "Please enter valid email"
            },
            contactnumbers: {
                required: "Please enter Phone Number"
            },
            googleform:{
                required: "Please select any option"
            },
            transport: {
                required: "please select Transport option \n"
            },
            nooftickets: {
                required: "Please select Number of Tickets"
            },
            amount: {
                required: "please enter amount"
            }
        }
    });
    function UpdatePrice(selection) {
        alert(selection);
        //$('#nooftickets').html("");
//        var optionsval='';
        var transportValue = $("input[name='transport']:checked").val();
//        alert(transportValue);
        var noofticketsValue = $('#nooftickets').val();
//        alert(noofticketsValue);
        var amountVal = 0;
        if (transportValue == 'yes') {
            amountVal = noofticketsValue * 450;
            var counts = $('#purchasedTickets').val();
            
        } else {
            amountVal = noofticketsValue * 300;
            var counts = 25;
        }
        if(selection=='trans'){
        for (var p = 1; p <= counts; p++) {
                    optionsval += "<option value='"+p+"'>"+p+"</option>"; 
            }
//            $('#nooftickets').html(optionsval);
        }
//        $('#amount').val(amountVal);

        var tax = (amountVal * 2.3) / 100;
        var totalAmount = amountVal + tax;

        $('#taxid').html(tax);
        $('#amount').val(totalAmount);
        $('#amountvalue').html(amountVal);
        $('#totalvalue').html(totalAmount);
    }
</script>
</body>
</html>
