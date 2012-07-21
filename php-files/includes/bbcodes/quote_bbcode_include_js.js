/**
* from phpBB3 forum functions
* modded by lelebart to work with quote
*/

function selectQuote(a)
{
	// Get ID of code block
	//var e = a.parentNode.parentNode.getElementsByTagName('CODE')[0];
	var e = a.parentNode.parentNode.getElementsByTagName('DIV')[0];

	// Not IE
	if (window.getSelection)
	{
		var s = window.getSelection();
		// Safari
		if (s.setBaseAndExtent)
		{
			s.setBaseAndExtent(e, 0, e, e.innerText.length - 1);
		}
		// Firefox and Opera
		else
		{
			// workaround for bug # 42885
			if (window.opera && e.innerHTML.substring(e.innerHTML.length - 4) == '<BR>')
			{
				e.innerHTML = e.innerHTML + '&nbsp;';
			}

			var r = document.createRange();
			r.selectNodeContents(e);
			s.removeAllRanges();
			s.addRange(r);
		}
	}
	// Some older browsers
	else if (document.getSelection)
	{
		var s = document.getSelection();
		var r = document.createRange();
		r.selectNodeContents(e);
		s.removeAllRanges();
		s.addRange(r);
	}
	// IE
	else if (document.selection)
	{
		var r = document.body.createTextRange();
		r.moveToElementText(e);
		r.select();
	}
}

//Mod for PHP-Fusion by lelebart
$(document).ready(function() {
	$('span.save-quote').css('cursor','pointer').click(function(){
		selectQuote(this);
		return false;
	});
});