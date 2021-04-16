$("#beamember").validate({
    rules: {
        surname: {
            required: true
        },
        fullname: {
            required: true
        },
        lastname: {
            required: true
        },
        email: {
            email: true,
            required: true
        },
        mobilenumber: {
            required: true,
            number: true
        },
        gowtram: {
            required: true
        },
        fathername: {
            required: true
        },
        dob: {
            required: true
        },
        address1: {
            required: true,
            minlength: 20
        },
        address2: {
            minlength: 20
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
        country: {
            required: true
        },
        qualification: {
            required: true
        },
        photo: {
            required: true,
//            filesSizes:"2097|photo",
            extension: true
        },
        certificate: {
            required: true,
//            filesSizes:"2097|certificate",
            extension: true
        }

    },
    messages: {
        surname: {
            required: "Please enter Surname"
        },
        fullname: {
            required: "Please enter Full Name"
        },
        lastname: {
            required: "Please enter Last Name"
        },
        email: {
            email: "Please enter valid Email",
            required: "Please enter Email"
        },
        mobilenumber: {
            required: "Please enter Mobile Number",
            number: "Plese enter valid Mobile Number"
        },
        gowtram: {
            required: "Please enter Gowtram"
        },
        fathername: {
            required: "Please enter Father Name"
        },
        dob: {
            required: "Please select Date of Birth"
        },
        address1: {
            required: "Please enter Address line 1",
            minlength: "Please enter minmum 20 chars"
        },
        address2: {
            minlength: "Please enter minmum 20 chars"
        },
        street: {
            required: "Please enter Street Name"
        },
        city: {
            required: "Please enter City"
        },
        state: {
            required: "Please enter State"
        },
        country: {
            required: "Please enter country"
        },
        qualification: {
            required: "Please select Qualification"
        },
        photo: {
            required: "Please upload Photo"
        },
        certificate: {
            required: "Please upload Certificate"
        }
    }
});

$("#addevent").validate({
    rules: {
        eventname: {
            required: true
        },
        starttime: {
            required: true
        },
        endtime: {
            required: true
        },
        location: {
            required: true
        },
        chiefguest: {
            required: true
        },
        goh: {
            required: true
        },
        description: {
            required: true
        },
        photo: {
            required: true,
            extension: true
        }

    },
    messages: {
        eventname: {
            required: "Please enter Event Name"
        },
        starttime: {
            required: "Please select Event Start Date / Time"
        },
        endtime: {
            required: "Please select Event End Date / Time"
        },
        location: {
            required: "Please enter Location"
        },
        chiefguest: {
            required: "Please enter Chief Guest"
        },
        goh: {
            required: "Please enter Guest of Honour"
        },
        description: {
            required: "Please enter description"
        },
        photo: {
            required: "Please uload Photo / Invitation"
        }
    }
});
$("#memberview").validate({
    rules: {
        memberstatus: {
            required: true
        },
        membershipId: {
            required: true,
            number: true
        },
        comments: {
            required: true
        }

    },
    messages: {
        memberstatus: {
            required: "Please select Status"
        },
        membershipId: {
            required: "Please enter Membership ID provided",
            number: "Please enter Numbers only"
        },
        comments: {
            required: "Please enter Comments"
        }
    }
});

$("#cheyuthaotp").validate({
    rules: {
        otp: {
            required: true,
            number: true,
            minlength: 6
        }
    },
    messages: {
        otp: {
            required: "Please enter OTP",
            number: "Please enter Valid OTP",
            minlength: "Please enter Valid OPT"
        }
    }
});


$("#contactus").validate({
    rules: {
        fname: {
            required: true,
            maxlength: 200,
            minlength: 5
        },
        lname: {
            required: true,
            maxlength: 200,
            minlength: 5
        },
        email: {
            email: true,
            maxlength: 200,
            minlength: 6
        },
        subject: {
            required: true,
            maxlength: 300,
            minlength: 10
        },
        message: {
            required: true
        }
    },
    messages: {
        fname: {
            required: "Please enter First Name",
            maxlength: "Max length 200 chars",
            minlength: "Min length 5 chars"
        },
        lname: {
            required: "Please enter Last Name",
            maxlength: "Max length 200 chars",
            minlength: "Min length 5 chars"
        },
        email: {
            email: "please enter valid email",
            maxlength: "Max length 200 chars"
        },
        subject: {
            required: "Please enter Subject",
            maxlength: "Max length 300 chars",
            minlength: "Min length 10 chars"
        },
        message: {
            required: "Please enter Message"
        }
    }
});
$("#cheyutha").validate({
    rules: {
        fname: {
            required: true
        },
        bfname: {
            required: true,
        },
        blname: {
            required: true,
        },
        lmemail: {
            required: true,
            email: true,
            maxlength: 200,
            minlength: 6
        },
        lmnumber: {
            required: true,
            number: true,
            maxlength: 11,
            minlength: 10
        },
        bname: {
            required: true
        },
        bnumber: {
            required: true,
            number: true,
            maxlength: 11,
            minlength: 10
        },
        bcaste: {
            required: true,
            maxlength: 110
        },
        bdependents: {
            required: true,
            number: true,
            maxlength: 5
        },
        boccupation: {
            required: true
        },
        baddress: {
            required: true
        },
        bcity: {
            required: true
        },
        bstate: {
            required: true
        },
        bannualincome: {
            required: true,
            number: true
        },
        bproof: {
            required: true
        },
        bproofnumber: {
            required: true
        },
        bproofupload: {
            required: true
        }
    },
    messages: {
        fname: {
            required: "Please select Life Member Name"
        },
        bfname: {
            required: "Please Enter Beneficiary First Name",
        },
        blname: {
            required: "Please Enter Beneficiary Last Name",
        },
        lmemail: {
            required: "Please enter Email ID",
            email: "Please enter your Email Id",
            maxlength: "Max length must be less than 200 chars",
            minlength: "Min length must be less than 6 chars"
        },
        lmnumber: {
            required: "Please enter Phone Numebr",
            number: "Please enter Valid Phone Number",
            maxlength: "Max length must be less than 10 chars",
            minlength: "Min length must be greather than 10 chars"
        },
        bname: {
            required: "Please enter Beneficiary Full Name"
        },
        bnumber: {
            required: "Please enter Beneficiary Phone Number",
            number: "Please enter Beneficiary Valid Phone Number",
            maxlength: "Max length must be less than 10 chars",
            minlength: "Min length must be greather than 10 chars"
        },
        bcaste: {
            required: "Enter Beneficiary Caste",
            maxlength: "Max length must be less than 100 chars"
        },
        bdependents: {
            required: "Please enter Total Dependents in the Family",
            number: "Please enter valid number"
        },
        boccupation: {
            required: "Please Enter Beneficiary Occupation"
        },
        baddress: {
            required: "Please enter Address"
        },
        bcity: {
            required: "Please select city"
        },
        bstate: {
            required: "Please enter State"
        },
        bannualincome: {
            required: "Please enter Beneficiary Annual Income",
            number: "Please enter valid amount"
        },
        bproof: {
            required: "Please select Address Proof"
        },
        bproofnumber: {
            required: "Please enter Address proof Reference number"
        },
        bproofupload: {
            required: "Please enter Upload Address Proof"
        }
    }
});



$.validator.addMethod("extension", function (value, element, param) {
    param = typeof param === "string" ? param.replace(/,/g, '|') : "png|jpe?g|gif|pdf";
    return this.optional(element) || value.match(new RegExp(".(" + param + ")$", "i"));
}, jQuery.format("Please enter a value with a valid extension, valid exentions are png|jpg|gif|pdf."));

$.validator.addMethod("filesSizes", function (value, element, param) {
    alert(param);
//    alert(element);
    var res = param.split("|");
    var file_size = $('#' + res[1])[0].files[0].size;
//    alert(file_size);
    if (file_size > param) {
        return false;
    }
    return true;
}, jQuery.format("File size must be less thann 2MB"));

function updateLMNameCheyutha() {
    var lmname = $('#fname').val();
//    alert(lmname);
    $('#lmnamedisplay').html(lmname);
}

//$(function ()
//{
//    $('#cheyutha').submit(function () {
//        $("input[type='submit']", this)
//                .val("Please Wait...")
//                .attr('disabled', 'disabled');
//        return true;
//    });
//});

function updateCheyutaStatus(cid, status) {
//    alert(cid);
//    alert(status);
    if (status == 'approve') {
        alert("Are you sure! do need to approve this Benificiary");
    }
    if (status == 'reject') {
        alert("Are you sure! do need to reject this Benificiary");
    }

    if (status == 'Verified') {
        alert("Are you sure! do need to reject this Benificiary");
    }

    var comments = $("#bencomment").val();
    if (comments == "") {
        alert("Please enter your Comments");
    } else {
        $.ajax({
            method: "POST",
            url: "benUpdatestatus2020.php",
            data: {status: status, cid: cid, comment: comments}
        }).done(function (msg) {
//            alert("Data Saved: " + msg);
//            document.getElementById("#viewbeniframe").contentDocument.location.reload(true);
//            $('#viewbeniframe').contentWindow.location.reload(true);
            $('#benbuttons').html('Status Updated Successfully');
            $('#benbuttons').css("color", "green");


        });
    }
}

function closebenPopup() {
//    window.opener.location.reload();
    var src = $("#viewbeniframe").attr("src");
    alert(src);
    $("#viewbeniframe").attr("src", src);
}