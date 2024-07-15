curl -u "$CUSTOMER_ID":"$API_KEY" \
     --url https://rest-ww.telesign.com/v1/verify/sms \
     --header 'accept: application/x-www-form-urlencoded' \
     --header 'content-type: application/x-www-form-urlencoded' \
     --data phone_number="$PHONE_NUMBER" \
     # If you have a valid sender ID approved by Telesign, uncomment the line below.
     # --data phone_number="$SENDER_ID" \
     --data message="Your package has shipped! Follow your delivery at https://vero-finto.com/orders/3456" \
     --data message_type="ARN"