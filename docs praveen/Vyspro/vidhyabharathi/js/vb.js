//enableNext();
function enableNext() {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url'],input[type='file']"),
                isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');

}

$.validator.addMethod("extension", function (value, element, param) {
    param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif";
    return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
}, jQuery.format("Please enter a value with a valid extension."));

$.validator.addMethod("filesSizes", function (value, element, param) {
//    alert(param);
//    alert(element);
    var res = param.split("|");
    var file_size = $('#' + res[1])[0].files[0].size;
//    alert(file_size);
    if (file_size > param) {
        return false;
    }
    return true;
}, jQuery.format("File size must be less thann 2MB"));

$.validator.addMethod("birthdob", function (value, element) {
    var year = value.split(', ');
//    alert(year[1]);
    if (value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/) && parseInt(year[1]) <= 2001)
        return true;
    else
        return false;
});

$.validator.addMethod("noSpace", function (value, element) {
    return value.indexOf(" ") < 0 && value != "";
}, "No space please and don't leave it empty");

$.validator.addMethod("marksobtainedcheck", function (value, element) {
    var totalmarkss = $("#totalmarks").val();
//    alert(totalmarkss);
//    alert(value);
    if (parseInt(totalmarkss) < parseInt(value)) {
        return false;
    } else {
        return true;
    }
}, "Total Marks Obtained must be less than Total Maximum Marks");


$.validator.addMethod('ifsccodevalidate', function (value) {
    return /^[A-Za-z]{4}[a-zA-Z0-9]{7}$/.test(value);
}, 'Please enter a valid IFSC code.');

$("#applyingnform").validate({
    rules: {
        applying_for: {
            required: true
        }
    },
    messages: {
        applying_for: {
            required: "Please Selection the option"
        }
    }
});

$("#changestatsform").validate({
    rules: {
        vysprostatus: {
            required: true
        },
        comment: {
            required: true
        }
    },
    messages: {
        vysprostatus: {
            required: "Please Selection the option"
        },
        comment: {
            required: "Please enter comment"
        }
    }
});


