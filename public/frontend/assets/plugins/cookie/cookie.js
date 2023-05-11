var options = {
	title: 'Cookies & Privacy Policy',
	message: 'By clicking “Accept all cookies”, you agree Stack Exchange can store cookies on your device and disclose information in accordance with our Cookie Policy.',
	delay: 600,
	expires: 1,
	link: '#privacy',
	onAccept: function(){
		var myPreferences = $.fn.ihavecookies.cookie();
		console.log('Yay! The following preferences were saved...');
		console.log(myPreferences);
	},
	uncheckBoxes: true,
	acceptBtnLabel: 'Accept Cookies',
	fixedCookieTypeDesc: 'These are essential for the website to work correctly.'
}

$(document).ready(function() {
	$('body').ihavecookies(options);
	if ($.fn.ihavecookies.preference('marketing') === true) {
		console.log('This should run because marketing is accepted.');
	}

	$('#ihavecookiesBtn').on('click', function(){
		$('body').ihavecookies(options, 'reinit');
	});
});