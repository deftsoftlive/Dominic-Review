<script type="text/javascript">
function addmedical() {
    var number = parseInt($("#noOfMed").val());
    var newnumber = number + 1;
    $("#noOfMed").val(newnumber);

    var mainHtml = '<div class="form-group col-md-12 f-g-full label-textarea" id="med_cond_info" style="display:block;"><label>Please state the name of the medical condition and describe how it affects this child.</label><textarea spellcheck="false" name="med_cond_info[' + newnumber + ']" id="med_con_data"></textarea></div>';

    $("#sec_med_con").append(mainHtml);
}

function addallergy() {
    var numb = parseInt($("#noOfAllergy").val());
    var newnumb = numb + 1;
    $("#noOfAllergy").val(newnumb);

    var mainHtml = '<div class="form-group col-md-12 f-g-full label-textarea" id="allergies_info"><label>Please state the name of the allergy and describe how it affects this child.</label><textarea spellcheck="false" name="allergies_info[' + newnumb + ']" id="allergies_data"></textarea></div>';

    $("#sec_all").append(mainHtml);
}

function addcontact() {
    var num = parseInt($("#noOfContact").val());
    var newnum = num + 1;
    $("#noOfContact").val(newnum);

    var mainHtml = '<div id="contact_section" class="contact_section[' + newnum + ']"><div class="col-sm-12"><h5 style="width: 100%;">Contact ' + newnum + ':</h5><p>This is the adult we expect to be the main person picking up and dropping off this child from the activity.</p></div><div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - first name:</label><div class="col-md-12"><input id="con_first_name" type="text" class="form-control" name="con_first_name[' + newnum + ']" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - surname:</label><div class="col-md-12"><input id="con_last_name" type="text" class="form-control" name="con_last_name[' + newnum + ']" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - tel number:</label><div class="col-md-12"><input id="con_phone" type="tel" class="form-control" name="con_phone[' + newnum + ']" value=""></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">contact ' + newnum + ' - email:</label><div class="col-md-12"><input id="con_email" type="email" class="form-control" name="con_email[' + newnum + ']" value="" ></div></div>';

    mainHtml += '<div class="form-group row"><label for="relation" class="col-md-12 col-form-label text-md-right">What is this persons relationship to the child?</label><div class="col-md-12"><link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"><select id="con_relation" name="con_relation[' + newnum + ']" class="form-control cstm-select-list"><option selected="" disabled="" value="">Please Choose</option><option value="Mother">Mother</option><option value="Father">Father</option><option value="Grandparent">Grandparent</option><option value="Guardian">Guardian</option><option value="Spouse">Spouse/Partner</option></select></div></div>';

    mainHtml += '<div class="form-group row"><label class="col-md-12 col-form-label text-md-right">If you choose other who are they?</label><div class="col-md-12"><input id="con_if_other" type="text" class="form-control" name="con_if_other[' + newnum + ']" value="" ></div></div></div>';

    $("#sec_contact").append(mainHtml);

    var contact_count = $("#noOfContact").val();
    if (contact_count >= '4') {
        $('.additional_contact').css('display', 'none');
    }
}
</script>