$("#applicationform").validate({
    rules: {
        name: {
            required: true,
            minlength: 5
        },
        surname: {
            required: true,
            minlength: 3
        },
        photo: {
            required: true,
            extension: "jpg|jpeg|png",
            filesSizes: "2097152|photo"
        },
        email: {
            required: true,
            email: true
        },
        phone: {
            required: true,
            number: true,
            minlength: 10
        },
        dob: {
            required: true
        },
        parentname: {
            required: true
        },
        parentoccupation: {
            required: true
        },
        parentphone: {
            required: true,
            number: true,
            minlength: 10
        },
        mothername: {
            required: true
        },
        motheroccupation: {
            required: true
        },
        motherphone: {
            number: true,
            minlength: 10
        },
        gothram: {
            required: true
        },
        referer: {
            required: true
        },
        referername: {
            required: true
        },
        faddress: {
            required: true
        },
        street: {
            required: true
        },
        city: {
            required: true
        },
        state: {
            required: true
        },
        pincode: {
            required: true,
            number: true,
            minlength: 6
        },
        cfaddress: {
            required: true
        },
        cstreet: {
            required: true
        },
        ccity: {
            required: true
        },
        cstate: {
            required: true
        },
        cpincode: {
            required: true,
            number: true,
            minlength: 6
        },
        latestclass: {
            required: true
        },
        latestmonth: {
            required: true
        },
        marks: {
            required: true
        },
        totalmarks: {
            required: true,
            number: true,
            maxlength: 4
        },
        totalmarksobtained: {
            required: true,
            number: true,
            maxlength: 4,
            marksobtainedcheck: true
        },
        marksinsubject: {
            required: true,
            number: true
        },
        markslist: {
            required: true,
            extension: "jpg|jpeg|png|pdf",
            filesSizes: "2097152|markslist"
        },
        schoolname: {
            required: true
        },
        schooladdress: {
            required: true
        },
        schooladdresspincode: {
            required: true,
            number: true,
            minlength: 6
        },
        presentlystudying: {
            required: true
        },
        annualincome: {
            required: true,
            number: true
        },
        annualincomeproof: {
            required: true,
            extension: "jpg|jpeg|png|pdf",
            filesSizes: "20971520|annualincomeproof"
        },
        vysprocholorships: {
            required: true
        },
        vysprocholorshipsyear: {
            required: true
        },
        vysproparent: {
            required: true
        },
        aim: {
            required: true
        },
        futurehelp: {
            required: true
        },
        joinvyspro: {
            required: true
        },
        bankstudentname: {
            required: true,
            minlength: 4
        },
        bankname: {
            required: true
        },
        banknumber: {
            required: true,
            number: true
        },
        reenterbanknumber: {
            required: true,
            equalTo: "#banknumber"
        },
        bankifsc: {
            required: true,
            minlength: 11,
            maxlength: 11,
            noSpace: true,
            ifsccodevalidate: true
        },
        bankbranch: {
            required: true
        }
    },
    messages: {
        name: {
            required: "Please enter Full Name"
        },
        surname: {
            required: "Please enter Surname"
        },
        photo: {
            required: "Please upload Photo",
            extension: "Please upload only jpg / jpeg / png formated images"
        },
        email: {
            required: "Please enter email",
            email: "Please enter valid email"
        },
        phone: {
            required: "Please enter Phone Number",
            number: "Please enter Valid Phone number",
            minlength: "Please enter valid Phone number"
        },
        dob: {
            required: "Please select Date of Birth",
            birthdob: "Please select valid Date of Birth"
        },
        parentname: {
            required: "Please enter Father/Guardian Name"
        },
        parentoccupation: {
            required: "please enter father Occupation"
        },
        parentphone: {
            required: "Please enter Father/ Guardian Phone Number",
            number: "Please enter valid number",
            minlength: "Please enter valid number"
        },
        mothername: {
            required: "Please enter mother Name"
        },
        motheroccupation: {
            required: "please enter mother Occupation"
        },
        motherphone: {
            number: "Please enter valid number",
            minlength: "Please enter valid number"
        },
        gothram: {
            required: "Please enter Gothram"
        },
        referer: {
            required: "Please select the option"
        },
        referername: {
            required: "Please enter person name"
        },
        faddress: {
            required: "Please enter Address"
        },
        street: {
            required: "Please enter Street"
        },
        city: {
            required: "Please enter City"
        },
        state: {
            required: "Please enter State"
        },
        pincode: {
            required: "please enter Pincode",
            number: "Please enter Valid pincode",
            minlength: "Please enter Valid pincode"
        },
        cfaddress: {
            required: "Please enter Address"
        },
        cstreet: {
            required: "Please enter Street"
        },
        ccity: {
            required: "Please enter City"
        },
        cstate: {
            required: "Please enter State"
        },
        cpincode: {
            required: "please enter Pincode",
            number: "Please enter Valid pincode",
            minlength: "Please enter Valid Pincode"
        },
        latestclass: {
            required: "Please enter Latest class completed"
        },
        latestmonth: {
            required: "Please select Month"
        },
        marks: {
            required: "Please enter Marks obtained/Total Marks"
        },
        totalmarks: {
            required: "Please enter Total marks",
            number: "Please enter number only"
        },
        totalmarksobtained: {
            required: "Please enter Total Marks Obtained",
            number: "Please enter number only"
        },
        marksinsubject: {
            required: "Please enter Marks",
            number: "Please enter number only"
        },
        markslist: {
            required: "Please upload Marks list Certificate / proof",
            extension: "Please upload only jpg / jpeg / png / pdf formated images ",
            filesSizes: "2097152|markslist"
        },
        schoolname: {
            required: "Please enter Name of school / Collage / Institution"
        },
        schooladdress: {
            required: "Name of school / Collage / Institution Address"
        },
        schooladdresspincode: {
            required: "please enter Pincode",
            number: "Please enter valid pincode",
            minlength: "Please enter Valid Picode"
        },
        presentlystudying: {
            required: "Please select Presently studying"
        },
        annualincome: {
            required: "Please enter Annual income",
            number: "Please enter Digits only"
        },
        annualincomeproof: {
            required: "Please upload Income Proof",
            extension: "Please upload only jpg|jpeg|png|pdf formated images",
            filesSizes: "2097152|annualincomeproof"
        },
        vysprocholorships: {
            required: "Please select Did you received scholarship from vyspro"
        },
        vysprocholorshipsyear: {
            required: "Please select received scholarship in which year"
        },
        vysproparent: {
            required: "Please select any option"
        },
        aim: {
            required: "Please enter your aims"
        },
        futurehelp: {
            required: "Please select any option"
        },
        joinvyspro: {
            required: "Please select any option"
        },
        bankstudentname: {
            required: "Please enter  Student / Beneficiary Name"
        },
        bankname: {
            required: "Please enter Bank Name"
        },
        banknumber: {
            required: "Please enter Bank A/c Number",
            number: "Please enter valid number"
        },
        reenterbanknumber: {
            required: "Please Reenter Bank A/C number",
            equalTo: "Bank Number dont match"
        },
        bankifsc: {
            required: "Please enter Bank IFSC code",
            minlength: "Please enter valid IFSC code",
            maxlength: "Please enter valid IFSC code",
            noSpace: "Please enter valid IFSC code, space is not allowed"
        },
        bankbranch: {
            required: "Please enter Bank Branch"
        }
    }
});


