const TeleSignSDK = require("telesignsdk");

// Replace the defaults below with your Telesign authentication credentials or pull them from environment variables.
const customerId =
  process.env.CUSTOMER_ID || "408904C1-9BC4-478B-A0B3-7A3016424F8B";
const apiKey =
  process.env.API_KEY ||
  "szRYD7CkqAYpQVjQ+Hk32XFb7zfciFXX85/cMNvJuxUcI+yWf3X9F1/KvGEBxabogHFXeYviyjat8j0h3rmfKA==";

const parameters = {};

// Set the default below to your test phone number or pull it from an environment variable.
// In your production code, update the phone number dynamically for each transaction.
const phoneNumber = "9714130778";
// If you have a valid sender ID approved by Telesign, uncomment the line below and replace the placeholder value.
// parameters.senderId = "11234567891"

// Set the message text and type.
const message =
  "Your package has shipped! Follow your delivery at https://vero-finto.com/orders/3456";
const messageType = "ARN";

// Instantiate a messaging client object.
const client = new TeleSignSDK(customerId, apiKey);

// Define the callback.
function smsCallback(error, responseBody) {
  // Display the response body in the console for debugging purposes.
  // In your production code, you would likely remove this.
  if (error === null) {
    console.log("\nResponse body:\n" + JSON.stringify(responseBody));
  } else {
    console.error("Unable to send SMS. Error:\n\n" + error);
  }
}

// Make the request and capture the response.
client.sms.message(smsCallback, phoneNumber, message, messageType, parameters);
