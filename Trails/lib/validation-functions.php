<?php
print "\n<!--  BEGIN include validation-functions -->\n";
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// series of functions to help you validate your data. notice that each
// function returns true or false
function verifyAlphaNum ($testString) {
	// Check for letters, numbers and dash, period, space and single quote only.
	return (preg_match ("/^([[:alnum:]]|-|\.| |')+$/", $testString));
}

function verifyEmail ($testString) {
	// Check for a valid email address http://www.php.net/manual/en/filter.examples.validation.php
	return filter_var($testString, FILTER_VALIDATE_EMAIL);
}

function verifyNumeric ($testString) {
	// Check for numbers and period.
	return (is_numeric ($testString));
}

function verifyPhone ($testString) {
	// Check for usa phone number http://www.php.net/manual/en/function.preg-match.php
        $regex = '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/';
	return (preg_match($regex, $testString));
}

function verifyDate ($testString) {
    $regex = '/^(\d{4})-(\d{2})-(\d{2})$/';
    if (preg_match($regex, $testString, $matches)) {
        if(checkdate($matches[2],$matches[3],$matches[1])) {
            return true;
        }
    }
    return false;
}

function verifyTime ($testString) {
    $regex = '#^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$#';
    return (preg_match($regex, $testString));
}

print "\n<!--  END include validation-functions -->\n";
?>