function changeSholorships() {
    var p = $('#vysprocholorships').val();
//    alert(p);
    if (p === 'No') {
        $('#vysprocholorshipsyeardiv').hide();
        $('#vysprocholorshipsyear').attr('disabled', true);
    } else {
        $('#vysprocholorshipsyeardiv').show();
        $('#vysprocholorshipsyear').removeAttr('disabled');
    }
}

function checkparentOrg() {
    var ps = $('#vysproparent').val();
//    alert(p);
    if (ps === 'No') {
        $('#organisationnamediv').hide();
        $('#organisationname').attr('disabled', true);
    } else {
        $('#organisationnamediv').show();
        $('#organisationname').removeAttr('disabled');
    }
}



function applyforselect(optionselected) {
    if (optionselected === 'merit') {
        $('#bankname').attr('disabled', true);
        $('#banknumber').attr('disabled', true);
        $('#bankifsc').attr('disabled', true);
        $('#bankbranch').attr('disabled', true);
    } else if (optionselected === 'scholarship') {
        $('#bankname').removeAttr('disabled');
        $('#banknumber').removeAttr('disabled');
        $('#bankifsc').removeAttr('disabled');
        $('#bankbranch').removeAttr('disabled');
    }
    else if (optionselected === 'both') {
        $('#bankname').removeAttr('disabled');
        $('#banknumber').removeAttr('disabled');
        $('#bankifsc').removeAttr('disabled');
        $('#bankbranch').removeAttr('disabled');
    }
}

function applyforselectedit(optionselected) {
    if (optionselected === 'merit') {

        $("#formeritdiv").show();
        $("#step-5").hide();
        $('#bankname').attr('disabled', true);
        $('#banknumber').attr('disabled', true);
        $('#bankifsc').attr('disabled', true);
        $('#bankbranch').attr('disabled', true);

        $('#bankname').attr('readonly', true);
        $('#banknumber').attr('readonly', true);
        $('#bankifsc').attr('readonly', true);
        $('#bankbranch').attr('readonly', true);
    } else if (optionselected === 'scholarship') {
        $("#step-5").show();
        $("#formeritdiv").hide();
        $('#bankname').removeAttr('disabled');
        $('#banknumber').removeAttr('disabled');
        $('#bankifsc').removeAttr('disabled');
        $('#bankbranch').removeAttr('disabled');

        $('#bankname').removeAttr('readonly');
        $('#banknumber').removeAttr('readonly');
        $('#bankifsc').removeAttr('readonly');
        $('#bankbranch').removeAttr('readonly');
    }
    else if (optionselected === 'both') {
        $("#step-5").show();
        $("#formeritdiv").show();
        $('#bankname').removeAttr('disabled');
        $('#banknumber').removeAttr('disabled');
        $('#bankifsc').removeAttr('disabled');
        $('#bankbranch').removeAttr('disabled');

        $('#bankname').removeAttr('readonly');
        $('#banknumber').removeAttr('readonly');
        $('#bankifsc').removeAttr('readonly');
        $('#bankbranch').removeAttr('readonly');
    }
}

