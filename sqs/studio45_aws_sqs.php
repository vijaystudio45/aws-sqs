<?php
require 'sqs/vendor/autoload.php'
    use Aws\Exception\AwsException;
    use Aws\Credentials\Credentials;
    use Aws\Sqs\SqsClient; 
    $credentials = new Credentials('Enter Your Access key Here', 'Enter Your Secret Access Key Here')
        $sqsClient = new SqsClient([
            'version' => '2012-11-05',
        'credentials' => $credentials,
        'region' => 'Enter Your Region Here',
    ]);

    //Debug values, these would later be filled from database
    $params = [
        'DelaySeconds' => 10,
        'MessageAttributes' => [
            "SocialSecurityCode" => [
                'DataType' => "String",
                'StringValue' => "111111-1"
            ],
            "Name" => [
                'DataType' => "String",
                'StringValue' => "Teemu Testaaja"
            ],
            "PeriodStart" => [
                'DataType' => "String",
                'StringValue' => "1-1-2019"
            ],
            "PeriodEnd" => [
                'DataType' => "String",
                'StringValue' => "31-1-2019"
            ],
            "EventDate" => [
                'DataType' => "String",
                'StringValue' => "12-1-2019"
            ],
            "Code" => [
                'DataType' => "Number",
                'StringValue' => "12"
            ],
            "Amount" => [
                'DataType' => "Number",
                'StringValue' => "7.5"
            ]
        ],
        'MessageBody' => "Test message",
        'QueueUrl' => 'sqs-url from the console'
    ];

    try {
        print("Sending message");
        $result = $sqsClient->sendMessage($params);
        print("Message send");
        var_dump($result);
    } catch (AwsException $e) {
        // output error message if fails
        print("ERROR!");
        var_dump($e->getMessage());
    }



?>