<?php
require 'sqs/vendor/autoload.php';
use Aws\Sqs\SqsClient;
$client = new SqsClient([
    'region' => 'ap-south-1',
    'version' => 'latest',
    'credentials' => [
        'key' => 'Enter Your Access key Here',
        'secret' => 'Enter Your Secret Access Key Here',
        ]
]);

$params = [
    'DelaySeconds' => 0,
    'MessageAttributes' => [
        "Title" => [
            'DataType' => "String",
            'StringValue' => "The Hitchhiker's Guide to the Galaxy"
        ],
        "Author" => [
            'DataType' => "String",
            'StringValue' => "Douglas Adams."
        ],
        "WeeksOn" => [
            'DataType' => "Number",
            'StringValue' => "6"
        ]
    ],
    'MessageBody' => "Hello Tarsem How are you.",
    'QueueUrl' => 'Enter Your Queueurl Here'
];

try {
    $result = $client->sendMessage($params);
    var_dump($result);
} catch (AwsException $e) {
    // output error message if fails
    error_log($e->getMessage());
}
 
 
?>