$("#payuform").validate({
    rules: {
        name: {
            required: true
        },
        surname: {
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
        amount: {
            required: true,
            number: true
        },
        noofstudents: {
            required: true
        }
    },
    messages: {
        name: {
            required: "Please enter Name"
        },
        surname: {
            required: "Please enter Surname"
        },
        email: {
            required: "Please enter Email",
            email: "Please enter valid email"
        },
        contactnumbers: {
            required: "Please enter Phone Number",
            minlength: "Please enter Valid number"
        },
        amount: {
            required: "please enter amount",
            number: "Please enter valid amount"
        },
        noofstudents: {
            required: "Please select No of Students"
        }
    }
});

$(document).ready(function () {
    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('#addmoreuploads'); //Input field wrapper
    var x = 1;
    var fieldHTML = '<div><div><input type="file" required="required" id="markslist" name="markslist[]" value="" class="form-control" placeholder="Upload marks list" /><a href="javascript:void(0);" class="remove_button">Remove this Subject</a></div></div></div>'; //New input field html 
    //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function () {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function (e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

function makeEditform(isedit) {
//    alert(isedit);
    var vysc = $('#vysprocholorships').val();
//    alert(vysc);
    if (vysc === 'No') {
//        alert("in no");
        $('#vysprocholorshipsyeardiv').hide();
    }
    if (isedit == 'yes') {
        $('#surname').removeAttr('readonly');
        $('input').removeAttr('readonly');
        $('input').prop('readonly', false);
        $('select').removeAttr('readonly');
        $('select').removeAttr('readonly');
        $('textarea').removeAttr('readonly');

        $('#editbutton').hide();
        $('#submitbutton').hide();
        $('#previewbutton').show();
    } else {
        $('input').prop('readonly', 'true');
        $('input').prop('readonly', 'true');
        $('select').prop('readonly', 'true');
        $('select').attr('readonly', "true");
        $('textarea').prop('readonly', 'true');

        $('#previewbutton').hide();
        $('#editbutton').show();
        $('#submitbutton').show();

    }
}

function showmarksdiv() {
    var selectedName = $('#classname').val();
    var showdiv = 0;
    var labeltext = '';
    switch (selectedName) {
        case 'INTERMEDIATE - MEC':
        case 'INTERMEDIATE - MPC':
        case 'ssc':
            showdiv = 1;
            labeltext = 'Marks in Maths';
            break;
        case 'CA IPCC/INTER BOTH GROUPS':
        case 'CA IPCC/INTER GROUP-I':
            showdiv = 1;
            labeltext = 'Marks in Law';
            break;
        default:
            showdiv = 0;
            labeltext = 'Marks in Maths';
    }

    if (showdiv === 1) {
        $('#markssubjectiddiv').show();
        $('#markssubjectid').html(labeltext);
        $('#marksinsubject').removeAttr('disabled');
    } else {
        $('#markssubjectiddiv').hide();
        $('#markssubjectid').html(labeltext);
        $('#marksinsubject').attr('disabled', 'true');

    }
}

function selectaboveaddress() {

    if ($("#aboveaddress").is(":checked") == true) {
        $('#cfaddress').val($('#faddress').val());
        $('#cstreet').val($('#street').val());
        $('#ccity').val($('#city').val());
        $('#cdistrict').val($('#district').val());
        $('#cstate').val($('#state').val());
        $('#cpincode').val($('#pincode').val());
    }
    else if ($("#aboveaddress").is(":checked") == false) {
        $('#cfaddress').val('');
        $('#cstreet').val('');
        $('#ccity').val('');
        $('#cdistrict').val('');
        $('#cstate').val('');
        $('#cpincode').val('');
    }

}

function showotherDegree() {
    var degreeval = $('#presentlystudying').val();
    if (degreeval === 'other') {
        $("#specifyotherid").show();
    } else {
        $("#specifyotherid").hide();
    }
}

function UpdatePrice() {
    var students = $('#noofstudents').val();
    if (students != '') {
        var amountVal = 0;
        amountVal = students * 5000;

        var tax = (amountVal * 2.36) / 100;
        var totalAmount = amountVal + tax;

        $('#taxid').html(tax);
        $('#amount').val(totalAmount);
        $('#amountvalue').html(amountVal);
        $('#totalvalue').html(totalAmount);
    }
}