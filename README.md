Debitoor-API-Helper-Class
=========================

Debitoor API Helper Class

A class to help connect with the Debitoor API.

USAGE
=========================
$apihelp = new DebitoorApiHelper();
$apihelp->createApiCall(
	"https://app.debitoor.com/login/oauth2/access_token",
	'POST',
	NULL,
	array(
		'client_secret' => 'SECRETHERE',
		'code' => $_GET['code'],
		'redirect_uri' => 'CALLBACK HERE'
	)
);


$apihelp = new DebitoorApiHelper();
$bk = $apihelp->createApiCall(
	"https://app.debitoor.com/api/v1.0/customers",
	'GET',
	NULL,
	array(
		'access_token' => 'MYACCESSTOKEN'
	)
);
