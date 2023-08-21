function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode

if (charCode < 31 || (charCode >= 48 && charCode <= 57 ) || (charCode >= 96 && charCode <= 105 ))
    return true;
return false;
}