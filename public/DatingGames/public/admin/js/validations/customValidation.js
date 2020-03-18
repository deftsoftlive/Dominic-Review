// lettersonly
$.validator.addMethod("lettersonlys", function(value, element) {
  return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
}, "Please enter alphabets only");

// url
$.validator.addMethod('isUrl', function(s, element){
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return this.optional(element) || regexp.test(s)
}, 'Please enter Valid Url');

// us phone
 $.validator.addMethod("phoneUS", function (value, element) {
  return this.optional(element) || value == value.match(/^(?=.*[0-9])[- +()0-9]+$/);
}, "Please specify a valid phone number."); 
