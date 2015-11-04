<?

//We use already made Twitter OAuth library
//https://github.com/mynetx/codebird-php
require_once ('codebird.php');

//Twitter OAuth Settings, enter your settings here:
$CONSUMER_KEY = 'ZCtwsGgypg85GFQaDIrezeuHr';
$CONSUMER_SECRET = 'dzbjuipYiChd0B9ZVst7jzWtb7dQFlmHcUqqqRa9vL273qXyE8';
$ACCESS_TOKEN = '15209501-InFoKDVicKAaCO59m9P8EMm8BsREESfBh5KiQZvBK';
$ACCESS_TOKEN_SECRET = 'CHkkjZOhlYdWAENaHOmv3mb1iqUL3UCXh8Ha1DN3TBUmp';

//Get authenticated
Codebird::setConsumerKey($CONSUMER_KEY, $CONSUMER_SECRET);
$cb = Codebird::getInstance();
$cb->setToken($ACCESS_TOKEN, $ACCESS_TOKEN_SECRET);


//retrieve posts
$q = $_POST['q'];
$count = $_POST['count'];
$api = $_POST['api'];

//https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
//https://dev.twitter.com/docs/api/1.1/get/search/tweets
$params = array(
	'screen_name' => $q,
	'q' => $q,
	'count' => $count
);

//Make the REST call
$data = (array) $cb->$api($params);

//Output result in JSON, getting it ready for jQuery to process
echo json_encode($data);

?>