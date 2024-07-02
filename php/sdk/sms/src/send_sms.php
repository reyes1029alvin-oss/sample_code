<?php
require __DIR__ . "/../vendor/autoload.php";
use telesign\sdk\messaging\MessagingClient;

# Replace the defaults below with your Telesign authentication credentials or pull them from environment variables.
$customer_id = getenv('CUSTOMER_ID') ?? 'FFFFFFFF-EEEE-DDDD-1234-AB1234567890';
$api_key = getenv('API_KEY') ?? 'ABC12345yusumoN6BYsBVkh+yRJ5czgsnCehZaOYldPJdmFh6NeX8kunZ2zU1YWaUw/0wV6xfw==';

# Set the default below to your test phone number or pull it from an environment variable. 
# In your production code, update the phone number dynamically for each transaction.
$phone_number = getenv('PHONE_NUMBER') ?? '11234567890';

# Set the message text and type.
$message = "Your package has shipped! Follow your delivery at https://vero-finto.com/orders/3456";
$message_type = "ARN";

# Optional: Set the sender ID if available.
# If you have a valid sender ID approved by Telesign, uncomment the line below and replace the placeholder value.
# $sender_id = getenv('SENDER_ID') ?? '11234567891';

# Instantiate a messaging client object.
$messaging = new MessagingClient($customer_id, $api_key);

# Create the parameters array and add the optional sender ID if available.
$params = [
    'message' => $message,
    'message_type' => $message_type
];

# Uncomment the line below if you have a sender ID.
# if (isset($sender_id)) {
#     $params['sender_id'] = $sender_id;
# }

# Make the request and capture the response.
$response = $messaging->message($phone_number, $message, $message_type, $params);

# Display the response body in the console for debugging purposes. 
# In your production code, you would likely remove this.
print_r($response->json);
?>
